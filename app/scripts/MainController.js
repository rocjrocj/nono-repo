// JavaScript Document

angular
.module('myApp')
.controller('MainController', MainController);

function MainController($scope, ItemFactory, SwiperFactory) {

   var vm    = this;
   //Initializing slides as an empty array
   vm.slides = [];

   /** Gets called as soon as the Controller is called **/
   getData('main.json');

   function getData(path){
      ItemFactory.getItems(path).then( function(response){

        //If response is not empty
        if (response) {
           //Assigning fetched items to vm.items
           vm.slides = response.data;
        }

        //Calling triggerSwiper after we ensured fetching item data
        SwiperFactory.triggerSwiper();

        //Callig $scope.$apply() to reflect correctly the changes in the view
        $scope.$apply();
      })
   };

}