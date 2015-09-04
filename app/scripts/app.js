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
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl',
        controllerAs: 'about'
      })
      .when('/addPost', {
        templateUrl: 'views/addpost.html',
        controller: 'AddpostCtrl',
        controllerAs: 'addPost'
      })
      .when('/editPost/:id', {
        templateUrl: 'views/addpost.html',
        controller: 'EditpostCtrl',
        controllerAs: 'addPost'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
  .config(function($stateProvider) {

    $stateProvider.state('tickets', {}); //termina state

  })
  .config(['ngToastProvider', function(ngToastProvider) {
      ngToastProvider.configure({
        animation: 'slide', // or 'fade'
        verticalPosition: 'bottom',
        horizontalPosition: 'center'

      });
  }]);
