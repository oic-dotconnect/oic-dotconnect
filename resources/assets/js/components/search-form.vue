<template>
    <div class="primary">
        <div class="inner">
            <event-search :search-event.sync="searchEvent"></event-search>
        </div>
    </div>
    <div class="secondary">
        <div class="inner">
            <div class="search-result">
                <div>
                    <div class="result-list">
                        <h2>検索結果</h2>
                        <event-item :event-list.sync="searchEvent" :refine.sync="refine" :sort.sync="sort"></event-item>
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
        </div>
    </div>
</template>

<script>
    import eventSearch from './event-search.vue'
    import eventItem from './event-item.vue'
    export default {
        components: {
            eventSearch,
            eventItem
        },
        data() {
            return {
                searchEvent: [],
                refine: '',
                sort: ''
            }
        },
    }
</script>