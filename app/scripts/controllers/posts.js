'use strict';

/**
 * @ngdoc function
 * @name postsApp.controller:PostsCtrl
 * @description
 * # PostsCtrl
 * Controller of the postsApp
 */
angular.module('postsApp')
  .controller('PostsCtrl', function (PostsResource, ngToast, confirm) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];

    this.all = PostsResource.query();

    ngToast.create('a toast message...');

    this.isCollapsed = false;

    this.deletePost = function(id) {

      confirm('Eliminar registro?').then(

          function() {

            //delete item
            PostsResource.remove({
              id: id
            });

          }
      );

      console.log(id);

    };

  })
.controller('tickets', function() {

  this.addticket = function() {

    console.log("enviado");

  };

});
