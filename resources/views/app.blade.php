<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--1、 引入支持 Bootstrap 的 CSS 样式文件 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <router-link to="/books">書籍管理</router-link>
                <router-link to="/users">使用者管理</router-link>
                <router-link to="/mybooks">我的書櫃</router-link>
            </div>
        </div>
    </nav>
    <div class="container">
        <router-view></router-view>
    </div>
</div>

<!-- 2、引入支持Vue框架和Vue组件的app.js文件 -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
