<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use PDF;
class PDFController extends Controller
{
	public function pdf()
	{
      $Orders = Order::all();
      $pdf = PDF::loadView('pdf',['Orders' => $Orders]);
      return @$pdf->stream();
    }

    public function transport()
    {
      $Orders = Order::all();
      return view('user.transport')->with('Orders',$Orders);
    }
}
