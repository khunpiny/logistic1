@extends('layouts.app')
@section('body', 'active')
<head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: 	#4CAF50;
    color: white;
}
</style>
</head>
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="portlet"><!-- /primary heading -->
            <div class="portlet-heading">
                <h3 class="portlet-title text-dark text-uppercase">สินค้าขายดี</h3>
            <div class="portlet-widgets">
                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                  <span class="divider">
                  </span>
                  <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i>
                  </a>
                  <span class="divider">
                  </span>
                  <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
            </div>
            <div class="clearfix">
            </div>
            </div>
            <div id="portlet2" class="panel-collapse collapse in">
                <div class="portlet-body">
                
                  <table id="customers">
                  <tr>  
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวนที่ขาย(ชิ้น)</th>
                  </tr>
                  <tr> 
                 @foreach($products as $p)
                    <td>{{$p->products_id}}</td>
                    <td><?php echo (DB::table('products')->where('products_id',$p->products_id)->value('name'));
                 ?> </td>
                    <td>{{$p->cnt}}</td>
                  </tr> 
                 @endforeach
                  </table>
                </div>
            </div>
       </div>
    </div> <!-- end col -->
</div> <!-- end row -->
     




@endsection