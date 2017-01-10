<template>
    <a class="tag" :href="tag.search_url">{{tag.name}}</a><wbr>
</template>

<script>
    export default {
        props: {
            tag: {},
        },
        watch: {
            tag() {
                console.log(this.tag);
            }
        }
    }
</script>