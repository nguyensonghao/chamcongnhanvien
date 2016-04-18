<div class="menu-vertical col-md-12">
    <ul class="list-group">
        <ul class="list-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel list-group-item">
                <div class="panel-heading" role="tab" id="headingOne" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <p class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-user"></i> Nhân viên
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </p>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <ul class="list-group list-group-small">
                            <li class="list-group-item">
                                <a href="{{Asset('user/list/1')}}">
                                    <span class="glyphicon glyphicon-th"></span>
                                    Danh sách nhân viên
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ Asset('user/add') }}">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Thêm nhân viên
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{Asset('user/search')}}">
                                    <span class="glyphicon glyphicon-search"></span>
                                    Tìm kiếm nhân viên
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{Asset('user/check/go')}}">
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    Điểm danh nhân viên
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel list-group-item">
                <div class="panel-heading" role="tab" id="headingTwo" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <p class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="fa fa-list"></i>
                            Công việc
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </p>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ul class="list-group list-group-small">
                            <li class="list-group-item">
                                <a href="{{Asset('work/list/1')}}">
                                    <span class="glyphicon glyphicon-th"></span>
                                    Danh sách công việc
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{Asset('work/add')}}">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    Thêm công việc
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{Asset('work/search')}}">
                                    <span class="glyphicon glyphicon-search"></span>
                                    Tìm kiếm công việc
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{Asset('work/update')}}">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Sửa công việc
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{Asset('work/give')}}">
                                    <span class="glyphicon glyphicon-send"></span>
                                    Giao công việc
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel list-group-item">
                <div class="panel-heading">
                    <p class="panel-title">
                        <a class="collapsed" href="{{Asset('work/rate')}}">
                            <i class="fa fa-bar-chart"></i>
                            Đánh giá công việc
                        </a>
                    </p>
                </div>                
            </div>           
        </ul>
    </ul>
</div>

<div class="empty col-md-12 button-group-setting">
    <div class="col-md-3"><i class="fa fa-cog"></i></div>
    <div class="col-md-3"><i class="fa fa-star"></i></div>
    <div class="col-md-3"><i class="fa fa-send-o"></i></div>
    <div class="col-md-3"><i class="fa fa-calendar"></i></div>
</div>
