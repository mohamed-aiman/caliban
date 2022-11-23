import { createWebHistory, createRouter } from "vue-router";
import TestPage from '@/pages/TestPage.vue'
import HomePage from '@/pages/HomePage.vue'
import ProductPage from '@/pages/ProductPage.vue'
import SearchPage from '@/pages/SearchPage.vue'

const routes = [
  {
    path: "/",
    name: "home",
    component: HomePage,
  },
  {
    path: "/search",
    name: "search",
    component: SearchPage,
  },
  {
    path: "/products/:slug",
    name: "product",
    component: ProductPage,
  },
  {
    path: "/test",
    name: "test",
    component: TestPage,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
