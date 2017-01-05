<template>
    <div class="search">
        <form action="">
            <h2>タイトル</h2>
            <input type="text" v-model="title">
            <h2>タグ</h2>
            <input type="text" v-model="tag">
            <h2>開催日</h2>
            <input type="date" v-model="start">~<input type="date" v-model="end">
            <div class="search-btn">
                <button type="button" class="button blue" @click="search">検索</button>
            </div>
        </form>
    </div>
</template>

<script>
    import {
        getEvent
    } from '../api.js'
    export default {
        props: {
            searchEvent: {},
            _title: {},
            _tag: {},
        },
        data() {
            return {
                title: '',
                tag: '',
                start: '',
                end: '',
            }
        },
        methods: {
            search() {
                getEvent(this.title, this.tag, this.start, this.end).end((err, res) => {
                    this.$set('searchEvent', res.body)
                })
            }
        },
        created() {
            this.$set('title', this._title)
            this.$set('tag', this._tag)
            getEvent(this.title, this.tag, this.start, this.end).end((err, res) => {
                this.$set('searchEvent', res.body)
            })
        }
    }
</script>