<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập hệ thống</title>
    <meta charset="utf-8">
    <!--  library css !-->
    {{ HTML::style('libs/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('libs/bootstrap/css/icon.css') }}
    {{ HTML::style('libs/font/css/font-awesome.css') }}
    {{ HTML::style('libs/css/style.css') }}
    {{ HTML::style('libs/css/login.css') }}

    <!--  library javascript !-->
    {{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}
    {{ HTML::script('libs/bootstrap/js/bootstrap.js') }}

</head>

<body>
    <div class="col-md-4 col-md-offset-4 form-login">

        <form action="{{ Asset('login') }}" method="POST">
            <legend>Đăng nhập hệ thống chấm công</legend>

            @if (Session::has('error'))
                <div class="alert alert-danger">                    
                    <strong>Lỗi!</strong> {{ Session::get('error') }}
                </div>
            @endif

            @if (Session::has('notify'))
                <div class="alert alert-success">                    
                    <strong>Thông báo!</strong> {{ Session::get('notify') }}
                </div>
            @endif
        
            <div class="form-group">
                <label for="">Tài khoản :</label>
                <input type="text" class="form-control" name="username" required pattern=".{4,15}">
            </div>

            <div class="form-group">
                <label for="">Mật khẩu :</label>
                <input type="password" class="form-control" name="password" 
                required pattern=".{6,15}">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Đăng nhập</button>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember">
                        Ghi nhớ mật khẩu
                    </label>
                </div>
            </div>
            
        </form>
    </div>
</body>


</html>