<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use Illuminate\Support\Facades\Auth;
use DB;

class productsController extends Controller
{



    private $product;


    public function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->where('user_id', auth::user()->id)->paginate(12);

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
            try{
            // $categories = ['Lava', 'louça', 'banho', ];

            $p = new Product;
            $p->user_id = Auth::user()->id;
            $p->name = $request->input('name');
            $p->amount = $request->input('amount');
            $p->cost = $request->input('cost');
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

     
            $p->image = json_encode($data);

            $url = str_replace(" ","-", $request->input('name'));
            $url = strtolower($url);
            $url = $url.'-'.mt_rand(100, 999);
            $p->url = $url;
            
            
 
            
                $p->save();
                return redirect('product/'.$url)->with('success', 'Produto adicionado com sucesso!');
            
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
    public function show($url)
    {
        $get = DB::table('products')->where('url', $url)->get();
        if(count($get) > 0)
        return view('product.show', ['product' => $get]);
        else
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
