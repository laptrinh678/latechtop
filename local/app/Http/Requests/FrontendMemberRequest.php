<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class FrontendMemberRequest extends FormRequest
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
                'email'=>'required|unique:members,email',
                'name'=>'required',
                'phone'=>'required',
                'code'=>'required',
                'password'=>'required|min:3|max:15', 
                ];
            

    }
    public function messages()
    {
        return [
            'email.unique'=>'Email đã tồn tại vui lòng đổi tên',
            'required'=>'Vui lòng không để trống',
            'min'=>'Số ký tự phải lớn hơn 3',
            'max'=>'Số ký tự phải nhỏ hơn 10'
        ];
    }
   
}
