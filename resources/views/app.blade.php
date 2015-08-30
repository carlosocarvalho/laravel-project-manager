<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    @if(Config::get('app.debug'))
        <link rel="stylesheet" href="{{asset('build/css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('build/css/vendor/bootstrap-theme.min.css')}}">
    @else
        <link rel="stylesheet" href="{{  elixir('css/all.css') }}">
    @endif

</head>
<body>



@if(Config::get('app.debug'))
    <script src="{{asset('build/js/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('build/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('build/js/vendor/angular.min.js')}}"></script>
    <script src="{{asset('build/js/vendor/angular-route.min.js')}}"></script>
    <script src="{{asset('build/js/vendor/angular-animate.min.js')}}"></script>
    <script src="{{asset('build/js/vendor/angular-messages.min.js')}}"></script>
    <script src="{{asset('build/js/vendor/ui-bootstrap.min.js')}}"></script>
    <script src="{{asset('build/js/vendor/navbar.min.js')}}"></script>
@else
    <script src="{{ elixir('js/all.js') }}"></script>
@endif

</body>
</html>