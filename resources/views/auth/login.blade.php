
@extends('layouts.app')
@section('content')
<a href="insertdata"></a>
<div class="login">
  <div class="login-triangle"></div>
    <h2 class="login-header">Log in {{ Auth::user() }}</h2>
      <form class="login-container" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <p><input  id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus></p>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <p><input id="password" type="password" name="password" required></p>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
              <p><input type="submit" value="Log in"></p>
              <a class="btn btn-link" href="{{ url('/password/reset') }}"> Forgot Your Password?</a>
     </form>
</div>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- bootsnipp2login -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9155049400353686"
     data-ad-slot="6460533058"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


@endsection