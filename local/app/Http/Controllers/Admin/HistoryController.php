<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryShop;
use App\Models\HistoryLogin;
class HistoryController extends Controller
{

    public function index()
    {
       $historyShop = HistoryShop::orderBy('id','desc')->with(['products','users'])->paginate(15);
       $historyLogin = HistoryLogin::orderBy('id','desc')->with(['users'])->paginate(15);
       return view('backend.history.index', compact('historyShop','historyLogin'));
    }

}
