


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
        $data->products_id = $request->get('products_id');
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
    public function deleteQuestion($id)
    {
        $question = DB::table('products')->where('id', $id)->delete();
        return Redirect::back();
    }


    public function edit($id)
    {
        $data = Product::find($id);
        return View('user.edit')->with('data', $data);
    }

    public function postEdit($id)
    {
        $data = Product::find($id);
        $data->products_id = $request->get('products_id');
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->cost = $request->get('cost');
        $data->amount = $request->get('amount');
        $data->category = $request->get('category');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('store');
    }


    //ฟังก์ชันลบข้อมูลของcheckbox
    public function delete()
    {
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(25);

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
        $products = DB::table('products')->where($cat, 'like', $keyword)->paginate(25);

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

}
