<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class cateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false为A发布B不能编辑
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cName'=>'required|min:3'
        ];
    }
}
