import { createRouter, createWebHistory } from "vue-router";
import { useAuthStore } from "@/stores/authStore";
import LoginView from "@/views/auth/LoginView.vue";
import RegisterView from "@/views/auth/RegisterView.vue";
import DashboardView from "@/views/dashboard/DashboardView.vue";
import ProfileView from "@/views/dashboard/profile/ProfileView.vue";
import HomeView from "@/views/HomeView.vue";
import MyBookView from "@/views/dashboard/profile/MyBookView.vue";
import CategoryView from "@/views/CategoryView.vue";
import BookDataView from "@/views/dashboard/book/BookDataView.vue";
import AddBookView from "@/views/dashboard/book/BookAddView.vue";
import AddCategoryView from "@/views/dashboard/category/CategoryAddView.vue";
import CategoryDetailTableView from "@/views/dashboard/category/CategoryDetailTableView.vue";
import BookDetailView from "@/views/dashboard/book/BookDetailView.vue";
import CategoryEditView from "@/views/dashboard/category/CategoryEditView.vue";
import BookEditView from "@/views/dashboard/book/BookEditView.vue";
import PublicCategoryDetailView from "@/views/dashboard/category/PublicCategoryDetailView.vue"; 
import ProfilEditView from "@/views/dashboard/profile/ProfileEditView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/login",
    name: "login",
    component: LoginView,
    meta: {
      isAuthTrue: true,
    },
  },
  {
    path: "/register",
    name: "register",
    component: RegisterView,
    meta: {
      isAuthTrue: true,
    },
  },
  {
    path: "/profile",
    name: "profile",
    component: ProfileView,
    meta: {
      isAuth: true, 
    },
  },
  {
    path: "/profile/edit",
    name: "profileedit",
    component: ProfilEditView,
    meta: {
      isAuth: true, 
    },
  },
  {
    path: '/mybook',
    name: 'mybook',
    component: MyBookView,
    meta: {
      isAuth: true, 
    },
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: DashboardView,
    meta: {
      isAuthFalse: true,
      isAdmin: true,
    },
  },
  {
    path: "/category",
    name: "category",
    component: CategoryView,
  },
  {
    path: "/category/:id",
    name: "tablecategorydetail",
    component: CategoryDetailTableView,
  },
  {
    path: "/categorydetail/:id",
    name: "publicCategoryDetail",
    component: PublicCategoryDetailView,
  },
  {
    path: "/category/:id/edit",
    name: "categoryedit",
    component: CategoryEditView,
    meta: {
      isAuthFalse: true,
      isAdmin: true, 
    },
  },
  {
    path: '/bookdata',
    name: 'bookdata',
    component: BookDataView,
    meta: {
      isAuthFalse: true,
      isAdmin: true, 
    },
  },
  {
    path: '/bookdata/:id',
    name: 'bookdetail',
    component: BookDetailView
  },
  {
    path: '/bookdata/:id/edit',
    name: 'bookedit',
    component: BookEditView,
    meta: {
      isAuthFalse: true,
      isAdmin: true, 
    },
  },
  {
    path: '/addbook',
    name: 'addbook',
    component: AddBookView,
    meta: {
      isAuthFalse: true,
      isAdmin: true, 
    },
  },
  {
    path: '/addcategory',
    name: 'addcategory',
    component: AddCategoryView,
    meta: {
      isAuthFalse: true,
      isAdmin: true, 
    },
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach(async (to) => {
  const authStore = useAuthStore();
  if (to.meta.isAuthTrue && authStore.tokenUser) {
    alert("You are already loged in now");
    return { name: "home" };
  }
  if (to.meta.isAuthFalse && !authStore.tokenUser) {
    alert("You are not allowed to access this page");
    return { name: "home" };
  }
  if (to.meta.isAuth && !authStore.tokenUser) {
    alert("Please login");
    return { name: "login" };
  }
  if (to.meta.isAdmin && authStore.currentUser.role.name === "user") {
    alert("You are not allowed to access this page");
    return { name: "home" };
  }
});

export default router;
