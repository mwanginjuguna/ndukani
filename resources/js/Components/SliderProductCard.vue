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
    <div class="mx-auto py-4 md:pl-4 shadow-sm bg-slate-100 object-cover rounded-md">
        <div v-if="imageUrl" class="flex flex-row place-content-center">
            <img alt="product-1"
                 :src="imageUrl"
                 class="h-[20rem] object-contain rounded-xl w-3/4 max-w-xs">
            <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">
                -{{ percentOff ? percentOff : 15 }}%
            </p>
        </div>

        <div class="grid place-content-center">
            <div class="px-4 md:px-0 md:pr-4 mt-2.5">
                <h3 class="font-semibold text-lg font-serif text-slate-700 underline underline-offset-4">{{ title ? title : '' }}</h3>
                <div class="mt-2">
                    <slot name="description" />


                    <div v-if="features" class="text-base leading-tight"><span class="font-semibold">Features: </span>{{ features ? features : '' }}
                        <Link class="text-indigo-700 hover:text-indigo-800 text-xs font-semibold flex items-center inline-flex">
                            More Details
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>

            <div v-if="price" class="px-4 mt-2 flex flex-row sm:gap-4 text-sm">
                <p class="mt-3 pr-4 font-semibold">Price:</p>
                <div>
                    <p v-if="percentOff" class="text-orange-600 text-xs line-through align-super">
                        was ${{ initialPrice }}
                    </p>
                    <p class="text-green-600 font-semibold">
                        Now <span class="underline text-lg">${{ price ?? '' }}</span>
                    </p>
                </div>
            </div>
            <PrimaryButton class="mt-3 mx-4 md:mx-0" @click.prevent="addToCart">
                Add to Cart
            </PrimaryButton>
        </div>
    </div>
</template>
