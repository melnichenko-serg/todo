todoListApp.controller('LoginCtrl', function LoginCtrl($scope, $http, API_URL, $window) {

    $scope.login = function () {
        let data = {
            'email': $scope.loginData.email,
            'password': $scope.loginData.password,
        };

        $http.post(API_URL + 'login', data).then(function (response) {
            $window.location.href = '#!/home';
            // location.reload();
        }, function (response) {
            alert(response.statusText);
        });
    };

});