angular.module("myApp").factory("ItemFactory",function(t){function n(n){return t.get(r.API_URL+n).then(function(t){return t})}var r=this;return r.API_URL="http://localhost/",{getItems:n}});