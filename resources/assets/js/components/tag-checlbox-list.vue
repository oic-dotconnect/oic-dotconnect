<template>
	<div class="tag-list">
		<tag-checkbox v-for="tag in tags"></tag-checkbox>
	</div>
</template>

<script>
import TagCheckbox from './tag-checkbox.vue'

export default {
	data() {
		return {
			tags: [
				{
					id: 1,
					name: "Tag0"
				},
				{
					id: 2,
					name: "Tag1"
				},
				{
					id: 3,
					name: "Tag2"
				},
				{
					id: 4,
					name: "Tag3"
				},
				{
					id: 5,
					name: "Tag4"
				},
				{
					id: 6,
					name: "Tag5"
				},
				{
					id: 7,
					name: "Tag6"
				},
				{
					id: 8,
					name: "Tag7"
				},
				{
					id: 9,
					name: "Tag8"
				},
				{
					id: 10,
					name: "Tag9"
				}
			]
		}
	},
	watch: {
		tags(val, oldval) {
			this.tags
		}
	},
	components: {
		TagCheckbox
	}
}
</script>