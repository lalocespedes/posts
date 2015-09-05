'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
 .controller('LoginCtrl', function($auth, $location) {

        var vm = this;

        this.login = function(){

            $auth.login({
                email: vm.email,
                password: vm.password
            })
            .then(function(){
                $location.path("/");
            })
            .catch(function(response){
                console.log(response);
            });
        };
  });
