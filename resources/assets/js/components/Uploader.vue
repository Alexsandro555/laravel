<template>
    <div>
        <p>Загрузчик файлов</p>

        <dropzone id="myVueDropzone" acceptedFileTypes="image/*" :url="url" v-on:vdropzone-success="showSuccess" v-on:vdropzone-error="showError"  v-on:vdropzone-mounted="dropzoneMounted"  v-bind:useFontAwesome=true v-bind:language=dzOptions ref="myVueDropzone" v-on:vdropzone-removed-file="fileRemoved" v-bind:preview-template="template">
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
                dzOptions: {
                    dictDefaultMessage: '<br>Переместите файлы для загрузки',
                },
            }
        },
        components: {
            Dropzone
        },
        mounted: function () {
            //var $element = document.getElementById("files-id");
            //$element.value = "";
        },
        methods: {
            'showSuccess': function (file,data) {
                var $element = document.getElementById("files-id");
                var ids = JSON.parse($element.value);
                ids.push(data.id);
                $element.value = JSON.stringify(ids);
            },
            'showError': function (file) {
                console.log(file);
            },
            'fileRemoved': function(file)  {
                console.log('Deleting: '+file.id);
                let id = file.id;
                this.axios.get('/deleteFile/'+id, {}).then(function (response) {
                }).catch(function (error)
                {
                    console.log(error);
                });
                console.log(file);
            },
            'dropzoneMounted': function () {
                let that = this;
                let dropzone = this.$refs.myVueDropzone;
                this.axios.get('/getFiles/'+that.elementId, {}).then(function (response)
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
            },
            'template':function() {
                return `
                  <div class="dz-preview dz-file-preview">
                      <div class="dz-image" style="width: 200px;height: 200px">
                          <img data-dz-thumbnail /></div>
                      <div class="dz-details">
                        <div class="dz-size"><span data-dz-size></span></div>
                        <div class="dz-filename"><span data-dz-name></span></div>
                      </div>

                      <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                      <div class="dz-error-message"><span data-dz-errormessage></span></div>
                      <div class="dz-success-mark"><i class="fa fa-check"></i></div>
                      <div class="dz-error-mark"><i class="fa fa-close"></i></div>
                  </div>
              `;
            }
        }
    }
</script>

<style>
    .vue-dropzone {
        border: 2px solid #000000;
        font-family: 'Arial', sans-serif;
        letter-spacing: 0.2px;
        color: #777;
        transition: background-color .2s linear;

    &:hover {
         background-color: #F6F6F6;
     }

    i {
        color: #CCC;
    }

    .dz-preview {

    .dz-image {
        border-radius: 1;
    &:hover {
    img {
        transform: none;
        -webkit-filter: none;
    }
    }
    }

    .dz-details {
        bottom: 0;
        top: 0;
        color: white;
        background-color: rgba(33, 150, 243, 0.8);
        transition: opacity .2s linear;
        text-align: left;
    .dz-filename span, .dz-size span {
        background-color: transparent;
    }
    .dz-filename:not(:hover) span {
        border: none;
    }
    .dz-filename:hover span {
        background-color: transparent;
        border: none;
    }
    }

    .dz-progress .dz-upload {
        background: #cccccc;
    }

    .dz-remove {
        position: absolute;
        z-index: 30;
        color: white;
        margin-left: 15px;
        padding: 10px;
        top: inherit;
        bottom: 15px;
        border: 2px white solid;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 1.1px;
        opacity: 0;
    }

    &:hover {
    .dz-remove {
        opacity: 1;
    }
    }

    .dz-success-mark, .dz-error-mark {
        margin-left: auto !important;
        margin-top: auto !important;
        width: 100% !important;
        top: 35% !important;
        left: 0;
    i {
        color: white !important;
        font-size: 5rem !important;
    }
    }
    }
    }
</style>