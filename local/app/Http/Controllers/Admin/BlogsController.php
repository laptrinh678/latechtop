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
use App\Repository\ProductReponsitory;
use App\Repository\BlogsReponsitory;
use Exception;

class BlogsController extends Controller
{
    public $PostReponsitory;
    protected $productRepo;
    protected $cateRepo;
    protected $blogsRepo;
    function __construct(
    PostReponsitory $PostReponsitory, 
    ProductReponsitory $productReponsitory, 
    CateReponsitory $cateReponsitory,
    BlogsReponsitory $blogsReponsitory
    )
    {
        $this->PostReponsitory = $PostReponsitory;
        $this->productRepo = $productReponsitory;
        $this->cateRepo = $cateReponsitory;
        $this->blogsRepo = $blogsReponsitory;
    }

    public function index()
    {
        $blogs = $this->blogsRepo->getAll();
        return view('backend.blogs.index', compact('blogs'));
    }

    public function create(Request $request)
    {
        $categories =  $this->cateRepo->getAll();
        $products = $this->productRepo->getAll();
        return view('backend.blogs.add', compact('categories','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['product_id'] = json_encode($request->product_id);
            $blog = $this->blogsRepo->create($data);

            if ($blog) {
                Session::flash('add_success', __('message.add_success'));
                return redirect('admin/blogs/');
            } else {
                return back();
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        //
    }


    public function edit($id, CateReponsitory $CateReponsitory)
    {
        if ($id) {
            $data = $this->PostReponsitory->with('productPost')->find($id);
            $products = $this->productRepo->getAll();
            $parent = $CateReponsitory->getAll();
            $province = Province::orderBy('province_id', 'desc')->get();
            return view('backend.post.edit', compact('parent', 'data', 'province', 'products'));
        } else {
            Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }


    public function update(AdminPostRequest $request, $id)
    {
        $data = $request->all();
        $cat_id_parent = DB::table('cates')->where('id', $request->cate_id)->select('parent_id')->first();
        $data['cat_id_parent'] = $cat_id_parent ? $cat_id_parent->parent_id : '';
        $data['product_id'] = json_encode($request->product_id);
        if ($request->hasFile('icon')) {
            $imgIcon = $request->file('icon');
            $nameIcon = time() . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->move('public/backend/', $nameIcon);
            $data['icon'] = $nameIcon;
        }
        if ($request->hasFile('images')) {
            $imgdetail = $request->file('images');
            $images = array();
            if ($imgdetail) {
                foreach ($imgdetail as $file) {
                    $name = time() . '_' . $file->getClientOriginalName();
                    $file->move('public/backend/', $name);
                    $images[] = $name;
                }
            }
            $data['img'] = json_encode($images);
        }
        $data['slug'] = Str::slug($request->name);
        $post = $this->PostReponsitory->update($id, $data);
        $post->productPost()->sync($request->product_id);
        if ($post) {
            Session::flash('update_success', __('message.update_success'));
            return redirect('admin/post');
        } else {
            return back();
        }
    }


    public function destroy($id)
    {
        if ($id) {
            $result = $this->blogsRepo->delete($id);
            if ($result) {
                Session::flash('delete_success', __('message.delete_success'));
                return back();
            }
        }
    }

    public function status($status, $id)
    {
        $idsp = $id;
        if ($status == 1) {
            $data['deleted_at'] = Carbon::now();
            $this->PostReponsitory->update($id, $data);
            $status = 0;
            return view('errors.status', compact('idsp', 'status'));
        } else {
            $data['deleted_at'] = null;
            $this->PostReponsitory->update($id, $data);
            $status = 1;
            return view('errors.status', compact('idsp', 'status'));
        }
    }
}
