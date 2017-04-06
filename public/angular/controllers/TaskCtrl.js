todoListApp.controller('TaskCtrl', TaskCtrl);

function TaskCtrl($scope, $http, API_URL) {

    $http.get(API_URL + 'api/v1/task').then(function successCallback(response) {
        $scope.tasks = response.data;
    }, function errorCallback(response) {

    });

    $scope.logout = function () {
        $http.post(API_URL + 'logout').then(function successCallback(response) {
            location.reload();
        }, function errorCallback(response) {
            console.log(response);
        });
    };

    $scope.newTask = function () {
        let data = {
            'text': $scope.text,
        };
        $http.post(API_URL + 'api/v1/task', data).then(function(response) {
            location.reload();
        }, function (response) {
            alert(response.statusText);
        });
    };

    $scope.delete = function (taskId) {
        $http.delete(API_URL + 'api/v1/task/' + taskId)
        location.reload();
    }
}