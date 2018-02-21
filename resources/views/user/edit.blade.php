@extends('layouts.app')
@section('content')
    <div class="col-md-3">
    </div>
    <div class="row">
        <div class="col-md-7">

            <div class="row">


                <form class="form-horizontal" action="{{url('postEdit')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
                        <!-- Form Name -->
                        <legend>แก้ไขสินค้า</legend>
                        <!-- Text input-->
                         <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">รหัสสินค้า</label>
                            <div class="col-md-6">
                                <input id="textinput" name="products_id" type="text" class="form-control input-md"
                                       value="{{$data->products_id}}">
                            </div>
                            </div>
        
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="color">ชื่อสินค้า</label>
                            <div class="col-md-6">
                                <input id="color" name="name" type="text" class="form-control input-md"
                                       value="{{$data->name}}">
                            </div>
                        </div>
                        <!-- Text inputPrice-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="color">ราคาขาย</label>
                            <div class="col-md-6">
                                <input id="color" name="price" type="text" class="form-control input-md"
                                       value="{{$data->price}}">
                            </div>
                        </div>

                        <!-- Text inputcost-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="color">ราคาต้นทุน</label>
                            <div class="col-md-6">
                                <input id="color" name="cost" type="text" class="form-control input-md"
                                       value="{{$data->cost}}">
                            </div>
                        </div>
                        <!-- Text inputAddcount-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="account">จำนวน</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input id="account" name="amount" class="form-control" placeholder="0" type="text"
                                           value="{{$data->amount}}">
                                </div>
                            </div>
                        </div>


                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="comparison">หมวดหมู่</label>
                            <div class="col-md-4">
                                <select id="comparison" name="category" class="form-control"
                                        value="{{$data->category}}">
                                    <?php $types = array('ท่อไอเสีย', 'เหล็ก','อะไหล่รถยนต์'); ?>
                                    @foreach($types as $t)
                                        @if($data->category == $t)
                                            <option value="{{$t}}" selected="">
                                        @else
                                            <option value="{{$t}}">
                                                @endif
                                                {{$t}}</option>
                                            @endforeach

                                </select>
                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submitButton"></label>
                            <div class="col-md-8">
                                <button id="submitButton" name="submitButton" class="btn btn-success">บักทึก</button>
                                <button id="cancel" name="cancel" class="btn btn-inverse">ยกเลิก</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

            @endsection
            </body>
            </html>