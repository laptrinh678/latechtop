<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AdminCatesRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if($request->cat_id =='')
        {
             return [
                'name'=>'required|unique:cates,name'
                ];
            
        }else{
           return [
                'name'=>'required'
            ];
        }

    }
    public function messages()
    {
        return [
            'name.unique'=>'Tên danh mục đã tồn tại vui lòng đổi tên danh mục',
            'required'=>'Vui lòng không để trông'
        ];
    }
}
