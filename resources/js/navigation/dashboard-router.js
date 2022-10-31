import { createWebHistory, createRouter } from "vue-router";
import TestPage from '@/pages/TestPage.vue'
import DashboardHomePage from '@/pages/DashboardHomePage.vue'
import ListingCreatePage from '@/pages/ListingCreatePage.vue'
import ListingIndexPage from '@/pages/ListingIndexPage.vue'
import ListingEditPage from '@/pages/ListingEditPage.vue'
import ListingShowPage from '@/pages/ListingShowPage.vue'

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
    path: "/dashboard/listings/:slug/edit",
    name: "listings-edit",
    component: ListingEditPage,
  },
  {
    path: "/dashboard/listings/:slug",
    name: "listings-show",
    component: ListingShowPage,
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
