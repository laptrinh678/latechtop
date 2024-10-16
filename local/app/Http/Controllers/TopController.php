<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use DB;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\FrontendUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\VerifyEmailRequest;
use App\Http\Requests\CreateCustomerRequest;
use App\Repository\UsersRepository;
use App\Repository\DoitienRepository;
use App\Repository\HistoryRepository;
use App\Repository\CateReponsitory;
use App\Repository\PostReponsitory;
use App\Repository\ProductReponsitory;
use App\Repository\QuestionGroupRepository;
use Auth, File;
use Exception;
use Mail;
use App\Models\ResetPassword;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Cate;
use App\Models\Customer;
use App\Models\Province;
use App\Models\HistoryLogin;

class TopController extends Controller
{
    public $historyRepo;
    public $cateRepo;
    public $postRepo;
    public $productRepo;
    public $questionGroupRepo;
    public function __construct(
        HistoryRepository $HistoryRepo,
        CateReponsitory $CateReponsitory,
        PostReponsitory $postReponsitory,
        ProductReponsitory $productReponsitory,
        QuestionGroupRepository $questionGroupRepository

    ) {
        $this->historyRepo = $HistoryRepo;
        $this->cateRepo = $CateReponsitory;
        $this->postRepo = $postReponsitory;
        $this->productRepo = $productReponsitory;
        $this->questionGroupRepo = $questionGroupRepository;
    }

    public function index(Request $request)
    {
        try {
            $newpost = $this->cateRepo->with(['posts'])->where('page', 4)->first();
            $newOutstanding = $this->postRepo->where('cate_id', 57)->with('cate')->orderBy('id', 'desc')->limit(10)->get();
            $provincePost = $this->postRepo->where('cate_id', 57)->with('cate')->orderBy('view', 'desc')->limit(30)->get();
            $cates = Cate::with('posts', 'product','questionGroup','childrenMenu')->orderBy('id', 'desc')->get();
            $blogQuaTang = Cate::where('page', 7)->orderBy('id', 'desc')->get();
            $questionGroup = $this->questionGroupRepo->with('cate')->orderBy('id', 'desc')->get();
            $newpostFirst = $this->postRepo->with('cate')->getWhereNull('deleted_at')->orderBy('id', 'desc')->get();
            $blogHomePage = Cate::where('page', 4)->with('product')->orderBy('id', 'desc')->get();
            $province = Province::orderBy('province_id', 'desc')->get();
            $listDocumentCate = $this->postRepo->where('cate_id', 119)->get();
            return view(
                'frontend.home',
                compact(
                    'newpost',
                    'cates',
                    'blogQuaTang',
                    'newpostFirst',
                    'blogHomePage',
                    'newOutstanding',
                    'province',
                    'provincePost',
                    'questionGroup',
                    'listDocumentCate'
                )
            );
        } 
        catch(Exception $e) {
            return view('errors.error');
        }
        
    }

    public function details($cate_id, $slug)
    {
        try {
            if ($cate_id == 1 && $slug == 1) {
                return back();
            }
            $sp = $this->productRepo->with('cate','productRelate')->where('slug', $slug)->first();
            $view['view'] = $sp->view + 1;
            $this->productRepo->update($sp->id, $view);
            $sp_lienquan = $this->productRepo->with('cate')->where('cate_id', $cate_id)->orderBy('id', 'desc')->get();
            $blogDetailproduct = $this->cateRepo->where('page', 9)->with('product')->get();
            return view('frontend.detailProduct', compact('sp', 'sp_lienquan','blogDetailproduct'));
        }catch (Exception $e) {
            return view('errors.error');
        }
       
    }
    public function detailsProduct($id, $slug = null){
        try{
            $sp = $this->productRepo->with('cate','productRelate')->where('id', $id)->first();
            if ($sp->cate_id == 1 && $slug == 1) {
                return back();
            }
            $view['view'] = $sp->view + 1;
            $this->productRepo->update($sp->id, $view);
            $sp_lienquan = $this->productRepo->with('cate')->where('cate_id', $sp->cate_id)->orderBy('id', 'desc')->get();
            $blogDetailproduct = $this->cateRepo->where('page', 9)->with('product')->get();
            return view('frontend.detailProduct', compact('sp', 'sp_lienquan','blogDetailproduct'));
        }catch (Exception $e) {
            return view('errors.error');
        }
    }
    public function catesProduct($cate_id, $slug)
    {
        $cateData = DB::table('cates')->where('id', $cate_id)->first();
        $listCatedata = DB::table('products')->where('cate_id', $cate_id)->orderBy('id', 'desc')->get();
        return view('frontend.cateProduct', compact('listCatedata', 'cateData'));
    }

