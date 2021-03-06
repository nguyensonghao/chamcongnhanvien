@extends('index')

@section('title')
	Đổi mật khẩu
@endsection

@section('content')

<div class="col-md-6">
	<form action="{{ Asset('change-password') }}" method="POST">

		<legend>Đổi mật khẩu</legend>

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
			<label>Mật khẩu cũ</label>
			<input type="password" class="form-control" name="old_password">
		</div>

		<div class="form-group">
			<label>Mật khẩu mới</label>
			<input type="password" class="form-control" name="new_password">
		</div>

		<div class="form-group">
			<label>Nhập lại mật khẩu</label>
			<input type="password" class="form-control" name="new_password_confirm">
		</div>
	
		<button type="submit" class="btn btn-primary">Đổi</button>
		<button type="reset" class="btn btn-danger">Làm mới</button>
	</form>
</div>

@endsection