<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use App\Product;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Customer;
use \Input as Input;
use App\Test;
use App\Detail;

use LINE\LINEBot;
use NE\LINEBot\Event;
use LINE\LINEBot\Constant\MessageType;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\Tests\LINEBot\Util\DummyHttpClient;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show()
    {
        return view('hello');
    }

    /*  public function login()
      {
          return  view('auth.login') ;
      }*/

    public function store(Request $request)
    {
        // $products = DB::table('products')->orderBy('products_id', 'desc')->paginate(25);
        // $products->setPath('products');
         $NUM_PAGE = 15;
            $products = Product::paginate($NUM_PAGE);
            $page = $request->input('page');
            $page = ($page != null)?$page:1;
        return View('user.store')->with('products', $products)->with('page',$page)
                                        ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function buystore()
    {
        $products = DB::table('products')->orderBy('products_id', 'desc')->paginate(25);
        $products->setPath('products');
        return View('user.buystore')->with('products', $products);
    }

    public function navbar()
    {
        return view('user.navbar');
    }

    public function bill()
    {
        //$customer_id = $request->input('customer_id');
        //$products_id = $request->input('products_id');
        //$stock = $request->input('stock');


        return view('user.bill');
    }

    public function success()
    {
        $customers = DB::table('customers')->latest()->first();
        return view('user.success')->with('customers', $customers);
    }
 
    public function test()
    {
        //$customers = Customer::all();
        $customers = Customer::where('customers_id', '!=', 11)->get();
        foreach($customers as $value) {
            $names[] = array($value->name, $value->latitude, $value->longtitude   );
        }
        $origin = Customer::where('customers_id', 12)->first();
        return view('test', ['customers' => json_encode($names), 
                             'cus' => $customers,
                             'customers_obj' => $customers,
                             'origin' => json_encode($origin)]);
        
    }

    public function outofstock(request $request){
       
        $amount = Product::where('amount','<=',10)->paginate(25);
        return view('user.outofstock')->with('products',$amount);
    }

    public function bestproduct(){
        $amount  = Detail::select('products_id', DB::raw('sum(product_out) as cnt'))
                                               ->groupBy('products_id')
                                               ->orderBy('cnt','DESC')
                                               ->paginate(10);
                                   

        return view('user.bestproduct')->with('products',$amount);
    }

    

    //การบันทึกรูปภาพ
    // public function upload(){

    //     if(Input::hasFile('file')){

    //         echo 'Uploaded';
    //         $file = Input::file('file');
    //         $file->move('public/image', $file->getClientOriginalName());
    //         echo '';
    //        $data = new Test;
    //        $data->imag = $file->getClientOriginalName();
    //        $data->save();
    //     }
    //     return view('home');

    // }

    public function searchdata(request $request){
        $data = $request->get('data');
        $datas = Product::where('name','like','%'.$data.'%')->paginate(25);
        return view('user.store')->with('products',$datas); 
    }
    public function profile(){
        return view('user.profile');
    }

    public function testline(){
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('Uh1KxmnzR24dN+7tTyfNwH06QqbA9ucaEM7tSrxES57rETbQZc3bxzHdh8zHk0M8CpLQ7CdWaK8FtUDyPNAsafFKcBZJLpJH1lzlD6k6UhywGViRayUGkX4G+X29yy/y8YCe9uHSV1aRUePOyGVNQgdB04t89/1O/w1cDnyilFU=');
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '9b055b730a56d2e8272a3445aee4cc11']);
        //$response = $bot->replyText('<reply token>', 'hello!');
        //$res = $bot->getUserId();
        $res = $bot->BaseEvent();
        /*
        $this->assertEquals(200, $res->getHTTPStatus());
        $this->assertTrue($res->isSucceeded());
        $this->assertEquals(200, $res->getJSONDecodedBody()['status']);
        */

        dd($res);
    }
}