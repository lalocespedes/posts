'use strict';

describe('Filter: clients', function () {

  // load the filter's module
  beforeEach(module('postsApp'));

  // initialize a new instance of the filter before each test
  var clients;
  beforeEach(inject(function ($filter) {
    clients = $filter('clients');
  }));

  it('should return the input prefixed with "clients filter:"', function () {
    var text = 'angularjs';
    expect(clients(text)).toBe('clients filter: ' + text);
  });

});
