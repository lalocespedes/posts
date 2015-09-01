'use strict';

/**
 * @ngdoc service
 * @name postsApp.posts
 * @description
 * # posts
 * Service in the postsApp.
 */
angular.module('postsApp')
  .factory('PostsResource', function ($resource) {

    return $resource("http://jsonplaceholder.typicode.com/posts/:id", {id: "@id"})
});
