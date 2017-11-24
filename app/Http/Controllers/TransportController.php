<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Redirect;
use Auth;
use Validator;
use DB;
use Session;
use Input;
use App\Order;
use App\Product;
use App\Customer;
use App\Detail;
use App\Order_product;

class TransportController extends Controller
{
    public function transport()
    {
    	$orders = Order::all();
        
        return view('user.transport')->with('orders',$orders);

    }

    public function showbill(Request $request)
    {
        $order_id = $request->get('order_id');
        dd($order_id);

        return view('user.transport');    
    }
    public function billprevious($id)
    {
        $order_id = $id;
        $data = Order_product::where('order_id',$id)->get();
        //ตัวแปร
        $customer_id = Order::where('order_id',$id)->value('customers_id');
        $customers_name = Customer::where('customers_id',$customer_id)->value('name');
        $customers_address = Customer::where('customers_id',$customer_id)->value('address');
        $price_total = Order::where('order_id',$id)->value('price_total');
        
        return view('user.billprevious')->with('data',$data)
                                        ->with('order_id',$order_id)
                                        ->with('customer_name',$customers_name)
                                        ->with('customer_address',$customers_address)
                                        ->with('price_total',$price_total);
                                        

    }
}
