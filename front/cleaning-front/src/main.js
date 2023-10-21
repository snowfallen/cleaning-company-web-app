import './assets/main.css'

import {createApp} from 'vue'
import App from './App.vue'
import router from './router'
import 'bootstrap/dist/css/bootstrap.css'
import axios from 'axios';
import store from "./store.js";
window.axios = axios;


const app = createApp(App)
app.use(router)
app.use(store)
app.mount('#app')
