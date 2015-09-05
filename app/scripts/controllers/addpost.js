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

    this.title = "Add Client";
    this.button = "Save";
    this.btncolor = "btn-success";

    this.savePost = function() {

      PostsResource.save(this.post,

        function success(data) {

          ngToast.create({
            className: 'success',
            content: '<i class="fa fa-check fa-2x"></i> ' + data.message
          });

          window.location = "#/";

        },
        function err(error) {

          ngToast.create({
            className: 'danger',
            content: '<i class="fa fa-times fa-2x"></i> ' + error.data.message
          });

        }

      );

    };

  });
