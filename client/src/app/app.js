import angular from 'angular'
import ngRoute from 'angular-route'
import uiRouter from 'angular-ui-router'

import 'admin-lte/dist/css/AdminLTE.min.css'
import 'admin-lte/bootstrap/css/bootstrap.min.css'

import loginModule from './modules/login/login.module'
import servicesModule from './services/services.module'

const MODULE_NAME = 'app'
const DEPENDENCIES = ['ui.router', 'ngRoute', loginModule, servicesModule];

angular
  .module(MODULE_NAME, DEPENDENCIES)
  .config(config)
  .run(function(authentication) {
    console.log(authentication);
  })

function config($locationProvider, $urlRouterProvider) {
  $locationProvider.html5Mode(true)
  $urlRouterProvider.otherwise('/login')
}

export default MODULE_NAME

