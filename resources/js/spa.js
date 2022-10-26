import './bootstrap';
// require('./bootstrap')
import { createApp } from 'vue';
// import Quill from "quill";
// import "quill/dist/quill.core.css";
// import "quill/dist/quill.bubble.css";
// import "quill/dist/quill.snow.css";
import App from '@/App.vue'
import router from '@/navigation/router';
// import store from "@/store";
// import Welcome from '@/Components/Welcome'

const app = createApp(App)
    // .use(store)
    .use(router);

// global component registration
// app.component('welcome', Welcome)

app.mount('#app');
