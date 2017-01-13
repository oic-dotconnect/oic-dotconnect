<template>
  <div style="position: relative"
       v-bind:class="{'open':showDropdown}"
  >
    <input type="text" class="form-control"
      :placeholder="placeholder"
      autocomplete="off"
      v-model="value"
      @input="update"
      @keydown.up="up"
      @keydown.down="down"
      @keydown.enter= "hit"
      @keydown.esc="reset"
      @blur="showDropdown = false"
    />
    <ul class="dropdown-menu" v-el:dropdown>
      <li v-for="item in items" v-bind:class="{'active': isActive($index)}">
        <a @mousedown.prevent="click" @mousemove="setActive($index)">
          <partial :name="templateName"></partial>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
    import request from 'superagent'

    let Vue = window.Vue

    export default {
        created() {
            this.items = this.primitiveData
        },
        partials: {
            default: '<span v-html="item | highlight value"></span>'
        },
        props: {
            value: {
                twoWay: true,
                type: String,
                default: ''
            },
            data: {
                type: Array
            },
            limit: {
                type: Number,
                default: 8
            },
            async: {
                type: String
            },
            template: {
                type: String
            },
            templateName: {
                type: String,
                default: 'default'
            },
            key: {
                type: String,
                default: null
            },
            onHit: {
                type: Function,
                default (items) {
                    this.reset()
                    this.value = items
                }
            },
            placeholder: {
                type: String
            },
            valueKey: {
                type: String,
                default: ''
            }
        },
        data() {
            return {
                showDropdown: false,
                noResults: true,
                current: 0,
                items: [],
                selectItem: {}
            }
        },
        computed: {
            primitiveData() {
                if (this.data) {
                    return this.data.filter(value => {
                        value = this.matchCase ? value : value.toLowerCase()
                        var query = this.matchCase ? this.value : this.value.toLowerCase()
                        return this.matchStart ? value.indexOf(query) === 0 : value.indexOf(query) !== -1
                    }).slice(0, this.limit)
                }
            }
        },
        ready() {
            // register a partial:
            if (this.templateName && this.templateName !== 'default') {
                Vue.partial(this.templateName, this.template)
            }
        },
        methods: {
            update() {
                if (!this.value) {
                    this.reset()
                    return false
                }
                if (this.data) {
                    this.items = this.primitiveData
                    this.showDropdown = this.items.length > 0
                }
                this.current = -1
                if (this.async) this.query()
            },
            query() {
                request.get(this.async + this.value).then(res => {
                    let data = res.body
                    this.items = (this.key ? data[this.key] : data).slice(0, this.limit)
                    this.showDropdown = this.items.length
                })
            },
            reset() {
                this.items = []
                this.value = ''
                this.loading = false
                this.showDropdown = false
            },
            closeDropdown() {
                this.items = []
                this.loading = false
                this.showDropdown = false
            },
            setActive(index) {
                this.current = index
            },
            isActive(index) {
                return this.current === index
            },
            setValue(index) {
                if (this.valueKey !== '') {
                    this.value = this.items[index][this.valueKey]
                } else {
                    this.value = this.items[index]
                }
                this.selectItem = Object.assign({}, this.items[index])
            },
            hit(e) {
                e.preventDefault()
                if (this.items.length === 0 || this.current === -1) {
                    this.onHit({
                        name: this.value
                    }, this)
                } else
                if (this.selectItem === this.value || this.selectItem[this.valueKey] === this.value) {
                    this.onHit(this.selectItem, this)
                } else {
                    this.setValue(this.current)
                    this.closeDropdown()
                }
            },
            click(e) {
                this.onHit(this.items[this.current], this)
            },
            up() {
                if (this.current > 0) this.current--
            },
            down() {
                if (this.current < this.items.length - 1) this.current++
            }
        },
        filters: {
            highlight(value, phrase) {
                return value.replace(new RegExp('(' + phrase + ')', 'gi'), '<strong>$1</strong>')
            }
        }
    }
</script>

<style>
    .dropdown-menu>li>a {
        cursor: pointer;
    }
</style>