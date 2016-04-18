@extends('index')

@section('title')
	Đánh giá công việc
@endsection

@section('content')
	<p style="font-style: italic">
		<span class="glyphicon glyphicon-menu-hamburger"></span> 
		Danh sách công việc đã được giao
	</p>

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
    
	<div class="table-responsive">
		<table class="table table-hover">
			<thead class="bg-primary">
				<tr>
					<th>#</th>
					<th>Tên công việc</th>
					<th>Người đảm nhiệm</th>
					<th>Ngày bắt đầu</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($listWork as $key=>$value)
				<tr>
					<td>{{ ++$key }}</td>
					<td>
						<b class="username-table">{{ $value->name }}</b>
					</td>
					<td>{{ $value->username }}</td>
					<td>{{ $value->dateStart }}</td>
					<td>
						<a class="btn btn-primary btn-sm" 
						href="{{Asset('work/rate').'/'.$value->workId}}">
							Đánh giá
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			{{ $listWork->links() }}
		</table>
	</div>
@endsection