<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品管理アプリ</title>

{{--    <link href="http://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="{{asset("bower_components/admin-lte/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- adminLTE style -->
    <link href="{{asset("bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


    <script>
        $(function(){
            $(".btn-dell").click(function(){
                if(confirm("本当に削除しますか？")){
                    //そのままsubmit（削除）
                }else{
                    //cancel
                    return false;
                }
            });
        });
    </script>

    <link href="{{asset("css/app.css")}}" ref="stylesheet">

</head>
<body>
{{--    @include('layouts.header')--}}

<div class="wrapper">
<!-- end content -->
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">

            <!-- メニュー項目 -->
            <li id="item"><a href="{{route('items.index')}}">商品一覧</a></li>
            <li id="category"><a href={{route('categories.index')}}>カテゴリー一覧</a></li>

        </ul>
    </section>
</aside>

<div class="container">
    <header>
        <h1>@yield('title',"")</h1>
    </header>

    @yield('content')
</div>
</body>
</html>