<?php

namespace App\Http\Controllers;
 App\Http\Controllers\Item;

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
        $items = Item::get();
        $data = ['items' => $items];
        return view('home', $data);
    }
}
