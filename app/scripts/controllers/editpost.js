'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:EditpostCtrl
 * @description
 * # EditpostCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('EditpostCtrl', function (PostsResource, $routeParams, ngToast) {

    this.title = "Edit Client";
    this.button = "Update";
    this.btncolor = "btn-warning";

    this.post = PostsResource.get({
        id: $routeParams.id
    });

    this.savePost = function() {

      PostsResource.update(this.post,

          function(data) {

            ngToast.create({
              className: 'warning',
              content: '<i class="fa fa-check fa-2x"></i> ' + data.message
            });

          }

      );

    };

  });
