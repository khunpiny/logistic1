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
<div class="row">
    <div class="col-lg-12">
        <div class="portlet"><!-- /primary heading -->
            <div class="portlet-heading">
              
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
                  <form class="form-horizotal" method="POST" role="form" action="{{url('savebill')}}">
             {!! csrf_field() !!}
             <fieldset>
    

            <div class="invoice-title">


                <h2>ใบสั่งสินค้า</h2><h3 class="pull-right">ลำดับที่ # {{$id}}</h3>
                <input type="hidden" name="order_id" value="{{$id}}">
        
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        @foreach($customer as $c)
                    <strong>สถานที่จัดส่ง:</strong><br>  
                    <input type="hidden" name="customer" value="{{$c->customers_id}}">
                        {{$c->name}}<br>
                        {{$c->address}}<br>
                        @endforeach

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
                        {{$time}}<br><br>
                        <input type="hidden" name="time" value="{{$time}}">
                    </address>
                </div>
            </div>
        </div>

    
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

                                  @php $total = 0; @endphp
                        @if(isset($products) && !empty($products))
                            @for($i=0;$i<count($products);$i++)
                                           
                            <tr><input type="hidden" name="products[]" value="{{$products[$i]->products_id}}">
                            <td>{{ $products[$i]->name }}</td>
                            <input type="hidden" name="name[]" value="{{$products[$i]->name}}">
                            <td class="text-center">{{ $products[$i]->price }}</td>
                            <input type="hidden" name="price[]" value="{{$products[$i]->price}}">
                            <td class="text-center"> {{ $amounts[$i] }}

                            <input type="hidden" name="amounts[]" value="{{$amounts[$i]}}">

                             </td>
                             @php $price[] = 0;
                             $price[$i] = $products[$i]->price*$amounts[$i]
                             @endphp
                             <td class="text-right">{{ $price[$i] }}</td>

                               </tr>
                                @php $total += $price[$i];
                                @endphp
                               @endfor
                        @else
                            ไม่มีข้อมูล
                        @endif
                              
                                
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>ราคารวม</strong></td>
                                    <td class="thick-line text-right">{{$total}}</td>
                                </tr>
                                <input type="hidden" name="total" value="{{$total}}">
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
                </div><center>
<button class="btn btn-success" type="submit" >สั่งสินค้า</button></center>
     
      
 

</form>
   
                   
 
                </div>
            </div>
       </div>
    </div> <!-- end col -->
</div> <!-- end row -->

    
@endsection