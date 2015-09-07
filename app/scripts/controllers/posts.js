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

    var posts = this;

    posts.all = [];
    posts.totalUsers = 0;
    posts.pageSize = 2; // this should match however many results your API puts on one page
    posts.pagination = {
        current: 1
    };

    function getResultsPage(pageNumber) {
            PostsResource.get(

                {
                    pageNumber: pageNumber,
                    pageSize: posts.pageSize,
                    query: posts.q

                },

                function(data) {
                  posts.all = data.Items;
                  posts.pageSize = data.limit;
                  posts.totalUsers = data.Count;
                  posts.pagination.current = data.page;
                }
              );
    }

    getResultsPage(1);

    this.pageChanged = function(newPage) {
        getResultsPage(newPage);
    };

    this.deletePost = function(id) {

            //delete item
            PostsResource.remove(
              {
                id: id
              },
              function(data) {
                ngToast.create({
                  className: 'danger',
                  content: '<i class="fa fa-times fa-2x"></i> ' + data.message
                });
              }
            );

            getResultsPage(posts.pagination.current);

    };

    this.getclients = function() {

      getResultsPage();

    };

  });
