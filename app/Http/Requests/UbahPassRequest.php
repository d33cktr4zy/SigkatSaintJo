<?php

namespace stjo\Http\Requests;

use stjo\Http\Requests\Request;

class UbahPassRequest extends Request
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
        //dd(Request::all());

        return [
            //
            "old"        => "required",
            "new"        => 'required|min:6|regex:((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).)',
            "konfirmasi" => "same:new",
        ];
    }
}
