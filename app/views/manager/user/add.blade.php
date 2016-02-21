@extends('index')

@section('title')
	Thêm nhân viên
@endsection

@section('content')
	
	<div class="container col-md-6">
		<form action="{{Asset('user/add')}}" method="POST">
			<legend>Thêm người dùng</legend>

			@if (Session::get('result-add-user') == -1)
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Lỗi!</strong> điền đầy đủ thông tin của người dùng
				</div>
			@endif

			@if (Session::get('result-add-user') == -2)
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Lỗi!</strong> mật khẩu không khớp
				</div>
			@endif

			@if (Session::get('result-add-user') == -3)
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Lỗi!</strong> đã tồn tại tài khoản
				</div>
			@endif

			@if (Session::get('result-add-user') == 1)
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> thêm tài khoản thành công
				</div>
			@endif
		
			<div class="form-group">
				<label for="">Tài khoản</label>
				<input type="text" class="form-control" name="username">
			</div>

			<div class="form-group">
				<label for="">Tên đầy đủ</label>
				<input type="text" class="form-control" name="fullname">
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" name="email">
			</div>

			<div class="form-group">
				<label>Chức vụ</label>
				<select name="position" class="form-control">
					@foreach($listPosition as $value)
					<option value="{{$value->id}}">{{$value->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="">Mật khẩu</label>
				<input type="password" class="form-control" name="password">
			</div>

			<div class="form-group">
				<label for="">Nhập lại mật khẩu</label>
				<input type="password" class="form-control" name="password_confirm">
			</div>
		
			<button type="submit" class="btn btn-primary btn-sm">
				<span class="glyphicon glyphicon-plus"></span> 
				Thêm
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<span class="glyphicon glyphicon-refresh"></span> 
				Làm mới
			</button>
		</form>

	</div>

@endsection