export default {
  template: require('./login.html'),
  controller: function(authentication, $state) {
    var $ctrl = this;
    $ctrl.login = (params) => {
      authentication.login(params).then((response) => {
        $state.go('projects')
      }, (error) => {
        console.log('error', error)
      })
    }
  }
}

