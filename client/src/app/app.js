import angular from 'angular'
import ngRoute from 'angular-route'
import 'angular-ui-router'

import 'admin-lte/dist/css/AdminLTE.min.css'
import 'admin-lte/bootstrap/css/bootstrap.min.css'

import loginModule from './modules/login/login.module'
import projectsModule from './modules/projects/projects.module'
import servicesModule from './services/services.module'

const MODULE_NAME = 'app'
const DEPENDENCIES = [
  'ui.router',
  'ngRoute',
  loginModule,
  projectsModule,
  servicesModule
];

angular
  .module(MODULE_NAME, DEPENDENCIES)
  .config(config)
  .run((authentication, authenticationResource) => {
    authentication.setLoginMethod((params) => {
      return authenticationResource.login(params).$promise;
    })
  })

function config($locationProvider, $urlRouterProvider) {
  $locationProvider.html5Mode(true)
  $urlRouterProvider.otherwise('/login')
}

export default MODULE_NAME

