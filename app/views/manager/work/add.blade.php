@extends('index')

@section('title')
	Thêm công việc
@endsection

@section('content')
	<div class="container col-md-6">
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
        
		<form action="{{Asset('work/add')}}" method="POST">
			<legend>Thêm công việc</legend>
		
			<div class="form-group">
				<label>Tên</label>
				<textarea name="name" class="form-control" rows="3"></textarea>
			</div>

			<div class="form-group">
				<label>Chi tiết</label>
				<textarea name="note" class="form-control" rows="3"></textarea>
			</div>

			<div class="form-group">
				<label>Phân công cho</label>
				<select name="username" class="form-control search_select">
					@foreach($list_user as $value)
						<option value="{{$value->id}}">{{$value->username}}</option>
					@endforeach
				</select>
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
	<script>
        $(document).ready(function () {
            $('.search_select').editableSelect({ effects: 'slide' });
        })
    </script>
@endsection