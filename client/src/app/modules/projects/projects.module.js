import angular from 'angular'

import projects from './projects.component'

const MODULE_NAME = 'app.projects'
const DEPENDENCIES = ['ui.router', 'ngRoute']

angular
  .module(MODULE_NAME, DEPENDENCIES)
  .config(config)
  .component('projects', projects)

function config($routeProvider, $stateProvider) {
    $stateProvider.state('projects', {
      url: '/projects',
      template: '<projects></projects>'
    })
}

export default MODULE_NAME

