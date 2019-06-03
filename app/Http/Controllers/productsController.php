<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests\UpdateProductRequest;

use App\Models\Address;
use App\Models\Cart;
use App\Models\ProductHistory;



class productsController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth::check()) return redirect('/login')->with('error', 'Você não tem acesso a isto.');

        $getStore = DB::table('store')->where('user_id', auth::user()->id)->limit(1)->value('id');
        $products = DB::table('products')->where('store_id', $getStore)->paginate(12);

        return view('product.index', ['products' => $products]);
    }

    public function cleanCarrinho(request $request){
        $request->session()->forget('carrinho');
       
        return redirect()->back()->with('success', 'Carrinho limpo com sucesso!');
    }

    public function addCarrinho(Request $request){
        if($request->session()->has('carrinho')){
            $g = $request->session()->get('carrinho');
            $find = false;
            if($g['store'] != $request->store){
                return redirect()->back()->with('error', 'Você já possui um carrinho com outra loja. Finalize-a primeiro!');
            }

            for ($i=0; $i < count($g['data']); $i++) {
                if($g['data'][$i]['id'] == $request->productId){
                    $qn = $g['data'][$i]['quantity'] + $request->productQuantity;
                    if($qn > $request->productMaxQuantity) return redirect()->back()->with('error', 'O produto não contém o estoque desejado.');


                    $g['data'][$i]['quantity'] += $request->productQuantity;
                    $g['data'][$i]['cost'] = $request->productCost*$g['data'][$i]['quantity'];
                    $find = true;
                    
                }
                
            }
            if($find){
                $request->session()->put('carrinho', $g);                    
                return redirect()->back()->with('success', 'Produto adicionado com sucesso!');
            }

            $x = [
                'id'        =>      $request->productId,
                'name'      =>      $request->productName,
                'quantity'  =>      $request->productQuantity,
                'cost' =>           $request->productCost*$request->productQuantity,
            ];

            array_push($g['data'], $x);

        $request->session()->put('carrinho', $g);
        
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');

        }else{
            $request->productCost = $request->productQuantity*$request->productCost;
        $json = [
            'store'         =>     $request->store,
            'createdAt'     =>     now(),
            'data'          =>     []
        ];
        $x = [
            'id'        =>      $request->productId,
            'name'      =>      $request->productName,
            'quantity'  =>      $request->productQuantity,
            'cost' =>           $request->productCost,
        ];
        array_push($json['data'], $x);

        $request->session()->put('carrinho', $json);
        
        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }



    }

    function searchIdOfArray($arr, $id){
        foreach ($arr as $key=>$v) {
            if($v['id'] === $id)
                return $key;
        }
    }


    public function DelCarrinho(Request $request){
        if(!$request->session()->has('carrinho')) return redirect()->back()->with('error', 'Você ainda não possui um carrinho de nenhuma loja.');
        $products = $request->session()->get('carrinho');
        if(!count($products['data']) > 0) return redirect()->back()->with('error', 'O seu carrinho esta vázio.');
       
        $gv = self::searchIdOfArray($products['data'], $request->id);
        unset($products['data'][$gv]);       
   
        $request->session()->put('carrinho', $products);

        return redirect()->back()->with('success', 'Produto removido do carrinho!');

    }


    public function checkout(){
        return view('checkout');
    }

    public function confirmCheckout(request $request){
        if(!auth::check()) return redirect('/register')->with('success', 'É necessário fazer o login. Mas relaxa, deixei seu carrinho guardado ;)');

        if(!$request->session()->has('carrinho')) return redirect('/')->with('error', 'Você não pode fazer o checkout de um carrinho vazio!');
        if(!isset($request->session()->get('carrinho')['data'])) return redirect('/')->with('error', 'Você não pode fazer o checkout de um carrinho vazio!');

        return view('checkout_2');
    }

    public function storeCart(Request $request){

        if(!$request->isMethod('post')) return redirect('/')->with('error', 'Method no allowed');
        if(!auth::check())  return redirect('/login')->with('error', 'No authenticated');
        if(!$request->session()->has('carrinho'))  return redirect('/')->with('error', 'Você não possui um carrinho');
        if(!$request->session()->get('carrinho')['data'])  return redirect('/')->with('error', 'O seu carrinho esta vazio');
        if(!$request->session()->get('carrinho')['data'] > 0)  return redirect('/')->with('error', 'O seu carrinho esta vazio');
        
        $session = $request->session()->get('carrinho');
        $found = false;
        $getAddress = DB::table("address")->where('user_id', auth::user()->id)->get();
        foreach ($getAddress as $k => $v) {
            if($v->zip_code == $request->cep)
                $found = $v->id;
        }
        $ph = new ProductHistory;

        if($found){

        $ph->address_id = $found;


        }else{
        $address = new Address;

        $address->user_id = auth::user()->id;

        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;        
        $address->zip_code = $request->cep;
        $address->address = $request->address;

        if($address->save()) $ok_address = true;

        $ph->address_id = $address->id;
        }
        $gStoreId = DB::table('store')->where('name', $session['store'])->value('id');
        
        $ph->store_id   =   $gStoreId;      
        $ph->user_id    =   auth::user()->id;
        $ph->status     =   "waiting";
        $ph->save();

        foreach ($session['data'] as $value) {
            $cart = new Cart;
            $cart->history_id = $ph->id;
            $cart->product_id = $value['id'];
            $cart->quantity = $value['quantity'];
            $cart->cost = $value['cost'];
            $cart->timestamps = false;
            $cart->save();
        }
        $request->session()->forget('carrinho');

        return redirect('/control-panel/payments/history')->with('success', 'Compra realizada com sucesso! Uhuul');
       
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
                return redirect('/control-panel/store/create')->with('error', 'Primeiro crie a sua loja virtual!');
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
            // return redirect()->back()->witherrors($validator)->withInput('error', 'Catégoria inválida.');
            


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
    public function update(request $request, $id)
    {
        // if(isset($id) && auth::check() && isset($request)){
        //     $get = DB::table('products')->where('id', $id)->get();
        //     $storeid = DB::table('products')->where('id', $id)->value('store_id');
        //     $producturl = DB::table('products')->where('id', $id)->value('url');
        //     if(count($get) > 0 && isset($storeid)){
        //         $isAuthStore = DB::table('store')->where('id', $storeid)->value('user_id');
        //         if($isAuthStore == auth::user()->id){
        //             $p = Product::find($id);
        //             $validatedData = $request->validated();
        //             $cost = str_replace(',', '.', $request->cost);
        //             $p->cost = $cost;
        //             $p->amount = $request->amount;
        //             $p->description = $request->description;
        //             if($p->save())
        //                 return redirect('/'.auth::user()->storename.'/'.$producturl);
        //             else
        //                 return redirect()->back()->with('error', 'Aconteceu algum erro.');

        //         }  else{
        //             return redirect()->back()->with('error', 'Você não pode editar este item.');
        //         }
        //     }else{
        //         return redirect()->back()->with('error', 'Você não pode editar este item.');
        //     }
        // }else{
        //     return redirect()->back()->with('error', 'Sem permissão para isto.');
        // }
        $sid = DB::table('products')->where('id', $request->id)->value('store_id');
        $suid = DB::table('store')->where('id', $sid)->value('user_id');
        if(auth::check() && auth::user()->id == $suid){
        $p = Product::find($id);
                    // $validatedData = $request->validated();
                    $cost = str_replace(',', '.', $request->cost);
                    $p->cost = $cost;
                    $p->amount = $request->amount;
                    $p->description = $request->description;
                    if($p->save())
                        return redirect()->back()->with('success', 'Produto modificado com sucesso! =P');
        }else{
            return redirect()->back()->with('error', 'Aconteceu alguma coisa, não consegui editar =(');
        }

    }

    public function searchProduct(){
        if(isset($_GET) && isset($_GET['s'])){ 
            $p = DB::table('products')->where('name', 'LIKE', '%'.$_GET['s'].'%')->orderBy('created_at', 'DESC')->paginate(24);
            $s = DB::table('store')->where('name', 'LIKE', '%'.$_GET['s'].'%')->orderBy('created_at', 'DESC')->paginate(24);
        }else{
            
            
            return view('product.search', ['findings' => [], 'stores' => []]);
        
        }
     

        return view('product.search', ['findings' => $p, 'stores' => $s]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(isset($id) && auth::check()){
            $get = DB::table('products')->where('id', $id)->get();
            $storeid = DB::table('products')->where('id', $id)->value('store_id');
            if(count($get) > 0 && isset($storeid)){
                $isAuthStore = DB::table('store')->where('id', $storeid)->value('user_id');
                if($isAuthStore == auth::user()->id){

                    $p = Product::find($id);
                    if($p->delete())
                    return redirect()->back()->with('success', 'Produto deletado com sucesso!');
                    else
                    return redirect()->back()->with('error', 'Aconteceu algum erro.');

                }  else{
                    return redirect()->back()->with('error', 'Você não pode editar este item.');
                }
            }
            
        }else{
            return redirect()->back();
        }
    }

    public function getBack(){

        return redirect()->back()->with('error', 'osps abal');
    }
}
