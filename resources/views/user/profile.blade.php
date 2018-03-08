@extends('layouts.app')
@section('content')
<head>
   <link href="{{asset('css/bootstrap-store.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
	img {
    border-radius: 50%;
}
</style>
</head>
<div class="row">
   <div class="col-lg-8">

     <div class="portlet"><!-- /primary heading -->
       <div class="portlet-heading">
           <h3 class="portlet-title text-dark text-uppercase">แก้ไขข้อมูลส่วนตัว</h3>
       </div>
       <div id="portlet1" class="panel-collapse collapse in">
         <div class="portlet-body">
             <div class="row">
               <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">ชื่อ</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" />
                    </div>
                </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">ตำแหน่ง</label>
                        <div class="col-sm-9">
                          <select name="status" class="form-control" value="{{Auth::user()->status}}">
                            @if(Auth::user()->status == 'เจ้าของร้าน')
                              <option value="เจ้าของร้าน" selected> เจ้าของร้าน </option>
                            @else
                              <option value="เจ้าของร้าน"> เจ้าของร้าน </option>
                            @endif
                            @if(Auth::user()->status == 'พนักงาน')
                              <option value="พนักงาน" selected> พนักงาน </option>
                            @else
                              <option value="พนักงาน"> พนักงาน </option>
                            @endif
                            @if(Auth::user()->status == 'ผู้จัดการร้าน')
                              <option value="ผู้จัดการร้าน" selected> ผู้จัดการร้าน </option>
                            @else
                              <option value="ผู้จัดการร้าน"> ผู้จัดการร้าน </option>
                            @endif
                          </select>
                        </div>
                   </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">เบอร์โทร</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="name" value="{{Auth::user()->tel}}" />
                    </div>
                </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">เพศ</label>
                        <div class="col-sm-5">
                          <select class="form-control" name="sex" value="{{Auth::user()->sex}}">
                            @if(Auth::user()->sex == 'ชาย')
                              <option value="ชาย" selected> ชาย </option>
                            @else
                              <option value="ชาย"> ชาย </option>
                            @endif
                            @if(Auth::user()->sex == 'หญิง')
                              <option value="หญิง" selected> หญิง </option>
                            @else
                              <option value="หญิง"> หญิง </option>
                            @endif
                          </select>
                        </div>
                   </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">email</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="name" value="{{Auth::user()->email}}" />
                    </div>
                </div>
               </div>
             </div>
             <div class="row">
               <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">รูปภาพ</label>
                    <div class="col-sm-9">
                       <input type="file" name="uploader" id="uploader" class="form-control" />
                    </div>
                </div>
               </div>
             </div>
         <!-- bodyedit profile -->
         </div>
      </div>
     </div> <!-- /Portlet -->
   </div> <!-- end col -->
   <div class="col-lg-4">
     <div class="portlet"><!-- /primary heading -->
       <div class="portlet-heading">
         <h3 class="portlet-title text-dark text-uppercase">ข้อมูลส่วนตัว</h3>
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
                              <!-- profile -->
                              <div class="image-container bg2">   <center>  
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="avatar" alt="avatar"> 
                   
            
                     
                        <h4>{{Auth::user()->name}}<i class="fa fa-sheild"></i></h4>
                        <div>ตำแหน่ง : {{Auth::user()->status}}</div>
                        <div>เบอร์โทร : {{Auth::user()->tel}} เพศ : {{Auth::user()->sex}}</div>
                        <div></div> 
                       
                           
                      </center>
                </div>
</div>
                                    
                                   
                                </div>
                            </div>
                        </div> <!-- /Portlet -->

@if(Auth::user()->status=="เจ้าของร้าน" || Auth::user()->status=="ผู้จัดการร้าน")
<div class="row">
  <div class="col-lg-12">
    <div class="portlet"><!-- /primary heading -->
        <div class="portlet-heading">
          <h3 class="portlet-title text-dark text-uppercase">เพิ่มผู้ใช้</h3>
        </div>
        <div id="portlet1" class="panel-collapse collapse in">
            <div class="portlet-body">
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label class="col-sm-3 col-form-label">ชื่อ</label>
                          <div class="col-sm-9">
                            <input id="name" type="text" type="text" class="form-control" name="name" />

                             @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label class="col-sm-3 col-form-label">ตำแหน่ง</label>
                          <div class="col-sm-6">
                            <select class="form-control" name="status" id="status">
                              <option>เจ้าของร้าน</option>
                              <option>ผู้จัดการร้าน</option>
                              <option>พนักงาน</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                          <label class="col-sm-3 col-form-label">เบอร์โทร</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="tel" id="tel" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">เพศ</label>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-radio">
                                <input type="radio" class="form-check-input" name="sex" id="membershipRadios1" value="หญิง" checked>
                                หญิง
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-radio">
                              <label class="form-radio">
                                <input type="radio" class="form-check-input" name="sex" id="membershipRadios2" value="ชาย">
                                ชาย
                              </label>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
               
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="col-sm-3 col-form-label">email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="" name="email" id="email" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="col-sm-3 col-form-label">password</label>
                          <div class="col-sm-6">
                            <input type="password" class="form-control" placeholder="" name="password" id="password" />
                        </div>
                        </div>
                      </div>
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">รูปภาพ</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control" name="uploader"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <!-- text -->
                      </div>
                    </div>
                    
             
                    <center>
            <button type="submit" class="w3-button w3-blue"><i class="fa fa-file-text-o"></i>&nbsp บันทึก</button>
                                  
            <a href="" class="w3-button w3-red"><i class="fa fa-file-text-o"></i>&nbsp ยกเลิก</a>
        </center>
                  </form>
                                   
            </div>
        </div>
    </div> <!-- /Portlet -->

</div> <!-- end col -->
</div> <!-- end row -->
@endif
@endsection