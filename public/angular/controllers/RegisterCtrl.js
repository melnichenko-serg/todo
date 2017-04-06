todoListApp.controller('RegisterCtrl', RegisterCtrl);

function RegisterCtrl($scope, $http, API_URL) {
    $scope.register = function () {
        let data = {
            'email': $scope.email,
            'password': $scope.password,
            'password_confirmation': $scope.password_confirmation
        };

        $http.post(API_URL + 'register', data).then(function (response) {
            location.reload();
        }, function (response) {
            alert(response.statusText);
        });
    };
}