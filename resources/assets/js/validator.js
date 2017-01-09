export default {
	data() {
		return {
			validation: {},
		}
	},
	methods: {
		addVlidation(names, func){								
			this.$set(`validation.${names}`, func)
			let name = names.split('.')[0]
			this.$set(`validation.${name}.all`, () => {
				let parent = this.$get(`validation.${name}`)
				let keys = Object.keys(parent)
				keys.$remove('all')
								
				return keys.every((key) => {
					let func = this.$get(`validation.${name}.${key}`)																				
					return func()
				})
			})			
		}	
	}	
}