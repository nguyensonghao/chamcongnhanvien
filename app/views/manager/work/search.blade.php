@extends('index')

@section('title')
	Tìm kiếm công việc
@endsection

@section('content')
	
	<div class="container col-md-12">
		<form action="{{Asset('work/search')}}" method="POST">
			<div class="input-group input-group-search">
		        <input class="form-search" PLACEHOLDER="Nhập thông tin người dùng cần tìm kiếm" name="key_search">
		        <span class="input-group-addon submit-span">Go!</span>
		    </div>
		</form>
		
		<div class="result-search">
			<!-- 
				Lỗi không có thông tin trương trường seacrh
			!-->
			@if (Session::get('result-search-error') == -1)
				<hr>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo</strong> hãy điền thông tin vào trong trường tìm kiếm
				</div>
			@endif
			
			<!-- 
				Kết quả tìm kiếm
			!-->
			@if (Session::has('resultSearch'))
				@if (count(Session::get('resultSearch')) == 0)
					<hr>
					<div class="alert alert-info">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> không tìm thấy kết quả tìm kiếm
					</div>
				@else
					<hr>
					<b><i style="color: gray">Kết quả tìm kiếm : </i></b><hr>
					<table class="table table-responsive table-bordered">
				        <thead class="bg-primary">
				            <th>#</th>
				            <th>Người làm</th>
				            <th>Tên</th>
				            <th>Chi tiết</th>
				            <th>Ngày bắt đầu</th>
				            <th>Xóa</th>
				        </thead>

				        <tbody>
				            @foreach (Session::get('resultSearch') as $key=>$value)
				                <tr>
				                    <td>{{ ++$key }}</td>
				                    <td>{{ $value->username }}</td>
				                    <td>
				                    	<a href="{{ Asset('work/detail').'/'.$value->workId }}">
				                    	{{ str_limit($value->name, $limit = 20, $end = '...') }}
				                    	</a>
				                    </td>
				                    <td>
				                    	{{ str_limit($value->note, $limit = 45, $end = '...') }}
				                    </td>
				                    <td>{{ $value->dateStart }}</td>
				                    <td>
				                        <a type="button" class="btn btn-danger btn-sm"
				                        href="{{ Asset('work/delete').'/'.$value->workId }}">
				                        	<span class="glyphicon glyphicon-remove"></span> 
				                            Xóa
				                        </a>
				                    </td>
				                </tr>
				            @endforeach
				        </tbody>
				    </table>
				@endif
			@endif
		</div>
	</div>

<script>
$(document).ready(function(){
    var spanSubmit = $('.submit-span');

    spanSubmit.on('click', function() {
        $(this).closest('form').submit();
    });
})
</script>
@endsection