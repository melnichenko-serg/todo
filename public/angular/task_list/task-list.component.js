angular.module('taskList', [])
    .component('taskList', {
        templateUrl: 'public/angular/task_list/taskList.template.html',

        controller: function TaskController($scope, $http, API_URL) {

            $http.get(API_URL + 'api/v1/task').then(function successCallback(response) {
                console.log(response.data);
                $scope.tasks = response.data;
            }, function errorCallback(response) {

            });

            $scope.logout = function () {
                $http.post(API_URL + 'logout').then(function successCallback(response) {
                    // console.log(response);
                    location.reload();
                }, function errorCallback(response) {
                    console.log(response);
                });
            };
        }
    });