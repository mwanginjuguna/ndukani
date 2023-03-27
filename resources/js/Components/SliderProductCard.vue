<script setup>
import PrimaryButton from '../Components/PrimaryButton.vue';
import {Link} from "@inertiajs/vue3";
import {computed, defineProps, ref, watchEffect} from "vue";

const props = defineProps( {
    imageUrl: String,
    percentOff: String,
    title: String,
    features: String,
    price: String,
    details: String

})

let initialPrice = ref(null)

watchEffect(() => {
    const price = parseFloat(props.price)
    const percentOff = parseFloat(props.percentOff)
    if (!isNaN(price) && !isNaN(percentOff)) {
        initialPrice.value = (price / (1 - (percentOff / 100))).toFixed(2)
    }
})



</script>

<template>
    <div class="px-2 md:px-4 shadow-md bg-white rounded-md">
        <div v-if="imageUrl" class="pt-2">
            <img alt="product-1"
                 :src="imageUrl"
                 class="object-contain rounded w-36 h-[10rem]">
        </div>

        <div class="pb-3">
            <div class="mt-2.5 border-t">
                <h3 class="pt-1 font-light text-lg text-gray-800 font-serif hover:underline hover:underline-offset-4">
                    <a href="#">{{ title ? title : '' }} </a>
                </h3>
            </div>

            <div v-if="price" class="mt-1 flex flex-row sm:gap-4 text-sm">
                <div>
                    <p class="text-gray-700">
                        <span class="text-base pr-2">${{ price ?? '' }}</span>
                        <span class="px-1.5 bg-red-100 inline-flex text-xs">-{{ percentOff ?? '15%' }}</span>
                    </p>
                    <p class="pl-1.5 text-gray-400 text-xs line-through">
                        ${{ (parseFloat(price) + (parseFloat(price) * 0.15)).toFixed(2) }}
                    </p>

                </div>
            </div>
        </div>
    </div>
</template>
