<template>
	<input type="radio" name="_place" :value="room.name" :id="'room-' + room.name" :checked="room.name === roomName" v-model="model">
	<label :for="'room-' + room.name">{{ room.name }}</label>
</template>

<script>

export default {
	props: ['room', 'roomName', 'model']
}

</script>