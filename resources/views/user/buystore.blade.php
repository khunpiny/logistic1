@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-search.css')}}">
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="{{url('js/jquerytext.js')}}"></script> 
<script type="text/javascript">
  $(function(){
    var currencies = {!! $customers !!};
    $('#autocomplete').autocomplete({
      lookup: currencies,
      onSelect: function (suggestion) {
        var thehtml = suggestion.data;
        $('#outputcontent').html(thehtml);
      }
    });
  });
</script>
<div class="row">
    <div class="col-lg-12">
        <div class="portlet"><!-- /primary heading -->
            <div class="portlet-heading">
                <h3 class="portlet-title text-dark text-uppercase">สั่งซื้อสินค้า</h3>
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
                <div class="portlet-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
           
            <div class="form-group" >
                  <label for="products_id" class="col-sm-2 control-label">สินค้า</label>
              <div class="col-sm-3">
                 <input  list="mylist" class="form-control" name="names[]" placeholder="ชื่อสินค้า" value="{{ old('names[]')}}" required>
                 <datalist id="mylist">
                  @foreach($name as $s)
                  <option>{{$s->name}}</option>
                  @endforeach
                 </datalist>
              </div>
               
                  <label for="amount" class="col-sm-2 control-label">จำนวน</label>
              <div class="col-sm-2">
                  <input type="text" name="amount[]" class="form-control" placeholder="จำนวน" 
                               autofocus required>
              </div>
                    <button type="button" class="btn btn-success btn-add">+</button>
                </div> 
            <div class="form-group">
                  <label for="time"  class="col-sm-2 control-label">วันที่จัดส่ง</label>
              <div class="col-sm-3">
                  <input type="date" class="form-control" id="time" name="time" placeholder="" value="{{ old('time')}}" required>
              </div>
            </div>

            <div class="form-group" id="outputbox">
                    <label for="location" class="col-sm-2 control-label">สถานที่จัดส่ง</label>
              <div class="col-sm-6">
                   <p id="outputcontent" class="form-control" >Choose a customer name</p>
              </div>
            </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2">
                        <button type="submit" name="submitButton" class="btn btn-primary">สั่ง</button>
                        <button type="submit" class="btn btn-danger">ยกเลิก</button>
                    </div>
                </div>
            </fieldset>
        </form>         
 
                </div>
            </div>
       </div>
    </div> <!-- end col -->
</div> <!-- end row -->
            </form>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="postImport" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="file-loading">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input id="input-b9" name="input-b9" multiple type="file"'>
        </div>
        <div id="kartik-file-errors"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" title="Your custom upload logic">Save</button>
      </div>
  </form>
    </div>
  </div>
</div>
</div>
@endsection   