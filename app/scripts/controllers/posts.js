'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:PostsCtrl
 * @description
 * # PostsCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('PostsCtrl', function (PostsResource) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];

    this.all = PostsResource.query();

  });
