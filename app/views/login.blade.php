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

            @if (Session::get('result-login') == -2)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Lỗi!</strong> hãy điền đẩy đủ thông tin đăng nhập
                </div>
            @endif

            @if (Session::get('result-login') == -1)
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Lỗi!</strong> tài khoản hoặc mật khẩu không tồn tại
                </div>
            @endif

            @if (Session::get('result-logout') == 1)
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Thông báo!</strong> bạn vừa đăng xuất ra khỏi hệ thống
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