todoListApp.controller('HomeCtrl', function HomeCtrl($scope, $http, API_URL, $window, $filter) {

    $http.get(API_URL + 'api/v1/init').then(function (result) {
        $scope.user = result.data;
    }, function errorCallback(response) {
        $window.location.href = '#!/login';
    });

    $http.get(API_URL + 'api/v1/task').then(function (result) {
        $scope.tasks = result.data;
    }, function (response) {
        $window.location.href = '#!/login';
    });

    $scope.logout = function () {
        $http.post(API_URL + 'logout').then(function (result) {
            $window.location.href = '#!/login';
        }, function errorCallback(response) {
            console.log(response);
        });
    };

    $scope.newTask = function () {
        $http.post(API_URL + 'api/v1/task', {text: $scope.text}).then(function (result) {
                $scope.tasks.push(result.data);
                $scope.text = '';
            }, function (response) {
                alert(response.statusText);
            });
    };

    $scope.isComplete = function (taskId) {
        let data = {'is_complete': 1};

        $http.put(API_URL + 'api/v1/task-isActive/' + taskId, data).then(function (result) {
            for (let i = $scope.tasks.length; i--;) {
                if ($scope.tasks[i].id !== taskId) {
                    continue;
                }
                $scope.tasks.splice(i, 1);
            }
            $window.location.href = '#!/home';
        }, function errorCallback(response) {
            console.log(response);
        });
    };

    $scope.delete = function (taskId) {

        $http.delete(API_URL + 'api/v1/task/' + taskId).then(function (result) {
            for (let i = $scope.tasks.length; i--;) {
                if ($scope.tasks[i].id !== taskId) {
                    continue;
                }
                $scope.tasks.splice(i, 1);
            }
        }, function (reason) {
            alert(reason.statusText);
        });
    };

    $scope.sortBy = function (task) {
        return $filter('date');
    };

});

// function getNumList(scope, id) {
//     for (let i = scope.tasks.length; i--;) {
//         if (scope.tasks[i].id !== id) {
//             continue;
//         }
//         scope.tasks.splice(i, 1);
//     }
// }