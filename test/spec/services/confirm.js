'use strict';

describe('Service: confirm', function () {

  // load the service's module
  beforeEach(module('postsApp'));

  // instantiate service
  var confirm;
  beforeEach(inject(function (_confirm_) {
    confirm = _confirm_;
  }));

  it('should do something', function () {
    expect(!!confirm).toBe(true);
  });

});
