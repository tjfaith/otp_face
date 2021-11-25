import Vue from "vue";
import VueRouter from "vue-router";
import Layout from "@/views/layout.vue";
import Home from "@/views/Home.vue";
import Login from "@/views/Login.vue";

// Admin page
import Dashboard from "@/views/dashboard_layout.vue";
import Overview from "@/views/overview.vue";

// General page
import Register from "@/views/Register.vue";
import EmailVerification from "@/views/email_verification.vue";
import RegisterFace from "@/views/face_registration.vue";

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
        path: "/email_verification/:id",
        name: "RegisterPhone",
        component: EmailVerification,
      },
      {
        path: "/RegisterFace",
        name: "RegisterFace",
        component: RegisterFace,
      },
    ],
  },

  { 
    path: "/dashboard",
    component: Dashboard,
    children: [
      {
        path: "/dashboard",
        name:"overview",
        component: Overview,
      },
      
    ]
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
