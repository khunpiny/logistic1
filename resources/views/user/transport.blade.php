@extends('layouts.app')
@section('content')
<a href="{{ url('pdf') }}" class="btn btn-xs btn-primary">Export PDF</a>
<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
<table class="table table-bordered table-hover">
<tr>
		<th>บิลที่</th>
		<th>สถานที่</th>
	</tr>	
	@foreach($Orders as $c)
         <tr>
         	<td>{{$c->order_id}}</td>
         	<td>{{$c->location}}</td>
         </tr>
    	@endforeach
</table>
</div>

@endsection