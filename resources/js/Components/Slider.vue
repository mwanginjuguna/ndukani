<template>
    <swiper-container
        :slides-per-view="3"
        :speed="2000"
        :space-between="spaceBetween"
        :navigation="true"
        :pagination-clickable="true"
        :centered-slides="true"

        :pagination="{
      hideOnClick: false,

    }"
        :breakpoints="{
      768: {
        slidesPerView: 2,
      },
    }"
    >
        <swiper-slide v-for="product in productList" class="pb-14 text-slate-900 max-w-fit">
            <SliderProductCard :image-url="product.imageUrl" :title="product.phone" :price="product.price">

            </SliderProductCard>
        </swiper-slide>
    </swiper-container>
</template>

<script setup>
import { register } from 'swiper/element/bundle';

register();

import SliderProductCard from "./SliderProductCard.vue";
const spaceBetween = 50;

const productList = [
    {
        phone: "Samsung S23 Pro",
        details: "Memory: \t1TB 12GB RAM \nCamera: \t200 MP multi-directional PDAF, Laser AF, OIS" +
            "10 MP \nWLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct\n" +
            "Bluetooth: \t5.3, A2DP, LE\n" +
            "Positioning: \tGPS, GLONASS, BDS, GALILEO",
        price: 419.99,
        imageUrl: 'https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/84/503736/1.jpg?1607'
    },
    {
        phone: "Samsung S23 Plus",
        details: "Memory: \t1TB 12GB RAM \nCamera: \t200 MP multi-directional PDAF, Laser AF, OIS" +
            "10 MP \nWLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct\n" +
            "Bluetooth: \t5.3, A2DP, LE\n" +
            "Positioning: \tGPS, GLONASS, BDS, GALILEO",
        price: 9.99,
        imageUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-sf3t-MAP8yBUTHcvM0dOGzvw8NzspKJ2phF7DdfohyP4yRVBWDv554stWYNghZbFHdU&usqp=CAU'
    },
    {
        phone: "iPhone 14",
        details: "Memory: \t1TB 12GB RAM \nCamera: \t200 MP multi-directional PDAF, Laser AF, OIS" +
            "10 MP \nWLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct\n" +
            "Bluetooth: \t5.3, A2DP, LE\n" +
            "Positioning: \tGPS, GLONASS, BDS, GALILEO",
        price: 4.99,
        imageUrl: 'https://s.alicdn.com/@sc04/kf/H0fc4d80a0cc94539ab72fa851ac5da36m.jpg_300x300.jpg'
    },
]
</script>
