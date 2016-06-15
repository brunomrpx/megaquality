import servicesModule from '../services.module'

describe("Authentication Service", () => {
  var authentication, $rootScope, $q;

  beforeEach(() => {
    angular.mock.module(servicesModule)
    angular.mock.inject((_authentication_, _$rootScope_, _$q_) => {
      authentication = _authentication_
      $rootScope = _$rootScope_
      $q = _$q_
    })
  })

  afterEach(() => {
    authentication.isAuthenticated = false;
  })

  it('should thrown an exception on try authenticate without set a custom authentication method', () => {
    expect(authenticateWithValidCredentials).toThrow()
  })

  it('should thrown an exception on try logout without set a custom logout method', () => {
    expect(authentication.logout).toThrow()
  })

  describe('with a custom authentication method', () => {
    var authenticationMethod;

    beforeEach(() => {
      authenticationMethod = createSimpleAuthenticationMethod();
      authentication.setLoginMethod(authenticationMethod)
    })

    it('should authenticate a user with correct credentials', () => {
      var authenticationCallbackFail = jasmine.createSpy('authenticationCallbackFail')
      var authenticationCallbackSuccess = jasmine.createSpy('authenticationCallbackSuccess')
      authenticateWithValidCredentials().then(authenticationCallbackSuccess, authenticationCallbackFail)
      $rootScope.$apply();
      expect(authenticationMethod).toHaveBeenCalled()
      expect(authenticationCallbackSuccess).toHaveBeenCalled()
      expect(authenticationCallbackFail).not.toHaveBeenCalled()
      expect(authentication.isAuthenticated).toBeTruthy()
    })

    it('should refuse authentication of a user with wrong credentials', () => {
      var authenticationCallbackFail = jasmine.createSpy('authenticationCallbackFail')
      var authenticationCallbackSuccess = jasmine.createSpy('authenticationCallbackSuccess')
      var params = { username: 'admin', password: '321' } // wrong credentials
      authentication.login(params).then(authenticationCallbackSuccess, authenticationCallbackFail)
      $rootScope.$apply();
      expect(authenticationMethod).toHaveBeenCalled()
      expect(authenticationCallbackFail).toHaveBeenCalled()
      expect(authenticationCallbackSuccess).not.toHaveBeenCalled()
      expect(authentication.isAuthenticated).toBeFalsy()
    })
  })

  describe('with a custom logout method', () => {
    var logoutMethod;

    beforeEach(() => {
      logoutMethod = jasmine.createSpy('logoutMethod');
      authentication.setLogoutMethod(logoutMethod)
      authentication.isAuthenticated = true;
    })

    it('should logout a user', () => {
      authentication.logout()
      $rootScope.$apply();
      expect(authentication.isAuthenticated).toBeFalsy()
    })
  })

  function authenticateWithValidCredentials() {
    var params = { username: 'admin', password: '123' }
    return authentication.login(params)
  }

  function createSimpleAuthenticationMethod() {
    var authenticationMethod = (params) => {
      var deferred = $q.defer();
      if (params.username === 'admin' && params.password == 123) {
        // create a identity
        deferred.resolve({ name: 'admin', role: 'administrator' })
      } else {
        deferred.reject()
      }
      return deferred.promise
    }
    return jasmine.createSpy('authenticationMethod', authenticationMethod).and.callThrough();
  }
})
