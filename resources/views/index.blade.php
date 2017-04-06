<!doctype html>
<html lang="en" ng-app="todoList">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <script src="{{ asset('angular/libs/angular.js') }}" defer></script>
    <script src="{{ asset('angular/libs/angular-route.js') }}" defer></script>
    <script src="{{ asset('angular/app.js') }}" defer></script>
    <script src="{{ asset('angular/controllers/TaskCtrl.js') }}" defer></script>
    <script src="{{ asset('angular/controllers/LoginCtrl.js') }}" defer></script>
    <script src="{{ asset('angular/controllers/RegisterCtrl.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

<ng-view></ng-view>

<div class="container">
    @if(Auth::check())
        <div ng-controller="TaskCtrl">
            <div class="row">
                <div class="user-info">
                    <h4 class="pull-left">Hello: {{ Auth::user()->email }}</h4>
                    <button ng-click="logout()" class="btn btn-primary">Logout</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <form name="taskForm" class="col-md-4">
                    <div class="form-group">
                        <textarea name="text" ng-model="text" placeholder="Text" class="form-control" rows="10" autofocus></textarea>
                    </div>
                    <button ng-click="newTask()" class="btn btn-default form-control">New task</button>
                </form>
                <div class="col-md-8">
                    <ul>
                        <li ng-repeat="task in tasks" class="item-task">
                            <p class="jumbotron"><span ng-bind="task.text"></span></p>
                            <button ng-click="delete(task.id)" class="btn btn-danger btn-lg">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @else
        <hr>
        <div ng-controller="LoginCtrl">
            <div class="row">
                <form name="loginForm" class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <input type="email" name="email" ng-model="loginData.email" placeholder="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" ng-model="loginData.password" placeholder="password" class="form-control">
                    </div>
                    <button ng-click="login()" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
        <hr>
        <div ng-controller="RegisterCtrl">
            <div class="row">
                <form name="registerForm" class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <input type="email" name="email" ng-model="email" placeholder="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" ng-model="password" placeholder="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" ng-model="password_confirmation" placeholder="confirm password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" ng-click="register()">Register</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

</body>
</html>