import axios from 'axios'

export const service = axios.create({
  baseURL: '/',
  timeout: 10000, // Request timeout
})

window.axios = require('axios');

let token = document.head.querySelector('meta[name="csrf-token"]');

window.token = token.content
service.defaults.headers.common = {
  'X-CSRF-TOKEN': token.content,
  'X-Requested-With': 'XMLHttpRequest'
};

service.interceptors.response.use(
  response => {
    if (response.headers.authorization) {
      setToken(response.headers.authorization);
      response.data.token = response.headers.authorization;
    }

    return response.data;
  },
  error => {
    let message = error.message;
    if (error.response.data && error.response.data.errors) {
      message = error.response.data.errors;
    } else if (error.response.data && error.response.data.error) {
      message = error.response.data.error;
    }
    
    return Promise.reject(error);
  },
);

export default service