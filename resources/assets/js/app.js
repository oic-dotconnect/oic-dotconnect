import Vue from 'vue'

import roomChoice from './components/room-choice.vue'
import tagSelect from './components/tag-select.vue'

const app = new Vue({
    el: 'body',
    data: {
        msg: 'hello'
    },
    components: {
        roomChoice,
        tagSelect
    }
})