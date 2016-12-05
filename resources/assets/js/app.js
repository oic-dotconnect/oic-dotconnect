import Vue from 'vue'
import tagCheckboxList from './components/tag-checlbox-list.vue'
import roomChoice from './components/room-choice.vue'

const app = new Vue({
	el: 'body',
	data: {
		msg: 'hello'
	},
	components :{
		tagCheckboxList,
		roomChoice
	}
})
