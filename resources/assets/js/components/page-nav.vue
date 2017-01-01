<template>
<nav>
    <ul class="pagination">
        <li class="page-item" @click="pageNavClick(pageNum -1)">
            <a class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item" v-for="page in paging" :class="{ 'active' : $index == pageNum}" @click="pageNavClick($index)">
            <!--{{ $index}}: {{pageNum}} : {{$index == pageNum}}-->
            <a class="page-link">{{$index + 1}}</a>
        </li>
        <li class="page-item" @click="pageNavClick(pageNum +1)">
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
            isSetPageNum(index) {
                return index >= 0 && index < this.paging
            },               
            pageNavClick(index) {                             
                if( this.isSetPageNum(index) ) this.pageNum = index
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