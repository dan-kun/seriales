<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $items = [
            'home'          => [],
            'about'         => [],
            'contact-us'    => [],
            'login'         => [],
            'register'      => []
        ];
        return view('menu-test', compact('items'));
    }
}
