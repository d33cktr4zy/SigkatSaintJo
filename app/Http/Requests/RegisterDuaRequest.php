<?php

namespace stjo\Http\Requests;

use stjo\Http\Requests\Request;

class RegisterDuaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        return [
            //
            'namaDepan'        => 'required',
            'namaBelakang'     => 'required',
            'password'         => 'required|min:6|regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).)',
            'password-konfirm' => 'same:password',
            'tempatLahir'      => 'required',
            'tglLahir'         => 'required',
            'jk'               => 'required',
            'alamat'           => 'required',
            'kota'             => 'required',
            'kodepos'          => 'required',
            'setuju'           => 'Accepted',
        ];
    }

    public function messages()
    {
        //dd(\Session::all());
        $oldForm = \Input::all();
        \Session::flash('formSatu', $oldForm);

        return [
            //
            'setuju.accepted'       => 'Anda Belum Menyetujui Peraturan situs',
            'namaDepan.required'     => 'Anda Belum Memasukkan Username',
            'namaBelakang.required'           => 'Anda Belum Memasukkan Username',
            'username.max'           => 'Username terlalu panjang. Maksimal 20 karakter!',
            'password.required'         => 'Anda Belum memasukkan Password',
            'password.regex'            => 'Password harus mengandung Huruf Kapital dan angka',
            'password-konfirm.required' => 'Anda Belum mengkonfirmasi password anda',
            'password-konfirm.same'     => 'Password Konfirmasi tidak sama!',
            'idumat.required_if'     => 'Anda belum memasukkan ID Umat Anda!',
            'tglLahir.required'     => 'Masukkan Tanggal Lahir'

        ];
    }
}
