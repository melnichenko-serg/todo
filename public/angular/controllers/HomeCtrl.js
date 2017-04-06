todoListApp.controller('HomeCtrl', function HomeCtrl($scope, $http, API_URL, $window) {

    // console.log($scope);

    $http.get(API_URL + 'api/v1/init').then(function (response) {
        $scope.user = response.data;
    }, function errorCallback(response) {
        $window.location.href = '#!/login';
    });

    $http.get(API_URL + 'api/v1/task').then(function successCallback(response) {
        $scope.tasks = response.data;
    }, function errorCallback(response) {
        $window.location.href = '#!/login';
    });

    $scope.logout = function () {
        $http.post(API_URL + 'logout').then(function (response) {
            $window.location.href = '#!/login';
        }, function errorCallback(response) {
            console.log(response);
        });
    };

    $scope.newTask = function () {
        let data = {
            'text': $scope.text,
        };
        $http.post(API_URL + 'api/v1/task', data).then(function (response) {
            $scope.tasks.push(response.data);
            $scope.text = '';
        }, function (response) {
            alert(response.statusText);
        });
    };

    $scope.isComplete = function (taskId) {

        $http.put(API_URL + 'api/v1/task/' + taskId, {'is_complete': 1}).then(function (response) {
            console.log();
            // $window.location.href = '#!/login';
        }, function errorCallback(response) {
            console.log(response);
        });
    };

    $scope.delete = function (taskId) {

        $http.delete(API_URL + 'api/v1/task/' + taskId).then(function (response) {
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

});