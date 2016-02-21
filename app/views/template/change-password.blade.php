@extends('index')

@section('title')
	Đổi mật khẩu
@endsection

@section('content')

<div class="col-md-6">
	<form action="{{ Asset('change-password') }}" method="POST">

		<legend>Đổi mật khẩu</legend>

		@if (Session::get('result-change-password') == -1)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Lỗi!</strong> hãy điền đẩy đủ thông tin
			</div>
		@endif

		@if (Session::get('result-change-password') == -2)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Lỗi!</strong> mật khẩu mới không trùng nhau
			</div>
		@endif

		@if (Session::get('result-change-password') == -3)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Lỗi!</strong> không tồn tại mật khẩu
			</div>
		@endif

		@if (Session::get('result-change-password') == 1)
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> đổi mật khẩu thành công
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
	
		<button type="submit" class="btn btn-primary btn-sm">Đổi</button>
		<button type="reset" class="btn btn-danger btn-sm">Đổi</button>
	</form>
</div>

@endsection