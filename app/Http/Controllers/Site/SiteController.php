<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index(){
        return view('index');
    }

    public function usersCadastro(){
        return view('layouts.register_layout');
    }

    public function usersLogin(){
        return view('layouts.auth_layout');
    }
}
