// AngularJS NoNo Controllers
/*global angular:true */
/*global console:true */

var nonoControllers = angular.module('nonoControllers', []);

nonoControllers.controller('nonoJsonController', ['$scope', '$http', function ($scope, $http) {
    $http.get("nono.json").then(function(response) {
		//$scope.strip = '';
		//$scope.strips = [];
		
		
            $scope.swiper = {};
            $scope.next = function() {
                $scope.swiper.slideNext();
            };
            $scope.onReadySwiper = function(swiper) {
                console.log('onReadySwiper');
                swiper.on('slideChangeStart', function() {
                    console.log('slideChangeStart');
                });
            };
			

        $scope.strips = response.data.strips;
		console.log("$scope.strips: ", $scope.strips);
		
		$scope.arrStrips = [];
		
		
		
		$scope.getSlides = function(n){
			
			var range = [];
			for(var i = 0; i < n; i++) {
			  range.push(i);
			}
			//$scope.range = range;
			return range;



			//console.log("gotSlides");
			//console.log("n: " + n);
			
     		//return new Array(n);
		};
    });
}]);

var nonoDirectives = angular.module('nonoDirectives', []);

nonoDirectives.directive("swiperDirective", [function() {
  return {
    restrict: "A",
    link: function(scope, element, attrs) {
      element.addClass("test");
      
      var mySwiper = element.swiper({
        mode:"horizontal",
        loop: true
      });
      
    }
  }
}]);