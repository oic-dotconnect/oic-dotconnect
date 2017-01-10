<template>
	 <div class="entry-room">		
		<div class="sections">
			<section class="entry-room-floar">
				<h3>階数</h3>
				<select v-model="floornum">
					<option v-for="floor in filterFloors" :value="floor.floorNum" >{{ floor.floorNum }}</option>
				</select>
			</section>
			<section class="entry-room-name">
				<h3>教室 : {{ roomname }}</h3>
				<div class="room-name-radios">
					<radio v-for="room in floorRooms" :room="room" :model.sync="roomname" :room-name="roomName"></radio>
					<input type="hidden" name="place" :value="roomname">
				</div>
			</section>
			<section class="entry-room-type">
				<h3>教室タイプ</h3>
				<div class="room-type-radios">
					<div class="radio">
						<input type="radio" name="roomType" value="all" checked="checked" v-model="roomType" id="type-all"><label for="type-all">全て</label>
						<input type="radio" name="roomType" value="nomal" v-model="roomType" id="type-nomal"><label for="type-nomal">普通教室</label>
						<input type="radio" name="roomType" value="pc" v-model="roomType" id="type-pc"><label for="type-pc">PC教室</label>
					</div>
				</div>
			</section>
		</div>
		<!-- input-entry-field entry-item -->
	</div>
</template>

<script>
import radio from './radio.vue'

export default {
	props: {
		floorNum: {
			default : '2',
		},
		roomName: {
			default: '2A',
		}
	},
	data() {
		return {
			floors: [
				{ 
					floorNum: '2', 
					rooms: [
						{ name:'2A', type:'nomal'},
						{ name:'2B', type:'nomal'},
					]
				},
				{
					floorNum: '3',
					rooms: [
						{ name:'3A', type:'nomal' },
						{ name:'3B', type:'nomal' },
						{ name:'3C', type:'nomal' },
						{ name:'3D', type:'nomal' },
					]
				},
				{
					floorNum: '4',
					rooms: [
						{ name:'4A', type:'nomal' },
						{ name:'4B', type:'nomal' },
						{ name:'4C', type:'nomal' },
						{ name:'4D', type:'nomal' },
					] 
				},
				{
					floorNum: '5',
					rooms: [
						{ name:'5A', type:'pc' },
						{ name:'5B', type:'pc' },
						{ name:'5C', type:'pc' },
						{ name:'5D', type:'pc' },
					]
				},
				{
					floorNum: '6',
					rooms: [
						{ name:'6A', type:'pc' },
						{ name:'6B', type:'nomal' },
						{ name:'6C', type:'nomal' },
						{ name:'6D', type:'nomal' },
					]
				},
				{
					floorNum: '7',
					rooms: [
						{ name:'7A', type:'pc' },
						{ name:'7B', type:'pc' },
						{ name:'7C', type:'pc' },
						{ name:'7D', type:'pc' },
					]
				},
				{
					floorNum: '8',
					rooms: [
						{ name:'8A', type:'pc' },
						{ name:'8B', type:'pc' },
						{ name:'8C', type:'pc' },
						{ name:'8D', type:'pc' },
					] 
				},
				{
					floorNum: '9',
					rooms: [
						{ name:'9D-1', type:'nomal' },
						{ name:'9D-2', type:'nomal' },				
					]
				}
			],
			selectRoom: null,
			roomname: null,
			floornum: null,
			roomType: undefined,
			filterFloors: []
		}
	},
	ready(){
		this.$nextTick(() => {
			this.$set('roomname', this.roomName)
			this.$set('floornum', this.floorNum)
		})						
	},
	watch: {
		"roomType": function(){		
			let floors
			if( this.roomType === 'all') {
				floors = this.floors
			} else {
				floors = this.floors.filter( (floor) => {
					return floor.rooms.some( (room) => {						
						return room.type === this.roomType
					})
				})
			}
			let exist = floors.some( (floor) => {
				return floor.floorNum === this.floornum 
			})
			if(!exist) this.floornum = floors[0].floorNum							
			this.$set('filterFloors', floors)
		}
	},
	computed: {
		floorRooms() {
			// if( !this.floorNum  ) return 
			
			let floor = this.filterFloors.find( (floor) => {
				return floor.floorNum === this.floornum
			})

			if( floor === undefined ) return 
			
			let rooms = floor.rooms

			if(this.roomType === 'all'){
				return rooms
			} else {
				return rooms.filter( (room) => {
					return room.type === this.roomType
				})
			} 			
		}
	},
	components: {
		radio
	}
}
</script>

<style scoped>

h3 {
	margin: 0;
}

.sections {
	margin-left: 15px;
	display: flex;
}

.entry-room-floar, .entry-room-type, .room-name-radios{
	margin-right: 20px;
}

.room-type-radios {
	display: inline-block;
	border: solid 1px #a6a6a6;
	border-width: 1px;
	border-radius: 5px;
	padding: 0px 2px;	
	background-color: #ffffff;
}

.room-name-radios {
	display: inline-block;
	border: solid 1px #a6a6a6;
	border-width: 1px;
	border-radius: 5px;
	padding: 1px 2px;	
	background-color: #ffffff;
}

.radio {
	display: inline-block;
}



</style>