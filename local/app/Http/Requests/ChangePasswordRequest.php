<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class ChangePasswordRequest extends FormRequest
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

     public function rules(Request $request)
    {

            return [
                'password'=>'required|min:6|max:15'
                ];



    }
    public function messages()
    {
        return [
            '*required'=>'Vui lòng không để trống',
            '*max'=>'Tối đa 15 ký tự',
            '*min'=>'Tối thiểu 6 ký tự'
        ];
    }

}
