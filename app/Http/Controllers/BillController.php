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
    private $line_api = "https://notify-api.line.me/api/notify";
    private $access_token = 'PxeEDQ3xFPr6qZ99mVkoii3XD6yKjRP4psVlRzS9GvM';
    private function checkStock() {
       $orderid = DB::table('orders')->orderBy('order_id','desc')->value('customers_id');
       $time = DB::table('orders')->orderBy('order_id','desc')->value('time');
       $name = DB::table('customers')->where('customers_id',$orderid)->value('name');
        $str = "\n{$name} สั่งสินค้าเรียบร้อยแล้วส่งวันที่ {$time}";
       
        //$str = 'ทดสอบข้อความ';    //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
        $image_thumbnail_url = '';  // ขนาดสูงสุด 240×240px JPEG
        $image_fullsize_url = '';  // ขนาดสูงสุด 1024×1024px JPEG
        $sticker_package_id = 1;  // Package ID ของสติกเกอร์
        $sticker_id = 410;    // ID ของสติกเกอร์

        $message_data = array(
         'message' => $str,
         'imageThumbnail' => $image_thumbnail_url,
         'imageFullsize' => $image_fullsize_url,
         //'stickerPackageId' => $sticker_package_id,
         //'stickerId' => ''
        );
        $result = $this->send_notify_message($message_data);
    }
    private function send_notify_message($message_data)
    {
     $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$this->access_token );

     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $this->line_api);
     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     $result = curl_exec($ch);
     // Check Error
     if(curl_error($ch)) {
      $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) ); 
     } else {
      $return_array = json_decode($result, true);
     }
     curl_close($ch);
     return $return_array;
    }
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
                  
        $this->checkStock();
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
