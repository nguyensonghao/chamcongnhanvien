<div class="user col-md-12">
    <div class="logo-website col-md-12">
        <h3 class="logo-text">
            <i class="fa fa-opencart logo-image"></i>
            Chấm Công
        </h3>
    </div>

    <div class="infomation col-md-12">
        <div class="col-md-5">
            <img class="user-avatar" src="{{ Asset('img/admin.png') }}">
            <span class="user-position">MANAGER</span>
        </div>

        <div class="col-md-7">
            <p class="welcome">Welcome,</p>
            <p>{{ Auth::user()->username }}</p>
        </div>
    </div>
</div>