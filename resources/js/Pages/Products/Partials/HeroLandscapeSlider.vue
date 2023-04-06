<template>
    <div class="relative overflow-hidden">
        <div class="slider" :style="{transform: `translateX(${-slideIndex * slideWidth}px)`}">
            <div v-for="(slide, index) in slides" :key="slide.id" class="slide">
                <img :src="slide.url" :alt="`slide ${slide.id}`" class="w-[658px]">
            </div>
        </div>
        <div class="absolute w-full transform -translate-y-[100%] flex justify-between ">
            <div @click="previousSlide" class="my-auto px-px py-24 mb-12 hover:bg-gray-200 hover:bg-opacity-50 hover:cursor-pointer">
                <svg width="34px" height="34px" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_left [#334]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-385.000000, -6679.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M338.61,6539 L340,6537.594 L331.739,6528.987 L332.62,6528.069 L332.615,6528.074 L339.955,6520.427 L338.586,6519 C336.557,6521.113 330.893,6527.014 329,6528.987 C330.406,6530.453 329.035,6529.024 338.61,6539" id="arrow_left-[#334]"> </path> </g> </g> </g> </g></svg>
            </div>

            <div @click="nextSlide" class="my-auto px-2 py-24 mb-12 hover:bg-gray-200 hover:bg-opacity-50 hover:cursor-pointer">
                <svg width="34px" height="34px" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" class="">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#333]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-425.000000, -6679.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M370.39,6519 L369,6520.406 L377.261,6529.013 L376.38,6529.931 L376.385,6529.926 L369.045,6537.573 L370.414,6539 C372.443,6536.887 378.107,6530.986 380,6529.013 C378.594,6527.547 379.965,6528.976 370.39,6519" id="arrow_right-[#333]"> </path> </g> </g> </g> </g></svg>
            </div>
        </div>
        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-3">
            <div class="flex space-x-2">
                <span v-for="(slide, index) in slides" :key="slide.id"
                      @click="slideIndex = index"
                      :class="{'bg-gray-500': slideIndex === index, 'bg-gray-200': slideIndex !== index}"
                      class="h-3 w-3 rounded-full cursor-pointer"></span>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from 'vue'

const slides = [
    {
        id: 1,
        url:
            'https://ke.jumia.is/cms/2023/W13/HP/Sliders/Revised/KE_Easter_Cross_Generic_0323_S_rvsd.jpg',
    },
    {
        id: 2,
        url:
            'https://ke.jumia.is/cms/2023/SuperBrandDays/Nivea/V0/Generics/Revised/KE_Nivea_SBD_0323_S_rvsd.jpg',
    },
    {
        id: 3,
        url:
            'https://ke.jumia.is/cms/2023/W13/HP/Sliders/Revised/KE_Easter_Drinks_0323_S_rvsd.jpg',
    },
    {
        id: 4,
        url:
            'https://ke.jumia.is/cms/2023/W13/HP/Sliders/KE_Easter_Sneakers_0323_S_a.jpg',
    },
]
const slideIndex = ref(0)
const slideWidth = ref(658)
const sliderWidth = ref(slideWidth.value * slides.length)

const previousSlide = () => {
    slideIndex.value = slideIndex.value === 0 ? slides.length - 1 : slideIndex.value - 1
}

const nextSlide = () => {
    slideIndex.value = slideIndex.value === slides.length - 1 ? 0 : slideIndex.value + 1
}

onMounted(autoSlide);

function autoSlide () {
    setInterval(() => {
        nextSlide();
    }, 5000);
}
</script>

<style scoped>
.slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    flex-shrink: 0;
}

button {
    outline: none;
}

span {
    transition: background-color 0.3s ease-in-out;
}
</style>
