<template>
	<div class="header-icon" v-cloak>
		<div style="position:relative">
		<div v-on:click.stop="showMenu = !showMenu">
			<slot name="icon"></slot>		
		</div>		
		<dropdown-menu v-if="showMenu"		
					v-on:close="showMenu = false">
				<slot name="menu" class="menu"></slot>
		</dropdown-menu>		
  	</div>				
</template>

<script>
import dropdownMenu from './dropdown-menu.vue'

export default {
	data() {
		return {
			showMenu: false
		}
	},
	components: {
		dropdownMenu
	}
}
</script>
