<?php

namespace stjo\Http\Requests;

use stjo\Http\Requests\Request;
use stjo\Model\ForumKategori;

class ForumKategoriRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->user_level == 1){

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

        return [
            'namaKategori' => 'required|unique:tbl_forum_kategori,nm_kategori,' .$this->id .',id_kategori'
        ];
    }
}
