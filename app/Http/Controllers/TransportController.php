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
    public function transport(Request $request)
    {
        $search = $request->get('search');
        if($search){
            $orders = Order::where('time','like','%'.$search.'%')->get();
        }else{
            $orders = Order::all();
        }
    	
        return view('user.transport')->with('orders',$orders);

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
    public function status(Request $request)
    {
        $status = $request->get('checkbox');
        for($i=0;$i<count($status);$i++)
        { 
            $data = Order::find($status[$i]);
            $data->status = "ส่งแล้ว";
            $data->save();
          
        }
        return back();
    }

    public function gettran()
    {
        $orders = Order::where('status',"ส่งแล้ว")->get();
        return view('user.transport')->with('orders',$orders);
    }

    public function posttran()
    {
        $orders = Order::where('status',"เตรียมส่ง")->get();
        return view('user.transport')->with('orders',$orders);
    }

}
