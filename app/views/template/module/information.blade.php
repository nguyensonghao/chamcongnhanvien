@extends('index')

@section('title')
	Thông tin tài khoản
@endsection

@section('content')

<div class="col-md-6">
	<form action="{{ Asset('update-profile') }}" method="POST">

		<legend>Thông tin tài khoản</legend>

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
			<label>Tài khoản</label>
			<input type="username" class="form-control" name="username" value="{{ $user->username }}">
		</div>

		<div class="form-group">
			<label>Tên đầy đủ</label>
			<input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" value="{{ $user->email }}">
		</div>
	
		<button type="submit" class="btn btn-primary">Cập nhật</button>
		<button type="reset" class="btn btn-danger">Làm mới</button>
	</form>
</div>

@endsection