@extends('layouts.app')
@section('content')
    <head>
        <link href="{{asset('css/bootstrap-store.css')}}" rel="stylesheet">
    </head>
    <body>


    <div class="container">
        <br><br>

        <form action="store" method="POST" role="form">

            <div class="col-md-12">
                <div class="col-md-2" style="margin-right:-80px; padding-left:24px;">
                    <div class="form-group">
                        <label class="col-md-offset-4" style="padding-top:6px;">Search:</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select name="cat" id="input" class="form-control col-md-offset-3" required="required">
                            @if(isset($cat))
                                <option value="name"
                                        @if($cat == 'name') selected=""
                                        @endif
                                >Drug Name
                                </option>
                                <option value="products_id"
                                        @if($cat == 'products_id') selected=""
                                        @endif
                                >Code
                                </option>
                            @else
                                <option value="name">Product Name</option>
                                <option value="products_id">Product ID</option>

                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="col-md-4">
                        <input type="text" name="keyword" class="form-control"
                               @if(isset($keyword))
                               value="{{$keyword}}"
                                @endif
                        >
                    </div>
                    <div class="col-md-offset-3">
                        <button type="submit" class="btn btn-primary btn-md">Search</button>
                        <a href="{{url('store')}}" class="btn btn-danger">Cancel</a>
                    </div>
                    {!! csrf_field() !!}
                </div>
            </div>
        </form>


        <br><br>
        <form action="" method="POST" role="form" id="deletes">
            @if(isset($delete) && $delete==1)
                {!! csrf_field() !!}
                <a href="{{url('store')}}" class="btn btn-default pull-right">Cancel</a>
                <button type="button" data-toggle="modal" data-target="#myModal"
            @else
                <a href="{{url('delete')}}"" class="btn btn-danger btn-sm pull-right glyphicon glyphicon-trash"></a>
                <a href="{{url('insertdata')}}" class="btn btn-primary btn-sm pull-right"><b>+</b> Add new
                    categories</a>
            @endif
            <table class="table table-striped custab">
                <thead>

                <tr>
                    @if(isset($delete) && $delete==1)
                        <th></th>
                    @endif
                    <th>No</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Cost</th>
                    <th>Amount</th>

                    <th class="text-center">Action</th>

                </thead>

                <?php

                $n = 0;
                ?>

                @foreach($products as $p)
                    <tr>
                        @if(isset($delete) && $delete==1 )
                            <td><input type="checkbox" name="checkbox[]" value="{{$p->id}}"></td>
                        @endif
                        <td>{{$n+1}}</td>
                        <td>{{$p->products_id}}</td>
                        <td>{{$p->name}}</td>
                        <td>{{$p->category}}</td>
                        <td>{{$p->price}}</td>
                        <td>{{$p->cost}}</td>
                        <td>{{$p->amount}}</td>
                        <td class="text-center"><a class='btn btn-info btn-xs' href="edit/{{$p->id}}"><span
                                        class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a href="store/delete/{{$p->id}}" onclick="return confirm('Are you sure to delete')"
                               class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>
                                Del</a></center></td>
                        <?php $n++;?>
                    </tr>

                @endforeach


            </table>
            </from>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="submit" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true"></span></button>
                            <h4 class="modal-title" id="myModalLabel">Delete</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="confirm">Confirm</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
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
    @endsection
    </body>
    </html>