<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Cookie;
use Session;
use App\Good;
use App\Category;
use App\Order;
class CatalogController extends Controller
{
    public function index(Request $request)
    {
    	$category = 0;
        

    	if(!isset($request->category) || $request->category == 0){
    		$goods = Good::where('img','<>','0')
            ->where('img','<>','')
            ->get();
    	}
    	else{
    		$goods = Good::where('category_id','=',$request->category)
            ->where('img','<>','0')
            ->where('img','<>','')
            ->get();
    		$category = $request->category;
    	}

    	
    	$categories = Category::all();
    	return view('catalog.index2',[
    		'goods' => $goods,
    		'categories' => $categories,
    		'category' => $category
    	]);
    }

    public function show($id)
    {

    	return view('catalog.show');
    }

    public function cart(Request $request)
    {
    	/*$cart  = $request->cart_list;
    	$items = explode(",", $cart);
    	$goods = array();
    	$summ =0;
    	foreach ($items as $item) {
    		$good = Good::find($item);
    		$summ = $summ + floatval(str_replace(',','.',$good->price));
    		array_push($goods, $good);
    	}
        */
    	return view('catalog.cart');//,['goods' =>$goods,'summ' => $summ]);
    }

    public function getGoods()
    {
        
        if(!isset(request()->cart)){
            return 'error';
        }
        if(is_null(request()->cart)){
            return 'error';
        }
        if(request()->cart=='null'){
            return 'error';
        }
        $cart  = request()->cart;
        $items = explode(",", $cart);
        $goods = array();
        $summ =0;
        foreach ($items as $item) {
            $good = Good::find($item);
            $summ = $summ + floatval(str_replace(',','.',$good->price));
            array_push($goods, $good);
        }
        return response()->json($goods);
    }

    public function order(Request $request)
    {
    	return view('catalog.order');
    }

    public function create(Request $request)
    {
    	$v = Validator::make($request->all(), [
        'firstname' => 'required|max:255',
        'lastname' => 'required',
        'phone' => 'required',
        'email' => 'required'
	    ]);

	    if ($v->fails())
	    {
	        return back()->withErrors($v->errors());
	    }

    	$firstname 		= request()->firstname;
    	$lastname  		= request()->lastname;
    	$email     		= request()->email;
    	$comment		= "";

    	$phone     		= request()->phone;
    	$delivery_type_id = request()->delivery_type_id;
		$pickup_point     = request()->pickup_point;

    	$full_address 	= "";
    	$home			= "";
    	$flat 			= "";

    	$goods_list 	= "";

    	if(!isset(request()->goods_list)){
	        Session::flash('error_msg', "Ошибка корзины!");
	        return back()->withInput();
	    }
	    else{
	    	$goods_list = request()->goods_list;
	    }

        $summ = 0;
        $items = explode(",", $goods_list);
    	$goods = array();
    	
    	foreach ($items as $item) {
    		$good = Good::find($item);
    		$summ = $summ + floatval(str_replace(',','.',$good->price));
    		array_push($goods, $good);
    	}


    	if(request()->delivery_type_id != 1){
    		if($summ<1000){
    			$summ = $summ+300;
    		}
    		
            if(!isset(request()->full_address)){
	            Session::flash('error_msg', "Адрес доставки не может быть пустым!");
	            return back()->withInput();
	        }
	        else{
	        	$full_address = request()->full_address;
	        }
	        if(!isset(request()->home)){
	            Session::flash('error_msg', "Номер дома не может быть пустым!");
	            return back()->withInput();
	        }
	        else{
	        	$home = request()->home;
	        }
        }
        

	    if(isset(request()->flat)){
	        $flat = request()->flat;
	    }
    	if(isset(request()->comment)){
	        $comment = request()->comment;
	    }

	   
    	$order = new Order();
    	$order->firstname 		= $firstname;
    	$order->lastname  		= $lastname;
    	$order->phone	  		= $phone;
    	$order->email     		= $email;
    	$order->comment   		= $comment;
    	$order->delivery_type 	= $delivery_type_id;
    	$order->pick_point_id 	= $pickup_point;
    	$order->full_address	= $full_address;
    	$order->home 			= $home;
    	$order->flat 			= $flat;
    	$order->good_list       = $goods_list;
    	$order->status 			= 1;
    	$order->price 			= $summ;
    	$order->save();

    	return view('catalog.fine');
    }
}
