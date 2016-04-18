@extends('index')

@section('title')
	Tìm kiếm nhân viên
@endsection

@section('content')
	
	<div class="container col-md-12">
		<form action="{{Asset('user/search')}}" method="POST">
			<div class="input-group input-group-search">
		        <input class="form-search" PLACEHOLDER="Nhập thông tin người dùng cần tìm kiếm" name="key_search">
		        <span class="input-group-addon submit-span">Go!</span>
		    </div>
		</form>
		
		<div class="result-search">
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
				            <th>Tài khoản</th>
				            <th>Email</th>
				            <th>Tên đầy đủ</th>
				            <th>Trạng thái</th>
				            <th>Xóa</th>
				            <th>Khóa</th>
				        </thead>

				        <tbody>
				            @foreach (Session::get('resultSearch') as $key=>$value)
				                <tr>
				                    <td>{{ ++$key }}</td>
				                    <td>{{ $value->username }}</td>
				                    <td>{{ $value->email }}</td>
				                    <td>{{ $value->fullname }}</td>
				                    <td>
				                        @if ($value->status == 0)
				                            Offline
				                        @else 
				                            Online
				                        @endif
				                    </td>
				                    <td>
				                        <a type="button" class="btn btn-primary btn-sm"
				                        href="{{ Asset('user/delete').'/'.$value->id }}">
				                        	<span class="glyphicon glyphicon-remove"></span> 
				                            Xóa
				                        </a>
									<td>
									<td>
			                            <a type="button" class="btn btn-danger btn-sm"
			                            href="{{ Asset('user/block').'/'.$value->id }}">
			                            	<span class="glyphicon glyphicon-minus"></span> 
			                                Khóa
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