import Vue from 'vue'

import roomChoice from './components/room-choice.vue'
import tagSelect from './components/tag-select.vue'
import searchForm from './components/search-form.vue'
import tagChoice from './components/event-entry-tag.vue'
import imgShow from './components/img-show.vue'
import texteditor from './components/ckeditor.vue'
import HeaderIcon from './components/header-icon.vue'

const app = new Vue({
    el: 'body',
    data: {
        msg: 'hello'
    },
    components: {
        roomChoice,
        tagSelect,
        searchForm,
        tagChoice,
        imgShow,
        texteditor,
        HeaderIcon
    }
})