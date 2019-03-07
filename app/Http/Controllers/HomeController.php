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
                                        'Gestion de Seriales' => ['url' => 'api/seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];
        return view('home', compact('items'));
    }

}
