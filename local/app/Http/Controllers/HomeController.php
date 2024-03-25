<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Exception;
use App\Models\Product;

class HomeController extends Controller
{
	public function searchProduct(Request $request)
	{
		try {
			$productList = Product::where('name', 'like', '%' . $request->txtkeyword . '%')->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
			return view('dienminhquang.searchProduct', compact('productList'));
		} catch (Exception $e) {
			return '404';
		}
	}

	public function searchProductForMember(Request $request)
	{
		try {
			$productList = Product::where('point', '<=', $request->point)->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
			return view('dienminhquang.searchProduct', compact('productList'));
		} catch (Exception $e) {
			return '404';
		}
	}
}
