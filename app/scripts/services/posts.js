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
          update: {method:"PUT"}
        }
    );
});
