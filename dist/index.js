
'use strict'

if (process.env.NODE_ENV === 'production') {
  module.exports = require('./social-auth.cjs.production.min.js')
} else {
  module.exports = require('./social-auth.cjs.development.js')
}
