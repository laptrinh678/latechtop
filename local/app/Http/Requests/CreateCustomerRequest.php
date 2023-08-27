<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class CreateCustomerRequest extends FormRequest
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
                'email'=>'required|email|min:5|max:30',
                'phone'=>'nullable|regex:/^[0-9\-]+$/|min:5|max:30',
                ];


    }
    public function messages()
    {
        return [
            '*.required'=>'Vui lòng không để trống',
            '*.max'=>'Tối đa 30 ký tự',
            'email.min'=>'Tối thiểu 5 ký tự',
            'email.max'=>'Tối đa 30 ký tự',
            'phone.min'=>'Tối thiểu 5 ký tự',
            'phone.max'=>'Tối đa 30 ký tự',
            '*.regex'=>'Vui lòng nhập định dạng số'
        ];
    }

}
