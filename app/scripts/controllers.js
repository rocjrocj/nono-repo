// AngularJS NoNo Controllers
/*global angular:true */
/*global console:true */

var nonoControllers = angular.module('nonoControllers', []);

nonoControllers.controller('nonoJsonController', ['$scope', '$http', function ($scope, $http) {
    $http.get("nono.json").then(function(response) {
        $scope.myData = response.data.strips;
		console.log("$scope.myData: " + $scope.myData);
    });
}]);
