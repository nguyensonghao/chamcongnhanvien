<nav class="navbar navbar-default" role="navigation" style="background: url('{{Asset('img/noise.png')}}')">
            
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge quantity">6</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu list-message wow">
                    <li><a href="#">Hỏi đáp về việc mất tài khoản</a></li>
                    <li><a href="#">Cách đăng ký 1 người dùng mới</a></li>
                    <li><a href="#">Bao nhiêu lâu khuyến mãi một lần</a></li>
                    <li><a href="#">Thông tin về quà tặng tháng 10</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Asset('img/admin.png') }}" 
                    height="30px" class="nav-user-avatar">
                    <span class="username">Nguyenhao</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu wow">
                    <li>
                        <a href="#">
                            Thông tin tài khoản
                        </a>
                    </li>
                    <li>
                        <a href="{{ Asset('change-password') }}">
                            Đổi mật khẩu
                        </a>
                    </li>
                    <li>
                        <a href="{{ Asset('logout') }}">
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>