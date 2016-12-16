<template>
<nav>{{page}}
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item" v-for="page in paging" :class="{ 'active' : $index == pageNum}">
            <!--{{ $index}}: {{pageNum}} : {{$index == pageNum}}-->
            <a class="page-link" @click="pageNavClick($index)" >{{$index + 1}}</a>
        </li>
        <li class="page-item">
        <a class="page-link" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
        </a>
        </li>
    </ul>
</nav>
</template>

<script>
    export default {
        props: {
            pageNum: '',
            length: '',
            dispItem: ''
        },
        methods: {
            pageNavClick(index) {
                this.page = index
            }
        },
        computed: {
            paging() {
                return this.length / this.dispItem
            }
        },
        watch: {
            'length': function() {
                this.page = 0;
            }
        }
    }
</script>