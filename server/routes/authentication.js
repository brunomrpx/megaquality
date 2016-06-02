var express = require('express')
var User = require('../models/user.js')
var jwt = require('jsonwebtoken')
var config = require('../config.js')

function createLoginRoute() {
    var router = express.Router()
    router.post('/', function(req, res, next) {
        var conditions = {
            username: req.body.username,
            password: req.body.password
        }
        User.findOne(conditions, function(error, user) {
            if (error) return next(error)
            if (!user) {
                return res.status(400).json({
                    message: 'Invalid username or password'
                })
            }
            // authenticate user
            var token = jwt.sign(user, config.secret, {
                expiresIn: config.tokenExpiration
            })
            res.json({
                user: user,
                message: 'Authentication successfully',
                token: token
            })
        })
    })
    return router
}

module.exports.login = createLoginRoute()
