@extends('index')

@section('title')
	Thêm nhân viên
@endsection

@section('content')
	
	<div class="container col-md-6">
		<form action="{{Asset('user/add')}}" method="POST">
			<legend>Thêm người dùng</legend>

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