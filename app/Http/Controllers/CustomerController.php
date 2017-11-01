<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Auth;
use Validator;
use DB;
use Session;
use Input;
use App\Customer;

class CustomerController extends Controller
{
    public function regiscustomer()
    {
        return view('user.regiscustomer');
    }

    public function customer(Request $request)
    {
        $data = new Customer;
        /*$datas->products_id = $request->get('products_id');*/
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->tel = $request->get('tel');
        $data->email = $request->get('email');
        $data->latitude = $request->get('latitude');
        $data->longtitude = $request->get('longtitude');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('success');
    }

}
