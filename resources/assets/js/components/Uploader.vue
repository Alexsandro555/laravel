<template>
    <div id="app">
        <p>Загрузчик файлов</p>

        <dropzone id="myVueDropzone" acceptedFileTypes="image/*" :url="url" v-on:vdropzone-success="showSuccess" v-on:vdropzone-error="showError">
            <!-- Optional parameters if any! -->
            <input type="hidden" name="_token" :value="csrfToken">
        </dropzone>

    </div>
</template>

<script>
    import Dropzone from 'vue2-dropzone'

    export default {
        name: 'MainApp',
        props: ['url'],
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
                console.log('work');
                console.log(file);
                console.log('A file was successfully uploaded')
            },
            'showError': function (file) {
                console.log(file);
            }
        }
    }
</script>