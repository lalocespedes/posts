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

    var posts = this;

    posts.all = []
    posts.totalUsers = 0;
    posts.pageSize = 2; // this should match however many results your API puts on one page
    getResultsPage(1);

    posts.pagination = {
        current: 1
    };

    this.pageChanged = function(newPage) {
        getResultsPage(newPage);
    };

    function getResultsPage(pageNumber) {
            PostsResource.get(

                {
                    pageNumber: pageNumber,
                    pageSize: posts.pageSize,
                    query: posts.q

                },

                function(data) {
                  console.log(data);
                  posts.all = data.Items;
                  posts.totalUsers = data.Count;
                }
          );
    }

    //ngToast.create('a toast message...');

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

      //console.log(id);

    };

  })
.controller('tickets', function() {

  this.addticket = function() {

    console.log("enviado");

  };

});
