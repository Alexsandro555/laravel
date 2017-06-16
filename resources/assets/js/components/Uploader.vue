<template>
    <div>
        <p>Загрузчик файлов</p>

        <dropzone id="myVueDropzone" acceptedFileTypes="image/*" :url="url" v-on:vdropzone-success="showSuccess" v-on:vdropzone-error="showError" v-on:vdropzone-mounted="dropzoneMounted" ref="myVueDropzone" v-on:vdropzone-removed-file="fileRemoved">
            <!-- Optional parameters if any! -->
            <input type="hidden" name="_token" :value="csrfToken">
        </dropzone>

    </div>
</template>

<script>
    import Dropzone from 'vue2-dropzone'

    export default {
        name: 'Uploader',
        props: {
            'url': String,
            'elementId': {
                type: Number,
                default: 0
            }
            },
        data: function() {
            return {
                csrfToken: Laravel.csrfToken,
            }
        },
        components: {
            Dropzone
        },
        methods: {
            'showSuccess': function (file) {
            },
            'showError': function (file) {
                console.log(file);
            },
            'fileRemoved': function(file)  {
                let id = file.id;
                this.axios.get('/admin/product/deletePhoto/'+id, {}).then(function (response) {
                }).catch(function (error)
                {
                    console.log(error);
                });
                console.log(file);
            },
            'dropzoneMounted': function () {
                let that = this;
                let dropzone = this.$refs.myVueDropzone;
                this.axios.get('/admin/product/getPhoto/'+that.elementId, {}).then(function (response)
                {
                    let data = response.data;
                    for(let key in data) {
                        let image = data[key];
                        let id = image.id;
                        let filename = image.filename;
                        let size = image.size;
                        let mockFile = {id: id, name: filename, size: size};
                        dropzone.manuallyAddFile(mockFile,"/images/icon/"+filename);
                    }
                }).catch(function (error)
                {
                    console.log(error);
                });
            }
        }
    }
</script>