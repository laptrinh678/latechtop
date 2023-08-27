<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateUserRequest extends FormRequest
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
                'avata'=>'required|mimes:jpeg,png,jpg|max:10000',
                'cccd_mattruoc'=>'required|mimes:jpeg,png,jpg|max:10000',
                'cccd_matsau'=>'required|mimes:jpeg,png,jpg|max:10000', 
                'cccd_matsau'=>'required|mimes:jpeg,png,jpg|max:10000', 
                'bankName'=>'required',
                'stk'=>'required',
                ];
            

    }
    public function messages()
    {
        return [
            '*.required'=>'Vui lòng không để trống',
            '*.max'=>'dung lượng tối đa 10000MB',
            '*.mimes'=>'Sai định dạng'
        ];
    }
   
}
