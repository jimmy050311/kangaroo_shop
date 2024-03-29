<script setup lang="ts">
    import { getCurrentInstance, onMounted, ref} from 'vue';
    import { RouterLink, RouterView } from 'vue-router';
    import { useAppOptionStore } from './stores/app-option';
    import { ProgressFinisher, useProgress } from '@marcoschulte/vue3-progress';
    import AppSidebar from './components/app/Sidebar.vue';
    import AppHeader from './components/app/Header.vue';
    import AppFooter from './components/app/Footer.vue';
    import router from './router';
	import { NConfigProvider, createLocale } from 'naive-ui'
	import { zhTW, dateZhTW } from 'naive-ui'

    
    const appOption = useAppOptionStore();
    const internalInstance = getCurrentInstance();
    
    const progresses = [] as ProgressFinisher[];
    
    router.beforeEach(async (to, from) => {
    	progresses.push(useProgress().start());
    	appOption.appSidebarMobileToggled = false;
    	document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    })
    router.afterEach(async (to, from) => {
    	progresses.pop()?.finish();
    })
	const locale = createLocale(
    	{
    	  Input: {
    	    placeholder: ''
    	  }
    	},
    	zhTW
  	)
	const themeOverrides = {
		common: {
	    },
	    Select: {
	      peers: {
	        InternalSelection: {
				borderRadius: '5px',
				border: '1px solid rgb(206, 212, 218)',
				borderFocus: '#67abe9',
				borderHover: '#67abe9',
				caretColor: '#67abe9',
				borderActive: '1px solid #67abe9',
				boxShadowActive: '0 0 0 4px rgba(52, 143, 226, 0.3)',
				boxShadowFocus: '0 0 0 4px rgba(52, 143, 226, 0.3)',
				colorDisabled: 'rgba(233,236,239, 1)',
				countTextColorDisabled: 'rgba(0, 0, 0, 1)',
				textColorDisabled: 'rgba(0, 0, 0, 1)',
	        }
	      }
	    },
		Input: {

			borderRadius: '5px',
			border: '1px solid rgb(206, 212, 218)',
			borderDisabled: '1px solid rgb(206, 212, 218)',
			borderFocus: '1px solid #67abe9',
			borderHover: '1px solid #67abe9',
			caretColor: '#67abe9',
			borderActive: '1px solid #67abe9',
			boxShadowActive: '0 0 0 4px rgba(52, 143, 226, 0.3)',
			boxShadowFocus: '0 0 0 4px rgba(52, 143, 226, 0.3)',
			colorDisabled: 'rgba(233,236,239, 1)',
			// countTextColorDisabled: 'rgba(0, 0, 0, 1)',
			textColorDisabled: 'rgba(0, 0, 0, 1)',
		} 	
	}

</script>

<style>
    .n-upload-file--image-card-type {
        width: 300px !important;
        height: 300px !important;
    }

    .n-upload-trigger--image-card {
        width: 300px !important;
        height: 300px !important;
    }

    .n-upload-file-list.n-upload-file-list--grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, 300px) !important;
        grid-gap: 8px;
        margin-top: 0;
    }

	.n-tree .n-tree-node-content {
		min-height: 40px;
	}

	.n-tree .n-tree-node-switcher {
		height: 40px;
	}
	.n-select .n-base-selection{
		--n-border: 3px;
		height: 30px !important;
	}

	.v-select .vs__dropdown-toggle {
		padding: 0.35rem 0.35rem !important;
	}

</style>

<template>
	<div class="app" v-bind:class="{ 
		'app-header-menu-search-toggled': appOption.appHeaderSearchToggled,
		'app-header-fixed': appOption.appHeaderFixed,
		'app-sidebar-fixed': appOption.appSidebarFixed,
		'app-sidebar-collapsed': appOption.appSidebarCollapsed,
		'app-sidebar-mobile-toggled': appOption.appSidebarMobileToggled,
		'app-sidebar-mobile-closed': appOption.appSidebarMobileClosed,
		'app-sidebar-end-toggled': appOption.appSidebarEndToggled,
		'app-sidebar-end-mobile-toggled': appOption.appSidebarEndMobileToggled,
		'app-content-full-height': appOption.appContentFullHeight,
		'app-content-full-width': appOption.appSidebarHide,
		'app-without-sidebar': appOption.appSidebarHide,
		'app-with-end-sidebar': appOption.appSidebarEnd,
		'app-with-wide-sidebar': appOption.appSidebarWide,
		'app-with-light-sidebar': appOption.appSidebarLight,
		'app-with-hover-sidebar': appOption.appSidebarHover,
		'app-with-top-menu': appOption.appTopMenu,
		'app-with-two-sidebar': appOption.appSidebarTwo,
		'pt-0': appOption.appHeaderHide,
		'app-footer-fixed': appOption.appFooterFixed,
		'app-sidebar-minified': appOption.appSidebarMinified,
	}">
		<vue3-progress-bar />
		<app-header v-if="!appOption.appHeaderHide" />
		<app-sidebar v-if="!appOption.appSidebarHide" />
		<div class="app-content" v-bind:class="appOption.appContentClass">
			<n-config-provider :theme-overrides="themeOverrides" :locale="locale" :date-locale="dateZhTW">
				<router-view></router-view>
			</n-config-provider>
		</div>
		<app-footer v-if="appOption.appFooter" />
	</div>
</template>
