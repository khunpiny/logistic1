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

    public function show()
    {
        return view('hello');
    }

    /*  public function login()
      {
          return  view('auth.login') ;
      }*/

    public function store()
    {
        $products = DB::table('products')->orderBy('products_id', 'desc')->paginate(25);
        $products->setPath('products');
        return View('user.store')->with('products', $products);
    }

    public function buystore()
    {
        $products = DB::table('products')->orderBy('products_id', 'desc')->paginate(25);
        $products->setPath('products');
        return View('user.buystore')->with('products', $products);
    }

    public function navbar()
    {
        return view('user.navbar');
    }

    public function bill()
    {
        //$customer_id = $request->input('customer_id');
        //$products_id = $request->input('products_id');
        //$stock = $request->input('stock');


        return view('user.bill');
    }

    public function success()
    {
        $customers = DB::table('customers')->latest()->first();
        return view('user.success')->with('customers', $customers);
    }

}
