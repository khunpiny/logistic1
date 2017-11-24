<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
class SearchController extends Controller
{
    public function index()
    {
    	return view('search');
    }
    public function search(Request $request)
    {
    	if($request->ajax())
    	{
    		$output="";
    		$customers = DB::table('customers')->where('name','LIKE','%'.$request->search.'%')->get();
    		if($customers)
    		{
    			foreach ($customers as $key => $customer) 
    			{
    			$output.='<tr>'.
    			         '<td>'.$customer->customers_id.'</td>'.
    			         '<td>'.$customer->name.'</td>'.
    			         '<td>'.$customer->address.'</td>'.
    			         '<td>'.$customer->tel.'</td>'.
    			         '</tr>';
    			}
    			return Response($output);
    		}
    	}
    }
    public function search2(Request $request)
   {

        //$customers = DB::table('customers')->distinct()->select('name')->get();
        $customers = Customer::all();

        foreach($customers as $value) {
            $names[] = array('value' => $value->name,'data' => $value->address);
        }
        // print_r($names);

        //$customers = json_encode(['a','b','c']);
        return view('user.buystore')->with(['customers' => json_encode($names)]);
    }
}
