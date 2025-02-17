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
      component: () => import("../views/main/Index.vue"),
      meta: { title: 'Karte - Online E-Commerce shop' }
    },
    {
      path: '/products',
      name: 'products.index',
      component: () => import("../views/product/Index.vue"),
      meta: { title: 'Karte | Products' },
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: () => import("../views/product/Show.vue"),
      meta: { title: 'Karte - Online E-Commerce shop' },
    },
    {
      path: '/cart',
      name: 'cart.index',
      component: () => import("../views/cart/Index.vue"),
      meta: { title: 'Karte | Cart' }
    },
    {
      path: '/register',
      name: 'register.index',
      component: () => import("../views/auth/Register.vue"),
      meta: { guest: true, title: 'Karte | Registration' },
    },
    {
      path: '/login',
      name: 'login.index',
      component: () => import("../views/auth/Login.vue"),
      meta: { guest: true, title: 'Karte | Authorization' },
    },
    {
      path: '/category/:id',
      name: 'category.index',
      component: () => import("../views/category/Index.vue"),
      meta: { title: 'Karte - Online E-Commerce shop' },
    },
    {
      path: '/account',
      name: 'account.index',
      component: () => import("../views/account/Index.vue"),
      meta: { requiresAuth: true, title: 'Karte | Account' },
    },
    {
      path: '/wishlist',
      name: 'wishlist.index',
      component: () => import("../views/wishlist/Index.vue"),
      meta: { requiresVerification: true, title: 'Karte | Wishlist' },
    },
    {
      path: '/contact',
      name: 'contact.index',
      component: () => import("../views/contact/Index.vue"),
      meta: { title: 'Karte | Contact' }
    },
    {
      path: '/faq',
      name: 'faq.index',
      component: () => import("../views/faq/Index.vue"),
      meta: { title: 'Karte | Frequently Asked Questions' },
    },
    {
      path: '/aboutUs',
      name: 'aboutUs.index',
      component: () => import("../views/about_us/Index.vue"),
      meta: { title: 'Karte | About' },
    },
    {
      path: '/compare',
      name: 'compare.index',
      component: () => import("../views/compare/Index.vue"),
      meta: { title: 'Karte | Compare products' },
    },
    {
      path: '/:catchAll(.*)',
      name: 'notFound',
      component: () => import("../views/notFound/Index.vue"),
      meta: { title: 'Karte | Page Not Found' },
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
  document.title = to?.meta?.title || 'Karte - Online E-Commerce shop';

  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (authModule.getters.isAuthenticated()) {
      next(); 
    } else {
      toast.info('Please login to access this section.');
      next({ name: 'login.index' });
    }
  } else if (to.matched.some(record => record.meta.guest)) {
    if (authModule.getters.isAuthenticated()) {
      next({ name: 'main' });
    } else {
      next(); 
    }
  } else if (to.matched.some(record => record.meta.requiresVerification)) {
    if (authModule.getters.isAuthenticated) {
      if (!authModule.getters.isUserVerified) {
        toast.info('Please verify your email (from your email box) to access this section.');
        next({ name: 'account.index' });
      } else {
        next();
      }
    } else {
      toast.info('Please login to access this section.');
      next({ name: 'login.index' });
    }
   } 
   else {
    next(); 
  }
});

export default router