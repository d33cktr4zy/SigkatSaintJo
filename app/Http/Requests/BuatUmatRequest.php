<?php

namespace stjo\Http\Requests;

use stjo\Http\Requests\Request;

class BuatUmatRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->user_level == 1){
            return true;

        }
            return false;


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            dd(\Session::all(), \Input::all() );

        return [
            // sementara untuk sidang ga usah pake validation dulu ya....>.<
        //    "namaDepan"    => "LAKdjalkaj",
        //    "namaBelakang" => "klasdjasld",
        //    "email"        => "ksajdaksldj@kdal.com",
        //    "jk"           => "1",
        //    "tempatLahir"  => "aklaskdj",
        //    "tglLahir"     => "23/07/1986",
        //    "alamat"       => "laksdjaskldjakldsj",
        //    "lingkungan"   => "3",
        //    "namakk"       => "3",
        //    "pekerjaan"    => "sadalskdsalkdjkl",
        //    "noTel"        => "kljsadklasdj",
        //    "simpan"       => "Simpan",
        //    "foto"         =>"",
        ////-test: false
        ////-originalName: "daaja.xlsx"
        ////-mimeType: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
        ////-size: 10765
        ////-error: 0


        ];
    }
}
