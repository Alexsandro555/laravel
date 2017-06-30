<template>
    <div>
        <div class="form-group" >
            <label for="typeproducts">Тип продукции</label>
            <selectbox v-bind:nameelement="'typeproducts'"  v-bind:items="typeProducts"  v-on:selectelement="selectelement" v-bind:placeholder="'Выбирите тип продукции'"></selectbox>
        </div>
        <div class="form-group">
            <label for="producers">Производители</label>
            <selectbox v-bind:nameelement="'producers'" v-bind:items="producers"  v-bind:defaultId="getDefProducers" v-bind:placeholder="''"></selectbox>
        </div>
        <div class="form-group" >
            <label for="producertypeproducts">Линейка продукции</label>
            <selectbox v-bind:nameelement="'producertypeproducts'" v-bind:defaultId="getDefProducerTypeProduct" v-bind:items=producerTypeProducts v-bind:placeholder="''"></selectbox>
        </div>
        {{getDefProducerTypeProduct}}
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
                typeProducts: this.normalizeForSelectBox(this.arrTypeProducts),
                producers: this.normalizeForSelectBox(this.arrProducers[this.getDefTypeProduct]),
                producerTypeProducts: this.normalizeForSelectBox(this.arrProducerTypeProducts[1]),
            };
        },
        mounted: function() {
            console.log("fdsfds "+this.getDefTypeProduct);
            console.log("fdsfds "+this.arrTypeProducts[1]);
        },
        computed: {
            getDefProducers: function() {
                let obj = this.arrProducers[this.typeProducts[0].id];
                let sort = 1000000;
                let id;
                for (let key in obj) {
                    if(obj[key]['sort']< sort) return sort = obj[key]['sort'];
                    break;
                }
                for (let key in obj) {
                    if(obj[key]['sort'] == sort) return obj[key]['id'];
                }
            },
            getDefProducerTypeProduct: function() {
                let obj = this.arrProducerTypeProducts[this.typeProducts[0].id];
                let sort = 1000000;
                let id;
                for (let key in obj) {
                    if(obj[key]['sort']< sort) return sort = obj[key]['sort'];
                    break;
                }
                for (let key in obj) {
                    if(obj[key]['sort'] == sort) return obj[key]['id'];
                }
            },
            getDefTypeProduct: function() {
                let obj = this.typeProducts;
                let sort = 1000000;
                let id;
                for (let key in obj) {
                    if(obj[key]['sort']< sort) return sort = obj[key]['sort'];
                    break;
                }
                for (let key in obj) {
                    if(obj[key]['sort'] == sort) return obj[key]['id'];
                }
            }
        },
        methods: {
            asc: function(field) {
                return function (x, y) {
                    return x[field] > y[field];
                }
            },
            normalizeForSelectBox: function(obj) {
                if(obj) {
                    let result = [];
                    for(let key in obj) {
                        result.push({id: obj[key]['id'], title: obj[key]['title'], sort: obj[key]['sort']});
                    }
                    result.sort(this.asc('sort'));
                    return result;
                }
                else {
                    return [];
                }

            },
            selectelement: function(id) {
                this.producers = this.normalizeForSelectBox(this.arrProducers[id]);
                this.producerTypeProducts = this.normalizeForSelectBox(this.arrProducerTypeProducts[id]);
            }
        }
    }
</script>