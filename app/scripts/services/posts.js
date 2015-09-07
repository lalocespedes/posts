'use strict';

/**
 * @ngdoc service
 * @name postsApp.posts
 * @description
 * # posts
 * Service in the postsApp.
 */
angular.module('postsApp')
  .service('PostsResource', function ($resource) {

    return $resource("http://localhost:9000/api/clients/:id",
        {
          id:"@id"
        },
         //{ query:  {method: 'GET', isArray: false }},
        {
          // save: {
          //   method: 'POST',
          //   url: 'http://localhost:9000/api/clients/',
          //   headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          // },
          update: {
            method:"PUT"
          }
        }
    );
});
