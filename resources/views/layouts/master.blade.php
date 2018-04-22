<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="CSS/global.css" type="text/css" rel="stylesheet">
    <link href="CSS/@yield('css').css" type="text/css" rel="stylesheet">
    <script src="JS/jquery-3.2.1.min.js"></script>
    <script src="JS/global.js"></script>
    <script src="JS/@yield('js').js"></script>
</head>
<body>
@include('shared.header')

<div class="content">
    @section('content')
    @show
</div>

@include('shared.footer')
</body>
</html>