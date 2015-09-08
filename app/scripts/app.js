'use strict';

function skipIfLoggedIn($q, $auth) {
  var deferred = $q.defer();
  if ($auth.isAuthenticated()) {
    deferred.reject();
  } else {
    deferred.resolve();
  }
  return deferred.promise;
}

function loginRequired($q, $location, $auth) {
  var deferred = $q.defer();
  if ($auth.isAuthenticated()) {
      deferred.resolve();
    } else {
      $location.path('/login');
    }
    return deferred.promise;
}

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
    'angularUtils.directives.dirPagination',
    'angular-confirm'
  ])
  .config(function($stateProvider, $urlRouterProvider) {

    $stateProvider
      .state('private', {
        url: '',
        abstract: true,
        views: {
          'layout': {
            templateUrl: '/views/privateLayout.html'
          }
        }
      })
      .state('public', {
        url: '',
        abstract: true,
        views: {
          'layout': {
            templateUrl: '/views/publicLayout.html'
          }
        }
      })
      .state('public.login', {
        url: '/login',
        templateUrl: 'views/login.html',
        controller: 'LoginCtrl',
        controllerAs: 'login',
        resolve: {
          skipIfLoggedIn: skipIfLoggedIn
        }
      })
      .state('public.register', {
        url: '/register',
        templateUrl: 'views/register.html',
        controller: 'LoginCtrl',
        controllerAs: 'login',
        resolve: {
          skipIfLoggedIn: skipIfLoggedIn
        }
      })
      .state('private.logout', {
          url: '/logout',
          templateUrl: null,
          controller: "LogoutCtrl",
          resolve: {
             loginRequired: loginRequired
          }
      })
      .state('private.home', {
        url: '/',
        templateUrl: 'views/main.html',
        controller: 'PostsCtrl',
        controllerAs: 'posts',
        resolve: {
          loginRequired: loginRequired
        }
      })
      .state('private.addPost', {
        url: '/addPost',
        templateUrl: 'views/addpost.html',
        controller: 'AddpostCtrl',
        controllerAs: 'addPost',
        resolve: {
          loginRequired: loginRequired
        }
      })
      .state('private.about', {
        url: '/about',
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl',
        controllerAs: 'about',
        resolve: {
          loginRequired: loginRequired
        }
      })
      .state('private.editPost', {
        url: '/editPost/:id',
        templateUrl: 'views/addpost.html',
        controller: 'EditpostCtrl',
        controllerAs: 'addPost',
        resolve: {
           loginRequired: loginRequired
        }
      });
      $urlRouterProvider
      .otherwise('/');
      //.when('/editPost/:id', '/editPost/:id');

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
    $authProvider.signupUrl = '/api/auth/register';
    $authProvider.tokenName = 'token';
    $authProvider.tokenPrefix = 'postsApp';

    $authProvider.github({
      clientId: 'GitHub Client ID'
    });
  });
  // .config(function($httpProvider) {
  //
  //   $httpProvider.defaults.transformRequest = function (data) {
  //     if (data === undefined)
  //         return data;
  //     var clonedData = $.extend(true, {}, data);
  //     for (var property in clonedData)
  //         if (property.substr(0, 1) == '$')
  //             delete clonedData[property];
  //
  //     return $.param(clonedData);
  // };

  //});
