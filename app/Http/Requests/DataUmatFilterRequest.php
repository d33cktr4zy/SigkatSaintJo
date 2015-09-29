<?php

namespace stjo\Http\Requests;

use stjo\Http\Requests\Request;

class DataUmatFilterRequest extends Request
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
            'umur' => '',
            'muda' => 'required_if:umur,tua|numeric',
            'tua' =>'required_if:umur,muda|numeric',
        //dd('valid'),
        ];
    }

    //public function messages()
    //{
    //    //dd('message');
    //}
}
