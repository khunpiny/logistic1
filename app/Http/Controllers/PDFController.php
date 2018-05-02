<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order_product;
use App\Order;
use PDF;
class PDFController extends Controller
{
	public function pdf($id)
	{ 
      $order_products = Order_product::where('order_id',$id)->get();
      $customers = Order::where('order_id',$id)->value('customers_id');
      $price_total = Order::where('order_id',$id)->value('price_total');
      $pdf = PDF::loadView('pdf',['order_products' => $order_products],
      	                         ['customer' => $customers]);
      
      return @$pdf->stream();
    }

    public function transport()
    {
      $Orders = Order::all();
      return view('user.transport')->with('Orders',$Orders);
    }

}
