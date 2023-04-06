<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ProductCard from "../Components/ProductCard.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import Dropdown from "../Components/Dropdown.vue";
import DropdownLink from "../Components/DropdownLink.vue";
import {ref} from "vue";
import MenuDropdown from "../Components/MenuDropdown.vue";
import HeroLandscapeSlider from "./Products/Partials/HeroLandscapeSlider.vue";

const showMenu = ref(false);

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

function search() {
    console.log('searching...')
}
function toggleMenu() {
    showMenu.value = !showMenu.value;
}
</script>

<template>
    <Head title="Karibu Kastoma!" />

    <div class="relative min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <!--Check auth-->
        <div v-if="canLogin" class="w-full sm:sticky sm:top-0 sm:right-0 p-4 border-b bg-white text-right">

            <!--Navbar-->
            <div class="sm:flex sm:justify-between text-sm max-w-6xl mx-auto">
                <div class="flex flex-row justify-between">
                    <!--humberger-->
                    <div class="sm:pr-4 block md:hidden">
                        <svg width="24px" height="24px" class="mt-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#454545"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 17H20M4 12H20M4 7H20" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </div>

                    <!--search bar-->
                    <div>
                        <label for="search" class="flex flex-wrap rounded-lg md:rounded-full px-1.5 bg-gray-100 shadow-sm text-gray-600">
                            <button>
                            <svg width="21px" height="21px" class="mt-px pl-1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#828282"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 21L16.65 16.65M11 6C13.7614 6 16 8.23858 16 11M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                            </svg>
                            </button>

                            <input @input="search" class="bg-gray-100 px-2 py-1 m-1.5 border-none outline-none" placeholder="Search...">
                        </label>
                    </div>

                    <!--menu-->
                    <div class="mx-6 flex justify-between mb-2 sm:mb-0">
                        <MenuDropdown>
                            <template v-slot:trigger>
                                <button class="flex flex-wrap max-w-fit gap-2 bg-gray-200 rounded-3xl pb-1 px-2 hover:underline hover:underline-offset-4">
                                    <p class="pt-1">Mega Menu</p>
                                    <svg fill="#64748b" version="1.1" id="Layer_1" class="pt-1.5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" stroke="#d1d5db"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M49.288,59.647c0.383,0.348,0.863,0.519,1.342,0.519c0.076,0,0.151-0.015,0.228-0.023c0.028,0.001,0.057,0.008,0.085,0.008 c0.545,0,1.088-0.222,1.482-0.657l15.231-16.804c0.742-0.818,0.68-2.083-0.139-2.824c-0.818-0.743-2.083-0.679-2.824,0.139 L50.656,55.49L35.169,41.453c-0.819-0.744-2.083-0.68-2.824,0.139c-0.742,0.818-0.68,2.083,0.139,2.824L49.288,59.647z"></path> <path d="M50,83.214c18.449,0,33.458-15.009,33.458-33.457c0-18.449-15.009-33.458-33.458-33.458 c-18.448,0-33.457,15.009-33.457,33.458C16.543,68.205,31.552,83.214,50,83.214z M50,20.299c16.243,0,29.458,13.215,29.458,29.458 c0,16.242-13.215,29.457-29.458,29.457c-16.242,0-29.457-13.215-29.457-29.457C20.543,33.514,33.758,20.299,50,20.299z"></path> </g> </g></svg>
                                </button>
                            </template>

                            <template v-slot:default>
                                <div class="text-left text-sm grid grid-cols-1 md:grid-cols-3 mx-auto max-w-2xl min-w-fit my-1.5 pr-4 divide-y md:divide-y-0">

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
                            </template>
                        </MenuDropdown>
                    </div>

                </div>

                <!--login & register links-->
                <div class="sm:flex sm:gap-4">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>
                    <template v-else>
                        <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                        <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
                    </template>
                </div>
            </div>

        </div>

        <!--content-->
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="mt-3 flex justify-center bg-white text-5xl text-amber-500 font-serif font-extrabold italic">
                Karibu Kastoma!
            </div>

            <!--hero section-->
            <div class="mt-3">
                <div class="grid grid-cols-1 md:grid-cols-5">

                    <div id="menu-col" class="col-span-1 mr-3 py-1.5 max-h-[385px] text-xs font-light bg-white rounded-md shadow-md flex flex-col gap-y-2">

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 24 24" id="apple-fruit" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M19.92,12.38c-.5,4.55-2.6,8.62-4.73,8.62-1.39,0-1.71-1-3.19-1s-1.81,1-3.19,1c-2.13,0-4.23-4.07-4.73-8.62-.35-3.23.46-5.24,2.42-6.06C9,5.27,10.41,7,12,7s3-1.73,5.49-.68C19.45,7.14,20.28,9.15,19.92,12.38Z" style="fill: #ffffff; stroke-width: 2;"></path><path id="primary" d="M12,7a5.11,5.11,0,0,1,2-4" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M19.92,12.38c-.5,4.55-2.6,8.62-4.73,8.62-1.39,0-1.71-1-3.19-1s-1.81,1-3.19,1c-2.13,0-4.23-4.07-4.73-8.62-.35-3.23.46-5.24,2.42-6.06C9,5.27,10.41,7,12,7s3-1.73,5.49-.68C19.45,7.14,20.28,9.15,19.92,12.38Z" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                            <p class="pt-px">Supermarket</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M848.745 112.64h61.44c5.657 0 10.24 4.583 10.24 10.24v61.44c0 67.865-55.015 122.88-122.88 122.88h-112.64c-67.865 0-122.88-55.015-122.88-122.88v-61.44c0-5.657 4.583-10.24 10.24-10.24h61.44c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-61.44c-28.278 0-51.2 22.922-51.2 51.2v61.44c0 90.486 73.354 163.84 163.84 163.84h112.64c90.486 0 163.84-73.354 163.84-163.84v-61.44c0-28.278-22.922-51.2-51.2-51.2h-61.44c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path><path d="M725.865 343.04v423.936c0 28.113-23.087 51.2-51.2 51.2h-81.92c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h81.92c50.735 0 92.16-41.425 92.16-92.16V343.04c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z"></path><path d="M572.265 834.56c0-42.418-34.382-76.8-76.8-76.8s-76.8 34.382-76.8 76.8 34.382 76.8 76.8 76.8 76.8-34.382 76.8-76.8zm40.96 0c0 65.04-52.72 117.76-117.76 117.76s-117.76-52.72-117.76-117.76 52.72-117.76 117.76-117.76 117.76 52.72 117.76 117.76zM490.194 349.189c55.982 55.982 55.982 146.752 0 202.747L338.13 703.989c-19.989 19.989-52.412 19.989-72.401 0L113.663 551.933c-55.981-55.993-55.981-146.762.003-202.746 51.387-51.376 132.065-55.602 188.263-12.676 56.198-42.926 136.876-38.7 188.265 12.678zm-202.746 28.963c-39.987-39.987-104.824-39.987-144.82 0-39.987 39.987-39.987 104.824 0 144.819l152.064 152.054c3.993 3.993 10.482 3.993 14.475 0l152.062-152.052c39.989-39.997 39.989-104.835.003-144.82-39.997-39.989-104.835-39.989-144.821-.002-7.998 7.998-20.965 7.998-28.963 0z"></path></g></svg>
                            <p class="pt-px">Health and Beauty</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M914.882 306.748l-.137-.068.137.068zm-804.149.079l.071-.035-.071.035zM535.3 117.806c-14.144-6.889-30.674-6.889-44.667-.078L140.259 292.131h745.258L535.3 117.806zM472.543 80.98c25.474-12.401 55.229-12.401 80.851.08l379.58 188.941c31.686 15.429 20.713 63.09-14.537 63.09h-811.09c-35.208 0-46.216-47.563-14.642-63.044L472.542 80.98zM911.36 908.763v-40.96H112.64v40.96h798.72zm10.24 40.96H102.4c-16.963 0-30.72-13.757-30.72-30.72v-61.44c0-16.963 13.757-30.72 30.72-30.72h819.2c16.963 0 30.72 13.757 30.72 30.72v61.44c0 16.963-13.757 30.72-30.72 30.72zM627.539 540.439c41.324 14.269 69.619 53.31 69.619 97.746 0 57.103-46.28 103.383-103.383 103.383-38.183 0-72.667-20.854-90.712-53.74-5.441-9.916-17.89-13.544-27.807-8.103s-13.544 17.89-8.103 27.807c25.168 45.868 73.336 74.997 126.622 74.997 79.724 0 144.343-64.619 144.343-144.343 0-62.038-39.497-116.535-97.211-136.463-10.691-3.692-22.351 1.983-26.043 12.674s1.983 22.351 12.674 26.043z"></path><path d="M532.896 505.595c0-57.092-46.291-103.383-103.383-103.383S326.13 448.503 326.13 505.595s46.291 103.383 103.383 103.383 103.383-46.291 103.383-103.383zm40.96 0c0 79.714-64.629 144.343-144.343 144.343S285.17 585.309 285.17 505.595c0-79.714 64.629-144.343 144.343-144.343s144.343 64.629 144.343 144.343zM145.861 312.609v534.712c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V312.609c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48zm692.906 0v534.712c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V312.609c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z"></path></g></svg>
                            <p class="pt-px">Home & Office</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M962.26 331.227c0-35.404-28.433-64.041-63.437-64.041s-63.437 28.636-63.437 64.041c0 35.404 28.433 64.041 63.437 64.041s63.437-28.636 63.437-64.041zm40.96 0c0 57.961-46.705 105.001-104.397 105.001s-104.397-47.04-104.397-105.001c0-57.961 46.705-105.001 104.397-105.001s104.397 47.04 104.397 105.001z"></path><path d="M791.244 283.667c0-49.716-124.664-99.348-280.494-99.348-155.822 0-280.484 49.633-280.484 99.348s124.662 99.348 280.484 99.348c155.831 0 280.494-49.633 280.494-99.348zm40.96 0c0 82.646-144.832 140.308-321.454 140.308-176.614 0-321.444-57.663-321.444-140.308s144.83-140.308 321.444-140.308c176.622 0 321.454 57.662 321.454 140.308z"></path><path d="M792.404 283.129v84.705c0 156.652-127.623 283.679-285.102 283.679-152.954 0-276.91-123.372-276.91-275.517v-92.867h-40.96v92.867c0 174.81 142.338 316.477 317.87 316.477 180.058 0 326.062-145.322 326.062-324.639v-84.705h-40.96z"></path><path d="M863.042 554.415c77.863 32.638 119.994 73.652 119.994 112.829 0 89.94-210.031 172.329-471.04 172.329-261.002 0-471.04-82.391-471.04-172.329 0-39.683 43.249-81.235 122.886-114.029 10.459-4.307 15.446-16.277 11.139-26.736s-16.277-15.446-26.736-11.139C54.933 553.766-.004 606.548-.004 667.244c0 123.031 230.093 213.289 512 213.289 281.914 0 512-90.256 512-213.289 0-60.011-53.696-112.282-145.119-150.605-10.431-4.373-22.432.539-26.805 10.97s.539 22.432 10.97 26.805z"></path></g></svg>
                            <p class="pt-px">Appliances</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M697.887 777.86c22.625 0 40.96-18.335 40.96-40.96V205.444c0-22.625-18.335-40.96-40.96-40.96H328.223c-22.625 0-40.96 18.335-40.96 40.96V736.9c0 22.625 18.335 40.96 40.96 40.96h369.664zm0 40.96H328.223c-45.246 0-81.92-36.674-81.92-81.92V205.444c0-45.246 36.674-81.92 81.92-81.92h369.664c45.246 0 81.92 36.674 81.92 81.92V736.9c0 45.246-36.674 81.92-81.92 81.92zM431.77 103.556h162.56c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H431.77c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path><path d="M759.86 982.66c45.245 0 81.92-36.675 81.92-81.92V122.879c0-45.245-36.675-81.92-81.92-81.92H266.241c-45.245 0-81.92 36.675-81.92 81.92V900.74c0 45.245 36.675 81.92 81.92 81.92H759.86zm0 40.96H266.241c-67.866 0-122.88-55.014-122.88-122.88V122.879c0-67.866 55.014-122.88 122.88-122.88H759.86c67.866 0 122.88 55.014 122.88 122.88V900.74c0 67.866-55.014 122.88-122.88 122.88z"></path><path d="M533.53 900.74c0-11.309-9.171-20.48-20.48-20.48s-20.48 9.171-20.48 20.48c0 11.309 9.171 20.48 20.48 20.48s20.48-9.171 20.48-20.48zm40.96 0c0 33.931-27.509 61.44-61.44 61.44s-61.44-27.509-61.44-61.44 27.509-61.44 61.44-61.44 61.44 27.509 61.44 61.44z"></path></g></svg>
                            <p class="pt-px">Phones & Tablets</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M486.233 701.019v135.383c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V701.019c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z"></path><path d="M354.82 878.591h312.32c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H354.82c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48zm595.46-207.268c16.849 0 30.72-13.871 30.72-30.72V215.039c0-16.849-13.871-30.72-30.72-30.72H71.678c-16.849 0-30.72 13.871-30.72 30.72v425.564c0 16.849 13.871 30.72 30.72 30.72H950.28zm0 40.96H71.678c-39.471 0-71.68-32.209-71.68-71.68V215.039c0-39.471 32.209-71.68 71.68-71.68H950.28c39.471 0 71.68 32.209 71.68 71.68v425.564c0 39.471-32.209 71.68-71.68 71.68z"></path><path d="M332.679 155.483L17.512 470.65c-7.998 7.998-7.998 20.965 0 28.963s20.965 7.998 28.963 0l315.167-315.167c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0zm189.013 5.546l-501.76 501.76c-7.998 7.998-7.998 20.965 0 28.963s20.965 7.998 28.963 0l501.76-501.76c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0z"></path></g></svg>
                            <p class="pt-px">Computing</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M461.913,86.261h-199l54.979-54.979c6.521-6.516,6.521-17.092,0-23.609c-6.521-6.521-17.087-6.521-23.609,0 l-71.674,71.674L150.934,7.675c-6.521-6.521-17.087-6.521-23.609,0c-6.521,6.516-6.521,17.092,0,23.609l54.979,54.978H50.087 C22.468,86.261,0,108.729,0,136.348v322.783c0,27.619,22.468,50.087,50.087,50.087h411.826c27.619,0,50.087-22.468,50.087-50.087 V136.348C512,108.729,489.532,86.261,461.913,86.261z M378.435,392.348c0,27.619-22.468,50.087-50.087,50.087H116.87 c-27.619,0-50.087-22.468-50.087-50.087V203.131c0-27.619,22.468-50.087,50.087-50.087h211.478 c27.619,0,50.087,22.468,50.087,50.087V392.348z M428.522,442.435c-9.22,0-16.696-7.475-16.696-16.696s7.475-16.696,16.696-16.696 s16.696,7.475,16.696,16.696S437.742,442.435,428.522,442.435z M428.522,375.652c-9.22,0-16.696-7.475-16.696-16.696 c0-9.22,7.475-16.696,16.696-16.696s16.696,7.475,16.696,16.696C445.217,368.177,437.742,375.652,428.522,375.652z M445.217,292.174c0,9.223-7.473,16.696-16.696,16.696c-9.223,0-16.696-7.473-16.696-16.696v-27.826 c0-9.223,7.473-16.696,16.696-16.696c9.223,0,16.696,7.473,16.696,16.696V292.174z M445.217,197.565 c0,9.223-7.473,16.696-16.696,16.696c-9.223,0-16.696-7.473-16.696-16.696v-27.826c0-9.223,7.473-16.696,16.696-16.696 c9.223,0,16.696,7.473,16.696,16.696V197.565z"></path> </g> </g> </g></svg>
                            <p class="pt-px">TVs & Audio</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M399.376 511.864c0-79.101-64.112-143.227-143.196-143.227s-143.196 64.125-143.196 143.227c0 79.101 64.112 143.227 143.196 143.227s143.196-64.125 143.196-143.227zm40.96 0c0 101.721-82.448 184.187-184.156 184.187S72.024 613.585 72.024 511.864c0-101.721 82.448-184.187 184.156-184.187s184.156 82.466 184.156 184.187zm470.678 0c0-79.101-64.112-143.227-143.196-143.227s-143.196 64.125-143.196 143.227c0 79.101 64.112 143.227 143.196 143.227s143.196-64.125 143.196-143.227zm40.96 0c0 101.721-82.448 184.187-184.156 184.187s-184.156-82.466-184.156-184.187c0-101.721 82.448-184.187 184.156-184.187s184.156 82.466 184.156 184.187z"></path><path d="M446.887 528.78c19.498-9.621 40.989-14.69 63.253-14.69 28.951 0 56.584 8.596 80.052 24.447 9.373 6.331 22.104 3.865 28.434-5.509s3.865-22.104-5.509-28.434c-30.185-20.388-65.79-31.464-102.978-31.464-28.584 0-56.273 6.531-81.377 18.918-10.143 5.005-14.309 17.285-9.304 27.428s17.285 14.309 27.428 9.304zM51.2 590.025c-28.278 0-51.2-22.922-51.2-51.2v-63.416c0-28.278 22.922-51.2 51.2-51.2h10.588c28.278 0 51.2 22.922 51.2 51.2v63.416c0 28.278-22.922 51.2-51.2 51.2H51.2zm0-40.96h10.588c5.657 0 10.24-4.583 10.24-10.24v-63.416c0-5.657-4.583-10.24-10.24-10.24H51.2a10.238 10.238 0 00-10.24 10.24v63.416c0 5.657 4.583 10.24 10.24 10.24zm911.014 40.96c-28.278 0-51.2-22.922-51.2-51.2v-63.416c0-28.278 22.922-51.2 51.2-51.2h10.588c28.278 0 51.2 22.922 51.2 51.2v63.416c0 28.278-22.922 51.2-51.2 51.2h-10.588zm0-40.96h10.588c5.657 0 10.24-4.583 10.24-10.24v-63.416c0-5.657-4.583-10.24-10.24-10.24h-10.588a10.238 10.238 0 00-10.24 10.24v63.416c0 5.657 4.583 10.24 10.24 10.24z"></path></g></svg>
                            <p class="pt-px">Fashion</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1069 1069" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect height="1066.67" id="Console" style="fill:none;" width="1066.67" x="1.397" y="0.592"></rect> <g> <path d="M434.469,693.912l200.523,-0c13.34,46.165 44.047,85.433 85.747,109.508c42.759,24.687 93.575,31.377 141.267,18.598c0.035,-0.01 0.071,-0.019 0.106,-0.029c47.692,-12.779 88.355,-43.98 113.042,-86.74c24.687,-42.759 31.377,-93.575 18.598,-141.267c-17.208,-64.223 -37.272,-139.1 -54.48,-203.323c-12.779,-47.692 -43.98,-88.355 -86.74,-113.042c-42.76,-24.687 -93.575,-31.377 -141.267,-18.598c-0.036,0.009 -0.071,0.019 -0.107,0.029c-27.438,7.351 -52.55,20.801 -73.63,39.042c0.013,-0.012 -205.608,-0.012 -205.608,-0.012c-21.055,-18.223 -46.172,-31.677 -73.617,-39.031c-0.035,-0.009 -0.071,-0.019 -0.106,-0.028c-47.692,-12.779 -98.508,-6.089 -141.267,18.598c-42.76,24.687 -73.961,65.35 -86.74,113.042c-17.209,64.223 -37.272,139.1 -54.481,203.323c-12.779,47.692 -6.089,98.508 18.598,141.267c24.688,42.76 65.35,73.961 113.042,86.74c0.036,0.01 0.071,0.019 0.107,0.029c47.692,12.779 98.507,6.089 141.267,-18.598c41.699,-24.075 72.406,-63.343 85.746,-109.508Zm254.788,-38.789c-7.111,-24.401 -29.867,-23.713 -30.333,-23.711c-125.182,0.391 -248.387,-0 -248.387,-0c-16.192,0.388 -27,11.117 -30.332,23.711c-2.122,8.02 -3.362,12.53 -4.992,18.63c-2.627,9.835 -2.635,9.833 -0.12,0.449c-8.489,31.681 -29.216,58.692 -57.62,75.091c-28.404,16.399 -62.16,20.843 -93.841,12.354l-0.107,-0.028c-31.681,-8.489 -58.692,-29.215 -75.091,-57.62c-16.399,-28.404 -20.843,-62.16 -12.354,-93.841c17.208,-64.223 37.271,-139.1 54.48,-203.323c8.489,-31.681 29.215,-58.692 57.62,-75.092c28.404,-16.399 62.16,-20.843 93.84,-12.354l0.107,0.029c21.15,5.667 40.219,16.788 55.438,32.007c5.861,5.861 13.809,9.153 22.097,9.153l230.137,0c8.288,0 16.237,-3.292 22.097,-9.153c15.219,-15.219 34.288,-26.34 55.438,-32.007l0.107,-0.029c31.681,-8.489 65.437,-4.045 93.841,12.354c28.404,16.4 49.131,43.411 57.62,75.092c17.208,64.223 37.271,139.1 54.48,203.323c8.489,31.681 4.045,65.437 -12.354,93.841c-16.4,28.405 -43.411,49.131 -75.092,57.62l-0.107,0.028c-31.681,8.489 -65.436,4.045 -93.841,-12.354c-28.124,-16.238 -48.721,-42.879 -57.365,-74.156l-5.366,-20.014Zm-254.973,38.789l-0.014,-0l-0.085,0.229l-0.654,1.495c0.268,-0.564 0.52,-1.139 0.753,-1.724Zm-149.553,-233.128l-31.026,0c-17.247,0 -31.25,14.003 -31.25,31.25c0,17.247 14.003,31.25 31.25,31.25l31.026,0l-0,31.026c-0,17.247 14.002,31.25 31.25,31.25c17.247,-0 31.25,-14.003 31.25,-31.25l-0,-31.026l31.025,0c17.248,0 31.25,-14.003 31.25,-31.25c0,-17.247 -14.002,-31.25 -31.25,-31.25l-31.025,0l-0,-31.026c-0,-17.247 -14.003,-31.25 -31.25,-31.25c-17.248,0 -31.25,14.003 -31.25,31.25l-0,31.026Z"></path> <path d="M720.632,552.486c-0,-18.253 14.819,-33.073 33.073,-33.073c18.254,0 33.073,14.82 33.073,33.073c0,18.254 -14.819,33.074 -33.073,33.074c-18.254,-0 -33.073,-14.82 -33.073,-33.074Zm93.525,-93.525c18.254,-0 33.074,14.819 33.074,33.073c-0,18.254 -14.82,33.073 -33.074,33.073c-18.253,0 -33.073,-14.819 -33.073,-33.073c0,-18.254 14.82,-33.073 33.073,-33.073Zm-120.904,-0c18.253,-0 33.073,14.819 33.073,33.073c-0,18.254 -14.82,33.073 -33.073,33.073c-18.254,0 -33.074,-14.819 -33.074,-33.073c0,-18.254 14.82,-33.073 33.074,-33.073Zm27.379,-27.379c-0,-18.254 14.819,-33.074 33.073,-33.074c18.254,0 33.073,14.82 33.073,33.074c0,18.253 -14.819,33.073 -33.073,33.073c-18.254,-0 -33.073,-14.82 -33.073,-33.073Z" style="fill-opacity:0.5;"></path> </g> </g></svg>
                            <p class="pt-px">Gaming</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Outline"> <path d="M54.65,27h-.1c-2.14-5.93-7.31-10.83-14.2-13.09a6.52,6.52,0,0,0-5.51-3.67,6.09,6.09,0,0,0-5.7,2.5c-9.45,1-17,6.69-19.7,14.26H9.35C6.4,27,4,29.76,4,33.15S6.4,39.3,9.35,39.3h.07c3,8.38,12,14.49,22.58,14.49s19.59-6.11,22.58-14.49h.07c3,0,5.35-2.76,5.35-6.15S57.6,27,54.65,27Zm-20-14.76a4.49,4.49,0,0,1,4,2.79,3.77,3.77,0,0,1,.18,1.17c0,2-.59,3.4-1.8,4.21-2.52,1.69-7.36.65-10.19-.26a16.43,16.43,0,0,0,3.49-5.38,3.73,3.73,0,0,1,.26-.61A4,4,0,0,1,34.66,12.24ZM6,33.15a4,4,0,0,1,2.83-4.09,18.72,18.72,0,0,0-.48,4.12,18.25,18.25,0,0,0,.47,4.06A4,4,0,0,1,6,33.15ZM32,51.78c-11.94,0-21.65-8.35-21.65-18.6,0-9.1,7.54-16.73,17.79-18.3l-.09.18a1.24,1.24,0,0,1-.1.2c-.05.11-.11.21-.16.31l-.11.19-.19.32-.1.16-.27.4,0,.06-.33.46-.06.07-.27.36-.11.12a3.2,3.2,0,0,1-.22.27l-.12.15-.2.22-.13.15-.17.19-.12.13-.16.17-.11.12a1.85,1.85,0,0,0-.14.14l-.1.1-.11.11-.09.08-.09.09-.05.05-.07.06,0,0,0,0a1,1,0,0,0-.31.91,1,1,0,0,0,.6.76l.13.05.07,0,.25.1.06,0,.44.16.12,0,.45.15.15.05.67.21.13,0,.64.17.22.06.84.21h0l.86.17L30,23l.81.13.16,0c.31.05.63.08.95.11h.25c.26,0,.52,0,.79,0h.62l.86,0,.43-.05.77-.13L36,23a6.7,6.7,0,0,0,.76-.24l.35-.13a5.75,5.75,0,0,0,3.32-3.68s0,0,0-.05a6.52,6.52,0,0,0,.2-.79c0-.12,0-.25,0-.37s.06-.35.08-.54,0-.32,0-.48,0-.33,0-.5c7.72,3,12.81,9.63,12.81,17C53.65,43.43,43.94,51.78,32,51.78ZM55.18,37.24a17.49,17.49,0,0,0,0-8.18A4,4,0,0,1,58,33.15,4,4,0,0,1,55.18,37.24Z"></path> <path d="M23.29,27.39a3.86,3.86,0,0,0-3.61,4.05,1,1,0,0,0,2,0,1.87,1.87,0,0,1,1.61-2.05,1.87,1.87,0,0,1,1.61,2.05,1,1,0,1,0,2,0A3.86,3.86,0,0,0,23.29,27.39Z"></path> <path d="M39.84,27.39a3.86,3.86,0,0,0-3.61,4.05,1,1,0,1,0,2,0,1.87,1.87,0,0,1,1.61-2.05,1.87,1.87,0,0,1,1.61,2.05,1,1,0,1,0,2,0A3.86,3.86,0,0,0,39.84,27.39Z"></path> <path d="M36.35,38.71a1,1,0,0,0-1,1,3.35,3.35,0,1,1-6.7,0,1,1,0,0,0-2,0,5.35,5.35,0,1,0,10.7,0A1,1,0,0,0,36.35,38.71Z"></path> </g> </g></svg>
                            <p class="pt-px">Baby Products</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 874.1 874.1" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M50,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174C100,322.45,77.6,300.05,50,300.05z"></path> <path d="M690.1,244.55c-27.6,0-50,22.4-50,50v102.5h-406v-102.5c0-27.6-22.4-50-50-50c-27.6,0-50,22.4-50,50v285 c0,27.6,22.4,50,50,50c27.6,0,50-22.4,50-50v-102.5h406v102.5c0,27.6,22.4,50,50,50s50-22.4,50-50v-285 C740.1,266.95,717.699,244.55,690.1,244.55z"></path> <path d="M824.1,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174 C874.1,322.45,851.699,300.05,824.1,300.05z"></path> </g> </g> </g></svg>
                            <p class="pt-px">Sporting Goods</p>
                        </a>

                        <a href="#menu-col" class="px-2 flex flex-wrap gap-x-2">
                            <svg width="21px" height="21px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 12H8.01" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 12H12.01" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 12H16.01" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#323232" stroke-width="2"></path> </g></svg>
                            <p class="pt-px">Other Categories</p>
                        </a>

                    </div>

                    <div id="slider" class="col-span-1 md:col-span-3">
                        <!--all image cards-->
                        <HeroLandscapeSlider />
                    </div>

                    <div class="ml-3 col-span-1">
                        <div class="px-2 py-1.5 text-sm bg-white text-gray-700 rounded-md shadow-md flex flex-col gap-y-4">

                            <div class="mt-2 flex flex-row gap-x-1">
                                <svg width="40px" height="40px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#f59e0b" fill="none">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M23.71,18.56A9.37,9.37,0,1,1,33.4,33a2.36,2.36,0,0,0-1.92,2.29v3.91" stroke-linecap="round"></path><circle cx="31.85" cy="47.15" r="2.4" stroke-linecap="round"></circle><circle cx="32" cy="32" r="25.55" stroke-linecap="round"></circle></g></svg>
                                <div class="">
                                    <p class="uppercase font-semibold">Help Center</p>
                                    <p class="text-xs">Guide to Customer Care</p>
                                </div>
                            </div>

                            <div class="mt-2 flex flex-row gap-x-1">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460 460" xml:space="preserve" width="40px" height="40px" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path style="fill:#FEE187;" d="M230,0C102.974,0,0,102.975,0,230c0,125.286,100.173,227.175,224.795,229.942L456.74,191.191 C438.295,82.646,343.799,0,230,0z"></path> <path style="fill:#FFC61B;" d="M250.468,172.408L130.97,52.909l-19.56,65.699l39.538,40.86l-19.978,206.64l93.825,93.826 C226.526,459.973,228.26,460,230,460c127.025,0,230-102.975,230-230c0-13.228-1.132-26.189-3.276-38.807l-55.345-55.346 L250.468,172.408z"></path> <path style="fill:#273B7A;" d="M303.18,93.889H130.97V52.91l-93.79,93.789l316.905,35.57v87.948L252.2,313.299l41.408,52.81 l9.572,0.001c75.05,0,136.11-61.061,136.11-136.11S378.23,93.889,303.18,93.889z"></path> <path style="fill:#121149;" d="M303.18,146.7l-266-0.001l93.79,93.791l10-30.98l154.638-10h7.572c16.81,0,30.49,13.681,30.49,30.49 s-13.68,30.49-30.49,30.49H254.2v52.81h50.98c46.01,0,81.3-37.29,81.3-83.3S349.19,146.7,303.18,146.7z"></path> <polygon style="fill:#FEE187;" points="295.608,199.509 295.608,366.109 200.602,366.109 213.283,207.749 229.768,199.509 "></polygon> <polygon style="fill:#FFFFFF;" points="213.283,207.749 213.283,366.109 130.97,366.109 130.97,199.509 196.81,199.509 "></polygon> <rect x="196.81" y="199.509" style="fill:#FFC61B;" width="32.959" height="49.438"></rect> </g> </g></svg>
                                <div class="">
                                    <p class="uppercase font-semibold">Easy Return</p>
                                    <p class="text-xs">Quick Refund</p>
                                </div>
                            </div>

                            <div class="mt-2 flex flex-row gap-x-1">
                                <svg height="40px" width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 290.626 290.626" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <circle style="fill:#F9BA48;" cx="145.314" cy="145.313" r="79.688"></circle> </g> <g> <path style="fill:#333333;" d="M79.689,131.25c-43.941,0-79.688,35.747-79.688,79.688s35.747,79.688,79.687,79.688 s79.687-35.747,79.687-79.688S123.629,131.25,79.689,131.25z M79.689,281.25c-38.77,0-70.312-31.542-70.312-70.313 s31.542-70.313,70.312-70.313s70.312,31.543,70.312,70.314S118.459,281.25,79.689,281.25z"></path> <path style="fill:#333333;" d="M86.72,164.063h-2.344V150h-9.375v14.063h-2.344c-14.212,0-25.781,11.569-25.781,25.781 s11.569,25.781,25.781,25.781h14.062c9.047,0,16.406,7.359,16.406,16.406s-7.359,16.406-16.406,16.406H72.657 c-9.047,0-16.406-7.359-16.406-16.406V225h-9.375v7.031c0,14.213,11.569,25.781,25.781,25.781h2.344v14.063h9.375v-14.063h2.344 c14.212,0,25.781-11.569,25.781-25.781S100.932,206.25,86.72,206.25H72.657c-9.047,0-16.406-7.359-16.406-16.406 s7.359-16.406,16.406-16.406h14.062c9.047,0,16.406,7.359,16.406,16.406v7.031h9.375v-7.031 C112.501,175.631,100.932,164.063,86.72,164.063z"></path> <path style="fill:#333333;" d="M290.625,28.125h-26.283c4.575-2.63,7.533-7.495,7.533-13.031C271.875,6.769,265.107,0,256.781,0 c-6.441,0-12.764,2.217-17.794,6.244l-13.987,11.189L211.012,6.239C205.979,2.217,199.66,0,193.219,0 c-8.325,0-15.094,6.769-15.094,15.094c0,5.541,2.958,10.402,7.533,13.031h-26.283v37.5h14.062v79.688h37.5h28.125h37.5V65.625 h14.062L290.625,28.125L290.625,28.125z M229.688,37.5v18.75h-9.375V37.5h4.172l0.516,0.112l0.516-0.112H229.688z M244.848,13.561c3.375-2.7,7.612-4.186,11.934-4.186c3.155,0,5.719,2.564,5.719,5.719c0,2.7-1.842,4.992-4.477,5.578 l-30.548,6.787L244.848,13.561z M193.219,9.375c4.322,0,8.559,1.486,11.934,4.186l17.372,13.898l-30.548-6.787 c-2.634-0.586-4.477-2.883-4.477-5.578C187.501,11.939,190.064,9.375,193.219,9.375z M168.751,56.25V37.5h42.187v18.75h-37.5 H168.751z M182.813,135.938V65.625h28.125v70.313H182.813z M220.313,135.938V65.625h9.375v70.313H220.313z M267.188,135.938 h-28.125V65.625h28.125V135.938z M281.25,56.25h-4.687h-37.5V37.5h42.187V56.25z"></path> <path style="fill:#333333;" d="M122.893,44.658l-2.034-9.15c-42.436,9.412-75.937,42.914-85.35,85.35l9.155,2.03 C53.289,83.995,83.996,53.287,122.893,44.658z"></path> <path style="fill:#333333;" d="M167.734,245.962l2.034,9.155c42.436-9.417,75.933-42.914,85.35-85.35l-9.155-2.034 C237.338,206.63,206.631,237.337,167.734,245.962z"></path> </g> </g> </g> </g></svg>
                                <div class="">
                                    <p class="uppercase font-semibold">Sell on JUMIA</p>
                                    <p class="text-xs">Millions of Visitors</p>
                                </div>
                            </div>

                        </div>

                        <div class="mt-2 px-px">
                            <img alt="img" :src="`https://ke.jumia.is/cms/2023/SuperBrandDays/Nivea/V0/Countdown/KE_Nivea_SBD_0323_Countdown_1.gif`">
                        </div>
                    </div>

                </div>
            </div>

            <!--Masaa machache-->
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                    <div class="md:col-span-2 md:flex md:flex-row gap-x-px md:gap-6 py-10 px-6 bg-green-500 text-white rounded shadow-md">
                        <div class="">
                            <img alt="phone-image" class="max-w-xs rounded-lg max-h-[36rem] object-cover" :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/76/676084/1.jpg?6262`">
                        </div>
                        <div class="md:my-auto">
                            <h3 class="font-bold text-black text-xl font-serif underline underline-offset-4">Masaa Machache</h3>
                            <div class="mt-2">
                                <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    <Link class="text-blue-900 text-xs font-semibold flex items-center ">
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

            <!--recently viewed-->
            <div class="px-4 p-2 pb-3 bg-white rounded">
                <div class="mt-5 py-6 flex justify-between">
                    <h3 class="font-semibold text-lg text-slate-900">Recently Viewed</h3>
                    <Link :href="route('samsung-show')" class="text-amber-600 font-semibold flex flex-row place-content-center">
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
                    <Link :href="route('samsung-show')" class="text-amber-300 font-semibold flex flex-row place-content-center">
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
                            <h3 class="font-bold text-black text-xl font-serif underline underline-offset-4">Somsong Max Pro</h3>
                            <div class="mt-2">
                                <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    <Link class="text-blue-900 text-xs font-semibold flex items-center ">
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
                    <Link :href="route('samsung-show')" class="text-amber-700 font-semibold flex flex-row place-content-center">
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
                    <Link :href="route('samsung-show')" class="text-amber-600 font-semibold flex flex-row place-content-center">
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
                            <h3 class="font-bold text-black text-xl font-serif underline underline-offset-4">Kitenge Tupu</h3>
                            <div class="mt-2">
                                <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    <Link class="text-blue-900 text-xs font-semibold flex items-center ">
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

            <!--Savannist Fashion-->
            <div class="mt-5 p-2 pb-3 bg-white rounded">
                <div class="flex justify-between py-3 px-4 bg-lime-700">
                    <h3 class="font-semibold text-lg text-slate-100">Savannist Fashion</h3>
                    <Link :href="route('samsung-show')" class="text-amber-300 font-semibold flex flex-row place-content-center">
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
                    <Link :href="route('samsung-show')" class="font-semibold flex flex-row place-content-center">
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
                            <h3 class="font-bold text-black text-xl font-serif underline underline-offset-4">Mambo Zamani African Print Men Shirt</h3>
                            <div class="mt-2">
                                <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    <Link class="text-blue-900 text-xs font-semibold flex items-center ">
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

        </div>

        <!--footer-->
        <div class="mt-12 w-full grid grid-cols-3 md:grid-cols-5 gap-x-6 py-8 bg-slate-50 bg-opacity-75">

            <div class="md:col-start-2 bg-white p-3 rounded shadow-sm">
                <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                    <h3 class="font-semibold uppercase text-base">Our Company</h3>
                    <a href="#menu-col" class="pl-1.5">About</a>
                    <a href="#menu-col" class="pl-1.5">Investor</a>
                    <a href="#menu-col" class="pl-1.5">People</a>
                    <a href="#menu-col" class="pl-1.5">Careers</a>
                </div>
            </div>

            <div class="col-span-1 bg-white p-3 rounded shadow-sm">
                <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                    <h3 class="font-semibold uppercase text-base">Community Relations</h3>
                    <a href="#menu-col" class="pl-1.5">Our Foundation</a>
                    <a href="#menu-col" class="pl-1.5">Initiatives</a>
                    <a href="#menu-col" class="pl-1.5">Climate Responsibility</a>
                    <a href="#menu-col" class="pl-1.5">Sustainability Reports</a>
                </div>
            </div>

            <div class="col-span-1 bg-white p-3 rounded shadow-sm">
                <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                    <h3 class="font-semibold uppercase text-base">Contact Me</h3>
                    <a href="#menu-col" class="pl-1.5">
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
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
