<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AdminUserRequest extends FormRequest
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
                'email'=>'required|unique:users,email',
                'name'=>'required'
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
            'required'=>'Vui lòng không để trống'
        ];
    }
   
}
