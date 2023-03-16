<script setup>
import { Link } from '@inertiajs/vue3';
import {ref} from "vue";

const showMenu = ref(false);

function toggleMenu() {
    showMenu.value = !showMenu.value;
}

</script>

<template>
    <div class="relative mt-3 md:mt-0">
        <!--trigger-->
        <div @click.prevent="toggleMenu" >
            <a class="flex flex-wrap max-w-fit gap-2 bg-gray-200 rounded-3xl pb-1 px-2 hover:underline hover:underline-offset-4">
                <p class="pt-1">Mega Menu</p>
                <svg fill="#64748b" version="1.1" id="Layer_1" class="pt-1.5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" stroke="#d1d5db"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M49.288,59.647c0.383,0.348,0.863,0.519,1.342,0.519c0.076,0,0.151-0.015,0.228-0.023c0.028,0.001,0.057,0.008,0.085,0.008 c0.545,0,1.088-0.222,1.482-0.657l15.231-16.804c0.742-0.818,0.68-2.083-0.139-2.824c-0.818-0.743-2.083-0.679-2.824,0.139 L50.656,55.49L35.169,41.453c-0.819-0.744-2.083-0.68-2.824,0.139c-0.742,0.818-0.68,2.083,0.139,2.824L49.288,59.647z"></path> <path d="M50,83.214c18.449,0,33.458-15.009,33.458-33.457c0-18.449-15.009-33.458-33.458-33.458 c-18.448,0-33.457,15.009-33.457,33.458C16.543,68.205,31.552,83.214,50,83.214z M50,20.299c16.243,0,29.458,13.215,29.458,29.458 c0,16.242-13.215,29.457-29.458,29.457c-16.242,0-29.457-13.215-29.457-29.457C20.543,33.514,33.758,20.299,50,20.299z"></path> </g> </g></svg>
            </a>
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="showMenu" class="fixed inset-0 z-40" @click="toggleMenu" />

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="showMenu"
                class="absolute z-50 mt-2 rounded-md shadow-lg md:w-96 max-w-2xl"
                style="display: none;"
                @click="toggleMenu"
            >
                <div class="ring-1 text-left bg-white text-sm rounded-lg grid grid-cols-1 md:grid-cols-3 mx-auto max-w-2xl min-w-fit my-1.5 ring-black ring-opacity-5 pr-4 divide-y md:divide-y-0">

                    <div class="col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-left">
                        <p class="font-semibold">Welcome</p>
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">About Us</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Blog</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Privacy Policy</Link>

                    </div>

                    <div class="md:col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-center">
                        <p class="font-semibold">Store</p>
                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Products</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Categories</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">New Arrivals</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Featured</Link>

                    </div>

                    <div class="md:col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-right">
                        <p class="font-semibold">Trending Categories</p>
                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Phones</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Samsung</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">iPhone</Link>

                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Macbook</Link>

                    </div>

                </div>
            </div>
        </transition>
    </div>
</template>
