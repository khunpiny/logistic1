@extends('layouts.app')
@section('body', 'active')
@section('content')
<head>
   <link href="{{asset('css/bootstrap-store.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:   #4CAF50;
    color: white;
}
</style>
</head>
<body>
 <!-- <div class="container">
 <br><br>
    <form action="{{url('store')}}" method="POST" role="form">
    <div class="col-md-12">
    <div class="col-md-2" style="margin-right:-80px; padding-left:24px;">
        <div class="form-group">
         <label class="col-md-offset-4" style="padding-top:6px;">ค้นหา</label>
            </div>
    </div>

    <div class="col-md-1">
    <div class="form-group">
    <select name="cat" id="input" class="form-control col-md-offset-3" required="required"> -->
    <!-- isset ถ้ามีค่าจะส่งตัวแปรไป -->
    <!-- @if(isset($cat))
        <option value="name" 
     @if($cat == 'name') 
                selected="" 
     @endif>
        </option>
        <option value="products_id" 
     @if($cat == 'products_id') 
                selected="" 
     @endif>
        </option>
    @else
        <option value="name">ชื่อสินค้า</option>
        <option value="products_id">รหัสสินค้า</option>
            @endif
    </select>
    </div>
    </div>

    <div class="col-md-8">
    <div class="col-md-4">
        <input type="text" name="keyword" class="form-control"
    @if(isset($keyword)) value="{{$keyword}}"
                 @endif>
            </div>

       <div class="col-md-offset-3">
            <button type="submit" class="btn btn-primary btn-md">ค้นหา</button>
       </div>
    {!! csrf_field() !!}
       </div>
    </div>
</div>
    </form>


<br><br> -->
  
<div class="row">
    <div class="col-lg-12">

                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark text-uppercase">
                                    รายการสินค้า
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
            <!-- delate all -->
            <form action="" method="POST" role="form" id="deletes">
              @if(isset($delete) && $delete==1)
                {!! csrf_field() !!}
                <button  type="button" class="w3-button w3-deep-purple" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download"></i>&nbsp Import Excel</button>
        
                    <a href="{{url('items/export')}}" class="w3-button w3-indigo"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp Export Excel</a>  
                    
                    <a href="{{url('store')}}" class="w3-button w3-red pull-right"><i class="fa fa-window-close" aria-hidden="true"></i>&nbspยกเลิก</a>
                    <a data-toggle="modal" data-target="#myModal" class="w3-button w3-teal pull-right"><i class="fa fa-check"></i>&nbspตกลง</a>

              @else               
                    <button  type="button" class="w3-button w3-deep-purple" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-download"></i>&nbsp Import Excel</button>
        
                    <a href="{{url('items/export')}}" class="w3-button w3-indigo"><i class="fa fa-file-excel-o" aria-hidden="true"></i>&nbsp Export Excel</a>  
                    
                    <a href="{{url('delete')}}" class="w3-button w3-red pull-right"><i class="fa fa-trash-o"></i>&nbspลบสินค้า</a>
                    <a href="{{url('insertdata')}}" class="w3-button w3-teal pull-right"><i class="fa fa-th-list"></i>&nbsp เพิ่มสินค้า</a>
              @endif
              <br><br>
                    <table id="customers">
                        <thead>
                            <tr>
              @if(isset($delete) && $delete==1)
                                <th><i class="fa fa-check" aria-hidden="true"></i></th>
              @endif
                                <th>ลำดับ</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคาขาย</th>
                                <th>ต้นทุน</th>
                                <th>หมวดหมู่</th>
                                <th>จำนวน</th>
                                <th></th>
                            </tr>
                        </thead>
              @foreach($products as $p)
                <tbody>
                    <tr>
                @if(isset($delete) && $delete==1 )
                    <td><input type="checkbox" name="checkbox[]" value="{{$p->products_id}}"></td>
                @endif
                    <td>{{$p->products_id}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->price}}</td>
                    <td>{{$p->cost}}</td>
                    @if($p->category=='เหล็ก')
                    <td><span class="label label-pink">{{$p->category}}</span></td>
                    @elseif($p->category=='ท่อไอเสีย')
                    <td><span class="label label-info">{{$p->category}}</span></td>
                    @elseif($p->category=='อะไหล่รถยนต์')
                    <td><span class="label label-purple">{{$p->category}}</span></td>
                    @endif
                    <td>{{$p->amount}}</td>
                    <td class="text-center"><a class='btn btn-warning btn-xs' href="edit.{{$p->products_id}}">
                    <span class="glyphicon glyphicon-edit"></span> Edit</a>
                    <a href="store/delete/{{$p->products_id}}" onclick="return confirm('คุณต้องการจะลบสินค้าหรือไม่')"
                               class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>
                                ลบ</a></center></td>
                                                </tr>
                @endforeach
                </tbody>
                    </table>
                    <center>
                        {{ $products->links() }}
                    </center>
                    
                                    </div>
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

<!-- ลบสินค้าทั้งหมด -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modal-header">
     <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true"></span></button>
     <h4 class="modal-title" id="myModalLabel">Delete</h4>
    </div>
        <div class="modal-body">
        คุณจะลบจริงหรือไหม?
        </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-danger" id="confirm">Confirm</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
     </div>
     </div>
     </div>
    </div>
   


    <script src="//code.jquery.com/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
    </script>
    <script>
    $(document).on('ready', function() {
    $("#input-b9").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["jpg", "png", "gif"]
        //uploadUrl: '/site/file-upload-single'
    });
});
</script>
    @endsection
