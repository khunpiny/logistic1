@extends('layouts.app')
@section('content')
    <head>
        <link href="{{asset('css/bootstrap-bill.css')}}" rel="stylesheet">
        <style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
    </head>
    <body>   
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">

         
                <h2>ใบสั่งสินค้า</h2><h3 class="pull-right">ลำดับที่ # {{$order_id}}</h3>


        
            </div>

            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        
                    <strong>สถานที่จัดส่ง:</strong><br>  
                    
                        {{$customer_name}}<br>
                        {{$customer_address}}<br>
                        

                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                    <strong>ร้านจำหน่ายและขนส่งอะไหล่รถยนต์</strong><br>
                         บ้านเลขที่ 104/25 หมู่ 6 
                         ตำบลทุ่งตะไคร <br>
                         อำเภอทุ่งตะโก
                        จังหวัดชุมพร 86220<br>
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                   <!--  <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        jsmith@email.com
                    </address> -->
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>วันที่ส่งสินค้า:</strong><br>
                        <br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>รายการสั่งซื้อ</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>ชื่อสินค้า</strong></td>
                                    <td class="text-center"><strong>ราคา</strong></td>
                                    <td class="text-center"><strong>จำนวน</strong></td>
                                    <td class="text-right"><strong>ราคารวม</strong></td>
                                </tr>
                            </thead>
                            <tbody>

                @foreach($data as $d)
            <tr>
                <td>
                 <?php echo (DB::table('products')->where('products_id',$d->products_id)->value('name'));
                 ?> 
                </td>
                <td class="text-center">
                 <?php echo (DB::table('products')->where('products_id',$d->products_id)->value('price'));
                 ?> 
                </td>
                <td class="text-center">
                    {{$d->amount_d}}
                </td>
                @php $total = 0; @endphp
                @php $total = $d->amount_d*$d->price_d;
                                @endphp
                       
                <td class="text-right">{{$total}}</td>    
            </tr>
            @endforeach
            <tr> 
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line text-center"><strong>ราคารวม</strong></td>
                <td class="thick-line text-right">
                    {{$price_total}}
                </td> 
                         
            </tr>  
                   
                                <!-- <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">$15</td>
                                </tr> -->
                                <!-- <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">$685.99</td>
                                </tr> -->
                            </tbody>
                        
                        </table>
                    </div>
                </div>
            </div>  
          <a href="{{ url('pdf') }}" class="btn btn-xs btn-primary">Export PDF</a>
        </div>
    </div>
</div>
<center>
@endsection