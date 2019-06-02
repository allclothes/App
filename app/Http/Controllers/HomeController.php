<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('control-panel.index');
    }

    public function paymentHistory(){
        $get = DB::table('products_history')->where('user_id', auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
        return view('control-panel.paymentHistory', ['phistory' => $get]);
    }
}
