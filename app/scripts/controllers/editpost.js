'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:EditpostCtrl
 * @description
 * # EditpostCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('EditpostCtrl', function (PostsResource, $stateParams, ngToast) {

    this.title = "Edit Client";
    this.button = "Update";
    this.btncolor = "btn-warning";

    this.post = PostsResource.get({
        id: $stateParams.id
    });

    this.savePost = function() {

      PostsResource.update(this.post,

          function success(data) {

            ngToast.create({
              className: 'warning',
              content: '<i class="fa fa-check fa-2x"></i> ' + data.message
            });

          },
          function err(error) {

            angular.forEach(error.data.errors, function(value, key) {


              ngToast.create({
                className: 'danger',
                content: '<i class="fa fa-times fa-2x"></i> ' + value + key
              });


            });

          }

      );

    };

  });
