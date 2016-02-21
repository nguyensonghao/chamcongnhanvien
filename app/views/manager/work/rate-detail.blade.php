@extends('index')

@section('title')
	Đánh giá công việc
@endsection

@section('content')
	<form method="post" action="{{Asset('work/rate')}}">
		<p>
			<i class="fa fa-user"></i> <label>Người đảm nhiệm : </label>
			{{ $work->username }}
			<input type="hidden" name="workId" value="{{$work->workId}}">
		</p>
		<p>
			<i class="fa fa-taxi"></i> <label>Tên công việc :</label>
			{{ $work->name }}
		</p>
		<p>
			<i class="fa fa-pencil-square-o"></i> <label>Chi tiết</label>
			{{ $work->note }}
		</p>
		<p>
			<i class="fa fa-calendar-times-o"></i> <label>Ngày bắt đầu :</label>
			{{ $work->dateStart }}
		</p>
		<p>
			<i class="fa fa-star-half-o"></i> <label>Các mức đánh giá :</label>
			<select name="level" class="form-control" style="width: 300px">
				@foreach($listLevel as $value)
					<option value="{{$value->id}}">{{$value->name}}</option>
				@endforeach
			</select>
		</p>

		<textarea name="noteRate" class="form-control" rows="5" style="width: 600px">
			
		</textarea>
		<hr>
		<button type="submit" class="btn btn-primary">Đánh giá</button>
	</form>
@endsection