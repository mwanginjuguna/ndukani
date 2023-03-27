<template>
    <swiper-container
        :slides-per-view="2"
        :speed="2000"
        :space-between="spaceBetween"
        :navigation="true"
        :pagination-clickable="true"
        :pagination-dynamic-bullets="true"
        :centered-slides="true"
        :autoplay="{
            delay: 3000,
            pause_on_mouse_enter:true
        }"
        :autoplay-pause-on-mouse-enter="true"
        :pagination="{
      hideOnClick: false,

    }"
        :breakpoints="{
      768: {
        slidesPerView: 2,
      },
    }"
        @progress="onProgress"
        @slidechange="onSlideChange"

    >
        <swiper-slide v-for="product in productList" class="pb-14 text-slate-900">
            <ProductCard :image-url="product.imageUrl" :class="`w-64 h-48`" :title="product.phone" :price="product.price">

            </ProductCard>
        </swiper-slide>
    </swiper-container>
</template>

<script setup>
import { register } from 'swiper/element/bundle';

register();
import {Swiper} from "swiper";
import ProductCard from "./ProductCard.vue";
const spaceBetween = 50;
const onProgress = (e) => {
    const [swiper, progress] = e.detail;
    console.log(progress)
};

const onSlideChange = (e) => {
    console.log('slide changed')
}
const productList = [
    {
        phone: "Samsung S23",
        details: "Memory: \t1TB 12GB RAM \nCamera: \t200 MP multi-directional PDAF, Laser AF, OIS" +
            "10 MP \nWLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct\n" +
            "Bluetooth: \t5.3, A2DP, LE\n" +
            "Positioning: \tGPS, GLONASS, BDS, GALILEO",
        price: 419.99,
        imageUrl: 'https://fdn.gsmarena.com/imgroot/reviews/23/samsung-galaxy-s23-ultra/lifestyle/-1024w2/gsmarena_012.jpg'
    },
    {
        phone: "Mulika MWI Z",
        details: "Memory: \t1TB 12GB RAM \nCamera: \t200 MP multi-directional PDAF, Laser AF, OIS" +
            "10 MP \nWLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct\n" +
            "Bluetooth: \t5.3, A2DP, LE\n" +
            "Positioning: \tGPS, GLONASS, BDS, GALILEO",
        price: 9.99,
        imageUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-sf3t-MAP8yBUTHcvM0dOGzvw8NzspKJ2phF7DdfohyP4yRVBWDv554stWYNghZbFHdU&usqp=CAU'
    },
    {
        phone: "Kababe Pro Max",
        details: "Memory: \t1TB 12GB RAM \nCamera: \t200 MP multi-directional PDAF, Laser AF, OIS" +
            "10 MP \nWLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct\n" +
            "Bluetooth: \t5.3, A2DP, LE\n" +
            "Positioning: \tGPS, GLONASS, BDS, GALILEO",
        price: 4.99,
        imageUrl: 'https://s.alicdn.com/@sc04/kf/H0fc4d80a0cc94539ab72fa851ac5da36m.jpg_300x300.jpg'
    },
]
</script>
