var mongoose = require('mongoose')
var Schema = mongoose.Schema

var userSchema = new Schema({
  name: String,
  username: String,
  password: String,
})

userSchema.methods.toJSON = function() {
    // removing password field
    var object = this.toObject()
    delete object.password
    return object
}

module.exports = mongoose.model('User', userSchema)
