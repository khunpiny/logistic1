@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
                <br><br>
                <h2 style="color:#0fad00">สำเร็จ</h2>
                <img src="http://osmhotels.com//assets/check-true.jpg">
                <h4>คุณ {{$customers->name}}</h4>
                <p style="font-size:20px;color:#5C5C5C;">บันทึกข้อมูลลงระบบเรียบร้อยแล้ว</p>
                <br><br>
            </div>

        </div>
    </div>
@endsection