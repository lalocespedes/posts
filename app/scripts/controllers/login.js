'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
 .controller('LoginCtrl', function($scope, $location, $auth) {
      $scope.login = function() {
       $auth.login($scope.user)
         .then(function() {
           //ngToast.success('You have successfully signed in');
           //$location.path('/');
           console.log("hacer login");
           $scope.auth.isAuthenticated = true;
         })
         .catch(function(response) {
           //toastr.error(response.data.message, response.status);
         });
       };
  });
