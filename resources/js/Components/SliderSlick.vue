<script setup>
// import function to register Swiper custom elements
import { register } from 'swiper/element/bundle';
import { Swiper, Autoplay, Pagination} from 'swiper';
import 'swiper/swiper.css';

// register Swiper custom elements
register();

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
        imageUrl: 'https://fdn.gsmarena.com/imgroot/reviews/23/samsung-galaxy-s23-ultra/lifestyle/-1024w2/gsmarena_012.jpg'
    },
    {
        phone: "Kababe Pro Max",
        details: "Memory: \t1TB 12GB RAM \nCamera: \t200 MP multi-directional PDAF, Laser AF, OIS" +
            "10 MP \nWLAN: Wi-Fi 802.11 a/b/g/n/ac/6e, tri-band, Wi-Fi Direct\n" +
            "Bluetooth: \t5.3, A2DP, LE\n" +
            "Positioning: \tGPS, GLONASS, BDS, GALILEO",
        price: 4.99,
        imageUrl: 'https://fdn.gsmarena.com/imgroot/reviews/23/samsung-galaxy-s23-ultra/lifestyle/-1024w2/gsmarena_012.jpg'
    },
]

</script>

<template>
    <div>
        <swiper-container class="text-white" grabCursor="true" slides-per-view="1" speed="500" loop="true" css-mode="true">
            <swiper-slide class="bg-gray-800 mx-4  min-h-[16rem]">Slide 1</swiper-slide>
            <swiper-slide class="bg-gray-800 mx-4  min-h-[16rem]">Slide 2</swiper-slide>
            <swiper-slide class="bg-gray-800 mx-4  min-h-[16rem]">Slide 3</swiper-slide>
            <swiper-slide class="bg-gray-800 mx-4  min-h-[16rem]">Slide 4</swiper-slide>
            <swiper-slide class="bg-gray-800 mx-4  min-h-[16rem]">Slide 5</swiper-slide>
        </swiper-container>
    </div>
</template>
