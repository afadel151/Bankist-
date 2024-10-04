import axios from 'axios';
window.axios = axios;
import AOS from 'aos'
import 'aos/dist/aos.css'

AOS.init();
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
