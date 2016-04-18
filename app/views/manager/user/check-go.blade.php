{{ HTML::style('libs/css/check-go.css') }}
@extends('index')

@section('title')
	Điểm danh nhân viên
@endsection

@section('content')
	
	<div class="container col-md-12">
		<div class="menu-tab-check">
			<ul>
				<li class="menu-tab-check-active">
					<a>Điểm danh đến</a>
				</li>
				<li>
					<a href="{{Asset('user/check/back')}}">Điểm danh nghỉ</a>
				</li>
				<li>
					<span class="glyphicon glyphicon-time"></span> 
					Vào=>08:00 / Nghỉ=>17:30
				</li>
			</ul>
		</div>

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


		<div class="table-responsive" style="clear: both">
			<table class="table table-hover">
				<thead class="bg-primary">
					<tr>
						<th>#</th>
						<th>Tài khoản</th>
						<th>Chức vụ</th>
						<th>Thời gian</th>
						<th>Điểm danh</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($listUser as $key => $value)
					<tr>
						<td class="check-screen-td">{{ ++$key }}</td>
						<td class="check-screen-td">{{ $value->username }}</td>
						<td class="check-screen-td">{{ $value->name }}</td>
						<td>
							<div class="input-group clockpicker clock-{{$value->id}}">
							    <input type="text" class="form-control" value="08:00">
							    <span class="input-group-addon">
							        <span class="glyphicon glyphicon-time"></span>
							    </span>
							</div>
						</td>
						<td>
							<a class="btn btn-danger btn-sm" 
							onclick="check({{$value->id}})">
								<span class="glyphicon glyphicon-ok"></span> 
								Điểm danh
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				<?php echo $listUser->links() ?>
			</table>
		</div>
		<script>
			$(document).ready(function () {
				$('.clockpicker').clockpicker({
					donetext : 'Chọn',
					autoclose: true
				});
			})

			function check (id) {
				var time = $('.clock-'+id+' > input').val();
				if (time == null || time == '') {
					alert('Hãy điền giờ vào làm việc của công nhân trước')
				} else {
					$.ajax({
						url : 'go',
						type : 'POST',
						data : {userId : id, time : time},
						success : function (result) {
							console.log(result.flag);
							var flag = result.flag;
							if (flag == -1) {
								alert('Hãy điền giờ vào làm việc của công nhân trước')
							} else if (flag == -2) {
								alert('Thời gian đã quá hạn');
							} else if (flag == -3) {
								alert('Lỗi cơ sở dữ liệu');
							} else if (flag == -4) {
								alert('Người này đã điểm danh rồi');
							} else {
								alert('Điểm danh thành công');
							}
						}
					})
				}
			}
		</script>
	</div>

@endsection