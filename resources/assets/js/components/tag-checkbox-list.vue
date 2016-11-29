<template>
	<div class="tag-lists">
		<div class="search-tag-list">
			<h3>検索結果</h3>
			<div class="search-tags">                
				<tag-checkbox v-for="tag in searchTags" :tag.sync="tag"></tag-checkbox>
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
    import {
        getFavTags
    } from '../api.js'
    import _ from 'lodash'

    export default {
        props: {
            searchTags: {
                required: true,
                type: Array,
            }
        },
        data() {
            return {
                favTags: [],
                fav: [],
                search: []
            }
        },
        methods: {
            wears: function() {
                this.favTags.forEach((tag) => {
                    this.fav.push(tag.id);
                })
                this.searchTags.forEach((tag) => {
                    this.search.push(tag.id);
                })
                let intersection = _.intersection(this.search, this.fav);
                if (intersection) {
                    intersection.forEach((section, index) => {
                        this.favTags.forEach((favtag, index) => {
                            if (favtag.id === section) {
                                this.favTags.$remove(favtag);
                            }
                        })
                    })
                    console.log(this.favTags);
                    // this.searchTags.forEach((search, index) => {
                    //     intersection.forEach((section, index) => {
                    //         if (search.id === section) {
                    //             this.favTags.push(search);
                    //         }
                    //     })
                    // })
                    // this.favTags.forEach((tag, index) => {
                    //     tag.check = true;
                    // })
                }
            }
        },
        created() {
            getFavTags().end((err, res) => {
                res.body.forEach((tag) => {
                    tag.check = true
                })
                this.$set('favTags', res.body);
                this.wears();

            });
        },
        watch: {
            'searchTags': function() {
                this.wears();
            }
        },
        events: {
            "change-check": function(tag) {
                if (tag.check) {
                    this.favTags.push(tag)
                } else {
                    this.favTags.$remove(tag)
                }
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
    
    .search-tag-list,
    .move-btns,
    .fav-tag-list {
        flex: 1;
    }
    
    .move-btns {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .btn-corver {
        margin: 20px;
    }
    
    .search-tags,
    .fav-tags {
        border: solid 1px;
        height: 300px;
        overflow-y: scroll;
    }
</style>