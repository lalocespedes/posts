'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:EditpostCtrl
 * @description
 * # EditpostCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('EditpostCtrl', function (PostsResource, $routeParams) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];

    this.title = "Edit Post";
    this.button = "Update";
    this.btncolor = "btn-warning";

    this.post = PostsResource.get({
        id: $routeParams.id
    });

    this.updatePost = function() {

      console.log("update");

    };

  });
