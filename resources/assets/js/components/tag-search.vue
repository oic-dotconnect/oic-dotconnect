<template>
    <input type="search" v-model="keyword" @input="searchTag">
</template>

<script>
    import {
        getTags
    } from '../api.js'
    export default {
        props: {
            resultTags: {},
        },
        data() {
            return {
                keyword: '',
            }
        },
        methods: {
            searchTag() {
                getTags(this.keyword).end((err, res) => {
                    this.$set('resultTags', res.body);
                });
            },
        },
        created() {
            getTags(this.keyword).end((err, res) => {
                this.$set('resultTags', res.body);
            });
        }
    }
</script>