var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {

    $scope.user = {
        value1 : "Male",
        value2 : "Female"
    };

    $scope.countries = ["Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", 
        "Argentina", "Armenia", "Aruba", "Australia", "Austria",
        "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina",
        "Botswana"];
    $scope.names = ['male', 'female'];
    $scope.my = { favorite: '' };
    $scope.showHideTest = false;

    $scope.show = function() {
        document.getElementById("showValues").style.display = "block";
    }
});