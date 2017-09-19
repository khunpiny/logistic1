@extends('layouts.app')
@section('content')
    <head>
        <script type="text/javascript" src="js/jquerytext.js"></script>
    </head>
    <div class="container">
        <div class="page-header">
            <h1>สั่งซื้อสินค้า</h1>
        </div>

        <div class="well">กรุณากรอกข้อมูลการสั่งซื้อให้ถูกต้องและครบถ้วน</div>

        <form class="form-horizontal" method="POST" role="form" action="{{url('billdata')}}">
            {!! csrf_field() !!}
            <fieldset>

                <div class="form-group">
                    <label for="customer_id" class="col-sm-2 control-label">รหัสผู้สั่ง</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="customer_id" name="customer_id"
                               placeholder="รหัสผู้สั่ง" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_id" class="col-sm-2 control-label">รหัสลูกค้า</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="รหัสลูกค้า"
                               required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="products_id" class="col-sm-2 control-label">สินค้า</label>
                    <div class="col-sm-3">
                        <input type="text" name="products_id[]" class="form-control" placeholder="รหัสสินค้า" required
                               autofocus></div>
                    <label for="amount" class="col-sm-2 control-label">จำนวน</label>
                    <div class="col-sm-3">
                        <input type="text" name="amount[]" class="form-control" placeholder="จำนวน" required
                               autofocus>
                    </div>
                    <button type="button" class="btn btn-success btn-add">+</button>
                </div>

                <div class="form-group">
                    <label for="time" class="col-sm-2 control-label">วันที่จัดส่ง</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="time" name="time" placeholder="" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">สถานที่จัดส่ง</label>
                    <div class="col-sm-6">
                        <textarea id="message" name="location" class="form-control" placeholder="ที่อยู่" rows="5"
                                  required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-2">
                        <button type="submit" name="submitButton" class="btn btn-primary">สั่ง</button>
                        <button type="submit" class="btn btn-danger">ยกเลิก</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
@endsection