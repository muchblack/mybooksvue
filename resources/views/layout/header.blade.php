<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--1、 引入支持 Bootstrap 的 CSS 样式文件 -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb.css') }}" rel="stylesheet">


</head>
