import { createRouter, createWebHistory } from 'vue-router'
import authModule from '../store/auth'
import { useToast } from 'vue-toastification' 

const toast = useToast()

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'main',
      component: () => import("../views/main/Index.vue")
    },
    {
      path: '/products',
      name: 'products.index',
      component: () => import("../views/product/Index.vue"),
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: () => import("../views/product/Show.vue")
    },
    {
      path: '/cart',
      name: 'cart.index',
      component: () => import("../views/cart/Index.vue")
    },
    {
      path: '/register',
      name: 'register.index',
      component: () => import("../views/auth/Register.vue"),
      meta: { guest: true }
    },
    {
      path: '/login',
      name: 'login.index',
      component: () => import("../views/auth/Login.vue"),
      meta: { guest: true }
    },
    {
      path: '/category/:id',
      name: 'category.index',
      component: () => import("../views/category/Index.vue")
    },
    {
      path: '/account',
      name: 'account.index',
      component: () => import("../views/account/Index.vue"),
      meta: { requiresAuth: true }
    },
    {
      path: '/wishlist',
      name: 'wishlist.index',
      component: () => import("../views/wishlist/Index.vue"),
      meta: { requiresVerification: true }
    },
    {
      path: '/contact',
      name: 'contact.index',
      component: () => import("../views/contact/Index.vue"),
    },
    {
      path: '/faq',
      name: 'faq.index',
      component: () => import("../views/faq/Index.vue"),
    },
  ],
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { top: 0 };
    }
  }
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (authModule.getters.isAuthenticated()) {
      next(); 
    } else {
      next({ name: 'login' });
    }
  } else if (to.matched.some(record => record.meta.guest)) {
    if (authModule.getters.isAuthenticated()) {
      next({ name: 'main' });
    } else {
      next(); 
    }
  } else if (to.matched.some(record => record.meta.requiresVerification)) {
    if (authModule.getters.isAuthenticated()) {
      if (!authModule.getters.isUserVerified()) {
        toast.info('Please verify your email (from your email box) to access this section.');
        next({ name: 'account.index' });
      } else {
        next();
      }
    } else {
      next({ name: 'login' });
    }
   } 
   else {
    next(); 
  }
});

export default router