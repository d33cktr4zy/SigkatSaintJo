<?php

namespace stjo\Http\Requests;

use stjo\Http\Requests\Request;

class RegisterSatuRequest extends Request
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
            'username'      => 'required|min:5|max:20|unique:tbl_user,username',
            'email'         => 'required|email|unique:tbl_user,email',
            'email-konfirm' => 'required|email|same:email',
            'umat'          => '',
            'idumat'        => 'required_if:umat,1'
        ];
    }

    public function messages()
    {
        return [
            //
            'username.required' => 'Anda Belum Memasukkan Username',
            'username.min'      => 'Username terlalu pendek. Minimal 5 karakter!',
            'username.max'      => 'Username terlalu panjang. Maksimal 20 karakter!',
            'email.required'    => 'Anda Belum memasukkan email',
            'email.email'       => 'email anda salah',
            'email-konfirm.required' => 'Anda Belum mengkonfirmasi email anda',
            'email-konfirm.same' => 'Email tidak sama!',
            'idumat.required_if'    => 'Anda belum memasukkan ID Umat Anda!'
        ];
    }
}

