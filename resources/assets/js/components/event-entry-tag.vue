<template>
    <div>
        <h4>タグ</h4>
        <typeahead placeholder="例:php"
                    key=""
                    async="/api/candidacy_tags?q="
                    template-name="typeahead-github-template"
                    :template="customTemplate"
                    :value.sync="q"
                    :on-hit="tagClick">
        </typeahead>
        <p>選択したタグ</p>
        <div class="event-entry-tag-list">
            <div class="event-entry-tag" v-for="tag in tags">
                <span class="event-entry-tag-item" for="{{tag.name}}" @click="removeTag(tag.id)">
                    {{tag.name}}
                    <i class="fa fa-times" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div>
            <input type="hidden" name="tags[]" v-for="tag in tags" :value="tag.id">
        </div>
    </div>
</template>


<script>
    import {
        typeahead
    } from 'vue-strap'
    import tag from './tag.vue'
    import Vue from 'vue'
    import $ from 'jquery'

    typeahead.ready = function() {};
    typeahead.beforeCompile = function() {
        if (this.templateName && this.templateName !== 'default') {
            Vue.partial(this.templateName, this.template);
        }
    };
    export default {
        components: {
            typeahead: typeahead,
            tag
        },
        data() {
            return {
                customTemplate: '{{item.name}}',
                tags: [],
                //asynchronous: '{{item.formatted_address}}',
                q: ''
            }
        },
        methods: {
            tagAdd(item) {
                let t = this.tags.find((tag) => {
                    return tag.name === item.name
                })
                if (t === undefined) this.tags.push(item);
            },
            removeTag(id) {
                let result = this.tags.find((tag) => {
                    return tag.id === id
                })
                this.tags.$remove(result)
            },
            tagClick(items) {
                this.tagAdd(items)
                this.$children[0].reset();
                //window.open(items.html_url, '_blank')
            },
        },
    }
</script>

<style>
    .event-entry-tag-list {
        height: 70px;
    }
    
    .event-entry-tag {
        display: inline-block;
    }
    
    .event-entry-tag-item {
        margin: 10px 10px 20px 0;
        display: none;
        box-sizing: border-box;
        -webkit-transition: background-color 0.2s linear;
        transition: background-color 0.2s linear;
        position: relative;
        display: inline-block;
        padding: 12px 15px;
        border-radius: 8px;
        background-color: #f6f7f8;
        vertical-align: middle;
        cursor: pointer;
    }
    
    .event-entry-tag-item i {
        margin-left: 10px;
    }
    
    .dropdown-menu {
        position: absolute;
        display: flex;
        flex-direction: column;
        z-index: 2;
    }
    
    .dropdown-menu a {
        display: none;
        box-sizing: border-box;
        -webkit-transition: background-color 0.2s linear;
        transition: background-color 0.2s linear;
        position: relative;
        display: inline-block;
        padding: 10px 24px;
        background-color: #f6f7f8;
        vertical-align: middle;
        cursor: pointer;
    }
</style>