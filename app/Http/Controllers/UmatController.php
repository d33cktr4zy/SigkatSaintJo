<?php

namespace stjo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Http\Requests\BuatUmatRequest;
use stjo\Http\Requests\DataUmatFilterRequest;
use stjo\Model\Keluarga;
use stjo\Model\Lingkungan;
use stjo\Model\Umat;

class UmatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        setLocale(LC_TIME,'ID');
        //get value for combo lingkungan
        $lingkungan = Lingkungan::all();

        $umats = Umat::paginate(10);

        return view('dataUmat', ['umats' => $umats, 'lingkungan' => $lingkungan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Check.
        /**
         * TODO : Pindahkan nanti ke namespace Admin ya Gab.....^_^
         */
            $lingkungan =Lingkungan::all();
            $keluarga = Keluarga::all();



        return view('form.inputDataUmat', ['lingkungan'=>$lingkungan, 'keluarga' => $keluarga]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuatUmatRequest $request)
    {
        //
        return url('admin/umat/data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *  Showing Umat Admin Index
     *
     */
    public function adminIndex()
    {
        /**
         * TODO: This View butuh data sebelum di load.... Table gab....
         */
        //$user
        setLocale(LC_TIME,'ID');
        //get value for combo lingkungan
        $lingkungan = Lingkungan::all();

        $umats = Umat::paginate(10);

        return view('data.dataUmatAdmin', ['umats' => $umats, 'lingkungan' => $lingkungan]);
    }

    /**
     * Filters
     */
    public function filters(DataUmatFilterRequest $request){
        //dd($request->request);
        setLocale(LC_TIME,'ID');
        //get value for combo lingkungan
        $lingkungan = Lingkungan::all();
        $umat = new Umat; //set umat dulu just incase semua failed

        if($request->dataRange == 'filtered'){
            //tentukan tanggal lahir
            if(null !== $request->umur){
                //max min
                if($request->muda > $request->tua)
                {
                    //return with error
                    return back()->withInput()->withErrors(['errors' => 'Umur salah. (Muda - Tua)']);
                }

                $muda = Carbon::now()->subYears($request->muda)->toDateString();
                $tua = Carbon::now()->subYears($request->tua)->toDateString();

            }

            //using Table
            $dat = $umat;
               //Logic!!!
            if(null !==$request->lingCheck && null !== $request->jkCheck && null !== $request->umur)
            {
                //jika semua di centang
                //dd('all');
                $umat = $dat
                    ->where('id_lingkungan',$request->lingOption)
                    ->where('jk', $request->jkOption)
                    ->whereBetween('tanggal_lahir',[$tua,$muda])
                    ->paginate(10);
                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            }// All checked
            elseif (null !==$request->lingCheck && null !== $request->jkCheck && null === $request->umur)
            {
                //jika Lingkungan dan JK
                //dd('Link-JK');
                $umat = $dat
                    ->where('id_lingkungan',$request->lingOption)
                    ->where('jk', $request->jkOption)
                    ->paginate(10)
                ;
                //dd('ini');
                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            }// 1,2
            elseif (null !==$request->lingCheck && null === $request->jkCheck && null !== $request->umur)
            {
                //Jika Lingkungan dan Umur
                $umat = $dat
                    ->where('id_lingkungan',$request->lingOption)
                    ->whereBetween('tanggal_lahir',[$tua,$muda])
                    ->paginate(10)
                ;
                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            }// 1,3
            elseif (null !==$request->lingCheck && null === $request->jkCheck && null === $request->umur)
            {
                //Jika hanya Lingkungan
                $umat = $dat
                    ->where('id_lingkungan',$request->lingOption)
                    ->paginate(10)
                ;
                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            }// 1
            elseif (null ===$request->lingCheck && null !== $request->jkCheck && null !== $request->umur)
            {
                //Jika jkCheck & umur
                $umat = $dat
                    ->where('jk', $request->jkOption)
                    ->whereBetween('tanggal_lahir',[$tua,$muda])
                    ->paginate(10)
                ;
                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            }// 2,3
            elseif (null ===$request->lingCheck && null !== $request->jkCheck && null === $request->umur)
            {
                //Jika hanya JK
                $umat = $dat
                    ->where('jk', $request->jkOption)
                    ->paginate(10)
                ;

                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            }// 2
            elseif (null ===$request->lingCheck && null === $request->jkCheck && null !== $request->umur)
            {
                //Jika hanya Umur
                $umat = $dat
                    ->whereBetween('tanggal_lahir',[$tua,$muda])
                    ->paginate(10)

                ;
                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            }// 3
            else
            {
                //Jika Tidak ada yang di centang
                //call all data
                $umat = $dat->paginate(10);
                return view('dataUmat', ['umats' => $umat, 'lingkungan' => $lingkungan]);

            };
        }

        ////Kelompokk keluarga
        //if(null !== $request->kelompok){
        //    $umats = $umats->groupBy('id_keluarga');
        //}
        //        dd($request->request);
                $umats = $dat->paginate(10);
        return view('dataUmat', ['umats' => $umats, 'lingkungan' => $lingkungan]);
    }
}
