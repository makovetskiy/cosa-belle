<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use App\Call;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
       return view('welcome',['categories'=>$categories]);
    }

    public function sendemail(Request $request)
    {
        $v = Validator::make($request->all(), [
        'name_c' => 'required|max:255',
        'phone_c' => 'required'
        ]);

        if ($v->fails())
        {
            return back()->withErrors($v->errors());
        }

        $call = new Call;
        $call->name  = request()->name_c;
        $call->phone = request()->phone_c;
        $call->save();

        Session::flash('success_msg', 'Заявка успешно добавлена, наши менедженры свяжутся с вами в течении 15 минут!');

        return back()->withInput();
    }
}
