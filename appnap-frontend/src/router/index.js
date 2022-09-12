import { createRouter, createWebHistory } from 'vue-router'
import NotFound from '../components/PageNotFound';

import PublicRoutes  from "@/views/auth/_routes";
import PublicLayout  from "@/views/auth/Layout";

//Auth Section
import PrivateRoutes  from "@/views/web/_routes";
import AuthLayout  from "@/views/web/Layout";
import Login from "@/views/auth/pages/Login";


const routes = [
  //========== Public Routes routing==========

  {
    path     : '/',
    component: PublicLayout,
    children : PublicRoutes
  },
  //========== Private Routes routing==========
  {
    path     : '/',
    component: AuthLayout,
    children : PrivateRoutes,
    meta     : {
      requireAuth: true,
    }
  },
  //==========404  routing==========
  {
    path: '/:pathMatch(.*)*',
    name     : 'Not Found',
    component: NotFound,
    meta     : {
      title: 'Not Found'
    }
  },

]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
