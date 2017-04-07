let todoListApp = angular.module('todoList', ['ngRoute', 'ngMessages'])
    .config(router)
    .constant('API_URL', 'http://localhost:8000/');

function router($routeProvider) {
    $routeProvider
        .when('/home', {
            templateUrl: 'angular/templates/home.html',
            controller: 'HomeCtrl',
            controllerAs: 'home'
        })
        .when('/login', {
            templateUrl: 'angular/templates/login.html',
            controller: 'LoginCtrl',
            controllerAs: 'login'
        })
        .when('/register', {
            templateUrl: 'angular/templates/register.html',
            controller: 'RegisterCtrl',
            controllerAs: 'register'
        })
        .otherwise({
            templateUrl: 'angular/templates/home.html',
            controller: 'TaskCtrl'
        });
}

// todoListApp.controller('LoginCtrl', ['$scope', '$http', '$location', function ($scope, $http, $location) {
//     console.log($location.url());
//     console.log($location.path());
//     console.log($location.hash());
// }]);
// todoListApp.controller('TaskCtrl', function TaskController($scope, $http, $location) {
// console.log($location.url());
// $http.get(API_URL + 'api/v1/task').then(function successCallback(response) {
//     console.log(response.data);
//     $scope.tasks = response.data;
// }, function errorCallback(response) {
//
// });
// $scope.logout = function () {
//     $http.post(API_URL + 'logout').then(function successCallback(response) {
//         // console.log(response);
//         location.reload();
//     }, function errorCallback(response) {
//         console.log(response);
//     });
// };
// });
// todoListApp.controller('LoginCtrl', function LoginController($scope, $http, $location) {
//     $scope.login = function () {
//         let data = {
//             'email': $scope.loginData.email,
//             'password': $scope.loginData.password,
//         };
//         $http.post(API_URL + 'login', data).then(function successCallback(response) {
//             location.reload();
//         }, function errorCallback(response) {
//             alert(response.statusText);
//         });
//     };
// });
