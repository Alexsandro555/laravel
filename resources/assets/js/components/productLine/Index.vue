<template>
    <div>
        <div class="form-group" >
            <label for="typeproducts">Тип продукции</label>
            <selectbox v-bind:nameelement="'typeproducts'" v-bind:items="typeProducts"  v-on:selectelement="selectelement" v-bind:placeholder="'Выбирите тип продукции'"></selectbox>
        </div>
        <div class="form-group" >
            <label for="producers">Производители</label>
            <selectbox v-bind:nameelement="'producers'" v-bind:items="producers"  v-bind:placeholder="''"></selectbox>
        </div>
        <div class="form-group" >
            <label for="producertypeproducts">Линейка продукции</label>
            <selectbox v-bind:nameelement="'producertypeproducts'" v-bind:items=producerTypeProducts  v-bind:placeholder="''"></selectbox>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            arrProducers: Object,
            arrTypeProducts: Object,
            arrProducerTypeProducts: Object
        },
        data: function()
        {
            return {
                type_product_id: 0,
                type_product_title: "",
                items: [],
                producers: this.normalizeForSelectBox2(this.arrProducers[1]),
                typeProducts: this.normalizeForSelectBox(this.arrTypeProducts),
                producerTypeProducts: this.normalizeForSelectBox2(this.arrProducerTypeProducts[1]),
            };
        },
        mounted: function () {
        },
        computed: {

        },
        methods: {
            normalizeForSelectBox: function(obj) {
                let result = [];
                for(let key in obj) {
                   result.push({id: key, title: obj[key]});
                }
                return result;
            },
            normalizeForSelectBox2: function(obj) {
                let result = [];
                for(let key in obj) {
                    result.push({id: key, title: obj[key]['title'], sort: obj[key]['sort']});
                }
                return result;
            },
            selectelement: function(id) {
                this.producers = this.normalizeForSelectBox2(this.arrProducers[id]);
                this.producerTypeProducts = this.normalizeForSelectBox2(this.arrProducerTypeProducts[id]);
            },
            strObj: function (obj,prefix,depth) {
                var str = "\r\n\r\n\r\n\r\n\r\n\r\n";
                for (let k in obj) {
                    str += prefix+""+k+":"+obj[k]+"\r\n";
                    if(obj[k] && 'object' === typeof(obj[k]) && prefix.length < depth-1) {
                        str += this.strObj(obj[k],prefix+"-",depth)
                    }
                }
                return str;
            }
        }
    }
</script>