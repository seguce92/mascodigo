import axios from 'axios'
import CONFIG from './config'

window.config = CONFIG
export const http = axios.create({
    baseURL: CONFIG.domain,
})

window.axios = require('axios');

let token = document.head.querySelector('meta[name="csrf-token"]');

window.token = token.content
http.defaults.headers.common = {
    'X-CSRF-TOKEN': token.content,
    'X-Requested-With': 'XMLHttpRequest'
};

export default http