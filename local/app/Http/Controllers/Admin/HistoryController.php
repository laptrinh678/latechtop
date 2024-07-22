<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryShop;
use App\Models\HistoryLogin;
use App\Models\HistoryQuiz;
use App\Repository\ProductReponsitory;
use Mail;

class HistoryController extends Controller
{
    protected $productRepo;

    function __construct(ProductReponsitory $productReponsitory)
    {
        $this->productRepo = $productReponsitory;
    }
    public function index()
    {
        $historyShop = HistoryShop::orderBy('id', 'desc')->with(['products', 'users'])->paginate(config('apps.fullpage.paginate'));
        $historyLogin = HistoryLogin::orderBy('id', 'desc')->with(['users'])->paginate(config('apps.fullpage.paginate'));
        $historyQuiz =  HistoryQuiz::orderBy('id', 'desc')->with(['users','questionGroup'])->paginate(config('apps.fullpage.paginate'));
        return view('backend.history.index', compact('historyShop', 'historyLogin','historyQuiz'));
    }

    public function sendEmailShop(Request $request)
    {
        try {
            $email = $request->email;
            $data['infor'] = $request->all();
            Mail::send('templateEmail.historyShop', $data, function($msg) use ($email)
            {
                $msg->from(env('MAIL_FROM_ADDRESS'),env('MAIL_URL'));// mail gui
                $msg->to($email, $email);// mail nhan, ten mail
                $msg->subject('Nhanh tay mua tài liệu, ôn tập để đỗ đậu công chức');

            });
            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function sendEmailDowload(Request $request){
        try {
            $email = $request->email;
            $product = $this->productRepo->select(['link','name','id'])->find($request->product_id);
            $product->user_name = $request->userName;
            $product->user_email = $request->email;
            $product->text_send_email = $request->text;
            $data['infor'] = $product;
            Mail::send('templateEmail.linkDowload', $data, function($msg) use ($email)
            {
                $msg->from(env('MAIL_FROM_ADDRESS'),env('MAIL_URL'));// mail gui
                $msg->to($email, $email);
                $msg->subject('Tuyendungcongchuc247.com gửi link dowload tài liệu');

            });
            return true;
        }
        catch(\Exception $e){
            return $e;
        }
    }

    public function sendEmailProduct(Request $request){
        try {
            $email = $request->email;
            $product = $this->productRepo->select(['link','name','id'])->find($request->product_id);
            $product->text_send_email = $request->text;
            $data['infor'] = $product;
            Mail::send('templateEmail.productDowload', $data, function($msg) use ($email)
            {
                $msg->from(env('MAIL_FROM_ADDRESS'),env('MAIL_URL'));// mail gui
                $msg->to($email, $email);
                $msg->subject('Tuyendungcongchuc247.com gửi link dowload tài liệu');

            });
            return true;
        }
        catch(\Exception $e){
            return $e;
        }
    }

    public function sendEmailUser(Request $request)
    {
        try {
            $email = $request->email;
            $data['infor'] = $request->all();
            Mail::send('templateEmail.listUser', $data, function($msg) use ($email)
            {
                $msg->from(env('MAIL_FROM_ADDRESS'),env('MAIL_URL'));// mail gui
                $msg->to($email, $email);// mail nhan, ten mail
                $msg->subject('Tuyendungcongchuc247.com');

            });
            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
