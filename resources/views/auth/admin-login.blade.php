<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
            body{
      font-family: sans-serif;
      background: #d5f0f3;
    }

    h1{
      text-align: center;
      font-weight: 300;
    }

    .tulisan_login{
      text-align: center;
      text-transform: uppercase;
    }

    .kotak_login{
      width: 350px;
      background: white;
      margin: 100px auto;
      padding: 30px 20px;
    }

    label{
      font-size: 11pt;
    }

    .form_login{
      box-sizing: border-box;
      width: 100%;
      padding: 10px;
      font-size: 11pt;
      margin-bottom: 20px;
    }

    .tombol_login{
      background: #46de4b;
      color: white;
      font-size: 11pt;
      width: 50%;
      border: none;
      border-radius: 3px;
      padding: 10px 20px;
      margin-left: 25%;
    }
    </style>
</head>
<body>
    <h1>Amii Cosmetic</h1>
<div id="app">
    <div class="kotak_login">
        <p class="tulisan_login">Login Admin</p>
        <form action="{{route('admin.login.submit')}}" method="post">
            {{ csrf_field() }}
            <label>Email Address</label><br>
            <input id="email" type="email" name="email" class="form_login" placeholder="Email" required><br>   
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            <label>Password</label><br>
            <input id="password" type="password" name="password" class="form_login" placeholder="Password" required><br>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            <input type="submit" class="tombol_login" value="LOGIN">
        </form>
    </div>
</div>
    <footer>
        <p align="right">copyright ?? 2019 AmiiCosmetic. All rights reserved.
    </footer>
</body>
</html>