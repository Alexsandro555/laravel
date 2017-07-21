<template>
    <div>
        <div class="form-group" >
            <label for="typeproducts">Тип продукции</label>
            <lselect v-bind:nameelement="'typeproducts'" v-bind:elements-val="elementsArr"  v-bind:defaultId="1" v-bind:placeholder="'Выбирите тип продукции'"></lselect>
        </div>
        <div class="form-group">
            <label for="producers">Производители</label>
            <lselect v-bind:nameelement="'producers'" v-bind:elements-val="mutableElementsArr" v-bind:placeholder="''"></lselect>
        </div>
        <div class="form-group" >
            <label for="producertypeproducts">Линейка продукции</label>
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
                mutableElementsArr: this.startVal(this.elementsArr)
            };
        },
        mounted: function()
        {
            let that = this;
            this.$on('changeTypeProd', function (data)
            {
                that.mutableElementsArr = data;
            });
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
                let resFilteredVal = {"typeproducts":filteredVal};
                return resFilteredVal;
            }
        }
    }
</script>