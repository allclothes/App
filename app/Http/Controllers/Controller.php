<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $produtos = DB::table('products')
            ->where('deletedAt', null)
            ->orderBy('created_at', 'DESC')
            ->limit(16)
            ->get();

            $stores = DB::table('store')
            ->orderBy('created_at', 'ASC')
            ->limit(10)
            ->get();

            return view('index', ['products' => $produtos, 'stores' => $stores]);
        /*
        $roupas = DB::table('products')
            ->where('category', 'roupa')
            ->where('deletedAt', null)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
        
        $banho = DB::table('products')
            ->where('category', 'banho')
            ->where('deletedAt', null)
            ->orderBy('created_at', 'DESC')
            ->limit(4)

            ->get();
        
        $eletronicos = DB::table('products')
            ->where('category', 'eletronicos')
            ->where('deletedAt', null)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();

        $casa = DB::table('products')
            ->where('category', 'casa')
            ->where('deletedAt', null)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();

        $estimacao = DB::table('products')
            ->where('category', 'estimacao')
            ->where('deletedAt', null)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
        

        return view('index', [
            'roupas'            =>  $roupas,
            'banho'             =>  $banho,
            'eletronicos'       =>  $eletronicos,
            'casa'              =>  $casa,
            'estimacao'         =>  $estimacao,
            'stores'            =>  $stores,
            ]);
            */

        
    }
}