    public function catesTotal($cate_id, $type_menu)
    {
      
        $cateData = $this->cateRepo->where('id', $cate_id)->first();
        if ($type_menu == 0) {
            $cate_id_post_total = $this->cateRepo->where('type_menu', 0)->where('parent_id', $cate_id)->select('id')->get();
            $cate_parent_id_count = count($cate_id_post_total);
            $cateIdPost = [];
            if ($cate_parent_id_count > 0) {
                foreach ($cate_id_post_total as $v) {
                    $cateIdPost[] = $v->id;
                }
            }
            $numberCatePost = count($cateIdPost);
            $data = $this->postRepo->with('cate')->findWhereIn('cate_id', $cateIdPost)->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
            if ($numberCatePost == 0) {
                $data = $this->postRepo->where('cate_id', $cate_id)->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
            }
            if (count($data) == 1) {
                $post = $data[0];
                return view('frontend.listPost', compact('post', 'cateData'));
            }
            if (count($data) == 0) {
                $post = null;
                return view('frontend.listPost', compact('post', 'cateData'));
            }
            if (count($data) > 1) {
                $postList = $data;
                return view('frontend.listPost', compact('postList', 'cate_id', 'cateData'));
            }
        }
        if ($type_menu == 1) {
            $cate_id_product_total = $this->cateRepo->where('type_menu', 1)->where('parent_id', $cate_id)->select('id')->get();
            $cate_parent_id_count = count($cate_id_product_total);
            $listCateIdPro = [];
            if ($cate_parent_id_count > 0) {
                foreach ($cate_id_product_total as $v) {
                    $listCateIdPro[] = $v->id;
                }
            }
            $productList = $this->productRepo->findWhereIn('cate_id', $listCateIdPro)->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
            if (count($listCateIdPro) == 0) {
                $productList = $this->productRepo->with('cate')->where('cate_id', $cate_id)->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
            }
            if (count($productList) > 1) {
                $blogDetailproduct = $this->cateRepo->where('page', 9)->with('product')->get();
                return view('frontend.cateProduct', compact('productList', 'cateData','blogDetailproduct'));
            }
            if (count($productList) == 1) {
                $sp = $productList[0];
                $sp_lienquan = $this->productRepo->with('cate')->where('cate_id', $cate_id)->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
                $blogDetailproduct = $this->cateRepo->where('page', 9)->with('product')->get();
                return view('frontend.detailProduct', compact('sp', 'sp_lienquan','blogDetailproduct'));
            }
        }
    }

    public function catesTotal2($cate_id, $type_menu)
    {
        try {
            if ($type_menu == 1) {
                $cateData = DB::table('cates')->where('id', $cate_id)->first();
                $cate_parent_id = DB::table('cates')->where('parent_id', $cate_id)->select('id')->get()->toArray();
                $cate_parent_id_count = count($cate_parent_id);
                $arr_cate_id = [];
                if ($cate_parent_id_count > 0) {
                    foreach ($cate_parent_id as $v) {
                        $arr_cate_id[] = $v->id;
                    }
                }
                if (count($arr_cate_id) > 0) {
                    $productList = DB::table('products')->whereIn('cate_id', $arr_cate_id)->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(8);
                }
                $productList = DB::table('products')->where('cate_id', $cate_id)->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(8);
                return view('frontend.cateProduct', compact('productList', 'cateData'));
            } else {
                //dd('aa');
                return view('frontend.catePost');
            }
        } catch (Exception $e) {
            return view('errors.error');
        }
    }

    public function catesLoaiSanpham($type)
    {
        try {
            if ($type === 'san-pham-moi') {
                $productList = Product::where('outstanding', Product::OUT_STANDING)->orderBy('id', 'desc')->paginate(8);
                return view('frontend.cateProductType', compact('productList'));
            }
            if ($type === 'san-pham-noi-bat') {
                $productList = Product::where('outstanding', Product::OUT_STANDING)->orderBy('id', 'desc')->paginate(8);
                return view('frontend.cateProductType', compact('productList'));
            }
        } catch (Exception $e) {
            return view('errors.error');
        }
    }

