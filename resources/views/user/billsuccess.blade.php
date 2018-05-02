@extends('layouts.app')
@section('content')

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
                <div class="portlet-body" >
                <center>
                <h2 style="color:#0fad00" >สั่งสินค้าเสร็จเรียบร้อย</h2>
                <p style="font-size:20px;color:#5C5C5C;" >ขอบคุณค่ะ</p>
                </center>
                </div>
            </div>
       </div>
    </div> <!-- end col -->
</div> <!-- end row -->
     
@endsection