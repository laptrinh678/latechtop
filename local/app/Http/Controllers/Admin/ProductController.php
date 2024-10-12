<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminProductRequest;
use App\Repository\ProductReponsitory;
use App\Repository\CateReponsitory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
class ProductController extends Controller
{
    public $ProductReponsitory;
    function __construct(ProductReponsitory $ProductReponsitory) {
    $this->ProductReponsitory = $ProductReponsitory;
  }

    public function index()
    {
       $data = $this->ProductReponsitory->getAll();
       return view('backend.products.index', compact('data'));
    }

    public function list()
    {
        $data = $this->ProductReponsitory->getAll();
        return view('backend.products.index_thongke', compact('data'));
    }

    public function create(CateReponsitory $CateReponsitory)
    {
        $products = $this->ProductReponsitory->getAll();
        $categories = $CateReponsitory->where('type_menu',1)->get();
        return view('backend.products.add', compact('categories','products'));
    }


    public function store(AdminProductRequest $request)
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
        $data['product_code']= 'SP_'.strtoupper(Str::random(10));
        $product = $this->ProductReponsitory->create($data);
        $product->productRelate()->attach($request->product_id);
        if($product){
            Session::flash('add_success', __('message.add_success'));
            return redirect('admin/products/');
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
            $products = $this->ProductReponsitory->getAll();
            $data = $this->ProductReponsitory->with('cate','productRelate')->find($id);
            $arrProductRelate = [];
            if($data->productRelate){
                $arrProductRelate = $data->productRelate->pluck('id')->toArray();
            }
            $parent = $CateReponsitory->where('type_menu',1)->get();
         
            return view('backend.products.edit', compact('parent','data', 'products', 'arrProductRelate'));
        }else{
             Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(empty($data['status_price'])){
            $data['status_price'] = 0;
        }
        if(empty($data['outstanding'])){
            $data['outstanding'] = 0;
        }
        if(empty($data['promotions'])){
            $data['promotions'] = 0;
        }
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
        $data['product_code']= 'SP_'.strtoupper(Str::random(10));
        $result = $this->ProductReponsitory->update($id, $data);
        $result->productRelate()->sync($request->product_id);
        if($result){
            Session::flash('update_success', __('message.update_success'));
            return redirect('admin/products');
        }else{
            return back();
        }
    }


    public function destroy($id)
    {
        if($id){
            $result =$this->ProductReponsitory->delete($id);
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
           $this->ProductReponsitory->update($id, $data);
           $status = 0;
           return view('errors.status', compact('idsp','status'));
       }else{
           $data['deleted_at'] = null;
           $this->ProductReponsitory->update($id, $data);
           $status = 1;
           return view('errors.status', compact('idsp','status'));
       }
   }
}
