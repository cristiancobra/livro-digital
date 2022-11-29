import axios from 'axios'

const instance = axios.create({
   // baseURL: 'http://localhost:8099/api',
   headers: {
      'X-Requested-With': 'XMLHttpRequest'
   },
   withCredentials: true
});

export default instance;