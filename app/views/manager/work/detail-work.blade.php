@extends('index')

@section('title')
	Chi tiết công việc
@endsection

@section('content')
	<form method="post" action="{{Asset('work/rate')}}">
		<p>
			<i class="fa fa-user"></i> <label>Người đảm nhiệm : </label>
			@if ($work->workStatus == 0)
				Chưa được giao
			@else
				{{ $work->username }}
			@endif
		</p>
		<p>
			<i class="fa fa-taxi"></i> <label>Tên công việc :</label>
			{{ $work->name }}
		</p>
		<p>
			<i class="fa fa-pencil-square-o"></i> <label>Chi tiết :</label>
			{{ $work->note }}
		</p>
		<p>
			<i class="fa fa-calendar-times-o"></i> <label>Ngày bắt đầu :</label>
			{{ $work->dateStart }}
		</p>

		<p>
			@if ($work->workStatus == 2)
				<i class="fa fa-tag"></i> <label>Trạng thái :</label>
				Đã kết thúc công việc
			@else 
				<i class="fa fa-tag"></i> <label>Trạng thái :</label>
				Chưa kết thúc công việc
			@endif
		</p>

		<p>
			@if ($work->workStatus == 2)
				<i class="fa fa-star-half-o"></i> <label>Chi tiết đánh giá :</label>
				{{ $work->noteRate }}
			@endif
		</p>
		<a class="btn btn-danger btn-sm" a href="{{ Asset('user/delete').'/'.$work->workId }}">
			<span class="glyphicon glyphicon-remove"></span> 
			Xóa
		</a>
	</form>
@endsection