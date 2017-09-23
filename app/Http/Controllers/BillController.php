<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use Validator;
use DB;
use Session;
use Input;
use App\Order;
use App\Product;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function billdata(Request $request)
    {
        $order_id = $request->get('order_id');
        $time = $request->get('time');
        $location = $request->get('location');
        /*$data->description = $request->get('description');*/

        $amounts = $request->get('amount');
        $products = Product::WhereIn('products_id', $request->products_id)->get();
        return view('user.bill')->with('products', $products)->with('amounts',$amounts)->with('location',$location)->with('time',$time);
    }

    public function query(Request $request)
    {
        $products = Product::WhereIn('products_id', $request->products_id)->get();
        return view('user.bill')->with('products', $products);

    }
    public function savebill(Request $request)
    {
        $data = new Order;
        $data->order_id = $request->get('order_id');
        // $data->time = $request->get('time');
        $data->location = $request->get('location');
        /*$data->description = $request->get('description');*/
        $data->save();
        return View('user.buystore');
    }
}
