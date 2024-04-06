<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Exception;
use App\Models\Product;
use App\Models\Post;
class HomeController extends Controller
{
	public function searchProduct(Request $request)
	{
		try {
			$productList = Product::where('name', 'like', '%' . $request->txtkeyword . '%')->with('cate')->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
			return view('dienminhquang.search.searchProduct', compact('productList'));
		} catch (Exception $e) {
			return '404';
		}
	}

	public function searchProductForMember(Request $request)
	{
		try {
			$productList = Product::where('point', '<=', $request->point)->with('cate')->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
			return view('dienminhquang.search.searchProduct', compact('productList'));
		} catch (Exception $e) {
			return '404';
		}
	}

	public function searchPost(Request $request){
		try {
			$postList = Post::where('name', 'like', '%' . $request->postName . '%')->with('cate')->orderBy('id', 'desc')->paginate(config('apps.fullpage.paginate'));
			return view('dienminhquang.search.searchPost', compact('postList'));
		} catch (Exception $e) {
			return '404';
		}
	}
}
