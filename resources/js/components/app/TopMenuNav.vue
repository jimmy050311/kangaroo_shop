<script setup lang="ts">
import TopMenuNav from '../app/TopMenuNav.vue';

import { useRouter, RouterLink } from 'vue-router'
import { onMounted } from 'vue';

defineProps<{
  menu: {
  	icon: String,
  	text: String,
  	url: String,
  	highlight: Boolean,
  	children: Object
  };
}>();

function subIsActive(urls) {
	var currentRoute = useRouter().currentRoute.value.path;
	var match = false;
	
	for (var x = 0; x < urls.length; x++) {
		if (urls[x].url == currentRoute) {
			match = true;
		}
	}
	
	return match;
}
</script>
<template>
	<!-- menu with submenu -->
	<div v-if="menu.children" class="menu-item has-sub" v-bind:class="{ 'active': subIsActive(menu.children) }">
		<a class="menu-link">
			<span class="menu-icon" v-if="menu.icon">
				<i v-bind:class="menu.icon"></i>
				<span class="w-5px h-5px rounded-3 bg-theme position-absolute top-0 end-0 mt-3px me-3px" v-if="menu.highlight"></span>
			</span>
			<span class="menu-icon-img" v-if="menu.img">
				<img v-bind:src="menu.img" alt="" />
			</span>
			<span class="menu-text">
				{{ menu.title }}
				<span class="menu-label" v-if="menu.label">{{ menu.label }}</span>
			</span>
			<span class="menu-caret" v-if="menu.children"></span>
		</a>
		<div class="menu-submenu">
			<template v-for="(submenu, index) in menu.children">
				<top-menu-nav v-bind:menu="submenu"></top-menu-nav>
			</template>
		</div>
	</div>
  

</template>