<?php

namespace stjo\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Http\Requests\UbahPassRequest;
use stjo\Model\Umat;
use stjo\Model\User;

class UserController extends Controller
{
    public function index()
    {
        return view('data.profileUser');
    }

        /** Panggil Form Registrasi */
    public function getRegistrationForm()
    {
        //just a precaution
        if(Auth::check())
        {
            //user udah login, ga boleh register
            return redirect('/'); //harusnya ke profile
            //    todo: buat redirect ke user profile
        }
        else
        {
            //open the registration form 1
            return view('form.registrasiFirstForm');
        }

    }

    public function getRegistrationTwo()
    {
        $input=\Session::get('formSatu');

        return view('form.registrasiLastForm', compact(['input']));
    }

    public function postRegistrationOne(Requests\RegisterSatuRequest $request)
    {
        //Form satu di validasi sama RegisterSatuRequest
        //If request dari form satu sukses maka akan jadi $request
        $input = $request->all();
        \Session::flash('formSatu', $input);
//dd($input);
        //tentukan apakah umat
        if(array_key_exists('umat',$input))
        {
            //yang daftar umat so request detail umat
            $umatYangDimaksud = Umat::where('id_umat','=',$input['idumat'])->first();

            if(null === $umatYangDimaksud)
            {
                //id umatnya salah
                $message = "ID Umat tidak ditemukan";
                return Redirect::action('UserController@getRegistrationForm')
                    ->withInput($input)
                    ->withErrors(['idumat'=>$message]);
            }
            else
            {
                $detail = $umatYangDimaksud;
            }

        }
        else
        {
            $detail = null;
        }

        //this would only display the view of second registration
        //along with data from register one
        return view('form.registrasiLastForm', compact(['input','detail']));
    }

    public function prosesRegistrasi(Requests\RegisterDuaRequest $request)
    {

        //dd(\Session::all());
        //get the data it need
        $data = \Session::get('formSatu');

        //dd($data, $data['username'], \Session::all(), \Input::all());
        //terpaksa mengganti jk
        if ($data['jk'] == 'on')
        {
            $jenkel = 1;
        } else
        {
            $jenkel = 2;
        }

        //ngubah tanggal

        //command kalo user daftar bukan umat

            $newUser = new User;
            $process = $newUser::create(
                [
                    'username'      => $data['username'],
                    'nama_depan'    => $data['namaDepan'],
                    'nama_belakang' => $data['namaBelakang'],
                    'password'      => bcrypt($data['password']),
                    'email'         => $data['email'],
                    'jk'            => $jenkel,
                    'tempat_lahir'  => $data['tempatLahir'],
                    'tanggal_lahir' => \DateTime::createFromFormat("d/m/Y", $data['tglLahir']),
                    'alamat'        => $data['alamat'],
                    'kota'          => $data['kota'],
                    'kode_pos'      => $data['kodepos'],
                    'id_umat'       => $data['idumat'],
                    'user_level'    => 0,

                ]
            );




        if (array_key_exists('umat',$data))
        {
            //berarti umat... update data dong
            $dataUmat                = new Umat;
            $diUpdate                = $dataUmat->where('id_umat', '=', $data['idumat'])->first();
            $diUpdate->nama_depan    = $data['namaDepan'];
            $diUpdate->nama_belakang = $data['namaBelakang'];
            $diUpdate->jk            = $jenkel;
            $diUpdate->tempat_lahir  = $data['tempatLahir'];
            $diUpdate->tanggal_lahir = $data['tglLahir'];
            $diUpdate->alamat        = $data['alamat'];
            $process = $diUpdate->save();

        }
        if($process){
            return redirect()->to('login')->withErrors(['sukses' => 'User Berhasil dibuat, silahkan Login!']);
        }
        //    return Redirect::to('login ');
        //dd('all failed');//
        return Redirect::to('/registrasi')->withErrors(['kesalahan' => 'Terjadi kesalahan dalam pendaftaran silahkan ulangi']);
    }

    public function uploadFoto()
    {
        //dd(\Input::file(), \Session::all());
        if(Input::file('name'));
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required|image|mimes:jpeg,bmp,png|max:10000',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = \Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            //dd('validator fails');
            return back()->withErrors($validator);
        }
        else
        {
            // checking file is valid.
            if (Input::file('image')->isValid())
            {
                $destinationPath = 'images\user'; // upload path
                $extension       = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName        = 'UID-' . Auth::user()->id . '.' . $extension; // renameing image

                //check file exist
                if(file_exists($destinationPath.'/'.$fileName)){
                    //delete the file
                    unlink($destinationPath.'/'.$fileName);
                }

                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                //TODO: Logika jika extensi berbeda! Replace...
                //saving to db
                \stjo\Model\User::where('id', Auth::user()->id)
                                ->update(['path_gambar' => $fileName]);
                // sending back with message
                \Session::flash('success', 'Upload successfully');

                return \Redirect::route('profile');
            } else
            {
                // sending back with error message.
                \Session::flash('error', 'uploaded file is not valid');

                return \Redirect::route('profile');
            }
        }
        //return redirect()->route('profile')->withInput();
    }

    /**
     * Editing User Detail
     * ---------------------
     * @param $id
     */
    public function editUser($id){
        //periksa apakah user punya hak untuk mengedit user ini.
        if(!Auth::check)
        {
            //redirect to login
            return redirect()
                ->action('SigkatAuthController@getLogin')
                ->withErrors(['errors'=>'Anda Belum login, Silahkan Login terlebih dahulu!']);
        }

        if(Auth::user()->user_level == 0)
        {
            //user biasa
            //access terbatas

            if(Auth::user()->id != $id)
            {
                return redirect()->route('profile')->withErrors(['errors' => 'Anda Tidak mempunyai hak Akses']);
            }
        }

        return view('form.editUserForm');
    }

    public function passWord($id){
        if($id == Auth::user()->id){
            //dd(Auth::user());
            return view('form.ubahPassword');
        }

        return redirect()->back();
    }

    public function ubahPass(UbahPassRequest $request){
        //dd($request);
        if(Auth::attempt(['username' => Auth::user()->username, 'password' => $request->old]))
        {
            $user = Auth::user();
            $user->password = bcrypt($request->new);
            if ($user->save())
            {
                return redirect()->route('profile')->withErrors([ 'errors' => 'Pasword berhasil di ganti' ]);
            }

            return redirect()->route('profile')->withErrors(
                [ 'errors' => 'Ada Kesalahan dengan password silakan ulangi' ]
            );
        }
        return back()->withErrors([ 'old' => 'Password lama Salah!' ])->withInput();



    }
}
