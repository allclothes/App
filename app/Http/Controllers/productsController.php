<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use Illuminate\Support\Facades\Auth;
use DB;

class productsController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getStore = DB::table('store')->where('user_id', auth::user()->id)->limit(1)->value('id');
        $products = DB::table('products')->where('store_id', $getStore)->paginate(12);

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth::check())
            return view('product.create');
        else
            return redirect()->back()->with('error', 'Você precisa estar logado para fazer esta ação.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(auth::check() && isset($request) && $request->isMethod('post')){
            $getStoreId = DB::table('store')->where('user_id', auth::user()->id)->limit(1)->value('id');

            if(!isset($getStoreId)){
                return redirect('/control-panel/store/create')->with('Error', 'Primeiro crie a sua loja virtual!');
            }

            try{
            // $categories = ['Lava', 'louça', 'banho', ];

            $p = new Product;
            $p->store_id = $getStoreId;
            $p->name = $request->input('name');
            $p->amount = $request->input('amount');
            $cost = str_replace(',', '.', $request->input('cost'));
            $p->cost = $cost;
            $p->description = $request->input('description');

            // if(in_array($request->input('category'), $categories))
            $p->category = $request->input('category');
            // else
            // return redirect()->back()->withErrors($validator)->withInput('error', 'Catégoria inválida.');
            


            if($request->hasfile('images'))
            {

        foreach($request->file('images') as $image)
        {
            $imgtemp = time();
            $name= mt_rand(100, 9999) . "-" . $image->getClientOriginalName();
            $image->move(public_path().'/img/product_images', $name);  
            $data[] = $name;
        }
     }

     
            $p->images = json_encode($data);

            $url = str_replace(" ","-", $request->input('name'));
            $url = strtolower($url);
            $url = $url.'-'.mt_rand(100, 999);
            $p->url = $url;
            
            
 
            
                $p->save();
                return redirect('/' . auth::user()->storename . '/' . $url)->with('success', 'Produto adicionado com sucesso!');
            
        }catch(\Exception $e){
               // do task when error
               echo $e->getMessage();   // insert query
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $getProduct = DB::table('products')->where('id', $id)->value('store_id');
        $getProductUrl = DB::table('products')->where('id', $id)->value('url');
        if(isset($getProduct)){
            $getStore = DB::table('store')->where('id', $getProduct)->value('name');          
                return redirect('/'.$getStore.'/'.$getProductUrl);            
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
        if(isset($id) && is_int($id) && auth::check() && isset($request)){
            $get = DB::table('products')->where('id', $id)->get();
            $storeid = DB::table('products')->where('id', $id)->value('store_id');
            $producturl = DB::table('products')->where('id', $id)->value('url');
            if(count($get) > 0 && isset($storeid)){
                $isAuthStore = DB::table('store')->where('id', $storeid)->value('user_id');
                if($isAuthStore == auth::user()->id){
                    $p = Product::find($id);
                    $p->cost = $request->cost;
                    $p->amount = $request->amount;
                    $p->description = $request->description;
                    if($p->save())
                        return redirect('/'.auth::user()->storename.'/'.$producturl);
                    else
                        return redirect()->back()->with('Error', 'Aconteceu algum erro.');

                }  else{
                    return redirect()->back()->with('Error', 'Você não pode editar este item.');
                }
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($id) && is_int($id) && auth::check()){
            $get = DB::table('products')->where('id', $id)->get();
            $storeid = DB::table('products')->where('id', $id)->value('store_id');
            if(count($get) > 0 && isset($storeid)){
                $isAuthStore = DB::table('store')->where('id', $storeid)->value('user_id');
                if($isAuthStore == auth::user()->id){

                    $p = Product::find($id);
                    if($p->delete())
                    return redirect()->back()->with('Success', 'Produto deletado com sucesso!');
                    else
                    return redirect()->back()->with('Error', 'Aconteceu algum erro.');

                }  else{
                    return redirect()->back()->with('Error', 'Você não pode editar este item.');
                }
            }
        }else{
            return redirect()->back();
        }
    }
}
