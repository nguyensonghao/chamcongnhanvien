
@extends('index')

@section('title')
    Danh sách công việc
@endsection

@section('content')

<div class="tab-menu">
    <ul>
        <li class ="@if (Request::segment(3) == 1) tab-active @endif">
            <a href="{{Asset('work/list/1')}}">Tất cả</a>
        </li>
        <li class ="@if (Request::segment(3) == 2) tab-active @endif">
            <a href="{{Asset('work/list/2')}}">Đã giao</a>
        </li>
        <li class ="@if (Request::segment(3) == 3) tab-active @endif">
            <a href="{{Asset('work/list/3')}}">Chưa giao</a>
        </li>
        <li class ="@if (Request::segment(3) == 4) tab-active @endif">
            <a href="{{Asset('work/list/4')}}">Hoàn thành</a>
        </li>
    </ul>
</div>
<div class="panel-heading panel-header" style="clear: both">
    <span class="glyphicon glyphicon-list"></span> Danh sách công việc
</div>

<div class="panel-body">

    @if (Session::get('result-delete-user') == 1)
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thông báo!</strong> xóa tài khoản thành công
        </div>
    @endif

    @if (Session::get('result-block-user') == 1)
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thông báo!</strong> khóa tài khoản thành công
        </div>
    @endif
    <table class="table table-responsive table-bordered table-hover">
        <thead>
            <th>#</th>
            <th>Người làm</th>
            <th>Tên</th>
            <th>Ngày bắt đầu</th>
            <th>Chi tiết</th>
            <th>Xóa</th>
            <th>Xem</th>
        </thead>

        <tbody>
            @foreach ($list_work as $key=>$value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->username }}</td>
                    <td>
                        {{ str_limit($value->name, $limit = 20, $end = '...') }}
                    </td>
                    <td>{{ $value->dateStart }}</td>
                    <td>
                        {{ str_limit($value->note, $limit = 45, $end = '...') }}
                    </td>
                    <td>
                        <a type="button" class="btn btn-danger btn-sm"
                        href="{{ Asset('work/delete').'/'.$value->workId }}">
                            <span class="glyphicon glyphicon-remove"></span> 
                            Xóa
                        </a>
                    </td>
                    <td>
                        <a type="button" class="btn btn-primary btn-sm"
                        href="{{ Asset('work/detail').'/'.$value->workId }}">
                            <span class="glyphicon glyphicon-ok"></span>
                            Xem
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection