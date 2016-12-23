<template>    
    <div class="icon-display">
        <img class="icon-back" alt="" :src="imgsrc">
    </div>
    <div class="icon-form">
        <label for="icon-file">
        ＋  画像を選択
        </label>
        <input id="icon-file" name="icon" type="file" @change="onFileChange">         
    </div>        
</template>

<script>
    export default {
        props: {
            oldImage: {
                default: '/assets/img/default_icon.png'
            },
        },
        data() {
            return {
                newImage: '',
                imgsrc: '',
            }
        },
        methods: {
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.imgsrc = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            removeImage: function(e) {
                this.image = '';
            }
        },
        ready() {
            if (this.oldImage == '') {
                console.log(this.oldImage)
                this.imgsrc = '/assets/img/default_icon.png'
            } else {
                this.imgsrc = this.oldImage
            }
        }
    }
</script>

<style>
    .icon-display {
        position: relative;
        margin: 20px auto 0;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
    }
    
    .icon-back {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
    
    .icon-form {
        margin-top: 20px;
        text-align: center;
    }
</style>