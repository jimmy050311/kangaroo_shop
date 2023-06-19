import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  // history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/manage/login",
      name: "login",
      component: () => import("../views/backend/Login.vue")
    },
    {
      path: "/manage/overview",
      name: "overview",
      component: () => import("../views/backend/Overview.vue")
    },
    {
      path: "/manage/admin",
      name: "admin",
      component: () => import("../views/backend/admin/Admin.vue")
    },
    {
      path: "/manage/user/create",
      name: "user_create",
      component: () => import("../views/backend/user/UserCreate.vue")
    },
    {
      path: "/manage/user/edit/:id",
      name: "user_edit",
      component: () => import("../views/backend/user/UserEdit.vue")
    },
    {
      path: "/manage/user",
      name: "user",
      component: () => import("../views/backend/user/User.vue")
    },
    {
      path: "/manage/product",
      name: "product",
      component: () => import("../views/backend/product/Product.vue")
    },
    {
      path: "/manage/product/category",
      name: "product_category",
      component: () => import("../views/backend/product/Category.vue")
    },
    {
      path: "/manage/product/create",
      name: "product_create",
      component: () => import("../views/backend/product/ProductCreate.vue")
    },
    {
      path: "/manage/product/edit/:id",
      name: "product_edit",
      component: () => import("../views/backend/product/ProductEdit.vue")
    },
    {
      path: "/manage/inventory",
      name: "inventory",
      component: () => import("../views/backend/inventory/Inventory.vue")
    },
    {
      path: "/manage/inventory/manage",
      name: "inventory_manage",
      component: () => import("../views/backend/inventory/InventoryManage.vue")
    },
    {
      path: "/manage/inventory/change",
      name: "inventory_change",
      component: () => import("../views/backend/inventory/InventoryChange.vue")
    },
    {
      path: "/manage/inventory/purchase",
      name: "inventory_purchase",
      component: () => import("../views/backend/inventory/InventoryPurchase.vue")
    },
    {
      path: "/manage/order",
      name: "order",
      component: () => import("../views/backend/order/Order.vue")
    },
    {
      path: "/manage/order/create",
      name: "order_create",
      component: () => import("../views/backend/order/OrderCreate.vue")
    },
    {
      path: "/manage/order/edit/:id",
      name: "order_edit",
      component: () => import("../views/backend/order/OrderEdit.vue")
    },
    {
      path: "/manage/contact",
      name: "contact",
      component: () => import("../views/backend/home/Contact.vue")
    },
  ],
});

export default router;
