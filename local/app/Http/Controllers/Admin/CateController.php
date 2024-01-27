<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cate;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Repository\CateReponsitory;
use App\Http\Requests\AdminCatesRequest;

class CateController extends Controller
{
    public $CateReponsitory;
    function __construct(CateReponsitory $CateReponsitory)
    {
        $this->CateReponsitory = $CateReponsitory;
    }
    public function index()
    {
        $data = $this->CateReponsitory->getAll();
        return view('backend.cates.index', compact('data'));
    }
    public function add()
    {
        $categories = $this->CateReponsitory->getAll();
        return view('backend.cates.add', compact('categories'));
    }
    public function store(AdminCatesRequest $request)
    {

        //dd($request->all());
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        if ($request->img_default == 'on') {
            $data['img_default'] = 1;
        }
        if ($request->hasFile('icon')) {
            $file_Img = $request->file('icon');
            $name_Img = $file_Img->getClientOriginalName();
            $str_name_Img = Str::random(5) . "-" . $name_Img;
            while (file_exists('public/backend/' . $str_name_Img)) {
                $str_name_Img = str_random(5) . "-" . $name_Img;
            }
            $file_Img->move('public/backend/', $str_name_Img);
            $data['icon'] = $str_name_Img;
        }
        Cate::create($data);
        Session::flash('add_success', __('message.add_success'));
        return redirect('admin/cates');
    }
    public function delete($id)
    {
        $kiemTra = Cate::where('parent_id', $id)->count();
        if ($kiemTra > 0) {
            Session::flash('delete_error', __('message.delete_error'));
            return redirect()->back();
        } else {
            Cate::where('id', $id)->delete();
            Session::flash('delete_success', __('message.delete_success'));
            return redirect('admin/cates');
        }
    }
    public function getedit(Request $request, $id)
    {
        $cat    = Cate::find($id);
        $parent = Cate::all();
        return view('backend.cates.edit', compact('cat', 'parent'));
    }
    public function postedit(AdminCatesRequest $request)
    {
        $data = $request->all();
        $data['img_default'] = 0;
        if ($request->img_default == 'on') {
            $data['img_default'] = 1;
        }
        $data['slug'] = Str::slug($request->name);
        unset($data['_token']);
        unset($data['cat_id']);
        if ($request->hasFile('icon')) {
            $file_Img = $request->file('icon');
            $name_Img = $file_Img->getClientOriginalName();
            $str_name_Img = Str::random(5) . "-" . $name_Img;
            while (file_exists('public/backend/' . $str_name_Img)) {
                $str_name_Img = str_random(5) . "-" . $name_Img;
            }
            $file_Img->move('public/backend/', $str_name_Img);
            $data['icon'] = $str_name_Img;
        }
        Cate::where('id', $request->cat_id)->update($data);
        Session::flash('update_success', __('message.update_success'));
        return redirect('admin/cates');
    }
    public function status($status, $id)
    {
        $idsp = $id;
        if ($status == 1) {
            $data['deleted_at'] = Carbon::now();
            $this->CateReponsitory->update($id, $data);
            $status = 0;
            return view('errors.status', compact('idsp', 'status'));
        } else {
            $data['deleted_at'] = null;
            $this->CateReponsitory->update($id, $data);
            $status = 1;
            return view('errors.status', compact('idsp', 'status'));
        }
    }
}
