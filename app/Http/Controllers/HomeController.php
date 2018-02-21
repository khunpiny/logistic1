<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $amount = Product::where('amount','<=',10)->paginate(25);
        return view('home')->with('products',$products)->with('amount',$amount);
    }
    
    public function nav()
    {
        $num = ['2','8','7'];
        $n = count($num);
        return view('layouts.app')->with('n',$n);
    }
}
