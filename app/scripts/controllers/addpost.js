'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:AddpostCtrl
 * @description
 * # AddpostCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('AddpostCtrl', function (PostsResource, ngToast) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];

    this.title = "Add Post";
    this.button = "Save";
    this.btncolor = "btn-success";

    this.savePost = function() {

      PostsResource.save(this.post);

      ngToast.create('Post saved...');

      //window.location = "#/";

    };

  });
