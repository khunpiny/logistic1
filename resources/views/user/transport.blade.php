@extends('layouts.app')
@section('content')
<link href="{{asset('css/bootstrap-navmenu.css')}}" rel="stylesheet">


<div class="col-md-3 column margintop20">
    		<ul class="nav nav-pills nav-stacked">
  <li class="active"><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> รายการสั่งซื้อสินค้าทั้งหมด </a> </li> 
  <li><a href="#" ><span class="glyphicon glyphicon-chevron-right"></span> รายการจัดส่งแล้ว</a></li>
  <li><a href="#" ><span class="glyphicon glyphicon-chevron-right"></span> รายการเตรียมจัดส่ง</a></li>
  <!-- <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> สินค้าขายดี</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 4</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span> Option 5</a></li> -->
</ul>
</div>

<div div class="col-md-9  column margintop20">
	
	<div class="container-fluid">

    <div class="panel panel-success">
      <div class="panel-footer">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">
            <h2 class="text-center pull-left" style="padding-left: 30px;"> <span class="glyphicon glyphicon-list-alt"> </span> บิลสินค้า </h2>
          </div>
          <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="col-xs-12 col-md-4">
                <label> ค้นหาบิล </label>
                <div class="form-group">
                  <div class="input-group">
                    <input type="date" class="form-control input-md" name="search">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-md btn-warning"> <span class=" glyphicon glyphicon-search"></span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="panel-body table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center"> บิล </th>
              <th class="text-center"> ชื่อ </th>
              <th class="text-center"> เบอร์โทร </th>
              <th class="text-center"> ที่อยู่ </th>
              <th class="text-center"> บิล</th>
              <th class="text-center"> ยืนยัน</th>
            </tr>
          </thead>
            @foreach($orders as $o)
          <tbody>
            <tr class="edit" id="detail">
              <td id="no" class="text-center">{{$o->order_id}}</td>

              <td id="name" class="text-center"> 
                <?php echo (DB::table('customers')->where('customers_id',$o->customers_id)->value('name'));
                 ?> </td>
              <td id="mobile" class="text-center"> 
                 <?php echo (DB::table('customers')->where('customers_id',$o->customers_id)->value('tel'));
                 ?> 
              </td>
             
              <td id="city" class="text-center"> 
                <?php echo (DB::table('customers')->where('customers_id',$o->customers_id)->value('address'));
                 ?> 
               </td>
               <td class="text-center">
                  <a href="billprevious.{{$o->order_id}}"><button class="btn btn-xs btn-danger" ><i class="fa fa-search"></i> ดูบิล</button></a>
               </td>
         
               <td>
               	<input type="checkbox" id="one"/>
               </td>
            </tr>

          </tbody>
          @endforeach
        </table>
      </div>

      <div class="panel-footer">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-md-8">
              </div>
              <div class="col-md-4">
              <p class="muted pull-right"><strong><a href="{{ url('pdf') }}" class="btn btn-xs btn-primary">Export PDF</a></strong></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                
</div>
</div>
</div>

@endsection