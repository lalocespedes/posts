'use strict';

/**
 * @ngdoc overview
 * @name postsApp
 * @description
 * # postsApp
 *
 * Main module of the application.
 */
angular
  .module('postsApp', [
    'satellizer',
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch',
    'ngToast',
    'angular-loading-bar',
    'ui.bootstrap',
    'ui.router',
    'angularUtils.directives.dirPagination'
  ])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'PostsCtrl',
        controllerAs: 'posts'
        // resolve: {
        //   loginRequired: loginRequired
        // }
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl',
        controllerAs: 'about'
        // resolve: {
        //   loginRequired: loginRequired
        // }
      })
      .when('/addPost', {
        templateUrl: 'views/addpost.html',
        controller: 'AddpostCtrl',
        controllerAs: 'addPost'
        // resolve: {
        //   loginRequired: loginRequired
        // }
      })
      .when('/editPost/:id', {
        templateUrl: 'views/addpost.html',
        controller: 'EditpostCtrl',
        controllerAs: 'addPost'
        // resolve: {
        //   loginRequired: loginRequired
        // }
      });
      // .otherwise({
      //   redirectTo: '/'
      // });
  })
  .config(function($stateProvider) {

    $stateProvider
      .state('login', {
        url: '/login',
        templateUrl: 'views/login.html',
        controller: 'LoginCtrl',
        controllerAs: 'login'
        // resolve: {
        //   skipIfLoggedIn: skipIfLoggedIn
        // }
      }); //termina state

  })
  .config(['ngToastProvider', function(ngToastProvider) {
      ngToastProvider.configure({
        animation: 'slide', // or 'fade'
        verticalPosition: 'bottom',
        horizontalPosition: 'center'

      });
  }])
  .config(function($authProvider) {

    $authProvider.loginUrl = '/api/auth/login';
    $authProvider.signupUrl = '/api/auth/signup';
    $authProvider.tokenName = 'token';
    $authProvider.tokenPrefix = 'postsApp';

    $authProvider.github({
      clientId: 'GitHub Client ID'
    });

  });

  // function skipIfLoggedIn($q, $auth) {
  //   var deferred = $q.defer();
  //   if ($auth.isAuthenticated()) {
  //     deferred.reject();
  //   } else {
  //     deferred.resolve();
  //   }
  //   return deferred.promise;
  // }
  //
  // function loginRequired($q, $location, $auth) {
  //   var deferred = $q.defer();
  //   if ($auth.isAuthenticated()) {
  //       deferred.resolve();
  //     } else {
  //       $location.path('/login');
  //     }
  //     return deferred.promise;
  // }
