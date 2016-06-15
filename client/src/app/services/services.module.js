import angular from 'angular'

import authenticationService from './authentication/authentication.service'

const MODULE_NAME = 'app.services'
const DEPENDENCIES = [];

let module = angular.module(MODULE_NAME, DEPENDENCIES)

authenticationService(module)

export default MODULE_NAME

