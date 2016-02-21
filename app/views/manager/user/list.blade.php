
@extends('index')

@section('title')
    Danh sách nhân viên
@endsection

@section('content')


<div class="tab-menu">
    <ul>
        <li class ="@if (Request::segment(3) == 1) tab-active @endif">
            <a href="{{Asset('user/list/1')}}">Đang hoạt động</a>
        </li>
        <li class ="@if (Request::segment(3) == 2) tab-active @endif">
            <a href="{{Asset('user/list/2')}}">Bị khóa</a>
        </li>
    </ul>
</div>

<div class="panel-heading panel-header" style="clear: both">
    <span class="glyphicon glyphicon-list"></span> Danh sách người dùng
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

    @if (Session::get('result-unblock-user') == 1)
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thông báo!</strong> bỏ khóa tài khoản thành công
        </div>
    @endif
    
    @if (count($listUser) == 0)
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thông báo!</strong> không có người dùng nào
        </div>

        @if (Request::segment(3) == 1)
            <hr>
            <a href="{{Asset('user/add')}}" class="btn btn-primary">Thêm nhân viên</a>
        @endif
    @else

    <table class="table table-responsive table-bordered">
        <thead>
            <th>#</th>
            <th>Tài khoản</th>
            <th>Email</th>
            <th>Tên đầy đủ</th>
            <th>Chức vụ</th>
            <th>Xóa</th>
            @if (Request::segment(3) == 1) 
            <th>Khóa</th>
            @endif

            @if (Request::segment(3) == 3) 
            <th>Mở khóa</th>
            @endif
        </thead>

        <tbody>
            @foreach ($listUser as $key=>$value)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->fullname }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        <a type="button" class="btn btn-primary btn-sm"
                        href="{{ Asset('user/delete').'/'.$value->id }}">
                            <span class="glyphicon glyphicon-remove"></span> 
                            Xóa
                        </a>
                    </td>

                    @if (Request::segment(3) == 1) 
                    <th>
                        <a type="button" class="btn btn-danger btn-sm"
                        href="{{ Asset('user/block').'/'.$value->id }}">
                            <span class="glyphicon glyphicon-minus"></span> 
                            Khóa
                        </a>
                    </th>
                    @endif

                    @if (Request::segment(3) == 2) 
                    <th>
                        <a type="button" class="btn btn-danger btn-sm"
                        href="{{ Asset('user/unblock').'/'.$value->id }}">
                            <span class="glyphicon glyphicon-plus"></span>
                            Bỏ khóa
                        </a>
                    </th>
                    @endif
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @endif
</div>

@endsection