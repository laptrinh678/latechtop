<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;
use Mail;
use App\Models\Product;
use App\Repository\CartRepository;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Repository\ProductSoldRepository;
use App\Repository\ProductReponsitory;
class CartController extends Controller
{
    public $productSoldRepo;
    public $productRepo;

    public function __construct(ProductSoldRepository $ProductSoldRepository,ProductReponsitory $ProductReponsitory)
    {
        $this->productSoldRepo = $ProductSoldRepository;
        $this->productRepo = $ProductReponsitory;
    }
    public function getaddcart($id, Request $request)
    {

        $qty = 1;
        if($request->quantity_cart){
            $qty = $request->quantity_cart;
        }
    	$product = Product::find($id);
        //dd($product);
    	Cart::add(['id' => $id, 'name' => $product->name, 'qty' =>  $qty,'weight'=>'0',
         'price' => $product->price,
            'options' => [
    		'img' => $product->icon,
            'slug'=>$product->slug,
            'cate_id'=>$product->cate_id,
                'point'=>$product->point,
            ]]);

            return redirect('cart/show');

    }
    public function cartshow()
    {
        $total = Cart::total();
    	$data = Cart::content();
        //dd($data);
    	return view('dienminhquang.shopingCart', compact('data','total'));
    }
    public function cartdelete($rowid)
    {
        if($rowid=='all')
        {
            Cart::destroy();
        }else{
            Cart::remove($rowid);
        }
        return back();
    }
    public function cartupdate(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

    }
    public function getcomplate(){
        return view('fontend.cart.complatecart');
    }
   public function postmail(Request $request,CartRepository $CartRepository)
    {
        $data['infor'] = $request->all();
        $data['total'] = Cart::total();
        $data['content'] = Cart::content();
        $email = $request->email;
       \Mail::send('dienminhquang.shopingCartEmail', $data, function($msg) use ($email)
       {
           $msg->from(env('MAIL_FROM_ADDRESS'),env('MAIL_URL'));// mail gui
           $msg->to($email, $email);// mail nhan, ten mail
           //$msg->cc('nguyenthuonght.1980@gmail.com','Samdoo.vn');
           $msg->subject('Xác nhận hóa đơn mua hàng phaohoa247');

       });
        if(Auth::user() && Auth::user()->id){
            $dataOrder['user_id'] =  Auth::user()->id;
        }
        $dataOrder['data'] = json_encode($data['content']);
        $dataOrder['infor'] = json_encode($data['infor']);
        $dataOrder['total'] =  $data['total'];
        $dataProductSold = json_decode($dataOrder['data'],true);

        $result = $CartRepository->create($dataOrder);
        $order_id = $result->id;
        if( $order_id){
            foreach($dataProductSold as $v){
                $dataPro = [];
                $dataPro['id_product']= $v['id'];
                $dataPro['number'] = $v['qty'];
                $dataPro['id_order'] = $order_id;
                $dataProduct = $this->productRepo->find($dataPro['id_product']);
                $dataProductSoldCurrent =  $dataProduct->sold;
                $dataSoldNew = $dataProductSoldCurrent + $dataPro['number'];
                $this->productRepo->update($dataPro['id_product'],['sold'=>$dataSoldNew]);
                $this->productSoldRepo->create($dataPro);
            }
        }
        Cart::destroy();
        if($result){
            Session::flash('add_success', __('message.add_success'));
            return back();
        }else{
            return back();
        }


    }

}
