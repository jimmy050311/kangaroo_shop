import { defineStore } from "pinia";

export const useAppSidebarMenuStore = defineStore({
  id: "appSidebarMenu",
  state: () => {
	return [
		{
			text: "",
			is_header: true,
		},
		{
			url: "/manage/overview",
			icon: "fa fa-lg fa-sitemap",
			title: "總覽",
		},
		{
			url: "",
			icon: "fa fa-lg fa-user-gear",
			title: "管理員管理",
			children:[
				{
					url: "/manage/admin",
					title: "管理員列表",
				}
			]
		},
		{
			url: "",
			icon: "fa fa-lg fa-user",
			title: "會員管理",
			children:[
				{
					url: "/manage/user/create",
					title: "建立會員表單",
				},
				{
					url: "/manage/user",
					title: "會員列表",
				},
			]
		},
		{
			url: "",
			icon: "fa fa-lg fa-bag-shopping",
			title: "商品管理",
			children:[
				{
					url: "/manage/product/category",
					title: "商品類別",
				},
				{
					url: "/manage/product",
					title: "商品列表",
				},
				{
					url: "/manage/product/create",
					title: "建立商品",
				},
			]
		},
		{
			url: "",
			icon: "fa fa-lg fa-warehouse",
			title: "庫存管理",
			children:[
				{
					url: "/manage/inventory",
					title: "庫存列表",
				},
				{
					url: "/manage/inventory/manage",
					title: "異動列表",
				},
				{
					url: "/manage/inventory/change",
					title: "建立異動單",
				},
				{
					url: "/manage/inventory/purchase",
					title: "建立進貨單",
				},
			]
		},
		{
			url: "",
			icon: "fa fa-lg fa-file-circle-plus",
			title: "訂單管理",
			children:[
				{
					url: "/manage/order",
					title: "訂單列表",
				},
				{
					url: "/manage/order/create",
					title: "新增訂單",
				},
			]
		},
		{
			url: "",
			icon: "fa fa-lg fa-phone",
			title: "聯絡我們",
			children:[
				{
					url: "/manage/contact",
					title: "客戶問題",
				},
			]
		},
		// {
		// 	url: "",
		// 	icon: "fa fa-lg fa-gear",
		// 	title: "前台管理",
		// 	children:[
		// 		{
		// 			url: "/banner",
		// 			title: "首頁輪播",
		// 		},
		// 	]
		// },
	];
  },
});