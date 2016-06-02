var express = require('express')
var router = express.Router()
var User = require('../models/user.js')

/* GET users listing. */
router.get('/', function(req, res, next) {
    User.find(function(error, users) {
        if (error) return next(error)
        res.json(users)
    })
})

module.exports = router
