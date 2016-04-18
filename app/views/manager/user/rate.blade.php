@extends('index')

@section('title')
	Đánh giá nhân viên
@endsection

@section('content')
	<div class="container col-md-12">
		<div class="col-md-6">
			<form style="width: 500px">
				<legend>Đánh giá nhân viên</legend>
			
				<div class="form-group">
					<label>Công việc : </label>
					<select class="form-control search_select_user" required="required">
						@foreach($listUser as $value) 
							<option value="$value->id">{{$value->username}}</option>
						@endforeach
					</select>
				</div>
			</form>
		</div>

		<div class="col-md-6">
			<a class="btn btn-primary btn_rate" style="margin-top: 76px">Đánh giá</a>
		</div>

		<div class="col-md-12 result-rating-work" style="padding: 0 !important; display: none">
			<div class="col-md-8">
				<li class="list-group-item bg-primary" style="border-radius: 0 !important">
					<span class="glyphicon glyphicon-menu-hamburger"></span>
					Danh sách công việc đã hoàn thành
				</li>
				<ul class="list-group list_work">

				</ul>
			</div>

			<div class="col-md-4">
				<p>Tổng số công việc hoàn thành <span class="number-work-perect"></span></p>
			</div>
			
		</div>
	</div>
	<script>
        $(document).ready(function () {
        	var list_work;
            $('.search_select_user').editableSelect({ effects: 'slide' });

            // Hàm load danh sách các công việc làm được của người dùng
            $('.btn_rate').click(function () {
            	var username = $('.search_select_user').val();
            	if (username == null || username == '') {
            		alert('Hãy chọn nhân viên cần đánh giá')
            	} else {
            		$.ajax({
            			url : 'get-user-rate',
            			type : 'post',
            			data : {username : username},
            			success : function (data) {
            				list_work = data;
            				$('.result-rating-work').css('display', 'block');
            				str = '';
            				$.each(data, function(key, value) {
            					str += '<li class="list-group-item">'
            						+'<span class="badge">14</span><i>'
            						+value.name+'</i></li>';
            				})
            				str += '<li class="list-group-item">'
            						+'<a class="btn btn-info btn-detail-rate btn-sm">'
            						+'<span class="glyphicon glyphicon-star-empty"></span> '
            						+'Chi tiết</a></li>';
            				$('.list_work').html(str);
            				// Hàm chi tiết đánh giá

							$('.btn-detail-rate').click(function () {
								if (list_work == null) {
									alert('Không có công việc nào để đánh giá')
								} else {									
									$('.number-work-perect').html(list_work.length);
								}
							}) 
            			}
            		})
            	}
            })


        })
    </script>
@endsection