    public function postDetail($id, $slug)
    {
        try{
            $postDetail = $this->postRepo->with('cate')->find($id);
            //dd($postDetail);
            $view['view'] = $postDetail->view + 1;
            $this->postRepo->update($id, $view);
            $blogDetailproduct = $this->cateRepo->where('page', 9)->with('product')->get();
            return view('frontend.postDetail2', compact('postDetail','blogDetailproduct'));
        }catch (Exception $e) {
            return view('errors.error');
        }
       
    }

    public function getPostWhereProvince($idProvice){
        try{
            $listpostWhereProvince = $this->postRepo->where('id_province', $idProvice)->orderBy('id','desc')->with('cate')->get();
            return view('frontend.ajax.listpostWhereProvince', compact('listpostWhereProvince'));
        }catch (Exception $e) {
            return view('errors.error');
        }
    }

    public function shopingCart()
    {
        return view('frontend.shopingCart');
    }

    public function dangky(UsersRepository $UsersRepository)
    {
        $user = $UsersRepository->getAll();
        return view('frontend.dangky', compact('user'));
    }

    public function postdangky(FrontendUserRequest $request, UsersRepository $UsersRepository)
    {

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['showpassword'] = $request->password;
        $data['code_product'] = Str::random(8);
        // $userid = $UsersRepository->getUserId($request->code);
        // $parentUserid = $UsersRepository->getIdUserParent($userid);
        // if ($parentUserid != '') {
        //     $data['parent_user_id'] = $parentUserid;
        //     $soluongUserCon = $UsersRepository->countSubUser($parentUserid);
        //     if ($soluongUserCon >= 1) {
        //         $data['nhanh'] = 1;
        //     }
        //     $UsersRepository->updateSubUser($parentUserid);
        // }
        $result = User::create($data);
        // $id = $result->id;
        // if ($id < 10) {
        //     $id = '0' . $id;
        // }
        // $datanew['code'] = 'DN1144' . $id;
        // $data['code'] = $datanew['code'];
        // $UsersRepository->update($id, $datanew);
        // $email = $request->email;
        // \Mail::send('frontend.guithanhvien', $data, function ($msg) use ($email) {
        //     $msg->from(env('MAIL_FROM_ADDRESS'), 'Samdoo.vn');// mail gui
        //     $msg->to($email);// mail nhan, ten mail
        //     $msg->subject('Đăng ký thành viên samdoo.vn');
        // });
        // \Mail::send('frontend.dangkythanhvien', $data, function ($msg) use ($email) {
        //     $msg->from(env('MAIL_FROM_ADDRESS'), 'Samdoo.vn');// mail gui
        //     $msg->to($email);// mail nhan, ten mail
        //     $msg->cc('nguyenthuonght.1980@gmail.com', 'Samdoo.vn');
        //     $msg->subject('Đăng ký thành viên samdoo.vn');
        // });
        if ($result) {
            Session::flash('mathanhvien', $result->phone);
            Session::flash('add_success', __('message.add_success'));
            return back();
        }
    }

