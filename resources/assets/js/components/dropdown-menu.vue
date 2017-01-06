<template>
	<div class="menu" style="position:absolute">                  
		<slot></slot>
	</div>
</template>

<script>
import listener from '../listenerMixin.js'

export default {
	mixins:[listener.default],
	template: '#menu-template',
	created(){		
		this.listen(window, 'click', (e) => {
			if (!this.$el.contains(e.target)){
				this.$emit('close');
			}
		});
	}
}
</script>

<style>		
	.menu > .menu-item{
		display: block !important;		
	}	 
</style>