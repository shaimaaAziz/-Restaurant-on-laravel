<?php

namespace App\Http\Controllers;

use App\cart;
use App\checkout;
use App\Detail;
use App\Item;
use App\Order;
use App\OrderDetail;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;


class ProductController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {


        $product = Item::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('product.index',['user'=>Auth::user()]);
    }


    public function getOrder($id){
        $order=Order::all()->where('user_id','=',$id);
        $detail=Detail::all();
//dd($order);

    return view('order', ['details'=>$detail,'orders'=>$order,'user'=>Auth::user()]);
}


    public function getCart()
    {

        if (!Session::has('cart')) {
            return view('shop.shopping-cart',['user'=>Auth::user()]);
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice,'user'=>Auth::user()]);
    }


    public function status(){
        if (!Session::has('cart')) {
            return view('shop.shopping-cart',['user'=>Auth::user()]);
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);



        $order = new Order();

        $order->address = Auth::user()->address;
        $order->phone = Auth::user()->phone;
        $order->user_id = Auth::user()->id;
        $order->status = true;
        $order->save();

        $orderProducts = [];
        foreach ($cart->items as $productId => $item) {
            $orderProducts[] = [
                'order_id'  => $order->id,
                'item_id' => $item ['item']['id'],
                'qty' => $item ['qty'],
                'total'  => $item['price']

            ];
        }
        Detail::insert($orderProducts);

        $order_id= $order->id;
//        $order = DB::table('orders')->where('id','=',$id)->update(['status'=>1]);
//        $order = Order::find($id);
//        $order->status = 1;
        Session::forget('cart');
        Toastr::success('product successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->route('product.index',['user'=>Auth::user()]);
    }


    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);

        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart',['user'=>Auth::user()]);
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);

        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart',['user'=>Auth::user()]);
    }


    public function getcheck()
    {

        if(!Session::has('cart')){
            return view('shop.shopping-cart',['user'=>Auth::user()]);
        }
        $oldCart=Session::get('cart');
        $cart=new cart($oldCart);
        $total=$cart->totalPrice;
        return view('shop.checkout',['total'=>$total,'user'=>Auth::user()]);

    }
    public function postcheck(Request $request)
    {


        if (!Session::has('cart')) {
            return view('shop.shopping-cart',['user'=>Auth::user()]);
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);


        $order = new Order();

        $order->address = Auth::user()->address;
        $order->phone = Auth::user()->phone;
        $order->user_id = Auth::user()->id;
        $order->status = false;
        $order->save();

        $orderProducts = [];
        foreach ($cart->items as $productId => $item) {
            $orderProducts[] = [
                'order_id' => $order->id,
                'item_id' => $item ['item']['id'],
                'qty' => $item ['qty'],
                'total' => $item['price']

            ];
        }
        Detail::insert($orderProducts);

        $checkout = new checkout();

        $checkout->order_id = $order->id;
        $checkout->card_name = $request->input('card_name');
        $checkout->card_number = $request->input('card_number');
        $checkout->card_expiry_month = $request->input('card_expiry_month');
        $checkout->card_expiry_year = $request->input('card_expiry_year');
        $checkout->card_cvc = $request->input('card_cvc');
        $checkout->save();


        Session::forget('cart');
        Toastr::success('product successfully confirmed.', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('product.index',['user'=>Auth::user()]);
    }

}

