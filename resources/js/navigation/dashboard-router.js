import { createWebHistory, createRouter } from "vue-router";
import TestPage from '@/pages/TestPage.vue'
import DashboardHomePage from '@/pages/DashboardHomePage.vue'
import ListingCreatePage from '@/pages/ListingCreatePage.vue'
import ListingIndexPage from '@/pages/ListingIndexPage.vue'

const routes = [
  {
    path: "/dashboard",
    name: "dashboard-home",
    component: DashboardHomePage,
  },
  {
    path: "/dashboard/listings",
    name: "listings-index",
    component: ListingIndexPage,
  },
  {
    path: "/dashboard/listings/create",
    name: "listings-create",
    component: ListingCreatePage,
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