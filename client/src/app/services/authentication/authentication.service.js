function AuthenticationService($q) {
  var _loginMethod, _logoutMethod;

  return {
    isAuthenticated: false,
    login: login,
    setLoginMethod: setLoginMethod,
    setLogoutMethod: setLogoutMethod,
    logout: logout
  }

  function setLogoutMethod(logoutMethod) {
    _logoutMethod = logoutMethod
    return this
  }

  function logout() {
    if (!_logoutMethod) {
      throw Error('Logout method is not defined')
    }
    return $q.when(_logoutMethod).then((response) => {
      this.isAuthenticated = false
      return response
    })
  }

  function setLoginMethod(loginMethod) {
    _loginMethod = loginMethod
    return this
  }

  function login(params) {
    if (!_loginMethod) {
      throw Error('Login method is not defined')
    }
    return $q.when(_loginMethod(params)).then((response) => {
      this.isAuthenticated = true
      return response
    })
  }
}

function registerModule(app) {
  app.factory('authentication', AuthenticationService)
}

export default registerModule

