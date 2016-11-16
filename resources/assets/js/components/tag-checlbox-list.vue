<template>
	<div class="tag-lists">
		<div class="search-tag-list">
			<h3>検索結果</h3>
			<div class="search-tags">
				<tag-checkbox v-for="tag in searchTags" :tag="tag"></tag-checkbox>
			</div>
		</div>
		<div class="move-btns">
			<div class="btns">
				<div class="btn-corver">
					<button @click="clickRightBtn" :disabled="checkedSearchTags.length === 0"><i class="fa fa-arrow-right fa-2x" aria-hidden="true" ></i></button>
				</div>
				<div class="btn-corver">
					<button @click="clickLeftBtn" :disabled="checkedFavTags.length === 0"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
		<div class="fav-tag-list">
			<h3>お気に入りにするタグ</h3>
			<div class="fav-tags">
				<tag-checkbox v-for="tag in favTags" :tag="tag" prefix="fav"></tag-checkbox>
			</div>
		</div>
		<div>
			<input type="hidden" v-for="tag in favTags" name="tags[]" :value="tag.id">
		</div>
	</div>
</template>

<script>
import TagCheckbox from './tag-checkbox.vue'
import _ from 'lodash'

export default {
	data() {
		return {
			favTags:[],
			searchTags: [
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
	methods: {
		clickRightBtn() {
			this.addFavTags(this.checkedSearchTags)
		},
		clickLeftBtn() {
			this.removeFavTags(this.checkedFavTags)
		},
		addFavTags(tags) {
			let concatArray = _.concat(this.favTags, _.cloneDeep(tags) ) 
			let uniqueArray = _.uniqBy( concatArray, 'id' ) 
			let favTags = _.forEach( uniqueArray, ( tag ) => { tag.check = false } )
			this.$set('favTags', favTags ) 
			this.resetSelect()
		},
		removeFavTags(tags) {
			tags.forEach( ( tag ) => {
				this.favTags.$remove(tag)
			})
			this.resetSelect()
		},
		resetSelect() {
			this.favTags.forEach( ( tag ) => { tag.check = false }  )
			this.searchTags.forEach( ( tag ) => { tag.check = false }  )
		}
	},
	computed: {
		checkedSearchTags() {
			return this.searchTags.filter(( tag ) => {
				return tag.check
			})
		},
		checkedFavTags() {
			return this.favTags.filter(( tag ) => {
				return tag.check
			})
		}
	},
	components: {
		TagCheckbox
	}
}
</script>

<style scoped>
.tag-lists {
	display: flex;
}

.search-tag-list, .move-btns, .fav-tag-list {
	flex: 1;
}

.move-btns {
	display: flex;
	justify-content: center;
	align-items: center; 
}

.btn-corver {
	margin : 20px;
}

.search-tags, .fav-tags {
	border: solid 1px;
	height: 300px;
	overflow-y: scroll;
} 
</style>