<template>
	<div class="tag">
		<input type="checkbox" v-model="tag.check" :id="prefix + 'tag' + tag.id" :value="tag.id"><label class="checkbox" :for="prefix + 'tag' + tag.id">{{ tag.name }}</label>
	</div>
</template>

<script>
    export default {
        props: {
            tag: {},
            prefix: {
                default: ''
            }
        },
        created() {
            if (this.tag.check === undefined) this.$set('tag.check', false)
        },
        watch: {
            "tag.check": function(val, old) {
                if(old !== undefined) this.$dispatch('change-check', this.tag)
            }
        }
    }
</script>

<style scoped>
    
    .tag {
        display: inline-block;
    }
    
    .tag input[type="checkbox"] {
        display: none;
    }

    .checkbox {
        margin: 10px 10px 0 0;
        display: none;
        box-sizing: border-box;
        -webkit-transition: background-color 0.2s linear;
        transition: background-color 0.2s linear;
        position: relative;
        display: inline-block;
        padding: 12px 12px 12px 42px;
        border-radius: 8px;
        background-color: #f6f7f8;
        vertical-align: middle;
        cursor: pointer;
    }

    .checkbox:before {
        -webkit-transition: opacity 0.2s linear;
        transition: opacity 0.2s linear;
        position: absolute;
        top: 50%;
        left: 21px;
        display: block;
        margin-top: -7px;
        width: 5px;
        height: 9px;
        border-right: 3px solid #53b300;
        border-bottom: 3px solid #53b300;
        content: '';
        opacity: 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>