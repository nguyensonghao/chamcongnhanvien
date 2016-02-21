@extends('index')

@section('title')
	Phân chia công việc
@endsection

@section('content')
	<div class="container col-md-6">
		@if (Session::get('result_give_work') == -1)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Lỗi</strong> có lỗi trong quá trình xử lỉ hệ thống
			</div>
		@endif 

		@if (Session::get('result_give_work') == 1)
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo</strong> giao việc thành công
			</div>
		@endif 
		<form action="{{Asset('work/give')}}" method="POST">
			<legend>Giao công việc</legend>
		
			<div class="form-group">
				<label>Công việc : </label>
				<select name="name" class="form-control search_select_work" required="required">
					@foreach($list_work as $value) 
						<option value="$value->workId">{{$value->name}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label>Nhân viên :</label>
				<select name="username" class="form-control search_select_user" required>
					@foreach($list_user as $value) 
						<option value="$value->id">{{$value->username}}</option>
					@endforeach
				</select>
			</div>
		
			<button type="submit" class="btn btn-primary btn-sm">
				<span class="glyphicon glyphicon-plus"></span> 
				Giao
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<span class="glyphicon glyphicon-refresh"></span> 
				Làm mới
			</button>
		</form>
	</div>

	<div class="list_work_not_give col-md-6">
		<div class="panel panel-default" style="border-radius: 0">
			<!-- Default panel contents  -->
			<div class="panel-heading bg-primary">
				<span class="glyphicon glyphicon-menu-hamburger"></span>
				Danh sách công việc chưa được giao
			</div>
		
				<!-- Table -->
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Tên</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($list_work as $key => $value)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $value->name }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
	</div>
	<script>
        $(document).ready(function () {
            $('.search_select_user').editableSelect({ effects: 'slide' });
            $('.search_select_work').editableSelect({ effects: 'slide' });
        })
    </script>
@endsection