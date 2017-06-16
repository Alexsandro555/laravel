<template>
    <div>
        <input type="text" v-model="input" class="dropbox" readonly
        >&nbsp;<i class="fa fa-caret-down arrow" aria-hidden="true"  @click="isVisible=false" v-on-click-outside="close"></i>
        <input type="hidden" v-bind:name="nameelement" v-model="val">
        <div class="items" v-bind:class="{visible:isVisible}">
            <ul>
                <li v-for="item in items" @click="selectElement(item.title,item.id)">
                    {{item.title}}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import {mixin as onClickOutside} from 'vue-on-click-outside'
    export default {
        props: ['nameelement','parent'],
        mixins: [onClickOutside],
        data: function() {
            return {
                items:null,
                isVisible:true,
                input:"",
                category:"",
                val:""
            }
        },
        mounted: function (){
            console.log('nameelement: '+this.nameelement);
            let that = this;
            this.axios.get('/admin/category/getAllCategories/', {}).then(function (response)
            {
                that.items = response.data;
            }).catch(function (error)
            {
                console.log(error);
            });
            console.log(this.category);
        },
        methods: {
            selectElement: function(title,id) {
                this.input = title;
                this.val = id;
                this.isVisible=true;
            },
            close: function() {
                this.isVisible=true;
            }
        }
    }
</script>
<style>
    .visible {
        visibility: hidden;
    }
    input.dropbox {
        width:200px;
    }
    .items {
        background-color: white;
        width: 200px;
        border: 1px solid;
    }
    .items ul {
        margin: 0;
        padding: 0;
    }
    .items ul li {
        display: list-item;
        list-style: none;
    }
    .items ul li:hover  {
        background-color: rgba(200,200,200,0.5);
    }
</style>