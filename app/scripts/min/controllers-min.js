var nonoControllers=angular.module("nonoControllers",[]);nonoControllers.controller("nonoJsonController",["$scope","$http",function(o,n){n.get("nono.json").then(function(n){o.myData=n.data.strips,console.log("$scope.myData: "+o.myData)})}]);