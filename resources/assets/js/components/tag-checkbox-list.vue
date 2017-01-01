<template>
	<div class="tag-lists">
		<div class="tag-list box" style="margin-bottom: 20px">
			<h2 class="box-title red">検索結果</h2>
			<div class="result-tags">                
				<tag-checkbox v-for="tag in searchTags" :tag.sync="tag"></tag-checkbox>
			</div>
		</div>
		<div class="tag-list box">
			<h2 class="box-title blue">お気に入りにするタグ</h2>
			<div class="fav-tags">
				<tag-checkbox v-for="tag in sortFavTags" :tag="tag" prefix="fav"></tag-checkbox>
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
                section: [],
            }
        },
        methods: {
            get_Favtag_Id: function(id) {
                let f
                f = this.favTags.find(function(favtag) {
                    return favtag.id === id
                })
                return f
            },
            get_Search_Id: function(id) {
                let s;
                s = this.searchTags.find(function(searchtag) {
                    return searchtag.id === id;
                })
                return s;
            },
            remove_Favtags: function(section) {
                var fav = []
                var search = []
                fav.length = 0;
                search.length = 0;
                this.favTags.forEach((tag) => {
                    fav.push(tag.id);
                })
                this.searchTags.forEach((tag) => {
                    search.push(tag.id);
                })
                section = _.intersection(search, fav);
                section.forEach((id, index) => {
                    let f = this.get_Favtag_Id(id);
                    if (f !== undefined) {
                        this.favTags.$remove(f);
                    }
                })
                this.$set('section', section)
                return section
            },
            add_Favtags: function(section) {
                section.forEach((id, index) => {
                    let s = this.get_Search_Id(id);
                    if (s !== undefined) {
                        var deep = _.cloneDeep(s);
                        deep.check = true
                        this.favTags.push(deep);
                        s.check = true;
                    }
                })
            },
        },
        created() {
            getFavTags().end((err, res) => {
                let fav = []
                res.body.forEach((tag) => {
                    let s = this.get_Search_Id(tag.id)
                    s.check = true
                })
                let sec = this.remove_Favtags(this.section);
                this.add_Favtags(sec);
            });
        },
        computed: {
            sortFavTags() {
                return this.favTags.sort((a, b) => {
                    return a.id > b.id? 1:-1
                });
            }
        },
        watch: {
            'searchTags': function() {
                let sec = this.remove_Favtags(this.section)
                this.add_Favtags(sec);
            }
        },
        events: {
            "change-check": function(tag) {
                if (tag.check) {
                    if (!this.get_Favtag_Id(tag.id)) {
                        this.favTags.push(tag);
                    }
                } else {
                    if (this.get_Favtag_Id(tag.id)) {
                        let f = this.get_Favtag_Id(tag.id)
                        this.favTags.$remove(f)
                    }
                }
            }
        },
        components: {
            TagCheckbox
        }
    }
</script>

<style scoped>
    .row {
        display: flex;
        flex-direction: row;
    }
    
    .fav-tags, .result-tags{
        margin-top: 20px;
    }
    
</style>