'use strict';

angular.module('myApp.products', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/products', {
            templateUrl: 'products/products.html',

            controller: 'ProductsCtrl'
        });
    }])


    .filter('isArray', function() {
        return function(x) {
            var ok;
            for (var i = 0; i < x.length; i++) {

                if (Array.isArray(x)) {
                    ok =  x[0];
                } else {
                    ok =  x
                }

            }
            return ok;
        };
    })

    .filter('isObj', function() {
        return function(data) {


            var ok;

            if (typeof data == "object") {
                for(var value in data) {
                    ok =  data[value];
                }

            } else {
                ok =  data;

            }

            return ok;
        };
    })


    .controller('ProductsCtrl', function($scope, $http) {

        $http.get("data.json")
            .then(function(response) {
                $scope.myFavorite = response.data;

                $scope.productArray = $scope.myFavorite.data. products;

                $scope.dataProducts = []
                    ,$scope.currentPage = 1
                    ,$scope.numPerPage = 6
                    ,$scope.maxSize = 6;

                $scope.makeProducts = function() {
                    $scope.productss = [];

                    for (var i = 0; i < $scope.productArray.length; i++) {

                        $scope.productss.push({_id: $scope.productArray[i]._id, name:$scope.productArray[i].name,
                            price:$scope.productArray[i].price, main_picture:$scope.productArray[i].main_picture,
                            brand:$scope.productArray[i].brand, type:$scope.productArray[i].type,
                            sales_tax:$scope.productArray[i].sales_tax, color:$scope.productArray[i].color,
                            amount:$scope.productArray[i].amount, kind:$scope.productArray[i].kind,
                            monthly_price:$scope.productArray[i].monthly_price, available:$scope.productArray[i].available,
                            term_years:$scope.productArray[i].term_years, warranty_years:$scope.warranty_years });
                    }

                };  $scope.makeProducts();


                $scope.numPages = function () {
                    return Math.ceil($scope.productss.length / $scope.numPerPage);
                };

                $scope.$watch("currentPage + numPerPage", function() {
                    var begin = (($scope.currentPage - 1) * $scope.numPerPage)
                        , end = begin + $scope.numPerPage;

                    $scope.dataProducts = $scope.productss.slice(begin, end);
                    console.log($scope.dataProducts);
                });

            });

        $scope.firstProductImg = {
            "width" : "250px",
            "height" : "200px",
            "margin-top": "20px"
        };

        $scope.secondProductImg = {
            "width" : "500px",
            "height" : "500px",
            "margin-top": "20px"
        };

        $scope.showHide = function (id) {

            $scope.productDetailId = id;

        };

    });