@extends('layouts.app')
@section('content')

    <script type="text/javascript" src="{{url('js/jquerytext.js')}}"></script> 
    <meta charset="utf-8">
    <title>Angular Live Search</title>
    <link rel="stylesheet" href="styles.css">

    <div class="container">
        <div class="page-header">
            <h1>สั่งซื้อสินค้า</h1>
        </div>

        <div class="well">กรุณากรอกข้อมูลการสั่งซื้อให้ถูกต้องและครบถ้วน</div>

        <form class="form-horizontal" method="POST" role="form" action="{{url('billdata')}}" onsubmit="clearField();">
            {!! csrf_field() !!}
            <fieldset>
<body ng-controller="searchController">
     <div class="form-group">
       <label for="user_id" class="col-sm-2 control-label">ค้นหาลูกค้า</label>
      <div class="col-sm-3">
     <!-- Search -->
      <input type="text" name="name" placeholder="Search" ng-model="query" ng-focus="focus=true"  class="form-control">
    </div>
    </div>
     

     <div id="search-results" ng-show="focus">
    <div class="search-result" ng-repeat="item in data | search:query" ng-bind="item" ng-click="setQuery(item)"></div>
  </div>
</body>


                


                <div class="form-group">
                    <label for="products_id" class="col-sm-2 control-label">สินค้า</label>
                    <div class="col-sm-3">
                        <input id="name" type="text" name="name[]" class="form-control" placeholder="ชื่อสินค้า" required
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

   <!-- Load JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.0/angular.min.js"></script>
  <script>
     var data = {!! $customers !!};
  </script>
  <script src="{{ asset('js/appsearch.js') }}"></script>
  <script type="text/javascript">

</script>
@endsection
    </html>