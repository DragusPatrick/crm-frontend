import Vue from 'vue'
import VueRouter from 'vue-router'

import Dash from '../views/dash/index.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Dash',
    component: Dash,
		meta: {
			title: 'Dashboard'
		}
  },
  {
    path: '/contacts',
    name: 'Contacts',
    meta: {
      auth: true,
			title: 'Contacts',
			href: 'contacts'
    },
    component: () => import(/* webpackChunkName: "contacts" */ '../views/contacts/index.vue')
  },
	{
		path: '/invoices',
		name: 'Invoices',
		meta: {
			auth: true,
			title: 'Invoices',
			href: 'invoices'
		},
		component: () => import(/* webpackChunkName: "invoices" */ '../views/invoices/index.vue')
	},
	{
    path: '/invoices/create',
    component: () => import(/* webpackChunkName: "invoices create" */ '../views/invoices/create.vue'),
    meta: {
			auth: true,
      title: 'Create Invoice',
			href: 'invoices'
    }
  },
	{
    path: '/invoices/:id',
    component: () => import(/* webpackChunkName: "invoices create" */ '../views/invoices/show.vue'),
    meta: {
			auth: true,
      title: 'View Invoice',
    }
  },
	{
		path: '/projects',
		name: 'Projects',
		meta: {
			auth: true,
			title: 'Projects',
			href: 'projects'
		},
		component: () => import(/* webpackChunkName: "projects" */ '../views/projects/index.vue')
	},
	{
		path: '/quotes',
		name: 'Quotes',
		meta: {
			auth: true,
			title: 'Quotes'
		},
		component: () => import(/* webpackChunkName: "quotes" */ '../views/quotes/index.vue')
	},
	{
		path: '/quotes/:id',
		name: 'Quote',
		meta: {
			auth: true,
			title: 'Quote'
		},
		component: () => import(/* webpackChunkName: "quotes" */ '../views/quotes/show.vue')
	},
	{
		path: '/customers',
		name: 'Customers',
		meta: {
			auth: true,
			title: 'Customers',
			href: 'customers'
		},
		component: () => import(/* webpackChunkName: "projects" */ '../views/customers/index.vue')
	},
	{
		path: '/customers/create',
		name: 'Customers Create',
		meta: {
			auth: true,
			title: 'Customers Create',
			href: 'customers'
		},
		component: () => import(/* webpackChunkName: "projects" */ '../views/customers/create.vue')
	},
	{
		path: '/customers/:id',
		name: 'Customers',
		meta: {
			auth: true,
			title: 'Customers',
			href: 'customers'
		},
		component: () => import(/* webpackChunkName: "projects" */ '../views/customers/show.vue')
	},
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "login" */ '../views/Login.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('user')

  if (to.matched.some(record => record.meta.auth) && !loggedIn) {
    next('/login')
    return
  }
  next()
})

export default router
