<template>        
    <tag-search :result-tags.sync="resultTags"></tag-search>
    <tag-checkbox-list :search-tags="resultTags" :user-code="userCode"></tag-checkbox-list>    
</template>

<script>
    import tagSearch from './tag-search.vue'
    import tagCheckboxList from './tag-checkbox-list.vue'
    export default {
        props: {
            userCode: {}
        },
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