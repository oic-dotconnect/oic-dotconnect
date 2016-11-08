import Vue from 'vue'
import tagCheckboxList from './components/tag-checlbox-list.vue'

const app = new Vue({
	el: 'body',
	data: {
		msg: 'hello'
	},
	components :{
		tagCheckboxList
	}
})
