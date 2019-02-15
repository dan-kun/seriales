<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $items = [
            'Gestion'          => ['submenu' => [
                                        'Gestion de Casos' => [ 'url' => 'casos'],
                                        'Gestion de Seriales' => ['url' => 'seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'Denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];
        return view('home', compact('items'));
    }
    
    public function Listar()
    {
        $items = [
            'Gestion'          => ['submenu' => [
                                        'Gestion de Casos' => [ 'url' => 'casos'],
                                        'Gestion de Seriales' => ['url' => 'seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'Denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];
        return view('Listar_caso', compact('items'));
    }

    public function denuncia()
    {
        $items = [
            'Gestion'          => ['submenu' => [
                                        'Gestion de Casos' => [ 'url' => 'casos'],
                                        'Gestion de Seriales' => ['url' => 'seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'Denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];
        return view('Denuncia_almacen', compact('items'));
    }

    public function casos()
    {
        $items = [
            'Gestion'          => ['submenu' => [
                                        'Gestion de Casos' => [ 'url' => 'casos'],
                                        'Gestion de Seriales' => ['url' => 'seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'Denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];
        return view('casos', compact('items'));
    }

    public function seriales()
    {
        $items = [
            'Gestion'          => ['submenu' => [
                                        'Gestion de Casos' => [ 'url' => 'casos'],
                                        'Gestion de Seriales' => ['url' => 'seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'Denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];
        return view('seriales', compact('items'));
    }


}
