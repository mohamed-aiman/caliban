import { createWebHistory, createRouter } from "vue-router";
import TestPage from '@/pages/TestPage.vue'
import DashboardHomePage from '@/pages/DashboardHomePage.vue'

const routes = [
  {
    path: "/dashboard",
    name: "dashboard-home",
    component: DashboardHomePage,
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
