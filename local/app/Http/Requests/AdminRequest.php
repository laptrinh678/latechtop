<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AdminRequest extends FormRequest
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
        if($request->user_id =='')
        {
            return [
                'email'=>'required|unique:admins,email',
                'name'=>'required',
                'password'=>'required|min:6|max:15'
                ];

        }else{
            return [
                'email'=>'required',
            ];
        }

    }
    public function messages()
    {
        return [
            'email.unique'=>'Email đã tồn tại vui lòng đổi tên',
            '*required'=>'Vui lòng không để trống',
            '*max'=>'Tối đa 15 ký tự',
            '*min'=>'Tối thiểu 6 ký tự'
        ];
    }

}
