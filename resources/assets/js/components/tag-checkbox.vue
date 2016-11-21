<template>
	<div :class="{ checked : tag.check }">
		<input type="checkbox" v-model="tag.check" :id="prefix + 'tag' + tag.id" :value="tag.id"><label :for="prefix + 'tag' + tag.id">{{ tag.name }}</label>
	</div>
</template>

<script>
export default {
	props: { 
		tag: {}, 
		prefix: {
			default: ''
		} 
	},
	created() {
		this.$set( 'tag.check', false )
	}
}
</script>

<style scoped>
	input[type="checkbox"] {
		display: none;
	}

	label {
		display: block;
		width: 100%;
		padding: 2px 10px;
	}

	.checked {
		background-color: lightgreen;
	}
</style>