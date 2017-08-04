<template>
    <div>
        <div class="form-group" >
            <label for="typeproducts">Тип продукции</label>
            <lselect v-bind:nameelement="'typeproducts'" v-bind:elements-val="elementsArr"  v-bind:defaultId="1" v-on:selectelement="selectelement" v-bind:placeholder="'Выбирите тип продукции'"></lselect>
        </div>
        <div class="form-group">
            <label for="producers">Производители</label>
            <lselect v-bind:nameelement="'producers'" v-bind:elements-val="mutableElementsArr" v-bind:default-id="defaultId" v-bind:placeholder="''"></lselect>
        </div>
        <div class="form-group" >
            <label for="lines">Линейка продукции</label>
            <lselect v-bind:nameelement="'lines'" v-bind:elements-val ="mutableElementsArr" v-bind:placeholder="''"></lselect>
        </div>
    </div>
</template>
<script>
    export default {
        props:
        {
            elementsArr: Object,
        },
        data: function()
        {
            return {
                mutableElementsArr: this.startVal(this.elementsArr),
                defaultId: 1
            };
        },
        methods: {
            startVal: function(elementsVal) {
                let filteredVal = [];
                let id = 1;
                elementsVal.typeproducts.forEach(function(item, i, arr)
                {
                    if(item.id === id)
                    {
                        filteredVal = arr.slice(id-1,id);
                    }
                });
                let resFilteredVal = {"type_product_id":filteredVal};
                return resFilteredVal;
            },
            selectelement: function(id) {
                //this.val = "";
                //this.input = "";
                console.log('selected');
                let that = this;
                let filteredVal = [];
                this.elementsArr.typeproducts.forEach(function(item, i, arr)
                {
                    if(item.id === id)
                    {
                        filteredVal = arr.slice(id-1,id);
                    }
                });
                let resFilteredVal = {"type_product_id":filteredVal};
                //this.mutableElementsArr = resFilteredVal;
                //this.$set(this.mutableElementsArr,resFilteredVal);
                this.$set(this, 'mutableElementsArr', resFilteredVal);
                this.defaultId = 1;
                this.$children.forEach(function(item) {
                            console.log(item);
                            //item.filtRes();
                            //item.input = item.elems[0].title;
                            //item.value = item.items[1].title;
                        }
                );
            }
        }
    }
</script>