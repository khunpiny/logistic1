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
use App\Product;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    public function insertdata()
    {
        return view('user.insertdata');
    }

    //ฟังก์ชันของการเพิ่มข้อมูล
    public function postdata(Request $request)
    {
        $data = new Product;
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->cost = $request->get('cost');
        $data->amount = $request->get('amount');
        $data->category = $request->get('category');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('store');
    }

    //ปุ่มลบ
    public function deleteQuestion($products_id)
    {
        $question = DB::table('products')->where('products_id', $products_id)->delete();
        return Redirect::back();
    }


    public function edit($products_id)
    {
        $data = Product::find($products_id);
        return View('user.edit')->with('data', $data);
    }

    public function postEdit(Request $request)
    {
        $products_id = $request->products_id;
        $name = $request->name;
        $price = $request->price;
        $cost = $request->cost;
        $amount = $request->amount;
        $category = $request->category;

        $data = Product::find($request->products_id);
        $data->products_id =  $products_id;
        $data->name = $name;
        $data->price = $price;
        $data->cost = $cost;
        $data->amount = $amount;
        $data->category = $category;
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('store');
    }


    //ฟังก์ชันลบข้อมูลของcheckbox
    public function delete()
    {
        $products = DB::table('products')->orderBy('products_id', 'desc')->paginate(25);

        $products->setPath('delete');
        return View('user.store')->with('products', $products)->with('delete', 1);
    }

    public function postDelete(Request $request)
    {
        $checkbox = $request->get('checkbox');
        $count = count($checkbox);
        for ($i = 0; $i < $count; $i++) {
            $id = (int)$checkbox[$i];
            // Parse your value to integer
            Product::destroy($id);
        }
        return Redirect::back();
    }

    public function postSearch(Request $request)
    {
        $cat = $request->get('cat');
        $keyword = '%' . $request->get('keyword') . '%';
        $products = DB::table('products')->where($cat, 'like', $keyword)->paginate(50);

        //$stores = store::paginate(25);
        $products->setPath('store');
        return View('user.store')->with(['products' => $products, 'keyword' => $request->get('keyword')]);
    }

    public function billdata(Request $request)
    {
        $data = new Order;
        $data->order_id = $request->get('order_id');
        $data->count = $request->get('count');
        $data->time = $request->get('time');
        $data->location = $request->get('location');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('buystore');
    }

    public function import(Request $request)
    {
       Excel::load(Input::file('input-b9'),function($reader){
        $reader->each(function($sheet){
            Product::firstOrCreate($sheet->toArray());
        });
       });
      return Redirect::to('store');
    }

    public function export(){
      $items = Product::all();
      Excel::create('รายการสินค้า', function($excel) use($items) {
          $excel->sheet('ExportFile', function($sheet) use($items) {
              $sheet->fromArray($items);
          });
      })->export('xls');
    }

    public function fileexcel(){
        return view('user.fileexcel');
    }
   

}
