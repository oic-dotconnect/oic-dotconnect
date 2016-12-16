<template>
    <a href=""><i class="fa fa-tag" aria-hidden="true"></i>{{tag.name}}</a><wbr>
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