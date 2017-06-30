<template>
    <div>
        <div v-if="attributes.length > 0">
            <div class="new-attribute" v-for="attribute of attributes">
                <div class="form-group" >
                    <label for="attribute_id">Аттрибут</label>
                    <dropbox v-bind:nameelement="'attribute_id'" v-bind:parent="attribute.id" v-bind:placeholder="'Выберите атрибут'" v-bind:url="'/admin/product/getAllAttributes'"></dropbox>
                </div>
                <div class="form-group">
                    <label for="value">Значение</label>
                    <input name="value" v-bind:value="attribute.value" class="attr-val"  type="text" value="attribute.value">
                </div>
            </div>
        </div>
        <div v-else></div>
        <div class="form-group" >
            <label for="attribute_id">Аттрибут</label>
            <dropbox v-bind:nameelement="'attribute_id'"  v-model="newAttribute.id" v-bind:placeholder="'Выберите атрибут'" v-bind:url="'/admin/product/getAllAttributes'"></dropbox>
        </div>
        <div class="form-group">
            <label for="value">Значение</label>
            <input name="value" class="attr-val"  type="text" v-model="newAttribute.value">
        </div>
        <button class="btn btn-sucess" @click="addAttribute">Добавить атрибут</button>
        <button class="btn btn-sucess" @click="save">Сохранить</button>
    </div>
</template>

<script>
    export default {
        props: {
            'existAttr': {
                type: Array,
                default: null
            }
        },
        data: function() {
            return {
                elem: "",
                newAttribute: {
                    id: 0,
                    value: ""
                },
                attributes: []
            }
        },
        mounted: function (){
            console.log(this.existAttr);
            var that = this;
            if(this.existAttr !== null) {
                this.existAttr.forEach(function(item) {
                    var attribute = {id: item.attribute_id, value: item.value};
                    that. attributes.push(attribute);
                });
            }
        },
        methods: {
            addAttribute: function() {
                var attribute = {id: this.newAttribute.id, value: this.newAttribute.value };
                this.attributes.push(attribute);
                console.log(this.attributes);
                this.newAttribute.id = null;
                this.newAttribute.value = null;
            },
            save: function () {
                this.axios.post("/admin/product/addAttributeValue/"+JSON.stringify(this.attributes), {}).then(function (response)
                {
                }).catch(function (error)
                {
                    console.log(error);
                });
            }
        }
    }
</script>
<style>
    .new-attribute {
        margin-top: 50px;
        margin-bottom: 30px;
        overflow: hidden;
    }
    .attr-val {
        width: 100%;

    }
</style>