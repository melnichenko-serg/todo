<!doctype html>
<html lang="en" ng-app="todoList">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <script src="{{ asset('angular/libs/angular.js') }}" defer></script>
    <script src="{{ asset('angular/libs/angular-route.js') }}" defer></script>
    <script src="{{ asset('angular/libs/angular-messages.js') }}" defer></script>
    <script src="{{ asset('angular/app.js') }}" defer></script>
    <script src="{{ asset('angular/controllers/HomeCtrl.js') }}" defer></script>
    <script src="{{ asset('angular/controllers/LoginCtrl.js') }}" defer></script>
    <script src="{{ asset('angular/controllers/RegisterCtrl.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">
    <ng-view></ng-view>
</div>

</body>
</html>