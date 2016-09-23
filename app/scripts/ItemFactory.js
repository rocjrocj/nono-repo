// JavaScript Document

angular
.module('myApp')
.factory('ItemFactory', function ($http) {

    /** Using this referring as ItemFactory Controller **/
    var vm     = this;
    vm.API_URL = 'http://localhost/';

    /** Gets items from API based on jsonPath **/
    function getItems(jsonPath) {
        return $http.get(vm.API_URL + jsonPath
        ).then(function (response) {
            return (response);
        });
    }

    //Exposing getItems method
    return {
        getItems : getItems
    }
});