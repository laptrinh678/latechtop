<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class VerifyEmailRequest extends FormRequest
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
                'email'=>'required|max:255|email|exists:users,email',
                ];


    }
    public function messages()
    {
        return [
            '*email'=>'Sai định dạng email',
            '*required'=>'Vui lòng không để trống',
            'max'=>'Số ký tự phải nhỏ hơn 255',
            "*exists"=>'Email không tồn tại'
        ];
    }

}
