<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ระบบจัดการอะไหล่รถยนต์</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/stylet.css">
      <style type="text/css">
        .cont {
          position: relative;
           height: 100%;
           background-image: url("img/bg.jpg");
           background-size: cover;
           overflow: auto;
           font-family: "Open Sans", Helvetica, Arial, sans-serif;
         }
        </style>

  
</head>

<body>

  <div class="cont">
  <div class="demo">
    <div class="login">
      <div class="login__check">{{ Auth::user() }}</div>
      <div class="login__form">
        <div class="login__row">
         <form class="form login" role="form" method="POST" action="{{ url('/login') }}">
         {{ csrf_field() }}      

          @if ($errors->has('email'))
              <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="email" name="email" />
       </div>  

          @if ($errors->has('password'))
              <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" placeholder="Password" name="password" />
        </div>
        <button type="submit" class="login__submit">เข้าสู่ระบบ</button>
        <p class="login__signup">ยังไม่ได้เป็นสมาชิก &nbsp;<a>ลงทะเบียน</a></p>
         </form>
      </div>
    </div>
   
   
    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
