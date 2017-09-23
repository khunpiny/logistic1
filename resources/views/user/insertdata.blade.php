@extends('layouts.app')
@section('content')
    <div class="col-md-3">

    </div>
    <div class="row">
        <div class="col-md-7">

            <div class="row">


                <form class="form-horizontal" action="{{url('postdata')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
                        <!-- Form Name -->
                        <legend>Product</legend>
                    

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="color">Product name</label>
                            <div class="col-md-6">
                                <input id="color" name="name" type="text" class="form-control input-md">
                            </div>
                        </div>
                        <!-- Text inputPrice-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="color">Price</label>
                            <div class="col-md-6">
                                <input id="color" name="price" type="text" class="form-control input-md">
                            </div>
                        </div>

                        <!-- Text inputcost-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="color">Cost</label>
                            <div class="col-md-6">
                                <input id="color" name="cost" type="text" class="form-control input-md">
                            </div>
                        </div>
                        <!-- Text inputAddcount-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="account">Amount</label>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input id="account" name="amount" class="form-control" placeholder="0" type="text">
                                    <span class="input-group-addon">+Add</span>
                                </div>
                            </div>
                        </div>


                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="comparison">category</label>
                            <div class="col-md-4">
                                <select id="comparison" name="category" class="form-control">
                                    <option value="exhaust pipe">exhaust pipe</option>
                                    <option value="steel">steel</option>

                                </select>
                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="submitButton"></label>
                            <div class="col-md-8">
                                <button id="submitButton" name="submitButton" class="btn btn-success">Save</button>
                                <button id="cancel" name="cancel" class="btn btn-inverse">Cancel</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            </body>
            </html>
@endsection