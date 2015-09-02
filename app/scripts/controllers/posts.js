'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:PostsCtrl
 * @description
 * # PostsCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('PostsCtrl', function (PostsResource, ngToast) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];

    this.all = PostsResource.query();

    ngToast.create('a toast message...');

    this.deletePost = function(id) {

      console.log(id);

      PostsResource.remove({
        id: id
      });


    };

  });