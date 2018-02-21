@extends('layouts.app')
@section('content')
<form action="postImport" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<input type="file" name="products">
	<input type="submit" name="Import"></input>
</form>
@endsection