<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class AdminPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules(Request $request)
    {
        if($request->post_id =='')
        {
            return [
                'name'=>'required|unique:posts,name',
                'cate_id'=>'required'
                ];
            
        }else{
            return [
                'name'=>'required',
                'cate_id'=>'required'
            ];
        }

    }
    public function messages()
    {
        return [
            'name.unique'=>'Tên bài viết đã tồn tại vui lòng đổi tên',
            'required'=>'Vui lòng không để trống'
        ];
    }
}
