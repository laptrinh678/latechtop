<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class ResetPasswordRequest extends FormRequest
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
                'password'=>'required|min:3|max:15',
                'password_confirm'=>'required|min:3|max:15|same:password'
                ];


    }
    public function messages()
    {
        return [
            'required'=>'Vui lòng không để trống',
            '*min'=>'Số ký tự phải lớn hơn 3',
            '*max'=>'Số ký tự phải nhỏ hơn 15',
            'password_confirm.same'=>'Password không giống nhau'
        ];
    }

}
