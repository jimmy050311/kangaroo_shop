import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia'
import App from './backApp.vue';
import router from './router'

const app = createApp(App)
app.use(createPinia())
app.use(router)

app.mount('#app')