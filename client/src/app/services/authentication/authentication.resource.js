function AuthenticationResource($resource) {
  var API = 'http://localhost:3000'
  var url = API + '/login'
  return $resource(url, null, {
    login: {
      method: 'POST',
      params: {
        username: null,
        password: null
      }
    }
  });
}

function registerModule(app) {
  app.factory('authenticationResource', AuthenticationResource)
}

export default registerModule

