import angular from 'angular'
import resource from 'angular-resource'

import authenticationService from './authentication/authentication.service'
import authenticationResource from './authentication/authentication.resource'

const MODULE_NAME = 'app.services'
const DEPENDENCIES = ['ngResource'];

let module = angular.module(MODULE_NAME, DEPENDENCIES)

authenticationService(module)
authenticationResource(module)

export default MODULE_NAME

