import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/auth/LoginView.vue'
import BooksIndexView from '../views/books/BooksIndexView.vue'
import BooksShowView from '../views/books/BooksShowView.vue'
import AdminBooksIndexView from '../views/admin/books/AdminBooksIndexView.vue'
import AdminBooksShowView from '../views/admin/books/AdminBooksShowView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/books',
    name: 'booksIndex',
    component: BooksIndexView
  },
  {
    path: '/books/:id',
    name: 'booksShow',
    component: BooksShowView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/admin/books',
    name: 'adminBooksIndex',
    component: AdminBooksIndexView
  },
  {
    path: '/admin/books/:id',
    name: 'adminBooksShow',
    component: AdminBooksShowView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
