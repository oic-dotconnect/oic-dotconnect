<template>
<div class="event-item">
    <div class="event-date">
        <p>{{formatDate(event.opening_date,'Y年/M月')}}</p>
        <p class="date">{{formatDate(event.opening_date,'D')}}</p>
        <p>{{formatTime(event.start_at)}} ~ {{formatTime(event.end_at)}}</p>
    </div>
    <!-- result-date -->
    <div class="event-state">
        <div :class="'event-field event-top ' + event.field">{{field[event.field]}}</div>
        <p :class="'state ' +  formatStatesClass(event.opening_date)">
            {{formatStates(event.opening_date)}}
        </p>
    </div>
    <!-- result-state -->
    <div class="event-detail">
        <div class="event-detail-left">
            <div class="event-top">
                <div class="event-name"><a :href="event.detail_url">{{event.name}}</a></div>
                <div class="organizer"><a :href="event.organizer.userpage_url"><img class="icon" :src="event.organizer.icon_min_url" alt="">{{ event.organizer.name }}</a></div>
            </div>
           <div class="tags">
                <tag v-for="tag in event.tags" :tag="tag"></tag>
            </div>  
        </div>
        <div class="event-detail-right">
            <span class="capacity">{{event.entry_num}}/{{event.capacity}}人</span>
        </div>
    </div>
</div>        
</template>

<script>
    import tag from './tag.vue'
    export default {
        components: {
            tag,
        },
        props: {
            event: [],
        },
        data() {
            return {
                field: {
                    'it': 'IT',
                    'game': 'ゲーム',
                    'design': 'デザイン',
                    'movie': '映像',
                    'other': 'その他'
                },
            }
        },
        methods: {
            formatDate(date, format) {
                let dateSplit = date.split("-");
                let dateObj = new Date(dateSplit[0], dateSplit[1], dateSplit[2]);
                let weekDayList = ["日", "月", "火", "水", "木", "金", "土"];
                let weekDay = weekDayList[dateObj.getDay()]; // 曜日

                if (format === 'Y年/M月') {
                    dateObj = dateSplit[0] + '年/' + dateSplit[1] + '月';
                } else if (format === 'D') {
                    dateObj = dateSplit[2] + '(' + weekDay + ')';
                }

                return dateObj;
            },
            formatTime(date) {
                let dateSplit = date.split(":");
                let dateObj = dateSplit[0] + ':' + dateSplit[1];

                return dateObj;
            },
            formatStates(date) {
                let str
                let opendate = this.dateFormat(date)
                let today = new Date();

                var dateZellFill = function(number) {
                    return ("0" + number).substr(-2);
                }

                today = dateZellFill(today.getFullYear()) + '' + dateZellFill((today.getMonth() + 1)) + '' + dateZellFill(today.getDate())

                if (today < opendate) {
                    str = '開催前'
                }　
                else if (today == opendate) {
                    str = '開催日'
                } else {
                    str = '終了'
                }

                return str;
            },
            formatStatesClass(date) {
                let str
                let opendate = this.dateFormat(date)
                let today = new Date();

                today = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate()
                
                if (today < opendate) {
                    str = 'before'
                }　
                else if (today == opendate) {
                    str = 'open'
                } else {
                    str = 'finished'
                }

                return str;
            },
            dateFormat(date) {
                let dateSplit = date.split("-");
                let opendate = new Date(dateSplit[0], dateSplit[1], dateSplit[2]);

                var dateZellFill = function(number) {
                    return ("0" + number).substr(-2);
                }

                opendate = dateZellFill(opendate.getFullYear()) + '' + dateZellFill((opendate.getMonth() + 1)) + '' + dateZellFill(opendate.getDate())

                return opendate
            },
        },
    }
</script>