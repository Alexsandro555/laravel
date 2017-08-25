<template>
    <div>
        <carousel name="carousel2" style="width: 750px; height: 326px"  :pagination-enabled=false :navigation-enabled=true :per-page=3  :per-page-custom="[[480, 3], [768, 3]]">
            <slide v-for="item in items" :key="item.id">
                <div class="service__content-slider">
                    <div class="service__image">
                        <img :src="'/storage/'+item.file" height="100px"/>
                    </div><br><br>
                    <a :href="'/catalog/'+item.slug">{{item.title}}</a><br><br>
                    <span>{{item.price}} </span> р.
                </div>
            </slide>
        </carousel>
    </div>
</template>
<script>
    export default {
        props: {
            url: String,
        },
        data: function() {
            return {
                items:[],
            }
        },
        mounted() {
            let that = this;
            this.axios.get(this.url, {}).then(function (response)
            {
                if(response.data.length > 0) {
                    let elements = response.data;
                    elements.forEach(function (element) {
                        let obj = {
                            'id': element.id,
                            'title': element.title,
                            'price': element.price,
                            'file': element.files.shift().filename,
                            'slug': element.url_key
                        };
                        that.items.push(obj);
                    });
                }
            }).catch(function (error)
            {
                console.log(error);
            });
        }
    }
</script>