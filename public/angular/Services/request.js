function get(request, $http) {
    $http.get(request).then(function (response) {
        return response;
    }).error(function (reason) {
        return reason;
    });
}

function post(request, $http, data) {
    $http.post(request, data).then(function (response) {
        return response;
    }).error(function (reason) {
        return reason;
    });
}