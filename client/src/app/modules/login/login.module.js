import angular from 'angular'

import login from './login.component'

const MODULE_NAME = 'app.login'
const DEPENDENCIES = ['ui.router', 'ngRoute']

angular
  .module(MODULE_NAME, DEPENDENCIES)
  .config(config)
  .component('login', login)

function config($routeProvider, $stateProvider) {
    $stateProvider.state('login', {
      url: '/login',
      template: '<login></login>'
    })
}

export default MODULE_NAME

