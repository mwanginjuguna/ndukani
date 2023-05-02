<script setup>
import {defineProps} from "vue";
import PrimaryButton from "./PrimaryButton.vue";
import ProductCard from "./ProductCard.vue";
import {Link} from "@inertiajs/vue3";
import {useCartStore} from "../stores/CartStore";
import {useFlash} from "../Composables/useFlash";

let cart = useCartStore();

let {flash} = useFlash();


defineProps({
    topCategories: Object,
    bestSellers: Object,
})
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-indigo-100 rounded border-b border-gray-200">
            <h1 class="mt-3 mb-5 text-2xl font-medium text-slate-900">
                Best Sellers This Week
            </h1>
            <section class="grid grid-cols-2 md:grid-cols-3 gap-3">
                <!--product 2-->
                <div>

                    <!--product Ericsson-->
                    <ProductCard  @add-to-cart="cart.addToCart(6)" image-url="https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/02/666582/1.jpg?8617" percent-off="20" title="Black Traditional Culture Shirt" price="80.34">

                    </ProductCard>

                </div>

                <!--product 2-->
                <div>

                    <!--Skirt-->
                    <ProductCard @add-to-cart="flash('Oops!', 'Product out of stock. Please check again later.', 'info')" image-url="https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/16/139185/1.jpg?9225" percent-off="80" title="Ladies Leather Skirt - Short" price="150.00">

                    </ProductCard>

                </div>

                <!--product 3-->
                <div>

                    <!--product Ericsson-->
                    <ProductCard @add-to-cart="cart.addToCart(8)" image-url="https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/76/676084/1.jpg?6262" percent-off="35" title="Wlisth - Brand Men's Quartz Casual" price="42.99">

                    </ProductCard>

                </div>

            </section>


        </div>

        <div class="bg-gray-300 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

            <!--Flash Sale-->
            <div class="md:col-span-2 px-4 p-2 bg-white rounded">
                <div class="mt-5 py-3 px-4 flex justify-between bg-red-600">
                    <h3 class="font-semibold text-lg text-amber-300">Flash Sale</h3>
                    <Link :href="route('products')" class="text-amber-300 font-semibold flex flex-row place-content-center">
                        <p class="pr-2">See All</p>
                        <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                    </Link>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/56/709275/1.jpg?4535`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Men Official</p>
                        <p class="mt-1 font-semibold">$ 1,758.25</p>
                        <p class="text-xs text-gray-600 line-through">$ 1,676.25</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/23/638454/1.jpg?6012`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">E =mc<span class="align-super text-xs">2</span></p>
                        <p class="mt-1 font-semibold">299,792,458 m/s</p>
                        <p class="text-xs text-gray-600 line-through">3×108 m/s</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/490956/1.jpg?4111`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">High Heels</p>
                        <p class="mt-1 font-semibold">$ 100.00</p>
                        <p class="text-xs text-gray-600 line-through">$ 110.99</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/07/390244/1.jpg?9969`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Winter Kinamba Heavy Wear</p>
                        <p class="mt-1 font-semibold">$ 5.99</p>
                        <p class="text-xs text-gray-600 line-through">$ 6.50</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/84/751906/1.jpg?5258`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Ladies Shoes</p>
                        <p class="mt-1 font-semibold">$ 104,758.99</p>
                        <p class="text-xs text-gray-600 line-through">$ 155,676.00</p>
                    </div>

                </div>
            </div>


            <!--Savannist Fashion-->
            <div class="md:col-span-2 mt-5 p-2 pb-3 bg-white rounded">
                <div class="flex justify-between py-3 px-4 bg-lime-700">
                    <h3 class="font-semibold text-lg text-slate-100">Savannist Fashion</h3>
                    <Link :href="route('products')" class="text-amber-300 font-semibold flex flex-row place-content-center">
                        <p class="pr-2">See All</p>
                        <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                    </Link>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-y-3 gap-x-1 mt-1 font-light ">

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/272633/1.jpg?7170`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Mali Safi</p>
                        <p class="mt-1 font-semibold">$ 8.00</p>
                        <p class="text-xs text-gray-600 line-through">$ 8.01</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/84/788253/1.jpg?3496`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Big Five Africa</p>
                        <p class="mt-1 font-semibold">$ 204,758.00</p>
                        <p class="text-xs text-gray-600 line-through">$ 205,676.99</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/06/443053/1.jpg?7625`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Mara Mbili</p>
                        <p class="mt-1 font-semibold">$ 758.99</p>
                        <p class="text-xs text-gray-600 line-through">$ 976.50</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/76/140585/1.jpg?2555`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Ndovu ni kuu</p>
                        <p class="mt-1 font-semibold">$ 84,758.55</p>
                        <p class="text-xs text-gray-600 line-through">$ 105,676.26</p>
                    </div>

                    <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                        <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/59/739946/1.jpg?0622`" alt="product">
                        <p class="h-6 mt-1 overflow-hidden">Farasi</p>
                        <p class="mt-1 font-semibold">$ 14,758.00</p>
                        <p class="text-xs text-gray-600 line-through">$ 25,676.00</p>
                    </div>

                </div>
            </div>

            <div class="md:col-span-2">
                <div class="md:flex md:flex-row gap-x-px py-4 px-6 bg-slate-100 rounded shadow-md">

                    <div class="">
                        <img alt="phone-image" class="max-w-sm min-h-[20rem] bg-slate-100 rounded-lg max-h-[36rem] object-cover" :src="`https://maplestore.in/wp-content/uploads/2022/09/iphone-14-pro-finish-select-202209-6-7inch-deeppurple_AV1_GEO_EMEA.jpeg`">
                    </div>

                    <div class="md:my-auto">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">iPhone Pro Max 103R</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link :href="route('product-show', 4)" class="text-indigo-700 hover:text-indigo-800 text-xs font-semibold flex items-center ">
                                    More Details
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                    </svg>
                                </Link>
                            </p>
                        </div>

                        <div class="mt-2 flex flex-row gap-2">
                            <p>Price:</p>
                            <p class="text-orange-600 text-xs line-through align-super">was $168.99</p>
                            <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                        </div>
                        <PrimaryButton class="mt-3" @click.prevent="cart.addToCart(4)">Add to Cart</PrimaryButton>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
