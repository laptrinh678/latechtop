<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\OrderRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Repository\UsersRepository;
use App\Repository\DoitienRepository;
use DB;
use Carbon\Carbon;
class OrderController extends Controller
{
    public $OrderRepository;
    public $userRepo;

    function __construct(OrderRepository $OrderRepository, UsersRepository $usersRepository)
    {
        $this->OrderRepository = $OrderRepository;
        $this->userRepo = $usersRepository;
    }

    public function index()
    {
        $currentTime = Carbon::now()->format('Y-m-d');
        $currentMonth=Carbon::now()->format('Y-m');
        $data = $this->OrderRepository->with('productSold')->orderBy('created_at','desc')->paginate(10);
        return view('backend.order.index', compact('data','currentTime','currentMonth'));
    }

    public function create(CateReponsitory $CateReponsitory)
    {
        $categories = $CateReponsitory->where('type_menu', 1);
        return view('backend.products.add', compact('categories'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $cat_id_parent = DB::table('cates')->where('id', $request->cate_id)->select('parent_id')->first();
        $data['cat_id_parent'] = $cat_id_parent ? $cat_id_parent->parent_id : '';
        if ($request->hasFile('icon')) {
            $imgIcon = $request->file('icon');
            $nameIcon = time() . '_' . $imgIcon->getClientOriginalName();
            $imgIcon->move('public/backend/', $nameIcon);
            $data['icon'] = $nameIcon;
        } else {
            $data['icon'] = '';
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
        } else {
            $data['img'] = '';
        }
        $data['slug'] = Str::slug($request->name);
        $ProductReponsitory = $this->ProductReponsitory->create($data);
        if ($ProductReponsitory) {
            Session::flash('add_success', __('message.add_success'));
            return redirect('admin/products/');
        } else {
            return back();
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id, CateReponsitory $CateReponsitory)
    {
        if ($id) {
            $data = $this->ProductReponsitory->find($id);
            $parent = $CateReponsitory->where('type_menu', 1);
            return view('backend.products.edit', compact('parent', 'data'));
        } else {
            Session::flash('no_data', __('message.no_data'));
            return back();
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $cat_id_parent = DB::table('cates')->where('id', $request->cate_id)->select('parent_id')->first();
        $data['cat_id_parent'] = $cat_id_parent ? $cat_id_parent->parent_id : '';
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
        $result = $this->ProductReponsitory->update($id, $data);
        if ($result) {
            Session::flash('update_success', __('message.update_success'));
            return redirect('admin/products');
        } else {
            return back();
        }
    }


    public function destroy($id)
    {
        if ($id) {
            $result = $this->ProductReponsitory->delete($id);
            if ($result) {
                Session::flash('delete_success', __('message.delete_success'));
                return back();
            }
        }
    }

    public function status($status, $order_id)
    {
        $data['pay'] = 1;
        if ($status == 1) {
            $data['pay'] = 0;
            $status = 0;
            $this->OrderRepository->update($order_id, $data);
            return view('errors.status_order', compact('order_id', 'status'));
        }
        if ($status == 0) {
            $data['pay'] = 1;
            $status = 1;
            $this->OrderRepository->update($order_id, $data);
            return view('errors.status_order', compact('order_id', 'status'));
        }

    }

    public function congdiemchoUserChaTheoNhanh($idUserChaCap1, $nhanh, $totalPoint)
    {
        $dataUserChaCap1 = $this->userRepo->find($idUserChaCap1);
        if ($dataUserChaCap1) {
            $diemNhanhphaiOld = $dataUserChaCap1->diem_nhanhphai;
            $diemNhanhtraiOld = $dataUserChaCap1->diem_nhanhtrai;
            $idUserCha = $dataUserChaCap1->id;
            if ($nhanh == 1) {
                $this->userRepo->update($idUserCha, ['diem_nhanhphai' => $diemNhanhphaiOld + $totalPoint]);
            }
            if ($nhanh == 0) {
                $this->userRepo->update($idUserCha, ['diem_nhanhtrai' => $diemNhanhtraiOld + $totalPoint]);
            }
            if ($dataUserChaCap1->parent_user_id != '') {
                $nhanhTuyentren = $dataUserChaCap1->nhanh;
                return $this->congdiemchoUserChaTheoNhanh($dataUserChaCap1->parent_user_id, $nhanhTuyentren, $totalPoint);
            }
        }
    }

    public function doitien(DoitienRepository $DoitienRepo){

        try{
            $data = $DoitienRepo->with('users')->getAll();
           // dd($data);
            return view('backend.order.doitien',compact('data'));
        }catch(\Exception $e){
            dd($e);
        }

    }
}
