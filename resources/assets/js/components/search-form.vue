<template>
    <div class="primary">
        <div class="inner">
            <event-search :search-event.sync="searchEvent" :title.sync="title" :tag.sync="tag"></event-search>
        </div>
    </div>
    <div class="secondary">
        <div class="inner">
            <div class="search-result">
                <div>
                    <div class="result-list">
                        <h2>検索結果</h2>
                        <ul>
                            <event-item v-for="event in pagingEvent" :event="event"></event-item>
                        </ul>
                    </div>
                    <!-- result-list -->
                    <div class="result-controle">
                        <div class="refine">                        
                            <h3>絞り込み条件</h3>                                                                   
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
                        <div class="sort">                            
                            <h3>並び替え</h3>
                            <div>
                                <input type="radio" name="sort" id="sort-hold-near" value="near" v-model="sort"><label for="sort-hold-near">開催日が近い順</label><br>
                                <input type="radio" name="sort" id="sort-entry-new" value="new" v-model="sort"><label for="sort-entry-new">登録日が新しい順</label><br>
                                <input type="radio" name="sort" id="sort-entry-old" value="old" v-model="sort"><label for="sort-entry-old">登録日が古い順</label>
                            </div>                                                        
                        </div>
                        <!-- sort -->
                    </div>
                    <!-- result-controle -->
                </div>
            </div>
            <!-- search-result -->
            <page-nav :page-num.sync="page" :length="changeEvent.length" :disp-item.sync="dispItem"></page-nav>
        </div>
    </div>
</template>

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