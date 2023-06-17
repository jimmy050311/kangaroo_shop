// 如同cli的main.js
import { createApp } from 'vue';

import App from './frontendApp.vue'

import router from './router/index.js'
import { createPinia } from 'pinia';

import $ from "jquery";


createApp(App).use(router).use(createPinia()).mount('#app')