'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:LogoutCtrl
 * @description
 * # LogoutCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('LogoutCtrl', function ($auth, $location) {

      if (!$auth.isAuthenticated()) { return; }
      $auth.logout()
      .then(function() {
          //toastr.info('You have been logged out');
          $location.path('/');
      });

  });
