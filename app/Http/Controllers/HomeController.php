<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

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
        $time18 = DB::table('orders')->where('time','<=','2018-12-31')
                                ->where('time','>=','2018-01-01')
                                ->select(DB::raw("SUM(price_total) as paidsum"))
                                ->get();
        $time17 = DB::table('orders')->where('time','<=','2017-12-31')
                                ->where('time','>=','2017-01-01')
                                ->select(DB::raw("SUM(price_total) as paidsum"))
                                ->get();
// การเลือกนับเป็น group
        // $countcat  = Product::select('category', DB::raw('count(amount) as cnt'))
        //                                        ->groupBy('category')
        //                                        ->orderBy('cnt','DESC')
        //                                        ->get();
        $countcats = DB::table('products')
                                ->join('details', 'products.products_id', '=', 'details.products_id')
                                ->select('products.category', 'details.product_out')
                                ->get();
        $steel = 0;
        $sum = 0;
        $spares = 0;
        for($i=0;$i<count($countcats);$i++){
            if($countcats[$i]->category=="ท่อไอเสีย")
                $steel += 1;
            else if($countcats[$i]->category=="เหล็ก")
                $sum += 1;
            else if($countcats[$i]->category=="อะไหล่รถยนต์")
                $spares += 1;
        }
                                               
        return view('home')->with('products',$products)
                           ->with('amount',$amount)
                           ->with('time18', $time18)
                           ->with('time17',$time17)
                           ->with('countcat',$countcats)
                           ->with('sum',$sum)
                           ->with('spares',$spares)
                           ->with('steel',$steel);
    }
    
    public function nav()
    {
        $num = ['2','8','7'];
        $n = count($num);
        return view('layouts.app')->with('n',$n);
    }
}
