import Vue from "vue";
import VueRouter from "vue-router";
import Layout from "@/views/layout.vue";
import Home from "@/views/Home.vue";
import Login from "@/views/Login.vue";
import Dashboard from "@/views/dashboard.vue";

import Register from "@/views/Register.vue";
import RegisterPhone from "@/views/phone_registration.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    component: Layout,
    children: [
      {
        path: "/",
        name:"home",
        component: Home,
      },
      {
        path: "/login",
        name: "login",
        component: Login,
      },
      {
        path: "/register",
        name: "Register",
        component: Register,
      },
      {
        path: "/registerPhone/:id",
        name: "RegisterPhone",
        component: RegisterPhone,
      },
    ],
  },

  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
  },
  {
    path: "/about",
    name: "About",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue"),
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
