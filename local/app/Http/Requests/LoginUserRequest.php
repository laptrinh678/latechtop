<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class LoginUserRequest extends FormRequest
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
        $validate =  [
        'password'=>'required'
        ];
        if($this->logincheck==1){
            $validate['phone'] = 'required';
        }
        // if($this->logincheck==0){
        //     $validate['code'] = 'required';
        // }
        return  $validate;
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
