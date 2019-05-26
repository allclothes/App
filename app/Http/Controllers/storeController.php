<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests\NewStoreRequest;

class storeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth::check())
        return view('control-panel.create-store');
        else
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewStoreRequest $request)
    {
        if(auth::check() && isset($request) && $request->isMethod('post')){
            $store = new Store;
            $validatedData = $request->validated();

            $check = DB::table('store')->where('user_id', auth::user()->id)->get();

            if(count($check) > 0)
                return redirect()->back()->with('Error', 'Você já possui um canal.');


            $name = str_replace(" ", "", $request->input('name'));
            $name = strtolower($name);

            $store->name = $name;
            $store->description = $request->input('description');
            $store->user_id = Auth::user()->id;

            if($request->hasfile('profileimg'))
            {
                $pimg = $request->file('profileimg');
                $profile = mt_rand(100, 9999) . "-" . mt_rand(100, 999) . '.' . $pimg->getClientOriginalExtension();
                $pimg->move(public_path().'/img/stores/', $profile);    
                $store->profileimg = $profile;
            }

            if($request->hasfile('backgroundimg'))
            {
                $bgimg = $request->file('backgroundimg');
                $background = mt_rand(100, 9999) . "-" . mt_rand(100, 999) . '.' . $bgimg->getClientOriginalExtension();
                $bgimg->move(public_path().'/img/stores/', $background);
                $store->backgroundimg = $background;
            }

            $store->save();
            DB::table('users')
            ->where('id', auth::user()->id)
            ->update(['storename' => $name]);

            return redirect('/'.$name);
      
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $getstore = DB::table('store')->where('name', $name)->limit(1)->get();

        if(count($getstore) > 0){

            foreach ($getstore as $s) {
                $products = DB::table('products')->where('store_id', $s->id)->orderBy('created_at', 'DESC')->paginate(12);
                $comments = DB::table('comments')->where('to_store_id', $s->id)->orderBy('created_at', 'DESC')->limit(6)->get();
            }
            
        return view('store.show', ['store' => $getstore, 'products' => $products, 'comments' => $comments]);
        }
        else
        return redirect()->back();
    }


    public function showProduct($store, $url)
    {
        $checkStore = DB::table('store')->where('name', $store)->limit(1)->value('id');
        if(isset($checkStore)){
        $store = DB::table('store')->where('name', $store)->limit(1)->get();
        $get = DB::table('products')->where('url', $url)->where('store_id', $checkStore)->get();
        if(count($get) > 0)
        return view('store.product', ['product' => $get, 'store' => $store]);
        else
        return redirect('/')->with('Error', 'Este produto não existe nesta loja.');
            }else{
        return redirect('/')->with('Error', 'Esta loja não existe.');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
