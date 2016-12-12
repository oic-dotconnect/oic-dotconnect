<template>    
    <h1 style="margin-bottom: 20px">お気に入りタグ登録</h1>
    <tag-search :result-tags.sync="resultTags"></tag-search>
    <tag-checkbox-list :search-tags="resultTags"></tag-checkbox-list>    
</template>

<script>
    import tagSearch from './tag-search.vue'
    import tagCheckboxList from './tag-checkbox-list.vue'
    export default {
        components: {
            tagSearch,
            tagCheckboxList
        },
        data() {
            return {
                resultTags: [],
            }
        },
    }
</script>