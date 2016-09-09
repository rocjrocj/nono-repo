// AngularJS Document
/*global angular:true */

var nono = angular.module('nono', [
  'ngRoute',
  'nonoControllers'
]);

nono.config(['$routeProvider', function ($routeProvider) {
    $routeProvider.
    when('/home', {
        templateUrl: '/index.html',
        controller: 'nonoContentsController'
    }).
    when('/chickendog', {
        templateUrl: '/chickendog/index.html',
        controller: 'nonoContentsController'
    }).
    when('/assumptions', {
        templateUrl: '/assumptions/index.html',
        controller: 'nonoContentsController'
    }).
    when('/likecatsanddogs', {
        templateUrl: '/likecatsanddogs/index.html',
        controller: 'nonoContentsController'
    }).
    otherwise({
        redirectTo: '/home',
        controller: 'nonoContentsController'
    });
}]);