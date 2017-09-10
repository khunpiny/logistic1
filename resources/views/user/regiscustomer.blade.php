@extends('user.navbaruser')
@section('content')
    <div class="container">

        <div class="row">

            <form class="form-horizontal" action="{{url('customer')}}" method="POST" role="form">
                <h2>ข้อมูลลูกค้า</h2>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm- col-md-12">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Name"
                                   tabindex="1" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <textarea type="text" name="address" id="display_name" class="form-control input-lg"
                              placeholder="Address" tabindex="3" rows="5" required></textarea>
                </div>

                <!-- <div class="row"> -->
                <!-- <div class="col-xs-12 col-sm-6 col-md-6"> -->
                <div class="form-group">
                    <input type="tel" name="tel" id="tel" class="form-control input-lg" placeholder="Tel" tabindex="4"
                           required>
                </div>

                <div class="form-group">

                    <input type="email" name="email" id="email" class="form-control input-lg"
                           placeholder="Email Address" tabindex="4" required>
                </div>

                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-md-2">
                        <button id="submit" name="submit" class="btn btn-success btn-block btn-lg">บันทึกข้อมูล
                    </div>
                    </button>
                </div>
                {!! csrf_field() !!}
            </form>
@endsection