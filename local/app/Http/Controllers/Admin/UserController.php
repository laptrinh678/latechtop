<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Http\Requests\AdminUserRequest;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Repository\UsersRepository;
use App\Repository\HistoryRepository;
use App\Repository\AdminRepository;
use Illuminate\Support\Facades\Session;
use Exception;
class UserController extends Controller
{
    public $UsersRepository;
    public $historyRe;
    public $adminRe;
    function __construct(
        UsersRepository $UsersRepository,
        HistoryRepository $historyRepository,
        AdminRepository $adminRepository
    )
    {
        $this->UsersRepository = $UsersRepository;
        $this->historyRe = $historyRepository;
        $this->adminRe = $adminRepository;
    }
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    public function admin(){
        $data = $this->adminRe->getAll();
        return view('backend.user.admin', compact('data'));
    }

    public function adminDelete($id){
        if($id){
            $result = $this->adminRe->delete($id);
            if($result){
                Session::flash('delete_success', __('message.delete_success'));
                return back();
            }
        }
    }

    public function create()
    {
        return view('backend.user.add');
    }

    public function adminCreate(){
        return view('backend.user.addAdmin');
    }

    public function store(AdminUserRequest $request)
    {
        $data = $request->all();
        $data['password']= bcrypt($request->password);
        $data['showpassword']= $request->password;
        unset($data['_token']);
        User::create($data);
        Session::flash('add_success', __('message.add_success'));
        return redirect('admin/users');
    }

    public function adminPostCreate(AdminRequest $request)
    {
        $data = $request->all();
        $data['password']= bcrypt($request->password);
        unset($data['_token']);
        Admin::create($data);
        Session::flash('add_success', __('message.add_success'));
        return redirect('admin/admin-user');
    }
    public function changePassword($id){
        $admin = $this->adminRe->find($id);
        return view('backend.user.adminChangePassword', compact('admin'));
    }

    public function changePasswordPost(ChangePasswordRequest $request, $id){

        $data['password']= bcrypt($request->password);
        $this->adminRe->update($id, $data);
        Session::flash('update_success', __('message.update_success'));
        return redirect('admin/admin-user');
    }

    public function edit($id)
    {
        $users = $this->UsersRepository->find($id);
        return view('backend.user.edit', compact('users'));
    }

    public function update(AdminUserRequest $request, $id)
    {
        $data = $request->all();
        $data['password']= bcrypt($request->password);
        $data['showpassword']= $request->password;
        $this->UsersRepository->update($id, $data);
        Session::flash('update_success', __('message.update_success'));
        return redirect('admin/users');

    }

    public function destroy($id)
    {
        if($id){
            $result =$this->UsersRepository->delete($id);
            if($result){
                Session::flash('delete_success', __('message.delete_success'));
                return back();
            }
        }
    }

    public function listDoitien(){
        $users = $this->UsersRepository
            ->whereIn('point','>=',1000)
            ->whereIn('diem_nhanhtrai','>=',3000)
            ->whereIn('diem_nhanhphai','>=',3000)
            ->orderBy('id', 'ASC')->get();
        return view('backend.user.doitien', compact('users'));
    }
    public function capNhatToanBoDiem(){
        $users = $this->UsersRepository
            ->whereIn('point','>=',1000)
            ->whereIn('diem_nhanhtrai','>=',3000)
            ->whereIn('diem_nhanhphai','>=',3000)
            ->orderBy('id', 'ASC')->get();
        if( $users){
            foreach($users as $user)
            {
                $data_heso = [];
                $data_heso['nhanhphai'] = floor($user->diem_nhanhphai / 3000);
                $data_heso['nhanhtrai'] = floor($user->diem_nhanhtrai / 3000);
                $giatri_nhonhat = min($data_heso);

                $diemconlai =[];
                $diemconlai['point'] = $user->point;
                $diemconlai['diem_nhanhtrai'] = $user->diem_nhanhtrai - $giatri_nhonhat * 3000;
                $diemconlai['diem_nhanhphai'] = $user->diem_nhanhphai - $giatri_nhonhat * 3000;

                if ($giatri_nhonhat >= 100) {
                    $diemconlai['point'] = $user->point;
                    $diemconlai['diem_nhanhtrai'] = 0;
                    $diemconlai['diem_nhanhphai'] = 0;
                    $giatri_nhonhat=100;
                }
                User::where('id',$user->id)->update($diemconlai);
                    $diem_BanDau =[];
                    $diem_BanDau['point'] = $user->point;
                    $diem_BanDau['diem_nhanhphai'] = $user->diem_nhanhphai;
                    $diem_BanDau['diem_nhanhtrai'] = $user->diem_nhanhtrai;
                    $diem_BanDau['doanhthu'] = $giatri_nhonhat;

                    $dataHistory = [];
                    $dataHistory['user_id']=$user->id;
                    $dataHistory['diemcu']=json_encode($diem_BanDau);
                    $dataHistory['diemconlai']=json_encode($diemconlai);
                    $this->historyRe->create($dataHistory);
            }
            Session::flash('update_success', __('message.update_success'));
            return back();
        }

    }
    public function capnhatDiem($idUser, $diemConlai,$diembandau_doanhthu,HistoryRepository $historyRe){
     try{
            $data_decode = json_decode($diemConlai, true);
            $data_decode['status_doitien']=1;
            $dataHistory = [];
            $dataHistory['user_id']=$idUser;
            $dataHistory['diemcu']=$diembandau_doanhthu;
            $dataHistory['diemconlai']=$diemConlai;
            $result = $this->UsersRepository->update($idUser, $data_decode);
            if($result){
                $this->historyRe->create($dataHistory);
                Session::flash('chuyentien_success', __('message.chuyentien_success'));
                return back();
            }
     }
     catch(Exception $e)
     {
         return back();
     }
    }

    public  function history(){

        try{
            $data =  $this->historyRe->with('users')->getAll();
            return view('backend.user.historyDoitien', compact('data'));
        }
        catch(Exception $e)
        {
            return back();
        }
    }

    public function capnhatdoitien($id){

        $this->historyRe->update($id,['status'=>'1']);
        Session::flash('update_success', __('message.update_success'));
        return back();

    }
}
