window._ = require('lodash');
/*try {
    window.$ = window.jQuery = require('jquery');
} catch (e) {}
*/
import httpPlugin from './http'

window.$http = httpPlugin