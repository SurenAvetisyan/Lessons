var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $http.get("http://localhost:8000")
        .then(function(response) {
            $scope.myWelcome = response.data;
            console.log(response.data);


        });
    $scope.myImg = {
        "width" : "250px",
        "height" : "200px",
        "margin-top": "20px"
    };

});