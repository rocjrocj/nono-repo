// JavaScript Document

angular
.module('myApp')
.factory('SwiperFactory', function () {

    /** Using this referring as SwiperFactory Controller **/
    var vm     = this;

    /** Triggers Swiper Script 
     *  Resolving only after swiper has been triggered **/
    function triggerSwiper(){
      return new Promise( function(resolve, reject){
        resolve({
            $(document).ready(function (){
                var swiper = new Swiper('.swiper-container',{
                direction           : 'horizontal',
                pagination          : '.swiper-pagination',
                paginationClickable : true
            })
        });

      }, function(error){
         console.log('Error while triggering Swiper');
      })

    }

    //Exposing triggerSwiper method
    return {
        triggerSwiper : triggerSwiper
    }
});