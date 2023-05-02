<script setup>
import {Head, Link, usePage} from '@inertiajs/vue3';
import PrimaryButton from "../Components/PrimaryButton.vue";
import {onBeforeMount, onMounted, ref, watchEffect} from "vue";
import MenuDropdown from "../Components/MenuDropdown.vue";
import DialogModal from "../Components/DialogModal.vue";
import Cart from "../Components/Cart.vue"
import HeroLandscapeSlider from "./Products/Partials/HeroLandscapeSlider.vue";
import {useCartStore} from "../stores/CartStore";
import {useFlash} from "../Composables/useFlash";


let cart = useCartStore();

let {flash} = useFlash();

const cartItemsNumber = ref(0);

const showMenu = ref(false);

const showCart = ref(false);

const searchKey = ref('');

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

onBeforeMount(() => {
    cart.getCart();
    cartItemsNumber.value = cart.cartItemsValue;
});

watchEffect(() => {
    cartItemsNumber.value = cart.cartItemsValue;
});

function updateCart() {
    showCart.value = false;
    window.location.reload();
}

function loginUser() {
    window.location.href="/login";
}

function search() {
    flash('Oops!!', 'Search returned no results.', 'info');
    searchKey.value = '';

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
            <div class="flex justify-between text-sm max-w-6xl mx-auto">
                <div class="flex flex-row justify-between">
                    <!--humberger-->
                    <div class="sm:pr-4 block md:hidden">
                        <svg width="24px" height="24px" class="mt-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#454545"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 17H20M4 12H20M4 7H20" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </div>

                    <!--search bar-->
                    <div class="hidden md:block">
                        <label for="search" class="flex flex-wrap rounded-lg md:rounded-full px-1.5 bg-gray-100 shadow-sm text-gray-600">
                            <button>
                            <svg width="21px" height="21px" class="mt-px pl-1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#828282"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 21L16.65 16.65M11 6C13.7614 6 16 8.23858 16 11M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                            </svg>
                            </button>

                            <input v-model="searchKey" @keyup.enter="search" class="bg-gray-100 px-2 py-1 m-1.5 border-none outline-none" placeholder="Search...">
                        </label>
                    </div>

                    <!--menu-->
                    <div class="mx-6 flex justify-between mb-2 sm:mb-0">
                        <MenuDropdown>
                            <template v-slot:trigger>
                                <button class="flex flex-wrap max-w-fit gap-2 bg-gray-200 rounded-3xl pb-1 px-2 hover:underline hover:underline-offset-4">
                                    <span class="pt-1">Menu</span>
                                    <svg fill="#64748b" version="1.1" id="Layer_1" class="pt-1.5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" stroke="#d1d5db">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M49.288,59.647c0.383,0.348,0.863,0.519,1.342,0.519c0.076,0,0.151-0.015,0.228-0.023c0.028,0.001,0.057,0.008,0.085,0.008 c0.545,0,1.088-0.222,1.482-0.657l15.231-16.804c0.742-0.818,0.68-2.083-0.139-2.824c-0.818-0.743-2.083-0.679-2.824,0.139 L50.656,55.49L35.169,41.453c-0.819-0.744-2.083-0.68-2.824,0.139c-0.742,0.818-0.68,2.083,0.139,2.824L49.288,59.647z"></path> <path d="M50,83.214c18.449,0,33.458-15.009,33.458-33.457c0-18.449-15.009-33.458-33.458-33.458 c-18.448,0-33.457,15.009-33.457,33.458C16.543,68.205,31.552,83.214,50,83.214z M50,20.299c16.243,0,29.458,13.215,29.458,29.458 c0,16.242-13.215,29.457-29.458,29.457c-16.242,0-29.457-13.215-29.457-29.457C20.543,33.514,33.758,20.299,50,20.299z"></path> </g> </g></svg>
                                </button>
                            </template>

                            <template v-slot:default>
                                <div class="text-left text-sm grid grid-cols-1 md:grid-cols-3 mx-auto max-w-2xl min-w-fit my-1.5 pr-4 divide-y md:divide-y-0">

                                    <div class="col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-left">
                                        <p class="font-semibold">Welcome</p>
                                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

                                        <Link :href="`/`" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</Link>

                                        <Link :href="route('coming-soon')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Return Policy</Link>

                                    </div>

                                    <div class="md:col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-center">
                                        <p class="font-semibold">Store</p>
                                        <Link :href="route('products')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Products</Link>

                                        <Link :href="route('categories')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Categories</Link>

                                    </div>

                                    <div class="md:col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-right">
                                        <p class="font-semibold">Trending Categories</p>
                                        <Link :href="route('brands')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Phones</Link>

                                        <Link :href="route('product-show', 4)" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Samsung</Link>

                                        <Link :href="route('coming-soon')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">iPhone</Link>

                                    </div>

                                </div>
                            </template>
                        </MenuDropdown>
                    </div>

                </div>

                <div class="flex gap-4">
                    <!--cart-->
                    <button @click="showCart = true" class="ml-3 relative flex">
                        <svg fill="#f59e0b" width="24px" height="24px" viewBox="0 0 24 24" id="cart-add" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><line id="primary-upstroke" x1="10.95" y1="20.5" x2="11.05" y2="20.5" style="fill: none; stroke: #f59e0b; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.5;"></line><line id="primary-upstroke-2" data-name="primary-upstroke" x1="16.95" y1="20.5" x2="17.05" y2="20.5" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.5;"></line><path id="primary" d="M14,5v6m3-3H11" style="fill: none; stroke: #f59e0b; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M3,3H5.2a1,1,0,0,1,1,.78L8.82,15.22a1,1,0,0,0,1,.78h8.42a1,1,0,0,0,1-.76L21,8" style="fill: none; stroke: #f59e0b; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                        <span class="w-fit -ml-1.5 -mt-1 inline-flex h-fit px-1 text-xs align-super bg-amber-500 text-white rounded-full"  v-if="cartItemsNumber > 0">
                                            {{ cartItemsNumber }}
                                        </span>
                        <span class="text-base font-semibold text-slate-600 hover:text-amber-500">Cart</span>
                    </button>
                    <!--Cart Modal-->
                    <DialogModal :closeable="true" :show="showCart === true">

                        <template #title :class="`relative`">
                            <div class="pt-3 px-2 flex justify-between sticky top-20">
                                <p class="text-amber-700 text-base">You Have <span class="text-slate-600">{{ cartItemsNumber }}</span>  Items in Cart</p>
                                <button @click="showCart = false" class="text-sm text-slate-500 hover:cursor-pointer">
                                    <svg width="34px" height="34px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>close_line</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="System" transform="translate(-288.000000, 0.000000)"> <g id="close_line" transform="translate(288.000000, 0.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M12,13.4144 L17.6568,19.0713 C18.0473,19.4618 18.6805,19.4618 19.071,19.0713 C19.4615,18.6807 19.4615,18.0476 19.071,17.657 L13.4142,12.0002 L19.071,6.34335 C19.4615,5.95283 19.4615,5.31966 19.071,4.92914 C18.6805,4.53861 18.0473,4.53861 17.6568,4.92914 L12,10.586 L6.34309,4.92912 C5.95257,4.5386 5.3194,4.5386 4.92888,4.92912 C4.53836,5.31965 4.53836,5.95281 4.92888,6.34334 L10.5857,12.0002 L4.92888,17.6571 C4.53836,18.0476 4.53836,18.6807 4.92888,19.0713 C5.3194,19.4618 5.95257,19.4618 6.34309,19.0713 L12,13.4144 Z" id="路径" fill="#09244B"> </path> </g> </g> </g> </g></svg>
                                </button>
                            </div>
                        </template>

                        <template #content>
                            <div class="py-10 px-5">

                                <Cart @cart-changed="updateCart"/>

                            </div>
                        </template>

                        <template #footer>
                            <div class="flex justify-between">
                                <button @click="showCart = false" class="text-xs text-slate-500 hover:text-slate-600 hover:underline pr-12 pt-6">
                                    <span>Close</span>
                                </button>

                                <Link :href="route('products')" :class="`text-sm text-blue-500 hover:text-blue-600 hover:underline pr-36 pt-2`">
                                    <span>Continue Shopping?</span>
                                </Link>
                                <div class="flex flex-row gap-x-1.5 pr-4">
                                    <img alt="Mpesa" class="w-10" :src="`https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/M-PESA_LOGO-01.svg/512px-M-PESA_LOGO-01.svg.png?20191120100524`">
                                    <svg width="44px" height="44px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 512m-480 0a480 480 0 1 0 960 0 480 480 0 1 0-960 0Z" fill="#FFE8CD"></path><path d="M224 364.8c0-25.6 19.2-44.8 51.2-44.8h480c25.6 0 51.2 19.2 51.2 44.8v288c0 25.6-19.2 44.8-51.2 44.8H275.2c-25.6 0-51.2-19.2-51.2-44.8V364.8z" fill="#FF9D1C"></path><path d="M224 390.4h576v70.4h-576z" fill="#FFCA83"></path><path d="M633.6 608c0-12.8 12.8-25.6 25.6-25.6h70.4c12.8 0 25.6 12.8 25.6 25.6v25.6c0 12.8-12.8 25.6-25.6 25.6h-70.4c-12.8 0-25.6-12.8-25.6-25.6v-25.6z" fill="#FFFFFF"></path></g></svg>
                                    <svg width="44px" height="44px" viewBox="0 -9 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="0.5" y="0.5" width="57" height="39" rx="3.5" fill="white" stroke="#F3F3F3"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M26.4388 20.2562L26.6913 18.6477L26.1288 18.6346H23.4429L25.3095 6.76505C25.3153 6.72911 25.3341 6.69575 25.3616 6.67201C25.3892 6.64827 25.4243 6.63525 25.4611 6.63525H29.9901C31.4937 6.63525 32.5313 6.94897 33.073 7.56826C33.327 7.85879 33.4887 8.16246 33.567 8.49653C33.6491 8.84713 33.6505 9.26596 33.5704 9.77689L33.5646 9.81405V10.1415L33.8186 10.2858C34.0324 10.3996 34.2024 10.5298 34.3328 10.6788C34.55 10.9273 34.6905 11.2431 34.7499 11.6173C34.8113 12.0022 34.791 12.4604 34.6905 12.979C34.5746 13.5755 34.3873 14.0951 34.1343 14.5202C33.9016 14.9119 33.6052 15.2369 33.2531 15.4886C32.9171 15.7279 32.5178 15.9095 32.0664 16.0257C31.6288 16.1399 31.1301 16.1975 30.583 16.1975H30.2305C29.9786 16.1975 29.7338 16.2886 29.5416 16.4517C29.3489 16.6183 29.2215 16.8459 29.1824 17.0947L29.1558 17.2396L28.7096 20.0747L28.6894 20.1787C28.684 20.2117 28.6748 20.2281 28.6613 20.2392C28.6493 20.2494 28.632 20.2562 28.615 20.2562H26.4388" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M34.0589 9.85181C34.0455 9.93848 34.03 10.027 34.0126 10.1181C33.4154 13.1934 31.372 14.2558 28.7623 14.2558H27.4335C27.1143 14.2558 26.8453 14.4881 26.7957 14.8038L25.9227 20.3573C25.8904 20.5647 26.0497 20.7514 26.2582 20.7514H28.615C28.894 20.7514 29.1311 20.5481 29.1751 20.2721L29.1982 20.1521L29.6419 17.3281L29.6705 17.1732C29.7139 16.8962 29.9515 16.6928 30.2305 16.6928H30.583C32.8663 16.6928 34.6538 15.7632 35.1763 13.0728C35.3944 11.9489 35.2815 11.0105 34.704 10.3505C34.5293 10.1516 34.3125 9.98635 34.0589 9.85181" fill="#298FC2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M33.4342 9.60206C33.3429 9.57534 33.2488 9.5512 33.1522 9.52936C33.0551 9.50807 32.9557 9.48922 32.8533 9.47267C32.4951 9.41462 32.1025 9.38708 31.682 9.38708H28.1322C28.0447 9.38708 27.9617 9.40689 27.8874 9.44269C27.7236 9.52163 27.602 9.67707 27.5726 9.86736L26.8174 14.6641L26.7957 14.8039C26.8454 14.4882 27.1144 14.2558 27.4335 14.2558H28.7623C31.372 14.2558 33.4154 13.1929 34.0127 10.1181C34.0305 10.0271 34.0455 9.93856 34.0589 9.85189C33.9078 9.77146 33.7442 9.7027 33.568 9.64411C33.5244 9.62959 33.4795 9.61562 33.4342 9.60206" fill="#22284F"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M27.5726 9.86737C27.6021 9.67708 27.7236 9.52165 27.8874 9.44325C27.9622 9.40731 28.0447 9.38751 28.1322 9.38751H31.682C32.1025 9.38751 32.4951 9.41518 32.8534 9.47323C32.9557 9.48964 33.0551 9.50863 33.1522 9.52992C33.2488 9.55162 33.3429 9.5759 33.4342 9.60248C33.4795 9.61605 33.5244 9.63015 33.5684 9.64412C33.7446 9.70272 33.9084 9.77202 34.0595 9.85191C34.2372 8.71545 34.058 7.94168 33.4453 7.241C32.7698 6.46953 31.5507 6.1394 29.9906 6.1394H25.4615C25.1429 6.1394 24.8711 6.37174 24.8218 6.68803L22.9354 18.6796C22.8982 18.9168 23.0807 19.1309 23.3193 19.1309H26.1153L27.5726 9.86737" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0946 23.5209H9.79248C9.56648 23.5209 9.3743 23.6855 9.339 23.9093L8.00345 32.4009C7.97695 32.5686 8.10638 32.7195 8.27584 32.7195H9.85225C10.0782 32.7195 10.2704 32.555 10.3057 32.3308L10.6659 30.0404C10.7006 29.8162 10.8932 29.6516 11.1188 29.6516H12.1641C14.3393 29.6516 15.5946 28.5959 15.9226 26.5042C16.0703 25.589 15.9288 24.87 15.5014 24.3664C15.0321 23.8134 14.1997 23.5209 13.0946 23.5209ZM13.4755 26.6224C13.2949 27.8106 12.3896 27.8106 11.5143 27.8106H11.0159L11.3655 25.5914C11.3863 25.4573 11.5021 25.3585 11.6374 25.3585H11.8658C12.4621 25.3585 13.0246 25.3585 13.3152 25.6994C13.4886 25.9027 13.5416 26.2049 13.4755 26.6224Z" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0496 26.5199H21.4683C21.3336 26.5199 21.2171 26.6187 21.1964 26.7528L21.1264 27.1963L21.0159 27.0356C20.6736 26.5373 19.9101 26.3707 19.1483 26.3707C17.4008 26.3707 15.9084 27.698 15.6177 29.5598C15.4666 30.4885 15.6814 31.3766 16.2068 31.9959C16.6887 32.5653 17.3782 32.8026 18.1985 32.8026C19.6065 32.8026 20.3871 31.8947 20.3871 31.8947L20.3167 32.3354C20.2902 32.5038 20.4196 32.6549 20.5881 32.6549H22.0124C22.2389 32.6549 22.4301 32.4903 22.4659 32.2661L23.3205 26.8385C23.3475 26.6714 23.2185 26.5199 23.0496 26.5199ZM20.8453 29.6064C20.6928 30.5122 19.9759 31.1204 19.0613 31.1204C18.6022 31.1204 18.2353 30.9727 17.9995 30.6929C17.7658 30.415 17.6771 30.0194 17.7513 29.5787C17.8939 28.6805 18.6229 28.0524 19.5235 28.0524C19.9725 28.0524 20.3375 28.2022 20.578 28.4843C20.8188 28.7695 20.9145 29.1676 20.8453 29.6064Z" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M31.3495 26.6556H29.7604C29.6088 26.6556 29.4664 26.7312 29.3805 26.8576L27.1888 30.095L26.2598 26.9839C26.2014 26.7892 26.0223 26.6556 25.8195 26.6556H24.2581C24.0682 26.6556 23.9365 26.8416 23.9968 27.0208L25.7471 32.1718L24.1016 34.5014C23.9722 34.6849 24.1025 34.9372 24.3261 34.9372H25.9132C26.0639 34.9372 26.2048 34.8635 26.2903 34.7397L31.5754 27.089C31.702 26.906 31.572 26.6556 31.3495 26.6556" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M36.6469 23.5209H33.3444C33.1189 23.5209 32.9267 23.6855 32.8914 23.9093L31.5559 32.4009C31.5294 32.5686 31.6588 32.7195 31.8273 32.7195H33.5221C33.6794 32.7195 33.8141 32.6044 33.8387 32.4475L34.2178 30.0404C34.2525 29.8162 34.4453 29.6516 34.6707 29.6516H35.7156C37.8912 29.6516 39.1461 28.5959 39.4745 26.5042C39.6227 25.589 39.4803 24.87 39.0529 24.3664C38.584 23.8134 37.7521 23.5209 36.6469 23.5209ZM37.0279 26.6224C36.8478 27.8106 35.9424 27.8106 35.0666 27.8106H34.5689L34.9189 25.5914C34.9396 25.4573 35.0545 25.3585 35.1902 25.3585H35.4186C36.0144 25.3585 36.5774 25.3585 36.868 25.6994C37.0414 25.9027 37.094 26.2049 37.0279 26.6224Z" fill="#298FC2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M46.5999 26.5199H45.0195C44.8839 26.5199 44.7685 26.6187 44.7482 26.7528L44.6782 27.1963L44.5671 27.0356C44.2248 26.5373 43.4619 26.3707 42.6999 26.3707C40.9526 26.3707 39.4607 27.698 39.1701 29.5598C39.0194 30.4885 39.2332 31.3766 39.7585 31.9959C40.2415 32.5653 40.9299 32.8026 41.7503 32.8026C43.1582 32.8026 43.9389 31.8947 43.9389 31.8947L43.8685 32.3354C43.842 32.5038 43.9713 32.6549 44.1408 32.6549H45.5647C45.7902 32.6549 45.9823 32.4903 46.0176 32.2661L46.8727 26.8385C46.8988 26.6714 46.7693 26.5199 46.5999 26.5199ZM44.3958 29.6064C44.2442 30.5122 43.5262 31.1204 42.6116 31.1204C42.1534 31.1204 41.7856 30.9727 41.5498 30.6929C41.3163 30.415 41.2283 30.0194 41.3016 29.5787C41.4451 28.6805 42.1732 28.0524 43.0738 28.0524C43.5228 28.0524 43.8878 28.2022 44.1283 28.4843C44.3701 28.7695 44.4657 29.1676 44.3958 29.6064Z" fill="#298FC2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M48.3324 23.7543L46.9771 32.4013C46.9506 32.569 47.0799 32.7199 47.2484 32.7199H48.611C48.8375 32.7199 49.0296 32.5554 49.0643 32.3312L50.4008 23.84C50.4275 23.6724 50.298 23.5209 50.1295 23.5209H48.6038C48.4691 23.5213 48.3532 23.6202 48.3324 23.7543" fill="#298FC2"></path> </g></svg>
                                </div>
                                <Link :href="route('checkout')" :class="`px-2 bg-amber-500 text-white text-lg rounded-lg shadow-lg`" :as="`button`">Check Out</Link>
                            </div>
                        </template>
                    </DialogModal>

                    <!--login & register links-->
                    <div class="pl-2 sm:flex sm:gap-4">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>
                        <template v-else>
                            <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                            <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
                        </template>
                    </div>
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

                    <div id="menu-col" class="hidden sm:block col-span-1 mr-3 py-1.5 max-h-[385px] text-xs font-light bg-white rounded-md shadow-md flex flex-col gap-y-2">

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 24 24" id="apple-fruit" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M19.92,12.38c-.5,4.55-2.6,8.62-4.73,8.62-1.39,0-1.71-1-3.19-1s-1.81,1-3.19,1c-2.13,0-4.23-4.07-4.73-8.62-.35-3.23.46-5.24,2.42-6.06C9,5.27,10.41,7,12,7s3-1.73,5.49-.68C19.45,7.14,20.28,9.15,19.92,12.38Z" style="fill: #ffffff; stroke-width: 2;"></path><path id="primary" d="M12,7a5.11,5.11,0,0,1,2-4" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M19.92,12.38c-.5,4.55-2.6,8.62-4.73,8.62-1.39,0-1.71-1-3.19-1s-1.81,1-3.19,1c-2.13,0-4.23-4.07-4.73-8.62-.35-3.23.46-5.24,2.42-6.06C9,5.27,10.41,7,12,7s3-1.73,5.49-.68C19.45,7.14,20.28,9.15,19.92,12.38Z" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                            <p class="pt-px">Supermarket</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M848.745 112.64h61.44c5.657 0 10.24 4.583 10.24 10.24v61.44c0 67.865-55.015 122.88-122.88 122.88h-112.64c-67.865 0-122.88-55.015-122.88-122.88v-61.44c0-5.657 4.583-10.24 10.24-10.24h61.44c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48h-61.44c-28.278 0-51.2 22.922-51.2 51.2v61.44c0 90.486 73.354 163.84 163.84 163.84h112.64c90.486 0 163.84-73.354 163.84-163.84v-61.44c0-28.278-22.922-51.2-51.2-51.2h-61.44c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path><path d="M725.865 343.04v423.936c0 28.113-23.087 51.2-51.2 51.2h-81.92c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48h81.92c50.735 0 92.16-41.425 92.16-92.16V343.04c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z"></path><path d="M572.265 834.56c0-42.418-34.382-76.8-76.8-76.8s-76.8 34.382-76.8 76.8 34.382 76.8 76.8 76.8 76.8-34.382 76.8-76.8zm40.96 0c0 65.04-52.72 117.76-117.76 117.76s-117.76-52.72-117.76-117.76 52.72-117.76 117.76-117.76 117.76 52.72 117.76 117.76zM490.194 349.189c55.982 55.982 55.982 146.752 0 202.747L338.13 703.989c-19.989 19.989-52.412 19.989-72.401 0L113.663 551.933c-55.981-55.993-55.981-146.762.003-202.746 51.387-51.376 132.065-55.602 188.263-12.676 56.198-42.926 136.876-38.7 188.265 12.678zm-202.746 28.963c-39.987-39.987-104.824-39.987-144.82 0-39.987 39.987-39.987 104.824 0 144.819l152.064 152.054c3.993 3.993 10.482 3.993 14.475 0l152.062-152.052c39.989-39.997 39.989-104.835.003-144.82-39.997-39.989-104.835-39.989-144.821-.002-7.998 7.998-20.965 7.998-28.963 0z"></path></g></svg>
                            <p class="pt-px">Health and Beauty</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M914.882 306.748l-.137-.068.137.068zm-804.149.079l.071-.035-.071.035zM535.3 117.806c-14.144-6.889-30.674-6.889-44.667-.078L140.259 292.131h745.258L535.3 117.806zM472.543 80.98c25.474-12.401 55.229-12.401 80.851.08l379.58 188.941c31.686 15.429 20.713 63.09-14.537 63.09h-811.09c-35.208 0-46.216-47.563-14.642-63.044L472.542 80.98zM911.36 908.763v-40.96H112.64v40.96h798.72zm10.24 40.96H102.4c-16.963 0-30.72-13.757-30.72-30.72v-61.44c0-16.963 13.757-30.72 30.72-30.72h819.2c16.963 0 30.72 13.757 30.72 30.72v61.44c0 16.963-13.757 30.72-30.72 30.72zM627.539 540.439c41.324 14.269 69.619 53.31 69.619 97.746 0 57.103-46.28 103.383-103.383 103.383-38.183 0-72.667-20.854-90.712-53.74-5.441-9.916-17.89-13.544-27.807-8.103s-13.544 17.89-8.103 27.807c25.168 45.868 73.336 74.997 126.622 74.997 79.724 0 144.343-64.619 144.343-144.343 0-62.038-39.497-116.535-97.211-136.463-10.691-3.692-22.351 1.983-26.043 12.674s1.983 22.351 12.674 26.043z"></path><path d="M532.896 505.595c0-57.092-46.291-103.383-103.383-103.383S326.13 448.503 326.13 505.595s46.291 103.383 103.383 103.383 103.383-46.291 103.383-103.383zm40.96 0c0 79.714-64.629 144.343-144.343 144.343S285.17 585.309 285.17 505.595c0-79.714 64.629-144.343 144.343-144.343s144.343 64.629 144.343 144.343zM145.861 312.609v534.712c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V312.609c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48zm692.906 0v534.712c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V312.609c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z"></path></g></svg>
                            <p class="pt-px">Home & Office</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M962.26 331.227c0-35.404-28.433-64.041-63.437-64.041s-63.437 28.636-63.437 64.041c0 35.404 28.433 64.041 63.437 64.041s63.437-28.636 63.437-64.041zm40.96 0c0 57.961-46.705 105.001-104.397 105.001s-104.397-47.04-104.397-105.001c0-57.961 46.705-105.001 104.397-105.001s104.397 47.04 104.397 105.001z"></path><path d="M791.244 283.667c0-49.716-124.664-99.348-280.494-99.348-155.822 0-280.484 49.633-280.484 99.348s124.662 99.348 280.484 99.348c155.831 0 280.494-49.633 280.494-99.348zm40.96 0c0 82.646-144.832 140.308-321.454 140.308-176.614 0-321.444-57.663-321.444-140.308s144.83-140.308 321.444-140.308c176.622 0 321.454 57.662 321.454 140.308z"></path><path d="M792.404 283.129v84.705c0 156.652-127.623 283.679-285.102 283.679-152.954 0-276.91-123.372-276.91-275.517v-92.867h-40.96v92.867c0 174.81 142.338 316.477 317.87 316.477 180.058 0 326.062-145.322 326.062-324.639v-84.705h-40.96z"></path><path d="M863.042 554.415c77.863 32.638 119.994 73.652 119.994 112.829 0 89.94-210.031 172.329-471.04 172.329-261.002 0-471.04-82.391-471.04-172.329 0-39.683 43.249-81.235 122.886-114.029 10.459-4.307 15.446-16.277 11.139-26.736s-16.277-15.446-26.736-11.139C54.933 553.766-.004 606.548-.004 667.244c0 123.031 230.093 213.289 512 213.289 281.914 0 512-90.256 512-213.289 0-60.011-53.696-112.282-145.119-150.605-10.431-4.373-22.432.539-26.805 10.97s.539 22.432 10.97 26.805z"></path></g></svg>
                            <p class="pt-px">Appliances</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M697.887 777.86c22.625 0 40.96-18.335 40.96-40.96V205.444c0-22.625-18.335-40.96-40.96-40.96H328.223c-22.625 0-40.96 18.335-40.96 40.96V736.9c0 22.625 18.335 40.96 40.96 40.96h369.664zm0 40.96H328.223c-45.246 0-81.92-36.674-81.92-81.92V205.444c0-45.246 36.674-81.92 81.92-81.92h369.664c45.246 0 81.92 36.674 81.92 81.92V736.9c0 45.246-36.674 81.92-81.92 81.92zM431.77 103.556h162.56c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H431.77c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48z"></path><path d="M759.86 982.66c45.245 0 81.92-36.675 81.92-81.92V122.879c0-45.245-36.675-81.92-81.92-81.92H266.241c-45.245 0-81.92 36.675-81.92 81.92V900.74c0 45.245 36.675 81.92 81.92 81.92H759.86zm0 40.96H266.241c-67.866 0-122.88-55.014-122.88-122.88V122.879c0-67.866 55.014-122.88 122.88-122.88H759.86c67.866 0 122.88 55.014 122.88 122.88V900.74c0 67.866-55.014 122.88-122.88 122.88z"></path><path d="M533.53 900.74c0-11.309-9.171-20.48-20.48-20.48s-20.48 9.171-20.48 20.48c0 11.309 9.171 20.48 20.48 20.48s20.48-9.171 20.48-20.48zm40.96 0c0 33.931-27.509 61.44-61.44 61.44s-61.44-27.509-61.44-61.44 27.509-61.44 61.44-61.44 61.44 27.509 61.44 61.44z"></path></g></svg>
                            <p class="pt-px">Phones & Tablets</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M486.233 701.019v135.383c0 11.311 9.169 20.48 20.48 20.48s20.48-9.169 20.48-20.48V701.019c0-11.311-9.169-20.48-20.48-20.48s-20.48 9.169-20.48 20.48z"></path><path d="M354.82 878.591h312.32c11.311 0 20.48-9.169 20.48-20.48s-9.169-20.48-20.48-20.48H354.82c-11.311 0-20.48 9.169-20.48 20.48s9.169 20.48 20.48 20.48zm595.46-207.268c16.849 0 30.72-13.871 30.72-30.72V215.039c0-16.849-13.871-30.72-30.72-30.72H71.678c-16.849 0-30.72 13.871-30.72 30.72v425.564c0 16.849 13.871 30.72 30.72 30.72H950.28zm0 40.96H71.678c-39.471 0-71.68-32.209-71.68-71.68V215.039c0-39.471 32.209-71.68 71.68-71.68H950.28c39.471 0 71.68 32.209 71.68 71.68v425.564c0 39.471-32.209 71.68-71.68 71.68z"></path><path d="M332.679 155.483L17.512 470.65c-7.998 7.998-7.998 20.965 0 28.963s20.965 7.998 28.963 0l315.167-315.167c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0zm189.013 5.546l-501.76 501.76c-7.998 7.998-7.998 20.965 0 28.963s20.965 7.998 28.963 0l501.76-501.76c7.998-7.998 7.998-20.965 0-28.963s-20.965-7.998-28.963 0z"></path></g></svg>
                            <p class="pt-px">Computing</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M461.913,86.261h-199l54.979-54.979c6.521-6.516,6.521-17.092,0-23.609c-6.521-6.521-17.087-6.521-23.609,0 l-71.674,71.674L150.934,7.675c-6.521-6.521-17.087-6.521-23.609,0c-6.521,6.516-6.521,17.092,0,23.609l54.979,54.978H50.087 C22.468,86.261,0,108.729,0,136.348v322.783c0,27.619,22.468,50.087,50.087,50.087h411.826c27.619,0,50.087-22.468,50.087-50.087 V136.348C512,108.729,489.532,86.261,461.913,86.261z M378.435,392.348c0,27.619-22.468,50.087-50.087,50.087H116.87 c-27.619,0-50.087-22.468-50.087-50.087V203.131c0-27.619,22.468-50.087,50.087-50.087h211.478 c27.619,0,50.087,22.468,50.087,50.087V392.348z M428.522,442.435c-9.22,0-16.696-7.475-16.696-16.696s7.475-16.696,16.696-16.696 s16.696,7.475,16.696,16.696S437.742,442.435,428.522,442.435z M428.522,375.652c-9.22,0-16.696-7.475-16.696-16.696 c0-9.22,7.475-16.696,16.696-16.696s16.696,7.475,16.696,16.696C445.217,368.177,437.742,375.652,428.522,375.652z M445.217,292.174c0,9.223-7.473,16.696-16.696,16.696c-9.223,0-16.696-7.473-16.696-16.696v-27.826 c0-9.223,7.473-16.696,16.696-16.696c9.223,0,16.696,7.473,16.696,16.696V292.174z M445.217,197.565 c0,9.223-7.473,16.696-16.696,16.696c-9.223,0-16.696-7.473-16.696-16.696v-27.826c0-9.223,7.473-16.696,16.696-16.696 c9.223,0,16.696,7.473,16.696,16.696V197.565z"></path> </g> </g> </g></svg>
                            <p class="pt-px">TVs & Audio</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M399.376 511.864c0-79.101-64.112-143.227-143.196-143.227s-143.196 64.125-143.196 143.227c0 79.101 64.112 143.227 143.196 143.227s143.196-64.125 143.196-143.227zm40.96 0c0 101.721-82.448 184.187-184.156 184.187S72.024 613.585 72.024 511.864c0-101.721 82.448-184.187 184.156-184.187s184.156 82.466 184.156 184.187zm470.678 0c0-79.101-64.112-143.227-143.196-143.227s-143.196 64.125-143.196 143.227c0 79.101 64.112 143.227 143.196 143.227s143.196-64.125 143.196-143.227zm40.96 0c0 101.721-82.448 184.187-184.156 184.187s-184.156-82.466-184.156-184.187c0-101.721 82.448-184.187 184.156-184.187s184.156 82.466 184.156 184.187z"></path><path d="M446.887 528.78c19.498-9.621 40.989-14.69 63.253-14.69 28.951 0 56.584 8.596 80.052 24.447 9.373 6.331 22.104 3.865 28.434-5.509s3.865-22.104-5.509-28.434c-30.185-20.388-65.79-31.464-102.978-31.464-28.584 0-56.273 6.531-81.377 18.918-10.143 5.005-14.309 17.285-9.304 27.428s17.285 14.309 27.428 9.304zM51.2 590.025c-28.278 0-51.2-22.922-51.2-51.2v-63.416c0-28.278 22.922-51.2 51.2-51.2h10.588c28.278 0 51.2 22.922 51.2 51.2v63.416c0 28.278-22.922 51.2-51.2 51.2H51.2zm0-40.96h10.588c5.657 0 10.24-4.583 10.24-10.24v-63.416c0-5.657-4.583-10.24-10.24-10.24H51.2a10.238 10.238 0 00-10.24 10.24v63.416c0 5.657 4.583 10.24 10.24 10.24zm911.014 40.96c-28.278 0-51.2-22.922-51.2-51.2v-63.416c0-28.278 22.922-51.2 51.2-51.2h10.588c28.278 0 51.2 22.922 51.2 51.2v63.416c0 28.278-22.922 51.2-51.2 51.2h-10.588zm0-40.96h10.588c5.657 0 10.24-4.583 10.24-10.24v-63.416c0-5.657-4.583-10.24-10.24-10.24h-10.588a10.238 10.238 0 00-10.24 10.24v63.416c0 5.657 4.583 10.24 10.24 10.24z"></path></g></svg>
                            <p class="pt-px">Fashion</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 1069 1069" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect height="1066.67" id="Console" style="fill:none;" width="1066.67" x="1.397" y="0.592"></rect> <g> <path d="M434.469,693.912l200.523,-0c13.34,46.165 44.047,85.433 85.747,109.508c42.759,24.687 93.575,31.377 141.267,18.598c0.035,-0.01 0.071,-0.019 0.106,-0.029c47.692,-12.779 88.355,-43.98 113.042,-86.74c24.687,-42.759 31.377,-93.575 18.598,-141.267c-17.208,-64.223 -37.272,-139.1 -54.48,-203.323c-12.779,-47.692 -43.98,-88.355 -86.74,-113.042c-42.76,-24.687 -93.575,-31.377 -141.267,-18.598c-0.036,0.009 -0.071,0.019 -0.107,0.029c-27.438,7.351 -52.55,20.801 -73.63,39.042c0.013,-0.012 -205.608,-0.012 -205.608,-0.012c-21.055,-18.223 -46.172,-31.677 -73.617,-39.031c-0.035,-0.009 -0.071,-0.019 -0.106,-0.028c-47.692,-12.779 -98.508,-6.089 -141.267,18.598c-42.76,24.687 -73.961,65.35 -86.74,113.042c-17.209,64.223 -37.272,139.1 -54.481,203.323c-12.779,47.692 -6.089,98.508 18.598,141.267c24.688,42.76 65.35,73.961 113.042,86.74c0.036,0.01 0.071,0.019 0.107,0.029c47.692,12.779 98.507,6.089 141.267,-18.598c41.699,-24.075 72.406,-63.343 85.746,-109.508Zm254.788,-38.789c-7.111,-24.401 -29.867,-23.713 -30.333,-23.711c-125.182,0.391 -248.387,-0 -248.387,-0c-16.192,0.388 -27,11.117 -30.332,23.711c-2.122,8.02 -3.362,12.53 -4.992,18.63c-2.627,9.835 -2.635,9.833 -0.12,0.449c-8.489,31.681 -29.216,58.692 -57.62,75.091c-28.404,16.399 -62.16,20.843 -93.841,12.354l-0.107,-0.028c-31.681,-8.489 -58.692,-29.215 -75.091,-57.62c-16.399,-28.404 -20.843,-62.16 -12.354,-93.841c17.208,-64.223 37.271,-139.1 54.48,-203.323c8.489,-31.681 29.215,-58.692 57.62,-75.092c28.404,-16.399 62.16,-20.843 93.84,-12.354l0.107,0.029c21.15,5.667 40.219,16.788 55.438,32.007c5.861,5.861 13.809,9.153 22.097,9.153l230.137,0c8.288,0 16.237,-3.292 22.097,-9.153c15.219,-15.219 34.288,-26.34 55.438,-32.007l0.107,-0.029c31.681,-8.489 65.437,-4.045 93.841,12.354c28.404,16.4 49.131,43.411 57.62,75.092c17.208,64.223 37.271,139.1 54.48,203.323c8.489,31.681 4.045,65.437 -12.354,93.841c-16.4,28.405 -43.411,49.131 -75.092,57.62l-0.107,0.028c-31.681,8.489 -65.436,4.045 -93.841,-12.354c-28.124,-16.238 -48.721,-42.879 -57.365,-74.156l-5.366,-20.014Zm-254.973,38.789l-0.014,-0l-0.085,0.229l-0.654,1.495c0.268,-0.564 0.52,-1.139 0.753,-1.724Zm-149.553,-233.128l-31.026,0c-17.247,0 -31.25,14.003 -31.25,31.25c0,17.247 14.003,31.25 31.25,31.25l31.026,0l-0,31.026c-0,17.247 14.002,31.25 31.25,31.25c17.247,-0 31.25,-14.003 31.25,-31.25l-0,-31.026l31.025,0c17.248,0 31.25,-14.003 31.25,-31.25c0,-17.247 -14.002,-31.25 -31.25,-31.25l-31.025,0l-0,-31.026c-0,-17.247 -14.003,-31.25 -31.25,-31.25c-17.248,0 -31.25,14.003 -31.25,31.25l-0,31.026Z"></path> <path d="M720.632,552.486c-0,-18.253 14.819,-33.073 33.073,-33.073c18.254,0 33.073,14.82 33.073,33.073c0,18.254 -14.819,33.074 -33.073,33.074c-18.254,-0 -33.073,-14.82 -33.073,-33.074Zm93.525,-93.525c18.254,-0 33.074,14.819 33.074,33.073c-0,18.254 -14.82,33.073 -33.074,33.073c-18.253,0 -33.073,-14.819 -33.073,-33.073c0,-18.254 14.82,-33.073 33.073,-33.073Zm-120.904,-0c18.253,-0 33.073,14.819 33.073,33.073c-0,18.254 -14.82,33.073 -33.073,33.073c-18.254,0 -33.074,-14.819 -33.074,-33.073c0,-18.254 14.82,-33.073 33.074,-33.073Zm27.379,-27.379c-0,-18.254 14.819,-33.074 33.073,-33.074c18.254,0 33.073,14.82 33.073,33.074c0,18.253 -14.819,33.073 -33.073,33.073c-18.254,-0 -33.073,-14.82 -33.073,-33.073Z" style="fill-opacity:0.5;"></path> </g> </g></svg>
                            <p class="pt-px">Gaming</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g id="Outline"> <path d="M54.65,27h-.1c-2.14-5.93-7.31-10.83-14.2-13.09a6.52,6.52,0,0,0-5.51-3.67,6.09,6.09,0,0,0-5.7,2.5c-9.45,1-17,6.69-19.7,14.26H9.35C6.4,27,4,29.76,4,33.15S6.4,39.3,9.35,39.3h.07c3,8.38,12,14.49,22.58,14.49s19.59-6.11,22.58-14.49h.07c3,0,5.35-2.76,5.35-6.15S57.6,27,54.65,27Zm-20-14.76a4.49,4.49,0,0,1,4,2.79,3.77,3.77,0,0,1,.18,1.17c0,2-.59,3.4-1.8,4.21-2.52,1.69-7.36.65-10.19-.26a16.43,16.43,0,0,0,3.49-5.38,3.73,3.73,0,0,1,.26-.61A4,4,0,0,1,34.66,12.24ZM6,33.15a4,4,0,0,1,2.83-4.09,18.72,18.72,0,0,0-.48,4.12,18.25,18.25,0,0,0,.47,4.06A4,4,0,0,1,6,33.15ZM32,51.78c-11.94,0-21.65-8.35-21.65-18.6,0-9.1,7.54-16.73,17.79-18.3l-.09.18a1.24,1.24,0,0,1-.1.2c-.05.11-.11.21-.16.31l-.11.19-.19.32-.1.16-.27.4,0,.06-.33.46-.06.07-.27.36-.11.12a3.2,3.2,0,0,1-.22.27l-.12.15-.2.22-.13.15-.17.19-.12.13-.16.17-.11.12a1.85,1.85,0,0,0-.14.14l-.1.1-.11.11-.09.08-.09.09-.05.05-.07.06,0,0,0,0a1,1,0,0,0-.31.91,1,1,0,0,0,.6.76l.13.05.07,0,.25.1.06,0,.44.16.12,0,.45.15.15.05.67.21.13,0,.64.17.22.06.84.21h0l.86.17L30,23l.81.13.16,0c.31.05.63.08.95.11h.25c.26,0,.52,0,.79,0h.62l.86,0,.43-.05.77-.13L36,23a6.7,6.7,0,0,0,.76-.24l.35-.13a5.75,5.75,0,0,0,3.32-3.68s0,0,0-.05a6.52,6.52,0,0,0,.2-.79c0-.12,0-.25,0-.37s.06-.35.08-.54,0-.32,0-.48,0-.33,0-.5c7.72,3,12.81,9.63,12.81,17C53.65,43.43,43.94,51.78,32,51.78ZM55.18,37.24a17.49,17.49,0,0,0,0-8.18A4,4,0,0,1,58,33.15,4,4,0,0,1,55.18,37.24Z"></path> <path d="M23.29,27.39a3.86,3.86,0,0,0-3.61,4.05,1,1,0,0,0,2,0,1.87,1.87,0,0,1,1.61-2.05,1.87,1.87,0,0,1,1.61,2.05,1,1,0,1,0,2,0A3.86,3.86,0,0,0,23.29,27.39Z"></path> <path d="M39.84,27.39a3.86,3.86,0,0,0-3.61,4.05,1,1,0,1,0,2,0,1.87,1.87,0,0,1,1.61-2.05,1.87,1.87,0,0,1,1.61,2.05,1,1,0,1,0,2,0A3.86,3.86,0,0,0,39.84,27.39Z"></path> <path d="M36.35,38.71a1,1,0,0,0-1,1,3.35,3.35,0,1,1-6.7,0,1,1,0,0,0-2,0,5.35,5.35,0,1,0,10.7,0A1,1,0,0,0,36.35,38.71Z"></path> </g> </g></svg>
                            <p class="pt-px">Baby Products</p>
                        </a>

                        <a href="/products" class="px-2 flex flex-wrap gap-x-2">
                            <svg fill="#000000" width="21px" height="21px"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 874.1 874.1" xml:space="preserve">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M50,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174C100,322.45,77.6,300.05,50,300.05z"></path> <path d="M690.1,244.55c-27.6,0-50,22.4-50,50v102.5h-406v-102.5c0-27.6-22.4-50-50-50c-27.6,0-50,22.4-50,50v285 c0,27.6,22.4,50,50,50c27.6,0,50-22.4,50-50v-102.5h406v102.5c0,27.6,22.4,50,50,50s50-22.4,50-50v-285 C740.1,266.95,717.699,244.55,690.1,244.55z"></path> <path d="M824.1,300.05c-27.6,0-50,22.4-50,50v174c0,27.6,22.4,50,50,50s50-22.4,50-50v-174 C874.1,322.45,851.699,300.05,824.1,300.05z"></path> </g> </g> </g></svg>
                            <p class="pt-px">Sporting Goods</p>
                        </a>

                        <a href="/categories" class="px-2 flex flex-wrap gap-x-2">
                            <svg width="21px" height="21px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 12H8.01" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 12H12.01" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 12H16.01" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#323232" stroke-width="2"></path> </g></svg>
                            <p class="pt-px">Other Categories</p>
                        </a>

                    </div>

                    <div id="slider" class="col-span-1 md:col-span-3 z-0">
                        <!--all image cards-->
                        <HeroLandscapeSlider />
                    </div>

                    <div class="ml-0 sm:ml-3 col-span-1 mt-2 sm:mt-0">
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

                        <div class="mt-2 grid place-content-center px-px">
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
                            <Link :href="route('product-show', 8)" class="font-bold text-black hover:text-slate-800 text-xl font-serif underline underline-offset-4">Masaa Machache</Link>
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
                            <PrimaryButton class="mt-3"
                                           @click.prevent="$page.props.auth.user ? cart.addToCart(8) : loginUser()">
                                Add to Cart
                            </PrimaryButton>

                        </div>
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

                <div class="grid grid-cols-2 md:grid-cols-5 gap-x-1 gap-y-2 mt-1 font-light ">

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

            <!--kitenge arrivals-->
            <div class="mt-5 pb-4 p-2 bg-white rounded">
                <div class="flex justify-between py-3 px-4 bg-amber-900 text-white">
                    <h3 class="font-semibold text-lg">Kitenge Arrivals</h3>
                    <Link :href="route('products')" class="font-semibold flex flex-row place-content-center">
                        <p class="pr-2">See All</p>
                        <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                    </Link>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-x-1 gap-y-3 font-light ">

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
                                    <Link :href="route('products')" class="text-blue-900 text-xs font-semibold flex items-center ">
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
                            <PrimaryButton class="mt-3" @click.prevent="flash('Oops!', 'This product is out of stock. Come back soon when we have restocked.', 'info')">Add to Cart</PrimaryButton>
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
                        <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                    </Link>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

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

                <div class="grid grid-cols-2 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

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
                            <Link :href="route('product-show', 7)" class="font-bold text-black hover:text-slate-700 text-xl font-serif underline underline-offset-4">
                                Kitenge Tupu
                            </Link>
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
                            <PrimaryButton class="mt-3" @click.prevent="$page.props.auth.user ? cart.addToCart(7) : loginUser()">Add to Cart</PrimaryButton>
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

                <div class="grid grid-cols-2 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

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

            <!--recently viewed-->
            <div class="px-4 p-2 pb-3 bg-white rounded">
                <div class="mt-5 py-6 flex justify-between">
                    <h3 class="font-semibold text-lg text-slate-900">Recently Viewed</h3>
                    <Link :href="route('products')" class="text-amber-600 font-semibold flex flex-row place-content-center">
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

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                    <div class="md:col-span-2 md:flex md:flex-row gap-x-px md:gap-6 py-10 px-6 bg-green-500 text-white rounded shadow-md">
                        <div class="">
                            <img alt="phone-image" class="max-w-xs rounded-lg max-h-[36rem] object-cover" :src="`https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/02/666582/1.jpg?8617`">
                        </div>
                        <div class="md:my-auto">
                            <Link :href="route('product-show', 6)" class="font-bold text-black hover:text-slate-700 text-xl font-serif underline underline-offset-4">Mambo Zamani African Print Men Shirt</Link>
                            <div class="mt-2">
                                <p class="text-sm text-justify leading-tight"><span class="font-semibold">Features: </span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                    <Link :href="route('product-show', 6)" class="text-blue-900 hover:text-blue-700 text-xs font-semibold flex items-center ">
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
                            <PrimaryButton class="mt-3" @click.prevent="$page.props.auth.user ? cart.addToCart(6) : loginUser()">Add to Cart</PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--footer-->
        <div class="mt-12 max-w-6xl mx-auto w-full grid md:grid-cols-3 place-content-center gap-x-6 px-3 md:px-6 py-8 bg-slate-50 bg-opacity-50">

            <div class="bg-white p-3 rounded shadow-sm">
                <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                    <h3 class="font-semibold uppercase text-base hover:text-blue-500">Our Company</h3>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">About</a>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">Investor</a>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">People</a>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">Careers</a>
                </div>
            </div>

            <div class="col-span-1 bg-white p-3 rounded shadow-sm">
                <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                    <h3 class="font-semibold uppercase text-base">Community Relations</h3>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">Our Foundation</a>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">Initiatives</a>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">Climate Responsibility</a>
                    <a href="/coming-soon" class="pl-1.5 hover:text-blue-500">Sustainability Reports</a>
                </div>
            </div>

            <div class="col-span-1 bg-white p-3 rounded shadow-sm">
                <div class="mx-auto my-4 flex flex-col gap-y-2 text-sm">
                    <h3 class="font-semibold uppercase text-base">Contact Me</h3>
                    <p class="text-sm italic text-slate-500">"I am available and excited to help create the next e-commerce or online-shop for your business. Let's connect!"</p>
                    <a href="https://mwangikanothe.com/#contact" class="pl-1.5  text-blue-600 hover:underline">
                        <span class="pr-2 font-semibold">Email: </span> francis@mwangikanothe.com
                    </a>

                    <a href="https://mwangikanothe.com" class="pl-1.5 text-blue-600 hover:underline">
                        <span class="pr-2 font-semibold">Website: </span> mwangikanothe.com
                    </a>

                    <a href="https://github.com/Francis-Kanothe" class="pl-1.5 text-blue-600 hover:underline">
                        <span class="pr-2 font-semibold">Github: </span> Francis Kanothe
                    </a>

                    <a href="https://twitter.com/mwangikanothe" class="pl-1.5 text-blue-600 hover:underline">
                        <span class="pr-2 font-semibold">Twitter: </span> @mwangikanothe
                    </a>
                </div>
            </div>

            <!--bottom bar-->
            <div class="md:col-span-3 flex mt-16 px-6 sm:items-center justify-between">
                <div class="text-center md:text-sm text-xs text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://github.com/Francis-Kanothe/ndukani" class="group inline-flex gap-2 md:items-center text-blue-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>github [#163298]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)" fill="#1701c1"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399" id="github-[#163298]"> </path> </g> </g> </g> </g></svg>
                            Browse code on Github
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-xs md:text-sm text-gray-500 dark:text-gray-400 sm:text-right border-l border-blue-100 pl-1 md:pl-0 md:border-none sm:ml-0">
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
