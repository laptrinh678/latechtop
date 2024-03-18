<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class FrontendUserRequest extends FormRequest
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
                'email'=>'required|unique:users,email|max:50',
                'name'=>'required|max:50',
                'phone'=>'required|numeric|digits_between:8,12|unique:users,phone',
                'password'=>'required|min:3|max:15',
                'password_confirm'=>'required|min:3|max:15|same:password',
                'sex'=>'required'
                ];


    }
    public function messages()
    {
        return [
            'email.unique'=>'Email đã tồn tại vui lòng đổi tên',
            'phone.unique'=>'Số điện thoại đã tồn tại vui lòng đổi lại',
            'required'=>'Vui lòng không để trống',
            '*min'=>'Số ký tự phải lớn hơn 3',
            '*max'=>'Số ký tự phải nhỏ hơn 10',
            '*numeric'=>'Số điện thoại phải là dạng số',
            '*digits_between'=>'Số điện thoại quá ngắn hoặc quá dài',
            'code.exists'=>'Mã code không tồn tại, vui lòng xem lại mã code',
            'name.max'=>'Độ dài không quá 50 ký tự',
            'email.max'=>'Độ dài không quá 50 ký tự',
            'code.max'=>'Độ dài không quá 50 ký tự',
            'password_confirm.same'=>'Password không giống nhau',
        ];
    }

}
