'use strict';

/**
 * @ngdoc service
 * @name postsApp.confirm
 * @description
 * # confirm
 * Factory in the postsApp.
 */
angular.module('postsApp')
  .factory('confirm', function ($window, $q) {

    function confirm( message ) {

			var defer = $q.defer();

			if( $window.confirm( message )) {

				defer.resolve(true);

			} else {

				defer.reject(false);
			}

			return( defer.promise );
		}

		return(confirm);

  });
