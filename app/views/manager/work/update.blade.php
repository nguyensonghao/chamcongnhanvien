@extends('index')

@section('title')
	Chỉnh sửa công việc
@endsection

@section('content')
	<div class="container col-md-5">
		<form>
			<legend>Giao công việc</legend>
		
			<div class="form-group">
				<label>Công việc : </label>
				<select class="form-control search_select_work" required="required">
					@foreach($list_work as $value) 
						<option value="$value->workId">{{$value->name}}</option>
					@endforeach
				</select>
				<hr>
				<a class="btn btn-primary btn_chooce">
					<span class="glyphicon glyphicon-eye-open"></span> 
					Hiển thị
				</a>
			</div>
		</form>
	</div>

	<div class="update-work col-md-7">
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
        
		<form action="{{Asset('work/update')}}" method="POST">
			<legend>Chi tiết công việc</legend>
			
			<input type="hidden" name="workId" required>
			<div class="form-group">
				<label >Tên công việc</label>
				<textarea name="name"class="form-control" rows="3" required>
					
				</textarea>
			</div>

			<div class="form-group">
				<label >Nội dung công việc</label>
				<textarea name="note" class="form-control" rows="3" required>
					
				</textarea>
			</div>

			<div class="form-group">
				<label >Người được giao</label>
				<input type="text" class="form-control" name="username" readonly>
			</div>

			<div class="form-group">
				<label >Ngày bắt đầu</label>
				<input type="text" class="form-control" name="date" readonly>
			</div>
		
			<button type="submit" class="btn btn-primary btn-sm">
				<span class="glyphicon glyphicon-pencil"></span> 
				Sửa
			</button>
			<button type="reset" class="btn btn-danger btn-sm">
				<span class="glyphicon glyphicon-refresh"></span> 
				Làm mới
			</button>
		</form>
	</div>
	<script>
        $(document).ready(function () {
            $('.search_select_work').editableSelect({ effects: 'slide' });

            // Hàm load người dùng khi chọn select box
            $('.btn_chooce').click(function () {
            	var work_name = $('.search_select_work').val();
            	if (work_name == null || work_name == '') {
            		alert('Hãy chọn công việc')
            	} else {
            		$.ajax({
            			url : 'get-work',
            			type : 'post',
            			data : {work_name : work_name},
            			success : function (data) {
            				$('input[name="workId"]').val(data.workId);
            				$('textarea[name="name"]').val(data.name);
            				$('textarea[name="note"]').val(data.note);
            				$('input[name="date"]').val(data.dateStart);
            				if (data.status == 0) {
            					$('input[name="username"]').val('Chưa giao công việc cho ai');
            				} else if (data.status == 1) {
            					$('input[name="username"]').val(data.username)
            				}
            			}
            		})
            	}
            })
        })
    </script>
@endsection