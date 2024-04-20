<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryShop;
use App\Models\HistoryLogin;
use Mail;
class HistoryController extends Controller
{

    public function index()
    {
        $historyShop = HistoryShop::orderBy('id', 'desc')->with(['products', 'users'])->paginate(config('apps.fullpage.paginate'));
        $historyLogin = HistoryLogin::orderBy('id', 'desc')->with(['users'])->paginate(config('apps.fullpage.paginate'));
        return view('backend.history.index', compact('historyShop', 'historyLogin'));
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
