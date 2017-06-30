<template>
    <div>
        <input type="text" v-model="input" class="selectbox" readonly v-bind:placeholder="placeholder" @focus="isVisible=true" v-on-click-outside="close">&nbsp;
        <i class="fa fa-caret-down arrow" aria-hidden="true"  @click="isVisible=true"></i>
        <input type="hidden" v-bind:name="nameelement" v-bind:value="val">
        <div class="items" v-if="isVisible">
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
        props: {
            element: "",
            items: {
                type: Array,
                default: []
            },
            nameelement: String,
            parent: Number,
            placeholder: String,
            url: String,
            defaultId: Number
        },
        mixins: [onClickOutside],
        data: function() {
            return {
                isVisible:false,
                input: this.items[0].title,
                val: this.items[0].id,
                parent_id:0,
            }
        },
        mounted: function() {
            console.log("DefaultID: "+this.items[this.defaultId]);
            console.log(this.items);
            console.log(this.defaultId);
        },
        methods: {
            selectElement: function(title,id) {
                this.input = title;
                this.val = id;
                this.$emit('input', id);
                this.$emit('selectelement', id);
                this.isVisible=false;
            },
            close: function() {
                this.isVisible=false;
            },
        },
        watch: {
            items: function(newItem) {
                this.input = newItem[0].title;
                this.val = newItem[0].id;
            }
        }
    }
</script>
<style>
    .stealth {
        visibility: hidden;
    }
    input.selectbox {
        width:98%;
        padding-left: 10px;
    }
    .items {
        background-color: white;
        width: 98%;
        padding-left: 10px;
        border: 1px solid #fff0ff;
        border-top: none;
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