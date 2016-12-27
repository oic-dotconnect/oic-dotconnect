<template>
    <a class="tag" href="">{{tag.name}}</a><wbr>
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