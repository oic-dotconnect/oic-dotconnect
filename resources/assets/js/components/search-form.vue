<template>
    <div class="box">    
        <h2 class="box-title red">検索条件</h2>   
        <event-search :search-event.sync="searchEvent" :title.sync="title" :tag.sync="tag"></event-search>       
    </div>
    <hr>
    <div class="row search-result">
        <div class="col result-list box">
            <h2 class="box-title yellow">検索結果</h2>
            <ul class="result-event-list">
                <event-item v-for="event in pagingEvent" :event="event"></event-item>
            </ul>
            <page-nav :page-num.sync="page" :length="changeEvent.length" :disp-item.sync="dispItem"></page-nav>
        </div>
        <!-- result-list -->
        <div class="col result-controle">
            <div class="refine box">                        
                <h2 class="box-title green">絞り込み</h2>
                <section class="refine-field">
                    <h4>分野</h4>
                    <div>
                        <input type="radio" name="field" id="field-it" value="it" v-model="refine"><label for="field-it">IT</label>
                        <input type="radio" name="field" id="field-game" value="game" v-model="refine"><label for="field-game">ゲーム</label>
                        <input type="radio" name="field" id="field-design" value="design" v-model="refine"><label for="field-design">デザイン</label><br>
                        <input type="radio" name="field" id="field-move" value="move" v-model="refine"><label for="field-move">映像</label>                        
                        <input type="radio" name="field" id="field-other" value="other" v-model="refine"><label for="field-other">その他</label>
                    </div>
                </section>                  
            </div>
            <!-- refine -->
            <div class="sort box">                            
                <h2 class="box-title blue">並び替え</h2>
                <div class="sorts">
                    <input type="radio" name="sort" id="sort-hold-near" value="near" v-model="sort"><label for="sort-hold-near">開催日が近い順</label><br>
                    <input type="radio" name="sort" id="sort-entry-new" value="new" v-model="sort"><label for="sort-entry-new">登録日が新しい順</label><br>
                    <input type="radio" name="sort" id="sort-entry-old" value="old" v-model="sort"><label for="sort-entry-old">登録日が古い順</label>
                </div>                                                        
            </div>
            <!-- sort -->
        </div>
        <!-- result-controle -->
    </div>    
    <!-- search-result -->
</template>

<style scoped>
    .search-result {
        margin-top: 50px;
    }

    .result-list {
        flex: 3;
    }

    .result-event-list {
        margin-top: 20px;
        height: 1000px;
    }

    .result-controle{
        margin-left: 30px;
    }

    .sorts{
        margin-top: 20px;
    }

    .refine{
        margin-bottom: 20px;
    }
</style>

<script>
    import eventSearch from './event-search.vue'
    import eventItem from './event-item.vue'
    import pageNav from './page-nav.vue'
    export default {
        components: {
            eventSearch,
            eventItem,
            pageNav
        },
        props: {
            title: '',
            tag: '',
        },
        data() {
            return {
                searchEvent: [],
                refine: '',
                sort: '',
                page: '0',
                dispItem: '3',
            }
        },
        computed: {
            changeEvent() {
                let change = [];
                let start = [];
                let finish = [];
                let self = this;

                if (this.refine) {
                    change = this.searchEvent.filter(function(event) {
                        return event.field === self.refine
                    })
                    console.log("1", this.searchEvent)
                } else {
                    change = this.searchEvent
                    console.log("2", this.searchEvent)
                }
                if (this.sort) {
                    change[0].created_at = "2016-11-03 17:19:19"
                    if (this.sort === 'near') {
                        let today = new Date();
                        today = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate()
                        change.forEach(function(val) {
                            var date = val.opening_date
                            if (date > today) {
                                start.push(val)
                            } else {
                                finish.push(val)
                            }
                        })
                        start.sort(function(val1, val2) {
                            var val1 = val1.opening_date;
                            var val2 = val2.opening_date;
                            if (val1 > val2) {
                                return 1;
                            } else {
                                return -1;
                            }
                        })
                        finish.sort(function(val1, val2) {
                            var val1 = val1.opening_date;
                            var val2 = val2.opening_date;
                            if (val1 < val2) {
                                return 1;
                            } else {
                                return -1;
                            }
                        })
                        change = start.concat(finish);
                        console.log("3", start, finish)
                    } else if (this.sort === 'new') {
                        change = change.sort(function(val1, val2) {
                            var val1 = val1.created_at;
                            var val2 = val2.created_at;
                            if (val1 < val2) {
                                return 1;
                            } else {
                                return -1;
                            }
                        })
                    } else {
                        change = change.sort(function(val1, val2) {
                            var val1 = val1.created_at;
                            var val2 = val2.created_at;
                            if (val1 > val2) {
                                return 1;
                            } else {
                                return -1;
                            }
                        })
                        console.log("computed", change)
                    }
                }

                return change
            },
            pagingEvent() {
                let pageEvents = []
                let change = this.changeEvent;
                let start = this.page * this.dispItem
                let finish = (this.page + 1) * this.dispItem
                    //console.log(start, finish)
                console.log("page", change)
                for (; start < finish; start++) {
                    if (start >= change.length) break;
                    pageEvents.push(change[start])
                        //console.log(change)
                }
                return pageEvents
            },
        },
    }
</script>