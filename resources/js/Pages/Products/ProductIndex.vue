<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, usePage} from "@inertiajs/vue3";
import PrimaryButton from '@/Components/PrimaryButton.vue';
import useCart from "../../Composables/useCart";

const { addToCart } = useCart();

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="pt-3 pl-1.5 flex bg-white text-2xl text-amber-900 font-serif font-extrabold italic flex flex-wrap gap-x-6">
                Duka Products - Karibu Kastoma!
                <svg height="44px" width="44px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#D55400;" d="M433.253,125.646h-68.299c-10.777,0-19.514-8.737-19.514-19.514V82.324 c0-29.59,24.074-53.664,53.664-53.664s53.664,24.074,53.664,53.664v23.807C452.767,116.909,444.031,125.646,433.253,125.646z"></path> <path style="fill:#D55400;" d="M433.253,483.34h-68.299c-10.777,0-19.514-8.737-19.514-19.514v-120.61 c0-10.777,8.737-19.514,19.514-19.514h68.299c10.777,0,19.514,8.737,19.514,19.514v120.61 C452.767,474.604,444.031,483.34,433.253,483.34z"></path> </g> <g> <path style="fill:#E87E04;" d="M147.045,125.646H78.746c-10.777,0-19.514-8.737-19.514-19.514V82.324 c0-29.59,24.074-53.664,53.664-53.664s53.664,24.074,53.664,53.664v23.807C166.56,116.909,157.822,125.646,147.045,125.646z"></path> <path style="fill:#E87E04;" d="M147.045,483.34H78.746c-10.777,0-19.514-8.737-19.514-19.514v-120.61 c0-10.777,8.737-19.514,19.514-19.514h68.299c10.777,0,19.514,8.737,19.514,19.514v120.61 C166.56,474.604,157.822,483.34,147.045,483.34z"></path> </g> <path style="fill:#F2C500;" d="M466.467,362.729H45.533C20.426,362.729,0,342.303,0,317.196V132.15 c0-25.107,20.426-45.533,45.533-45.533h420.934c25.107,0,45.533,20.426,45.533,45.533v185.046 C512,342.303,491.573,362.729,466.467,362.729z"></path> <path style="fill:#F59D00;" d="M466.467,86.617H255.999v276.112h210.466c25.107,0,45.533-20.426,45.533-45.533V132.15 C512,107.043,491.573,86.617,466.467,86.617z"></path> <g> <path style="fill:#808285;" d="M116.532,246.625c-2.036,5.935-15.559,5.491-16.815,0l-4.285-19.534l-4.287,19.534 c-1.274,5.569-14.975,5.854-16.813,0L57.93,196.349c-1.698-5.081,10.836-8.842,12.281-3.791l12.528,42.282l6.511-27.858 c0.998-4.493,11.366-4.49,12.363,0l6.511,27.858l12.528-42.282c1.439-5.04,13.96-1.31,12.281,3.791L116.532,246.625z"></path> <path style="fill:#808285;" d="M157.254,215.305h12.363c5.083,0,5.24,9.891,0,9.891h-12.363v14.011h22.089 c5.096,0,5.255,11.209,0,11.209h-29.341c-2.802,0-5.606-1.319-5.606-3.956v-52.337c0-2.637,2.802-3.956,5.606-3.956h29.341 c5.258,0,5.093,11.209,0,11.209h-22.089V215.305z"></path> <path style="fill:#808285;" d="M201.022,250.416c-2.802,0-5.606-1.319-5.606-3.956v-52.42c0-2.72,3.215-3.873,6.428-3.873 c3.216,0,6.429,1.154,6.429,3.873v45.166h18.791c4.946,0,4.946,11.209,0,11.209h-26.042V250.416z"></path> <path style="fill:#808285;" d="M261.275,201.376c-4.698,0-7.418,2.637-7.418,8.243v21.842c0,5.604,2.72,8.241,7.5,8.241 c6.593,0,7.007-5.028,7.253-8.241c0.247-3.049,3.051-3.874,6.347-3.874c4.451,0,6.511,1.154,6.511,6.1 c0,21.775-40.468,25.498-40.468-2.226v-21.842c0-27.783,40.468-23.656,40.468-3.049c0,4.945-2.061,6.099-6.428,6.099 c-3.462,0-6.265-0.907-6.429-3.874C268.526,206.651,268.28,201.376,261.275,201.376z"></path> <path style="fill:#808285;" d="M293.917,231.46v-21.842c0-14.176,8.819-19.452,20.195-19.452c11.373,0,20.275,5.275,20.275,19.452 v21.842c0,14.176-8.902,19.452-20.275,19.452C302.736,250.911,293.917,245.637,293.917,231.46z M321.526,209.619 c0-5.688-2.801-8.243-7.417-8.243s-7.336,2.555-7.336,8.243v21.842c0,5.686,2.72,8.241,7.336,8.241s7.417-2.555,7.417-8.241 V209.619z"></path> <path style="fill:#808285;" d="M378.236,229.071c-1.841,3.116-6.593,3.32-8.323,0l-7.829-14.342v31.733 c0,5.275-12.859,5.275-12.859,0v-49.865c0-4.698,3.215-6.428,6.429-6.428c4.614,0,6.593,0.494,9.972,6.428l8.49,14.836 l8.489-14.836c3.38-5.935,5.356-6.428,9.973-6.428c3.295,0,6.428,1.73,6.428,6.428v49.865c0,5.275-12.859,5.275-12.859,0v-30.908 L378.236,229.071z"></path> <path style="fill:#808285;" d="M427.363,215.305h12.363c5.083,0,5.24,9.891,0,9.891h-12.363v14.011h22.089 c5.096,0,5.254,11.209,0,11.209h-29.341c-2.802,0-5.606-1.319-5.606-3.956v-52.337c0-2.637,2.802-3.956,5.606-3.956h29.341 c5.256,0,5.094,11.209,0,11.209h-22.089V215.305z"></path> </g> <g> <path style="fill:#6D6E71;" d="M274.954,227.589c-3.291,0-6.101,0.82-6.349,3.877c-0.247,3.213-0.65,8.235-7.246,8.235 c-2.277,0-4.085-0.598-5.36-1.847v12.814c11.526,2.368,25.472-4.189,25.472-16.977 C281.472,228.745,279.403,227.589,274.954,227.589z M255.999,190.433v12.762c1.249-1.224,3.031-1.821,5.269-1.821 c7.012,0,7.259,5.282,7.337,7.415c0.169,2.966,2.966,3.877,6.427,3.877c4.371,0,6.44-1.158,6.44-6.101 C281.472,194.465,267.513,188.052,255.999,190.433z"></path> <path style="fill:#6D6E71;" d="M293.917,231.46v-21.842c0-14.176,8.819-19.452,20.195-19.452c11.373,0,20.275,5.275,20.275,19.452 v21.842c0,14.176-8.902,19.452-20.275,19.452C302.736,250.911,293.917,245.637,293.917,231.46z M321.526,209.619 c0-5.688-2.801-8.243-7.417-8.243s-7.336,2.555-7.336,8.243v21.842c0,5.686,2.72,8.241,7.336,8.241s7.417-2.555,7.417-8.241 V209.619z"></path> <path style="fill:#6D6E71;" d="M378.236,229.071c-1.841,3.116-6.593,3.32-8.323,0l-7.829-14.342v31.733 c0,5.275-12.859,5.275-12.859,0v-49.865c0-4.698,3.215-6.428,6.429-6.428c4.614,0,6.593,0.494,9.972,6.428l8.49,14.836 l8.489-14.836c3.38-5.935,5.356-6.428,9.973-6.428c3.295,0,6.428,1.73,6.428,6.428v49.865c0,5.275-12.859,5.275-12.859,0v-30.908 L378.236,229.071z"></path> <path style="fill:#6D6E71;" d="M427.363,215.305h12.363c5.083,0,5.24,9.891,0,9.891h-12.363v14.011h22.089 c5.096,0,5.254,11.209,0,11.209h-29.341c-2.802,0-5.606-1.319-5.606-3.956v-52.337c0-2.637,2.802-3.956,5.606-3.956h29.341 c5.256,0,5.094,11.209,0,11.209h-22.089V215.305z"></path> </g> </g></svg>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-4">
                <div class="bg-gray-50 shadow-xl sm:rounded-lg overflow-hidden">
                    <!--content-->
                    <div class="max-w-6xl">

                        <!--Masaa machache-->
                        <div class="mt-3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                                <div class="md:col-span-2 md:flex md:flex-row gap-x-px md:gap-6 py-10 px-6 bg-green-500 text-white rounded shadow-md">
                                    <div class="">
                                        <img alt="phone-image" class="max-w-xs rounded-lg max-h-[36rem] object-cover" :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/76/676084/1.jpg?6262`">
                                    </div>
                                    <div class="md:my-auto">
                                        <h3 class="font-bold text-black text-xl font-serif underline underline-offset-4">Masaa Machache</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                <Link :href="route('product-show', 8)" class="text-blue-900 text-xs font-semibold flex items-center ">
                                                    More Details
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                                    </svg>
                                                </Link>
                                            </p>
                                        </div>

                                        <div class="mt-2 flex flex-row gap-2">
                                            <p>Price:</p>
                                            <p class="text-orange-200 text-xs line-through align-super">was $168.99</p>
                                            <p class="text-green-900 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                                        </div>
                                        <PrimaryButton class="mt-3" @click.prevent="addToCart(8)">Add to Cart</PrimaryButton>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--recently viewed-->
                        <div class="px-4 p-2 pb-3 bg-white rounded">
                            <div class="mt-5 py-6 flex justify-between">
                                <h3 class="font-semibold text-lg text-slate-900">Recently Viewed</h3>
                                <Link :href="route('products')" class="text-amber-600 font-semibold flex flex-row place-content-center">
                                    <p class="pr-2">See All</p>
                                    <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                                </Link>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-1 mt-1 font-light ">

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

                        <!--Flash Sale-->
                        <div class="px-4 p-2 pb-3 bg-white rounded">
                            <div class="mt-5 py-3 px-4 flex justify-between bg-red-600">
                                <h3 class="font-semibold text-lg text-amber-300">Flash Sale</h3>
                                <Link :href="route('products')" class="text-amber-300 font-semibold flex flex-row place-content-center">
                                    <p class="pr-2">See All</p>
                                    <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                                </Link>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-1 mt-1 font-light ">

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

                        <!--Somsong-->
                        <div class="mt-16">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                                <div class="md:col-span-2 md:flex md:flex-row gap-x-px md:gap-6 py-10 px-6 bg-green-500 text-white rounded shadow-md">
                                    <div class="">
                                        <img alt="phone-image" class="max-w-xs rounded-lg max-h-[36rem] object-cover" :src="`https://www.mobilephonemuseum.com/assets/static/e57d5c2a34aef9308ac96a89187daa3b/9d75f/fd09a85d-5dfd-436d-be83-4667ecd73e05.png`">
                                    </div>
                                    <div class="md:my-auto">
                                        <Link :href="route('product')" class="font-bold text-black text-xl font-serif underline underline-offset-4">Somsong Max Pro</Link>
                                        <div class="mt-2">
                                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                <Link :href="route('product')" class="text-blue-900 text-xs font-semibold flex items-center ">
                                                    More Details
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                                    </svg>
                                                </Link>
                                            </p>
                                        </div>

                                        <div class="mt-2 flex flex-row gap-2">
                                            <p>Price:</p>
                                            <p class="text-orange-200 text-xs line-through align-super">was $168.99</p>
                                            <p class="text-green-900 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                                        </div>
                                        <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--mulika mwizi edition-->
                        <div class="mt-5 p-2 pb-3 bg-white rounded">
                            <div class="flex justify-between py-3 px-4 bg-amber-200">
                                <h3 class="font-semibold text-lg text-slate-900">Limited Edition</h3>
                                <Link :href="route('products')" class="text-amber-700 font-semibold flex flex-row place-content-center">
                                    <p class="pr-2">See All</p>
                                    <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                                </Link>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-1 mt-1 font-light ">

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/88/669029/1.jpg?9478`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">iPhone 14 Pro Max</p>
                                    <p class="mt-1 font-semibold">$ 124,758</p>
                                    <p class="text-xs text-gray-600 line-through">$ 135,676</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/34/207378/1.jpg?8371`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Nokia 105 - #TBT Old Skull</p>
                                    <p class="mt-1 font-semibold">$ 9.99</p>
                                    <p class="text-xs text-gray-600 line-through">$ 11.50</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/81/330286/1.jpg?5345`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Nokia 3310</p>
                                    <p class="mt-1 font-semibold">$ 4.80</p>
                                    <p class="text-xs text-gray-600 line-through">$ 5.76</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/35/8047221/1.jpg?5225`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Bontel 911 -  Flip Phone</p>
                                    <p class="mt-1 font-semibold">$ 18.00</p>
                                    <p class="text-xs text-gray-600 line-through">$ 26.99</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/979255/1.jpg?6349`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Bontel T1000 - Wireless Desktop Phone</p>
                                    <p class="mt-1 font-semibold">$ 28.99</p>
                                    <p class="text-xs text-gray-600 line-through">$ 35.50</p>
                                </div>

                            </div>
                        </div>

                        <!--trending products-->
                        <div class="mt-5 p-2 pb-3 bg-white rounded">
                            <div class="flex justify-between py-3 px-4">
                                <h3 class="font-semibold text-lg text-slate-900">Trending Products</h3>
                                <Link :href="route('products')" class="text-amber-600 font-semibold flex flex-row place-content-center">
                                    <p class="pr-2">See All</p>
                                    <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                                </Link>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-1 mt-1 font-light ">

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/79/855498/1.jpg?2952`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">EliteBook Revolve 810 G3 TOUCHSCREEN-Core I5-8GB RAM,256GB SSD</p>
                                    <p class="mt-1 font-semibold">$ 4,758.50</p>
                                    <p class="text-xs text-gray-600 line-through">$ 5,676.50</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/53/509765/1.jpg?8258`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Ulinzi</p>
                                    <p class="mt-1 font-semibold">$ 478.99</p>
                                    <p class="text-xs text-gray-600 line-through">$ 676.99</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/51/991613/1.jpg?7090`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Goodnight Offer</p>
                                    <p class="mt-1 font-semibold">$ 758.99</p>
                                    <p class="text-xs text-gray-600 line-through">$ 5,676.99</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/76/203834/1.jpg?4392`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Jikoni Kitchenware</p>
                                    <p class="mt-1 font-semibold">$ 458.00</p>
                                    <p class="text-xs text-gray-600 line-through">$ 576.00</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/73/925159/1.jpg?3186`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Luminous Fluorescent Glow InThe Dark StarsWallSticker</p>
                                    <p class="mt-1 font-semibold">$ 58.00</p>
                                    <p class="text-xs text-gray-600 line-through">$ 59.99</p>
                                </div>

                            </div>
                        </div>

                        <div class="mt-16">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                                <div class="md:col-span-2 md:flex md:flex-row gap-x-px md:gap-6 py-10 px-6 bg-green-500 text-white rounded shadow-md">
                                    <div class="">
                                        <img alt="phone-image" class="max-w-xs rounded-lg max-h-[36rem] object-cover" :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/40/676158/1.jpg?9873`">
                                    </div>
                                    <div class="md:my-auto">
                                        <Link :href="route('product-show', 6)" class="font-bold text-black text-xl font-serif underline underline-offset-4">Kitenge Tupu</Link>
                                        <div class="mt-2">
                                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                <Link :href="route('product-show', 6)" class="text-blue-900 text-xs font-semibold flex items-center ">
                                                    More Details
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                                    </svg>
                                                </Link>
                                            </p>
                                        </div>

                                        <div class="mt-2 flex flex-row gap-2">
                                            <p>Price:</p>
                                            <p class="text-orange-200 text-xs line-through align-super">was $168.99</p>
                                            <p class="text-green-900 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                                        </div>
                                        <PrimaryButton class="mt-3" @click.prevent="addToCart(6)">Add to Cart</PrimaryButton>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Savannist Fashion-->
                        <div class="mt-5 p-2 pb-3 bg-white rounded">
                            <div class="flex justify-between py-3 px-4 bg-lime-700">
                                <h3 class="font-semibold text-lg text-slate-100">Savannist Fashion</h3>
                                <Link :href="route('products')" class="text-amber-300 font-semibold flex flex-row place-content-center">
                                    <p class="pr-2">See All</p>
                                    <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                                </Link>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-1 mt-1 font-light ">

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

                        <!--kitenge arrivals-->
                        <div class="mt-5 pb-4 p-2 bg-white rounded">
                            <div class="flex justify-between py-3 px-4 bg-amber-900 text-white">
                                <h3 class="font-semibold text-lg">Kitenge Arrivals</h3>
                                <Link :href="route('products')" class="font-semibold flex flex-row place-content-center">
                                    <p class="pr-2">See All</p>
                                    <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                                </Link>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-1 font-light ">

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/30/300581/1.jpg?0437`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Laghunya T</p>
                                    <p class="mt-1 font-semibold">$ 258.50</p>
                                    <p class="text-xs text-gray-600 line-through">$ 676.50</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/39/572158/1.jpg?3872`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Lion Man</p>
                                    <p class="mt-1 font-semibold">$ 478.05</p>
                                    <p class="text-xs text-gray-600 line-through">$ 576.05</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/88/286613/1.jpg?0668`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Usiku Sacco</p>
                                    <p class="mt-1 font-semibold">$ 58.99</p>
                                    <p class="text-xs text-gray-600 line-through">$ 76.99</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/44/0880001/1.jpg?7129`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Samsung Blah Blah Pro Max XD HD YT MD</p>
                                    <p class="mt-1 font-semibold">$ 4,758.00</p>
                                    <p class="text-xs text-gray-600 line-through">$ 5,676.00</p>
                                </div>

                                <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                    <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/05/440354/1.jpg?5572`" alt="product">
                                    <p class="h-6 mt-1 overflow-hidden">Kiondo Special</p>
                                    <p class="mt-1 font-semibold">$ 40.25</p>
                                    <p class="text-xs text-gray-600 line-through">$ 56.25</p>
                                </div>

                            </div>
                        </div>

                        <div class="mt-16">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                                <div class="md:col-span-2 md:flex md:flex-row gap-x-px md:gap-6 py-10 px-6 bg-green-500 text-white rounded shadow-md">
                                    <div class="">
                                        <img alt="phone-image" class="max-w-xs rounded-lg max-h-[36rem] object-cover" :src="`https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/02/666582/1.jpg?8617`">
                                    </div>
                                    <div class="md:my-auto">
                                        <Link :href="route('product-show', 7)" class="font-bold text-black text-xl font-serif underline underline-offset-4">Mambo Zamani African Print Men Shirt</Link>
                                        <div class="mt-2">
                                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                <Link :href="route('product-show', 7)" class="text-blue-900 text-xs font-semibold flex items-center ">
                                                    More Details
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                                    </svg>
                                                </Link>
                                            </p>
                                        </div>

                                        <div class="mt-2 flex flex-row gap-2">
                                            <p>Price:</p>
                                            <p class="text-orange-200 text-xs line-through align-super">was $168.99</p>
                                            <p class="text-green-900 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                                        </div>
                                        <PrimaryButton class="mt-3" @click.prevent="addToCart(7)">Add to Cart</PrimaryButton>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--footer-->
                    <div class="mt-12 text-center md:text-left px-8 w-full grid sm:grid-cols-3 gap-x-6 py-8 bg-slate-50 bg-opacity-75">

                        <div class="bg-white p-3 rounded shadow-sm">
                            <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                                <h3 class="font-semibold uppercase text-base">Our Company</h3>
                                <a href="/coming-soon" class="pl-1.5">About</a>
                                <a href="/coming-soon" class="pl-1.5">Investor</a>
                                <a href="/coming-soon" class="pl-1.5">People</a>
                                <a href="/coming-soon" class="pl-1.5">Careers</a>
                            </div>
                        </div>

                        <div class="col-span-1 bg-white p-3 rounded shadow-sm">
                            <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                                <h3 class="font-semibold uppercase text-base">Community Relations</h3>
                                <a href="/coming-soon" class="pl-1.5">Our Foundation</a>
                                <a href="/coming-soon" class="pl-1.5">Initiatives</a>
                                <a href="/coming-soon" class="pl-1.5">Climate Responsibility</a>
                                <a href="/coming-soon" class="pl-1.5">Sustainability Reports</a>
                            </div>
                        </div>

                        <div class="col-span-1 bg-white p-3 rounded shadow-sm">
                            <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                                <h3 class="font-semibold uppercase text-base">Contact Me</h3>
                                <a href="/coming-soon" class="pl-1.5">
                                    <span class="pr-2 font-semibold">Email: </span> francis@mwangikanothe.com
                                </a>

                                <a href="https://mwangikanothe.com" class="pl-1.5">
                                    <span class="pr-2 font-semibold">Website: </span> mwangikanothe.com
                                </a>

                                <a href="https://github.com/Francis-Kanothe" class="pl-1.5">
                                    <span class="pr-2 font-semibold">Github: </span> Francis Kanothe
                                </a>

                                <a href="https://twitter.com/mwangikanothe" class="pl-1.5">
                                    <span class="pr-2 font-semibold">Twitter: </span> @mwangikanothe
                                </a>
                            </div>
                        </div>

                        <!--bottom bar-->
                        <div class="md:col-span-3 md:col-start-2 flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                                <div class="flex items-center gap-4">
                                    <a href="https://github.com/Francis-Kanothe" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                        Developer
                                    </a>
                                </div>
                            </div>

                            <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                This design is inspired by jumia.co.ke
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
