<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\PostReponsitory;
use App\Repository\CateReponsitory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use App\Http\Requests\AdminPostRequest;
use App\Models\Province;
class PostController extends Controller
{
    public $PostReponsitory;
    function __construct(PostReponsitory $PostReponsitory) {
    $this->PostReponsitory = $PostReponsitory;
  }

    public function index()
    {
        $data= $this->PostReponsitory->getAll();
        return view('backend.post.index', compact('data'));
    }

    public function create(CateReponsitory $CateReponsitory)
    {
        $categories = $CateReponsitory->getAll();
        $province = Province::orderBy('province_id','desc')->get();
        return view('backend.post.add', compact('categories','province'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostRequest $request)
    {
        $data = $request->all();
        $cat_id_parent = DB::table('cates')->where('id',$request->cate_id)->select('parent_id')->first();
        $data['cat_id_parent']= $cat_id_parent ? $cat_id_parent->parent_id : '';
        if($request->hasFile('icon'))
       {
            $imgIcon = $request->file('icon');
            $nameIcon= time() . '_'.$imgIcon->getClientOriginalName();
            $imgIcon->move('public/backend/',$nameIcon);
            $data['icon'] = $nameIcon;
       }else{
           $data['icon'] = '';
       }
        if($request->hasFile('images'))
       {
           $imgdetail = $request->file('images');
           $images=array();
            if($imgdetail)
            {
               foreach($imgdetail as $file)
               {
                   $name= time() . '_'.$file->getClientOriginalName();
                   $file->move('public/backend/',$name);
                   $images[]=$name;
               }
            }
           $data['img'] = json_encode($images);
       }else
       {
           $data['img'] = '';
       }
       $data['slug']=Str::slug($request->name);
       $PostReponsitory = $this->PostReponsitory->create($data);
       if($PostReponsitory){
           Session::flash('add_success', __('message.add_success'));
           return redirect('admin/post/');
       }else{
           return back();
       }
    }

    public function show($id)
    {
        //
    }


    public function edit($id,CateReponsitory $CateReponsitory)
    {
        if($id){
            $data = $this->PostReponsitory->find($id);
            $parent = $CateReponsitory->getAll();
            $province = Province::orderBy('province_id','desc')->get();
            return view('backend.post.edit', compact('parent','data','province'));
        }else{
             Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }


    public function update(AdminPostRequest $request, $id)
    {
        $data = $request->all();
        $cat_id_parent = DB::table('cates')->where('id',$request->cate_id)->select('parent_id')->first();
        $data['cat_id_parent']= $cat_id_parent ? $cat_id_parent->parent_id : '';
        if($request->hasFile('icon'))
       {
            $imgIcon = $request->file('icon');
            $nameIcon= time() . '_'.$imgIcon->getClientOriginalName();
            $imgIcon->move('public/backend/',$nameIcon);
            $data['icon'] = $nameIcon;
       }
        if($request->hasFile('images'))
       {
           $imgdetail = $request->file('images');
           $images=array();
            if($imgdetail)
            {
               foreach($imgdetail as $file)
               {
                   $name= time() . '_'.$file->getClientOriginalName();
                   $file->move('public/backend/',$name);
                   $images[]=$name;
               }
            }
           $data['img'] = json_encode($images);
       }
       $data['slug']=Str::slug($request->name);
       $result = $this->PostReponsitory->update($id, $data);
       if($result){
           Session::flash('update_success', __('message.update_success'));
           return redirect('admin/post');
       }else{
           return back();
       }
    }


    public function destroy($id)
    {
        if($id){
            $result =$this->PostReponsitory->delete($id);
            if($result){
                Session::flash('delete_success', __('message.delete_success'));
                return back();
            }
        }
    }

    public function status($status, $id){
        $idsp = $id;
       if($status==1){
           $data['deleted_at'] = Carbon::now();
           $this->PostReponsitory->update($id, $data);
           $status = 0;
           return view('errors.status', compact('idsp','status'));
       }else{
           $data['deleted_at'] = null;
           $this->PostReponsitory->update($id, $data);
           $status = 1;
           return view('errors.status', compact('idsp','status'));
       }
   }
}
