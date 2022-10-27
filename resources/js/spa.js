import './bootstrap';
// require('./bootstrap')
import { createApp, provide } from 'vue';
// import Quill from "quill";
// import "quill/dist/quill.core.css";
// import "quill/dist/quill.bubble.css";
// import "quill/dist/quill.snow.css";
import App from '@/App.vue'
import router from '@/navigation/router';
import store from "@/store";
import Vue3Progress from "vue3-progress";

const Vue3ProgressOptions = {
  position: "fixed",
  height: "5px",
  color: "orange",
};

const app = createApp(App)
    .use(Vue3Progress, Vue3ProgressOptions)
    .use(store)
    .use(router);

// app.provide('progressBar', app.config.globalProperties.$progress)
window.progressBar = app.config.globalProperties.$progress

app.mount('#app');

