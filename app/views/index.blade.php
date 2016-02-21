<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <!--  library css !-->
    {{ HTML::style('libs/clockpicker/src/clockpicker.css') }}
    {{ HTML::style('libs/clockpicker/src/standalone.css') }}
    {{ HTML::style('libs/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('libs/bootstrap/css/icon.css') }}
    {{ HTML::style('libs/font/css/font-awesome.css') }}
    {{ HTML::style('libs/css/style.css') }}
    {{ HTML::style('libs/Filterable-Select-Box/source/jquery.editable-select.css') }}

    <!--  library javascript !-->
    {{ HTML::script('libs/bootstrap/js/jquery-2.1.3.min.js') }}
    {{ HTML::script('libs/bootstrap/js/bootstrap.js') }}
    {{ HTML::script('libs/Filterable-Select-Box/source/jquery.editable-select.js') }}
    {{ HTML::script('libs/js/time.js') }}
    {{ HTML::script('libs/clockpicker/src/clockpicker.js') }}
</head>
<body>
    <div class="content col-md-12">
        @include('template/module/nav')

        <div class="content-body row">

            @include('template/module/sub-menu')

            <div class="col-md-12">
                <div class="toolbar col-md-12">
                    <div class="button-toolbar col-md-6">
                        
                    </div>

                    <div class="search-toolbar col-md-6">
                        <div class="col-md-8 col-md-offset-4">
                            <i class="fa fa-calendar-times-o"></i><span id="date"></span>
                            <i class="fa fa-clock-o"></i><span id="time"></span>
                        </div>
                    </div>

                </div>
                <div class="panel col-md-12" style="padding-top: 0 !important">
                    @yield('content')
                </div>
            </div>
            
        </div>
    </div>
    
    @include('template/module/footer')
</body>
</html>