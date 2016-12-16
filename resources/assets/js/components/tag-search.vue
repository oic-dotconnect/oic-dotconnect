<template>
    <div class="row search">
        <div class="mark">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="input">
            <input type="text" class="form-input" v-model="keyword">
            <input type="button" value="検索" class="search-button" @click="searchTag">
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
    margin: 0px 20px 20px 20px;
}

.mark {
    flex: 0.5;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 16px;
}

.input {
    margin-top: 0;
    flex: 8;
}

.form-input {
    width: 80%;
    /*margin-top: 20px;*/
    margin-left: 10px;
    padding: 5px 5px;
    font-size: 1.2rem;
    border-radius: 5px;
}

.search-button {
    border: 1px solid #DDD;
    border-radius: 5px;
    color: #FFF;
    padding: 6px;
    box-shadow: 2px 1px #0075A9;
    letter-spacing: 5px;
    Word-break: break-all;
    font-size: 1rem;
    width: 100px;
    background: #00A95F;
    width: 15%;
}
</style>