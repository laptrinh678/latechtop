<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth, DB;
class LoginController extends Controller
{
    public function index()
    {
        return view('backend.user.login');
    }
    public function post(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect('admin/')->with('success','Đăng nhập thành công');
        }
        else
        {
            return redirect()->back()->with('error','Đăng nhập thất bại vui lòng kiểm tra lại password, email');
        }

    }

     public function logout()
    {
         Auth::guard('admin')->logout();
        return redirect('admin/loginql');
    }
}
