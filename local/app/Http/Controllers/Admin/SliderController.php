<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\SliderReponsitory;
use App\Repository\CateReponsitory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class SliderController extends Controller
{
    public $SliderReponsitory;
    function __construct(SliderReponsitory $SliderReponsitory) {
    $this->SliderReponsitory = $SliderReponsitory;
  }

    public function index()
    {
       $data = $this->SliderReponsitory->getAll();
       return view('backend.slider.index', compact('data'));
    }

    public function create(CateReponsitory $CateReponsitory)
    {
        return view('backend.slider.add');
    }


    public function store(Request $request)
    {
      
       $data = $request->all();
         if($request->hasFile('img'))
        {
             $imgIcon = $request->file('img');
             $nameIcon= time() . '_'.$imgIcon->getClientOriginalName();
             $imgIcon->move('public/backend/',$nameIcon);
             $data['img'] = $nameIcon;
        }else{
            $data['img'] = '';
        }
        $SliderReponsitory = $this->SliderReponsitory->create($data);
        if($SliderReponsitory){
            Session::flash('add_success', __('message.add_success'));
            return redirect('admin/slider/');
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
            $data = $this->SliderReponsitory->find($id);
            $parent = $CateReponsitory->getAll();
            return view('backend.slider.edit', compact('parent','data'));
        }else{
             Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }

 
    public function update(Request $request, $id)
    {
        $data = $request->all();
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
        $result = $this->SliderReponsitory->update($id, $data);
        if($result){
            Session::flash('update_success', __('message.update_success'));
            return redirect('admin/slider');
        }else{
            return back();
        }
    }


    public function destroy($id)
    {
        if($id){
            $result =$this->SliderReponsitory->delete($id);
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
           $this->SliderReponsitory->update($id, $data);
           $status = 0;
           return view('errors.status', compact('idsp','status'));
       }else{
           $data['deleted_at'] = null;
           $this->SliderReponsitory->update($id, $data);
           $status = 1;
           return view('errors.status', compact('idsp','status'));
       }
   }
}
