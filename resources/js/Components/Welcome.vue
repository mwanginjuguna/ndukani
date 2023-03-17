<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {defineProps} from "vue";
import PrimaryButton from "./PrimaryButton.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    topCategories: Object,
    bestSellers: Object,
})
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-indigo-100 rounded border-b border-gray-200">
            <h1 class="mt-3 mb-5 text-2xl font-medium text-slate-900">
                Top Categories This Week
            </h1>
            <section class="grid grid-cols-1 md:grid-cols-3 gap-3">

                <!--product 1-->
                <div class="mx-auto py-4 pl-4 shadow-md bg-gray-100 rounded-md">
                    <div class="flex flex-row place-content-center">
                        <div class="h-48 w-48 text-center bg-rose-700 rounded-md">Image</div>
                        <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">-20%</p>
                    </div>
                    <div class="pr-4 mt-2.5">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">Nangos 103R</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link class="text-indigo-600 underline hover:text-indigo-500 text-xs">More Details</Link>
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row gap-2">
                        <p>Price:</p>
                        <p class="text-orange-600 text-xs line-through align-super">was $168.99</p>
                        <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                    </div>
                    <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                </div>

                <!--product 2-->
                <div class="mx-auto py-4 pl-4 shadow-md bg-gray-100 rounded-md">
                    <div class="flex flex-row place-content-center">
                        <div class="h-48 w-48 text-center bg-purple-900 rounded-md">Image</div>
                        <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">-36%</p>
                    </div>
                    <div class="pr-4 mt-2.5">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">Waya Pro Max</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link class="text-indigo-600 underline hover:text-indigo-500 text-xs">More Details</Link>
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row gap-2">
                        <p>Price:</p>
                        <p class="text-orange-600 text-xs line-through align-super">was $1500.00</p>
                        <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$1199.99</span></p>
                    </div>
                    <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                </div>

                <!--product 3-->
                <div class="mx-auto py-4 pl-4 shadow-md bg-gray-100 rounded-md">
                    <div class="flex flex-row place-content-center">
                        <div class="h-48 w-48 text-center bg-black rounded-md">Image</div>
                        <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">-80%</p>
                    </div>
                    <div class="pr-4 mt-2.5">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">Mulika X-r</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link class="text-indigo-600 underline hover:text-indigo-500 text-xs">More Details</Link>
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row gap-2">
                        <p>Price:</p>
                        <p class="text-orange-600 text-xs line-through align-super">was $18.50</p>
                        <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$7.99</span></p>
                    </div>
                    <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                </div>
            </section>


        </div>

        <div class="bg-gray-300 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <div>

                <!--product 1-->
                <div class="mx-auto py-4 pl-4 shadow-md bg-gray-100 rounded-md">
                    <div class="flex flex-row place-content-center">
                        <div class="h-48 w-48 text-center bg-rose-700 rounded-md">Image</div>
                        <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">-20%</p>
                    </div>
                    <div class="pr-4 mt-2.5">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">Nangos 103R</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link class="text-indigo-700 hover:text-indigo-800 text-xs font-semibold flex items-center ">
                                    More Details
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                    </svg>
                                </Link>
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row gap-2">
                        <p>Price:</p>
                        <p class="text-orange-600 text-xs line-through align-super">was $168.99</p>
                        <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                    </div>
                    <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                </div>

            </div>

            <div>

                <!--product 1-->
                <div class="mx-auto py-4 pl-4 shadow-md bg-gray-100 rounded-md">
                    <div class="flex flex-row place-content-center">
                        <div class="h-48 w-48 text-center bg-rose-700 rounded-md">Image</div>
                        <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">-20%</p>
                    </div>
                    <div class="pr-4 mt-2.5">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">Nangos 103R</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link class="text-indigo-700 hover:text-indigo-800 text-xs font-semibold flex items-center ">
                                    More Details
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                    </svg>
                                </Link>
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row gap-2">
                        <p>Price:</p>
                        <p class="text-orange-600 text-xs line-through align-super">was $168.99</p>
                        <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                    </div>
                    <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                </div>

            </div>

            <div>

                <!--product 1-->
                <div class="mx-auto py-4 pl-4 shadow-md bg-gray-100 rounded-md">
                    <div class="flex flex-row place-content-center">
                        <div class="h-48 w-48 text-center bg-rose-700 rounded-md">Image</div>
                        <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">-20%</p>
                    </div>
                    <div class="pr-4 mt-2.5">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">Nangos 103R</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link class="text-indigo-700 hover:text-indigo-800 text-xs font-semibold flex items-center ">
                                    More Details
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                    </svg>
                                </Link>
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row gap-2">
                        <p>Price:</p>
                        <p class="text-orange-600 text-xs line-through align-super">was $168.99</p>
                        <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                    </div>
                    <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                </div>

            </div>

            <div>

                <!--product 1-->
                <div class="mx-auto py-4 pl-4 shadow-md bg-gray-100 rounded-md">
                    <div class="flex flex-row place-content-center">
                        <div class="h-48 w-48 text-center bg-rose-700 rounded-md">Image</div>
                        <p class="w-fit h-fit p-2 rounded-full py-3.5 -ml-8 mt-2 bg-slate-700 text-lime-300">-20%</p>
                    </div>
                    <div class="pr-4 mt-2.5">
                        <h3 class="font-bold text-xl font-serif text-indigo-900 underline underline-offset-4">Nangos 103R</h3>
                        <div class="mt-2">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                <Link class="text-indigo-700 hover:text-indigo-800 text-xs font-semibold flex items-center ">
                                    More Details
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-indigo-500">
                                        <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
                                    </svg>
                                </Link>
                            </p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-row gap-2">
                        <p>Price:</p>
                        <p class="text-orange-600 text-xs line-through align-super">was $168.99</p>
                        <p class="text-green-600 text-sm font-semibold">Now <span class="underline text-lg">$99.99</span></p>
                    </div>
                    <PrimaryButton class="mt-3" @click.prevent="addToCart">Add to Cart</PrimaryButton>
                </div>

            </div>
        </div>
    </div>
</template>
