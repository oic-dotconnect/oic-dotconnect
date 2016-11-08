<template>
	<div>
		<input type="checkbox" v-model="tag.check"><span>{{ tag.name }}</span>
	</div>
</template>

<script>
export default {
	props: [ 'tag' ]
}
</script>