    public function loginUser(LoginUserRequest $request)
    {
        $login = [
            'password' => $request->password,
            'phone' => $request->phone,
        ];
        if (Auth::attempt($login)) {
            if(Auth::user() && Auth::user()->id){
                $historyLogin['user_id'] =  Auth::user()->id;
                HistoryLogin::create($historyLogin);
            }
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'Đăng nhập thất bại vui lòng kiểm tra lại số điện thoại,mã code, password']);
        }
    }

    public function logoutuser()
    {
        $phone = Auth::user()->phone;
        $status = 0;
        DB::table('users')->where('phone', $phone)->update(['status' => $status]);
        Auth::logout();
        return redirect('/');
    }

    public function usermanager(UsersRepository $usersRepository)
    {
        $history = $this->historyRepo->where('user_id', Auth::user()->id);
        return view('frontend.userManager', compact('history'));
    }

    public function caynhiphan(UsersRepository $usersRepository)
    {
        $userCon = $usersRepository->getUserCon(Auth::user()->id);
        return view('frontend.caynhiphan', compact('userCon'));
    }

    public function chuyenhanh($status, $id, UsersRepository $usersRepository)
    {
        $data['nhanh'] = 0;
        if ($status == 0) {
            $data['nhanh'] = 1;
        }
        $re = $usersRepository->update($id, $data);
        if ($re) {
            return back();
        }
    }

    public function update_usermanager(UpdateUserRequest $request, UsersRepository $UsersRepository)
    {
        try {
            if ($request->hasFile('avata')) {
                $file_Img = $request->file('avata');
                $name_Img = $file_Img->getClientOriginalName();
                $str_name_Img = Str::random(5) . "-" . $name_Img;
                while (file_exists('public/backend/' . $str_name_Img)) {
                    $str_name_Img = str_random(5) . "-" . $name_Img;
                }
                $file_Img->move('public/backend/', $str_name_Img);
                $data['avata'] = $str_name_Img;
            }
            if ($request->hasFile('cccd_mattruoc')) {
                $file_Img1 = $request->file('cccd_mattruoc');
                $name_Img1 = $file_Img1->getClientOriginalName();
                $str_name_Img1 = Str::random(5) . "-" . $name_Img1;
                while (file_exists('public/backend/' . $str_name_Img1)) {
                    $str_name_Img1 = str_random(5) . "-" . $name_Img1;
                }
                $file_Img1->move('public/backend/', $str_name_Img1);
                $data['cccd_mattruoc'] = $str_name_Img1;
            }
            if ($request->hasFile('cccd_matsau')) {
                $file_Img2 = $request->file('cccd_matsau');
                $name_Img2 = $file_Img1->getClientOriginalName();
                $str_name_Img2 = Str::random(5) . "-" . $name_Img2;
                while (file_exists('public/backend/' . $str_name_Img2)) {
                    $str_name_Img2 = str_random(5) . "-" . $name_Img2;
                }
                $file_Img2->move('public/backend/', $str_name_Img2);
                $data['cccd_matsau'] = $str_name_Img2;
            }
            $databank['bankName'] = $request->bankName;
            $databank['stk'] = $request->stk;
            $data['bank'] = json_encode($databank);
            $id = Auth::user()->id;
            $re = $UsersRepository->update($id, $data);
            if ($re) {
                return response()->json([
                    'status' => true,
                    'message' => 'update_success',
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'update_fail',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'update_fail',
            ]);
        }
    }

    public function doiDiemSangTien(Request $request, DoitienRepository $DoidiemRepo)
    {
        try {
            $data['user_id'] = Auth::user()->id;
            $data['comment'] = $request->comment;
            $data['status'] = 1;
            $re = $DoidiemRepo->create($data);
            if ($re) {
                return back();
            }
        } catch (\Exception $e) {
            return back();
        }
    }

    public function forgotPassword()
    {
        try {
            return view('frontend.forgotPassword');
        } catch (\Exception $e) {
            return back();
        }
    }
    public function forgotPasswordPost(VerifyEmailRequest $request)
    {
        try {
            $data = $request->all();
            $data['token'] = Str::random(50);
            $email = $data['email'];
            $re = ResetPassword::create($data);
            \Mail::send('frontend.sendMailForgotPassWord', $data, function ($msg) use ($email) {
                $msg->from(env('MAIL_FROM_ADDRESS'), 'tuyendungcongchuc247.com'); // mail gui
                $msg->to($email); // mail nhan, ten mail
                $msg->subject('Cập nhật lại mật khẩu tuyendungcongchuc247.com');
            });

            Session::flash('sendEmailVerifyPassword', __('Gửi email xác thực mật khẩu thành công, vui lòng kiểm tra email'));
            return back();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function verifyPassword()
    {
        return view('frontend.changePassword');
    }

    public function changePassword(ResetPasswordRequest $request)
    {
        try {
            $email = ResetPassword::where('token', $request->token)->first();
            if ($email) {
                $data['password'] = bcrypt($request->password);
                User::where('email', $email->email)->update($data);
                Session::flash('reset_password_success', 'Cập nhật password mới thành công, vui lòng đăng nhập lại với password mới');
                return back();
            }
            Session::flash('reset_password_fail', 'Cập nhật password lỗi vui lòng xem lại đường link');
            return back();
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function customer(CreateCustomerRequest $request)
    {
        try {
            $data = Customer::create($request->all());
            Session::flash('add_success', 'Cập nhật password lỗi vui lòng xem lại đường link');
            return back();
        } catch (\Exception $e) {
            return $e;
        }
    }
}
