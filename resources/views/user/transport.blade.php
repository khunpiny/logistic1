@extends('layouts.app')
@section('content')
<link href="{{asset('css/bootstrap-navmenu.css')}}" rel="stylesheet">
<style>
/* The box */
.box {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 14px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.box input {
    position: absolute;
    opacity: 0;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.box:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.box input:checked ~ .checkmark {
    background-color: #007525;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.box input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.box .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

<div class="row">
    <div class="col-lg-12">

                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    รายการสินค้าทั้งหมด
                                </h3>
                                <div class="portlet-widgets">
                                    <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                    <span class="divider"></span>
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#portlet2"><i class="ion-minus-round"></i></a>
                                    <span class="divider"></span>
                                    <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet2" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div class="table-responsive">  
            
<div div class="col-md-12  column margintop20">
  
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

          <form action="{{url('/result')}}" method="post">
            {{ csrf_field() }}
            <label> ค้นหาบิล </label>
              <div class="form-group">
              <div class="input-group">
              <input type="date" class="form-control input-md" name="search" value="{{isset($search)}}">
              <div class="input-group-btn">
              <button type="submit" class="btn btn-md btn-warning"> <span class=" glyphicon glyphicon-search"></span></button>
          </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-body table-responsive">
  <form action="{{url('/transport')}}" method="POST">
    {{ csrf_field() }}
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="text-center"> บิล </th>
              <th class="text-center"> ชื่อ </th>
              <th class="text-center"> เบอร์โทร </th>
              <th class="text-center"> ที่อยู่ </th>
              <th class="text-center"> บิล </th>
              <th class="text-center"><button type="submit">ยืนยัน</button></th>
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
                  <a href="billprevious.{{$o->order_id}}" class="btn btn-xs btn-danger" ><i class="fa fa-search"></i> ดูบิล</a> 
               </td>
               @if($o->status == "เตรียมส่ง") 
               <td>
                <label class="box"><font color="red">เตรียม</font>
                   <input type="checkbox" name="checkbox[]" value="{{$o->order_id}}">
                   <span class="checkmark"></span>
                </label>
               </td>
               @else($o->status == "ส่งแล้ว")
               <td>
                <label style="font-size: 14px; padding-left: 6px;"><font color="#007525" ><span class="glyphicon glyphicon-ok"></span>&nbsp{{$o->status}}</font>
                  
                </label>
               </td>
               @endif
            </tr>

          </tbody>
          @endforeach
        </table>
      </div>
 </form>
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

                        </div>
                    </div> <!-- end col -->
           
                </div> <!-- end row -->
            </form>

   


    


@endsection