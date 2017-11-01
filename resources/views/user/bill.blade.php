@extends('layouts.app')
@section('content')
    <head>
        <link href="{{asset('css/bootstrap-bill.css')}}" rel="stylesheet">
    </head>
    <body>
   <form class="form-horizotal" method="POST" role="form" action="{{url('savebill')}}">
             {!! csrf_field() !!}
             <fieldset>
    <div class="container">
        <div class="row">
       
            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="iamgurdeeposahan" src="img/pin.jpg"
                                     style="width: 71px; border-radius: 43px;">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h5>ร้านขายส่งอะไหล่รถยนต์</h5>
                                <p>+95 4191539<i class="fa fa-phone"></i></p>
                                <p>5735512004@gmail.com <i class="fa fa-envelope-o"></i></p>
                                <p>ที่อยู่ 104/25 ม.6 ต.ทุ่งตะไคร อ.ทุ่งตะโก จ.ชุมพร<i class="fa fa-location-arrow"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5>ที่อยู่
                                    <small></small>
                                </h5>
                                <p><input type="hidden" name="location" value="{{$location}}">{{$location}}</p>
                                <p><input type="hidden" name="time">{{$time}}</p>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>สินค้า</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>สินค้า</th>
                            <th>จำนวน</th>
                            <th>ราคา/หน่วย</th>
                            <th>ราคา</th>
                        </tr>
                        </thead>
                        <tbody>
        
                        @php $total = 0; @endphp
                        @if(isset($products) && !empty($products))
                            @for($i=0;$i<count($products);$i++)
                                           
                            <tr>
                            <td>{{ $products[$i]->name }}</td>
                            <td> {{ $amounts[$i] }} </td>
                             <td>{{ $products[$i]->price }}</td>
                             @php $price[] = 0;
                             $price[$i] = $products[$i]->price*$amounts[$i]
                             @endphp
                             <td>{{ $price[$i] }}</td>

                               </tr>
                                @php $total += $price[$i]; 
                                @endphp
                               @endfor
                        @else
                            ไม่มีข้อมูล
                        @endif
                        <tr>

                            <td class="text-right"><h2><strong>รวม</strong></h2></td>
                            <td></td>
                            <td></td>
                            <td><h2><strong>{{ $total }}
                                        บาท</strong>
                                </h2></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                              
                                <h5 style="color: rgb(140, 140, 140);"></h5>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>ลายเซนผู้รับ</h1>
                            </div>
                        </div>
                    </div>
     
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" name="submitButton" class="btn btn-primary">สั่ง</button>
                        <button type="submit" class="btn btn-danger">ยกเลิก</button>
                    </div>
                </div>
                </div>
          </form>
       </fieldset>
            </div>
        </div>
    </div>
@endsection