<template>
	<div class="ckeditor">
			<textarea class="ckeditor__textarea" name="description" id="ckeditor" v-ckeditor="editorcontent" :editorcontent="editorcontent" debounce="100"></textarea>
	</div>
</template>

<script>
    import $ from 'jquery'
    import Vue from 'vue'
    export default {
        directives: {
            Ckeditor: {
                deep: true,
                twoWay: true,
                params: ['editorcontent'],
                setupEditor() {
                    var self = this
                    console.log(self.Format);
                    CKEDITOR.replace(self.el.id, {
                            toolbarGroups: [{
                                name: 'basicstyles'
                            }, {
                                name: 'list'
                            }, {
                                name: 'align'
                            }, {
                                name: 'styles'
                            }, {
                                name: 'insert'
                            }, {
                                name: 'undo'
                            }, ],
                            removeButtons: 'Styles,Subscript,Superscript,Image,Flash,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe'
                        }),
                        CKEDITOR.instances[self.el.id].on('change', () => {
                            self.set(CKEDITOR.instances[self.el.id].getData())
                        })
                },
                bind() {
                    this.vm.$nextTick(this.setupEditor.bind(this))
                },
                update(value) {
                    var self = this
                    if (!CKEDITOR.instances[self.el.id]) {
                        return Vue.nextTick(self.update.bind(this, value))
                    }

                    CKEDITOR.instances[self.el.id].setData(value)
                },
                unbind() {
                    CKEDITOR.instances[this.el.id].destroy()
                }
            }
        },
        data() {
            return {
                editorcontent: ''
            }
        },
    }
</script>

<style>
    .cke_combo__fontsize .cke_combo_text {
        width: 70px !important;
    }
</style>