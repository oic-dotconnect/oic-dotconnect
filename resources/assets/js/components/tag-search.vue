<template>
    <div class="row search">
        <div class="mark">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="input">
            <input type="text" class="tagsubmit" v-model="keyword">
            <button type="button" class="search-button button" @click="searchTag">検索</button>
        </div>
    </div>
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

<style scoped>
    .search {
        margin-bottom: 20px;
    }
    
    .mark {
        display: inline-block;
        align-items: center;
        font-size: 16px;
    }
    
    .fa-search:before {
        vertical-align: middle;
        vertical-align: -webkit-baseline-middle;
    }
    
    .input {
        margin-top: 0;
        margin-left: 20px;
        flex: 8;
    }
    
    .input input {
        /*width: 80%;*/
        vertical-align: middle;
        padding: 5px 5px;
        font-size: 1.2rem;
        border-radius: 5px;
    }
    
    .search-button {
        background: #00A95F;
        width: 15%;
    }
</style>