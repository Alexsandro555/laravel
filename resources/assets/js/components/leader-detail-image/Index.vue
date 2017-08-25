<template>
    <div>
        <div class="detail__images">
            <div class="detail-images-center">
                <img :src="curImage" width="330px"/>
            </div>
        </div>
        <div class="detail__slider">
            <div class="service__menu-slider" style="display: flex; padding-left:30px; height: 400px;">
                <alex-carousel name="carousel3" style="width: 100px; height: 350px; margin-top: 30px"  :pagination-enabled=false :navigation-enabled=true :per-page=3  :per-page-custom="[[480, 3], [768, 3]]">
                    <alex-slide v-for="item in items" :key="item.id">
                        <div class="content__sliders  box-alex-slider" @click="selectSlide(item.id)">
                            <img :src="'/storage/'+item.file" width="50px"/>
                        </div>
                    </alex-slide>
                </alex-carousel>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            url: String,
        },
        data: function() {
            return {
                elements: [],
                items:[],
                curImage: '',
            }
        },
        mounted() {
            let that = this;
            this.axios.get(this.url, {}).then(function (response)
            {
                if(response.data.length > 0) {
                    that.elements = response.data;
                    that.elements.forEach(function (element) {
                        let obj = {'id': element.id, 'file': element.filename};
                        that.items.push(obj);
                    });
                    that.curImage = '/storage/' + that.elements[0].filename;
                }
            }).catch(function (error)
            {
                console.log(error);
            });
        },
        methods: {
            selectSlide: function (id, event) {
                let that = this;
                this.elements.forEach(function(element) {
                    if(element.id === id) {
                        that.curImage = '/storage/'+element.filename;
                    }
                });
            }
        }
    }
</script>