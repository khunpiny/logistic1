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
use App\Customer;
use App\Detail;
use App\Order_product;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function billdata(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        $messages = "สินค้าในคลังมีจำนวนไม่พอ";
        //dd($request);
      if ($validator->passes()) {
        $orderid = DB::table('orders')->orderBy('order_id','desc')->get();
        if(count($orderid) == 0)
        { 
          $id = 1;
        }
        else 
        {
          $id = $orderid[0]->order_id + 1;
        }
        $order_id = $request->get('order_id');
        $time = $request->get('time');
        $customers = $request->get('name');
        $customer = DB::table('customers')->where('name',$customers)->get();

        // $location = $request->get('location');
        /*$data->description = $request->get('description');*/

        $amounts = $request->get('amount');
        $products = Product::WhereIn('name', $request->names)->get();
        $checked=0;
        for($i=0;$i<count($amounts);$i++)
        {
         
          if($amounts[$i]>$products[$i]->amount)
          {
            
            return back()->withErrors($messages)->withInput();
          }
          else
          {
             
          }
             
        }
        if($checked!=0)
        {
            
          
       }
       else
       {

            return view('user.bill')->with('products', $products)->with('amounts',$amounts)->with('time',$time)->with('id',$id)->with('customer',$customer);
          }
       
        
    }
     else{
        return back()->withErrors($validator)->withInput();
         }
    }

     public function rules() {
    return [
        'name' => 'required|alpha',
        'time'  => 'required|date',
        //'amount'  => 'required|numeric',
        // 'location'  => 'required|alpha_num',
        //'email' => 'required|email',
    ];
  }

  public function messages() {
    return [
       
        'name.alpha' => 'กรุณาป้อนชื่อลูกค้าเป็นตัวอักษรด้วยค่ะ',
        'time.required' => 'กรุณาป้อนวันจัดส่งของคุณด้วยค่ะ',
        'time.date' => 'กรุณาป้อนวันจัดส่งเป็นตัวเลขเท่านั้นค่ะ',
        // 'amount.required' => 'กรุณาป้อนจำนวนสินค้าด้วยค่ะ',
        // 'amount.numeric' => 'กรุณาป้อนเป็นตัวเลขเท่านั้นค่ะ',
        // 'location.required' => 'กรุณาป้อนที่อยู่ของคุณด้วยค่ะ',
        // 'location.alpha_num' => 'กรุณาป้อนให้อยู่ในรูปแบบของที่อยู่ด้วยค่ะ'
    ];
  }


    public function query(Request $request)
    {
        $products = Product::WhereIn('name', $request->name)->get();
        return view('user.bill')->with('products', $products);

    }
    public function savebill(Request $request)
    {
        $amount_d = $request->get('amounts');
        $products_id = $request->get('products');
        $name = $request->get('name');
        $price = $request->get('price');
        $customer = $request->get('customer');
        $time = $request->get('time');
        

         for($i=0;$i<count($products_id);$i++)
         {
            $cost[] = DB::table('products')
                                   ->Where('products_id',$products_id[$i])->value('cost');
            $amount[] = DB::table('products')
                                   ->Where('products_id',$products_id[$i])->value('amount');
            $category[] = DB::table('products')
                                   ->Where('products_id',$products_id[$i])->value('category');
            $data = new Detail;
            $data->products_id = $products_id[$i];
            $data->product_out = $amount_d[$i];
            $data->save();  
         }

        $data = new Order;
        $data->order_id = $request->get('order_id');
        $data->customers_id = $customer;
        $data->price_total = $request->get('total');
        $data->time = $time;
        $data->save();

        for($i=0;$i<count($products_id);$i++)
         {
        
            $price[] = DB::table('products')
                                   ->Where('products_id',$products_id[$i])->value('price');

            $data = new Order_product;
            $data->order_id = $request->get('order_id');
            $data->products_id = $products_id[$i];
            $data->amount_d = $amount_d[$i];
            $data->price_d = $price[$i];
            $data->save();  
         }

         for($i=0;$i<count($products_id);$i++)
        {
          $data = Product::find($products_id[$i]);
          $data->products_id = $products_id[$i];
          $data->name = $name[$i];
          $data->price = $price[$i];      
          $data->cost = $cost[$i];
          $data->amount = $amount[$i]-$amount_d[$i];
          $data->category = $category[$i];
          $data->save();
        }
                  
       
        return View('user.billsuccess');
    }


    public function ppsave(Request $request)
    {
        $customers = DB::table('customers')->distinct()->select('name')->get();
        foreach($customers as $value) {
            $names[] = $value->name;
        }
        $data = new Order;
        $data->order_id = $request->get('order_id');
        // $data->time = $request->get('time');
        // $data->location = $request->get('location');
        /*$data->description = $request->get('description');*/
        $data->save();
        return View('user.buystore')->with(['customers' => json_encode($names)]);
    }

}
