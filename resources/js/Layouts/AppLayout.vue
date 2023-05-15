<script setup>
import {onBeforeMount, ref, watchEffect} from 'vue';
import {Head, Link, router} from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import MenuDropdown from '@/Components/MenuDropdown.vue';
import Sidebar from '@/Components/Sidebar.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Cart from "../Components/Cart.vue";
import {useFlash} from "../Composables/useFlash";
import DialogModal from "../Components/DialogModal.vue";
import PrimaryButton from "../Components/PrimaryButton.vue";
import {useCartStore} from "../stores/CartStore";

let cart = useCartStore();

const { flash } = useFlash();

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);
const showCart = ref(false);
// number of items in cart - used to show count
let cartItemsNumber = ref(0);

function updateCart() {
    showCart.value = false;
    window.location.reload();
}

onBeforeMount( () => {
    cart.getCart();
    cartItemsNumber.value = cart.cartItemsValue;
} );

watchEffect(() => {
    cartItemsNumber.value = cart.cartItemsValue;
});

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};

</script>

<template>
    <div>
        <Head :title="title ?? 'e-commerce store'" />

        <div class="grid grid-cols-5">

            <!-- Sidebar -->
            <aside class="hidden md:block md:col-span-1 max-h-screen overflow-y-scroll bg-amber-400 text-slate-900 active:text-white">

                <Sidebar />

            </aside>

            <!-- Body = navbar, header page-content -->
            <div class="col-span-5 md:col-span-4 max-h-screen overflow-y-auto">

                <Banner />

                <div class="relative min-h-screen bg-gray-100">

                    <!--Navbar-->
                    <nav class="sticky top-0 right-0 z-[9999] bg-white border-b border-gray-100">
                        <!-- Primary Navigation Menu -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between h-16">
                                <div class="flex">
                                    <!-- Logo -->
                                    <div class="shrink-0 flex items-center">
                                        <Link :href="route('dashboard')">
                                            <ApplicationMark class="block h-9 w-auto" />
                                        </Link>
                                    </div>

                                    <!-- Navigation Links -->
                                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                        <!--search bar-->
                                        <div class="my-auto">
                                            <label for="search" class="flex flex-wrap rounded-lg md:rounded-full px-1.5 bg-gray-100 shadow-sm text-gray-600">
                                                <button>
                                                    <svg width="21px" height="21px" class="mt-px pl-1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#828282"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 21L16.65 16.65M11 6C13.7614 6 16 8.23858 16 11M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g>
                                                    </svg>
                                                </button>

                                                <input @input="search" class="bg-gray-100 px-2 py-1 m-1.5 border-none outline-none" placeholder="Search...">
                                            </label>
                                        </div>

                                    </div>
                                    <!--mega menu-->
                                    <div class="hidden lg:block mx-6 mt-1 sm:mb-0">
                                        <MenuDropdown>
                                            <!--trigger-->
                                            <template v-slot:trigger>
                                                <button class="flex flex-wrap max-w-fit gap-2 text-gray-500 border border-gray-100 hover:shadow-md rounded-xl py-2.5 px-2 hover:underline hover:underline-offset-4">
                                                    <span class="pt-1">Menu</span>
                                                    <svg fill="#64748b" version="1.1" id="Layer_1" class="pt-1.5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" stroke="#d1d5db">
                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M49.288,59.647c0.383,0.348,0.863,0.519,1.342,0.519c0.076,0,0.151-0.015,0.228-0.023c0.028,0.001,0.057,0.008,0.085,0.008 c0.545,0,1.088-0.222,1.482-0.657l15.231-16.804c0.742-0.818,0.68-2.083-0.139-2.824c-0.818-0.743-2.083-0.679-2.824,0.139 L50.656,55.49L35.169,41.453c-0.819-0.744-2.083-0.68-2.824,0.139c-0.742,0.818-0.68,2.083,0.139,2.824L49.288,59.647z"></path> <path d="M50,83.214c18.449,0,33.458-15.009,33.458-33.457c0-18.449-15.009-33.458-33.458-33.458 c-18.448,0-33.457,15.009-33.457,33.458C16.543,68.205,31.552,83.214,50,83.214z M50,20.299c16.243,0,29.458,13.215,29.458,29.458 c0,16.242-13.215,29.457-29.458,29.457c-16.242,0-29.457-13.215-29.457-29.457C20.543,33.514,33.758,20.299,50,20.299z"></path> </g> </g></svg>
                                                </button>
                                            </template>

                                            <!--menu content-->
                                            <template v-slot:default>
                                                <div class="text-left text-sm grid grid-cols-1 md:grid-cols-3 mx-auto max-w-2xl min-w-fit my-1.5 pr-4 divide-y md:divide-y-0">

                                                    <div class="col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-left">
                                                        <p class="font-semibold">Welcome</p>
                                                        <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

                                                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</Link>

                                                        <Link :href="route('coming-soon')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Return Policy</Link>


                                                    </div>

                                                    <div class="md:col-span-1 flex flex-col gap-y-1 py-2 px-3 md:text-center">
                                                        <p class="font-semibold">Store</p>
                                                        <Link :href="route('products')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Products</Link>

                                                        <Link :href="route('categories')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Categories</Link>

                                                        <Link :href="route('home')" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">New Arrivals</Link>

                                                        <Link :href="route('product-show', 7)" class="text-gray-600 hover:underline hover:underline-offset-2 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Featured</Link>

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

                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <button @click="showCart = true" class="ml-3 relative flex">
                                        <svg fill="#f59e0b" width="24px" height="24px" viewBox="0 0 24 24" id="cart-add" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><line id="primary-upstroke" x1="10.95" y1="20.5" x2="11.05" y2="20.5" style="fill: none; stroke: #f59e0b; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.5;"></line><line id="primary-upstroke-2" data-name="primary-upstroke" x1="16.95" y1="20.5" x2="17.05" y2="20.5" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.5;"></line><path id="primary" d="M14,5v6m3-3H11" style="fill: none; stroke: #f59e0b; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M3,3H5.2a1,1,0,0,1,1,.78L8.82,15.22a1,1,0,0,0,1,.78h8.42a1,1,0,0,0,1-.76L21,8" style="fill: none; stroke: #f59e0b; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                                        <span class="w-fit -ml-1.5 -mt-1 inline-flex h-fit px-1 text-xs align-super bg-amber-500 text-white rounded-full"  v-if="cartItemsNumber > 0">
                                            {{ cartItemsNumber }}
                                        </span>
                                        <span class="text-base font-semibold text-slate-600 hover:text-amber-500">Cart</span>
                                    </button>

                                    <!-- Settings Dropdown -->
                                    <div class="ml-3 relative">
                                        <Dropdown align="right" width="48">
                                            <template #trigger>
                                                <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                                </button>

                                                <span v-else class="inline-flex rounded-md">
                                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                        {{ $page.props.auth.user.name }}

                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            </template>

                                            <template #content>
                                                <!-- Account Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    Manage Account
                                                </div>

                                                <DropdownLink :href="route('profile.show')">
                                                    Profile
                                                </DropdownLink>

                                                <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                                    API Tokens
                                                </DropdownLink>

                                                <div class="border-t border-gray-200" />

                                                <!-- Authentication -->
                                                <form @submit.prevent="logout">
                                                    <DropdownLink as="button">
                                                        Log Out
                                                    </DropdownLink>
                                                </form>
                                            </template>
                                        </Dropdown>
                                    </div>
                                </div>

                                <!-- Hamburger -->
                                <div class="-mr-2 flex items-center sm:hidden">
                                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                        <svg
                                            class="h-6 w-6"
                                            stroke="currentColor"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h16"
                                            />
                                            <path
                                                :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Responsive Navigation Menu -->
                        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                            <div class="pt-2 pb-3 space-y-1">
                                <ResponsiveNavLink :href="route('home')" :active="route().current('home')">
                                    Home
                                </ResponsiveNavLink>
                                <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </ResponsiveNavLink>
                                <ResponsiveNavLink :href="route('products')" :active="route().current('products')">
                                    Products
                                </ResponsiveNavLink>
                                <ResponsiveNavLink :href="route('orders')" :active="route().current('orders')">
                                    My Orders
                                </ResponsiveNavLink>
                            </div>

                            <!-- Responsive Settings Options -->
                            <div class="pt-4 pb-1 border-t border-gray-200">
                                <!--cart-->
                                <button @click="showCart = !showCart" class="ml-3 relative flex pb-3">
                                    <svg fill="#000000" width="24px" height="24px" viewBox="0 0 24 24" id="cart-add" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><line id="primary-upstroke" x1="10.95" y1="20.5" x2="11.05" y2="20.5" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.5;"></line><line id="primary-upstroke-2" data-name="primary-upstroke" x1="16.95" y1="20.5" x2="17.05" y2="20.5" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.5;"></line><path id="primary" d="M14,5v6m3-3H11" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M3,3H5.2a1,1,0,0,1,1,.78L8.82,15.22a1,1,0,0,0,1,.78h8.42a1,1,0,0,0,1-.76L21,8" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></g></svg>
                                    <span class="w-fit -ml-1.5 -mt-1 inline-flex h-fit px-1 text-xs align-super bg-amber-500 text-white rounded-full">{{ cartItemsNumber }}</span>
                                    <span class="text-base font-semibold text-slate-600">Cart</span>
                                </button>

                                <div class="flex items-center px-4">
                                    <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-3">
                                        <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                    </div>

                                    <div>
                                        <div class="font-medium text-base text-gray-800">
                                            {{ $page.props.auth.user.name }}
                                        </div>
                                        <div class="font-medium text-sm text-gray-500">
                                            {{ $page.props.auth.user.email }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3 space-y-1">
                                    <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                        Profile
                                    </ResponsiveNavLink>

                                    <ResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')" :active="route().current('api-tokens.index')">
                                        API Tokens
                                    </ResponsiveNavLink>

                                    <!-- Authentication -->
                                    <form method="POST" @submit.prevent="logout">
                                        <ResponsiveNavLink as="button">
                                            Log Out
                                        </ResponsiveNavLink>
                                    </form>

                                    <!-- Team Management -->
                                    <template v-if="$page.props.jetstream.hasTeamFeatures">
                                        <div class="border-t border-gray-200" />

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Team
                                        </div>

                                        <!-- Team Settings -->
                                        <ResponsiveNavLink :href="route('teams.show', $page.props.auth.user.current_team)" :active="route().current('teams.show')">
                                            Team Settings
                                        </ResponsiveNavLink>

                                        <ResponsiveNavLink v-if="$page.props.jetstream.canCreateTeams" :href="route('teams.create')" :active="route().current('teams.create')">
                                            Create New Team
                                        </ResponsiveNavLink>

                                        <div class="border-t border-gray-200" />

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Switch Teams
                                        </div>

                                        <template v-for="team in $page.props.auth.user.all_teams" :key="team.id">
                                            <form @submit.prevent="switchToTeam(team)">
                                                <ResponsiveNavLink as="button">
                                                    <div class="flex items-center">
                                                        <svg v-if="team.id == $page.props.auth.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <div>{{ team.name }}</div>
                                                    </div>
                                                </ResponsiveNavLink>
                                            </form>
                                        </template>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <!-- Page Heading -->
                    <header v-if="$slots.header" class="">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <slot name="header" />
                        </div>
                    </header>

                    <!-- Page Content -->
                    <main class="relative">
                        <slot />


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
                                    <p class="text-sm italic text-slate-500">"I am available and excited to help create the next e-commerce or online-shop for your business. Let's connect!"</p>
                                    <a href="https://mwangikanothe.com/#contact" class="pl-1.5 text-blue-500 hover:text-blue-600 hover:underline">
                                        <span class="pr-2 font-semibold">Email: </span> francis@mwangikanothe.com
                                    </a>

                                    <a href="https://mwangikanothe.com/" class="pl-1.5 text-blue-500 hover:text-blue-600 hover:underline">
                                        <span class="pr-2 font-semibold">Website: </span> mwangikanothe.com
                                    </a>

                                    <a href="https://github.com/Francis-Kanothe" class="pl-1.5 text-blue-500 hover:text-blue-600 hover:underline">
                                        <span class="pr-2 font-semibold">Github: </span> Francis Kanothe
                                    </a>

                                    <a href="https://twitter.com/mwangikanothe" class="pl-1.5 text-blue-500 hover:text-blue-600 hover:underline">
                                        <span class="pr-2 font-semibold">Twitter: </span> @mwangikanothe
                                    </a>
                                </div>
                            </div>

                            <!--bottom bar-->
                            <div class="md:col-span-3 md:col-start-2 flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                                    <div class="flex items-center gap-4">
                                        <a href="https://github.com/Francis-Kanothe" class="group inline-flex items-center text-blue-600 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 gap-2">
                                            <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>github [#163298]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)" fill="#1701c1"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399" id="github-[#163298]"> </path> </g> </g> </g> </g></svg>
                                            Developer
                                        </a>
                                    </div>
                                </div>

                                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                                    This design is inspired by jumia.co.ke
                                </div>
                            </div>
                        </div>
                    </main>
                </div>

            </div>
        </div>

        <!--Cart Modal-->
        <DialogModal :closeable="true" :show="showCart === true">

            <template #title :class="`relative`">
                <div class="pt-3 px-2 flex justify-between sticky top-20">
                    <p class="text-amber-700 text-base">You Have <span class="text-slate-600">{{ cartItemsNumber }}</span>  Items in Cart</p>
                    <button @click="showCart = false" class="text-sm text-slate-500 hover:cursor-pointer">
                        <svg width="34px" height="34px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>close_line</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="System" transform="translate(-288.000000, 0.000000)"> <g id="close_line" transform="translate(288.000000, 0.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M12,13.4144 L17.6568,19.0713 C18.0473,19.4618 18.6805,19.4618 19.071,19.0713 C19.4615,18.6807 19.4615,18.0476 19.071,17.657 L13.4142,12.0002 L19.071,6.34335 C19.4615,5.95283 19.4615,5.31966 19.071,4.92914 C18.6805,4.53861 18.0473,4.53861 17.6568,4.92914 L12,10.586 L6.34309,4.92912 C5.95257,4.5386 5.3194,4.5386 4.92888,4.92912 C4.53836,5.31965 4.53836,5.95281 4.92888,6.34334 L10.5857,12.0002 L4.92888,17.6571 C4.53836,18.0476 4.53836,18.6807 4.92888,19.0713 C5.3194,19.4618 5.95257,19.4618 6.34309,19.0713 L12,13.4144 Z" id="路径" fill="#09244B"> </path> </g> </g> </g> </g></svg>
                    </button>
                </div>
            </template>

            <template #content>
                <div class="py-10 px-5">

                    <Cart @cart-changed="updateCart"/>

                </div>
            </template>

            <template #footer>
                <div class="flex justify-between place-content-center">
                    <button @click="showCart = false" class="text-xs text-slate-500 hover:text-slate-600 hover:underline lg:pr-12">
                        <span>Close</span>
                    </button>

                    <Link :href="route('products')" :class="`text-sm text-blue-500 hover:text-blue-600 hover:underline px-3 lg:pr-36 flex place-self-center`">
                        <span>Continue Shopping?</span>
                    </Link>
                    <div class="flex flex-row gap-x-1.5 px-2 md:pr-4">
                        <svg width="44px" height="44px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 512m-480 0a480 480 0 1 0 960 0 480 480 0 1 0-960 0Z" fill="#FFE8CD"></path><path d="M224 364.8c0-25.6 19.2-44.8 51.2-44.8h480c25.6 0 51.2 19.2 51.2 44.8v288c0 25.6-19.2 44.8-51.2 44.8H275.2c-25.6 0-51.2-19.2-51.2-44.8V364.8z" fill="#FF9D1C"></path><path d="M224 390.4h576v70.4h-576z" fill="#FFCA83"></path><path d="M633.6 608c0-12.8 12.8-25.6 25.6-25.6h70.4c12.8 0 25.6 12.8 25.6 25.6v25.6c0 12.8-12.8 25.6-25.6 25.6h-70.4c-12.8 0-25.6-12.8-25.6-25.6v-25.6z" fill="#FFFFFF"></path></g></svg>
                        <svg width="44px" height="44px" viewBox="0 -9 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="0.5" y="0.5" width="57" height="39" rx="3.5" fill="white" stroke="#F3F3F3"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M26.4388 20.2562L26.6913 18.6477L26.1288 18.6346H23.4429L25.3095 6.76505C25.3153 6.72911 25.3341 6.69575 25.3616 6.67201C25.3892 6.64827 25.4243 6.63525 25.4611 6.63525H29.9901C31.4937 6.63525 32.5313 6.94897 33.073 7.56826C33.327 7.85879 33.4887 8.16246 33.567 8.49653C33.6491 8.84713 33.6505 9.26596 33.5704 9.77689L33.5646 9.81405V10.1415L33.8186 10.2858C34.0324 10.3996 34.2024 10.5298 34.3328 10.6788C34.55 10.9273 34.6905 11.2431 34.7499 11.6173C34.8113 12.0022 34.791 12.4604 34.6905 12.979C34.5746 13.5755 34.3873 14.0951 34.1343 14.5202C33.9016 14.9119 33.6052 15.2369 33.2531 15.4886C32.9171 15.7279 32.5178 15.9095 32.0664 16.0257C31.6288 16.1399 31.1301 16.1975 30.583 16.1975H30.2305C29.9786 16.1975 29.7338 16.2886 29.5416 16.4517C29.3489 16.6183 29.2215 16.8459 29.1824 17.0947L29.1558 17.2396L28.7096 20.0747L28.6894 20.1787C28.684 20.2117 28.6748 20.2281 28.6613 20.2392C28.6493 20.2494 28.632 20.2562 28.615 20.2562H26.4388" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M34.0589 9.85181C34.0455 9.93848 34.03 10.027 34.0126 10.1181C33.4154 13.1934 31.372 14.2558 28.7623 14.2558H27.4335C27.1143 14.2558 26.8453 14.4881 26.7957 14.8038L25.9227 20.3573C25.8904 20.5647 26.0497 20.7514 26.2582 20.7514H28.615C28.894 20.7514 29.1311 20.5481 29.1751 20.2721L29.1982 20.1521L29.6419 17.3281L29.6705 17.1732C29.7139 16.8962 29.9515 16.6928 30.2305 16.6928H30.583C32.8663 16.6928 34.6538 15.7632 35.1763 13.0728C35.3944 11.9489 35.2815 11.0105 34.704 10.3505C34.5293 10.1516 34.3125 9.98635 34.0589 9.85181" fill="#298FC2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M33.4342 9.60206C33.3429 9.57534 33.2488 9.5512 33.1522 9.52936C33.0551 9.50807 32.9557 9.48922 32.8533 9.47267C32.4951 9.41462 32.1025 9.38708 31.682 9.38708H28.1322C28.0447 9.38708 27.9617 9.40689 27.8874 9.44269C27.7236 9.52163 27.602 9.67707 27.5726 9.86736L26.8174 14.6641L26.7957 14.8039C26.8454 14.4882 27.1144 14.2558 27.4335 14.2558H28.7623C31.372 14.2558 33.4154 13.1929 34.0127 10.1181C34.0305 10.0271 34.0455 9.93856 34.0589 9.85189C33.9078 9.77146 33.7442 9.7027 33.568 9.64411C33.5244 9.62959 33.4795 9.61562 33.4342 9.60206" fill="#22284F"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M27.5726 9.86737C27.6021 9.67708 27.7236 9.52165 27.8874 9.44325C27.9622 9.40731 28.0447 9.38751 28.1322 9.38751H31.682C32.1025 9.38751 32.4951 9.41518 32.8534 9.47323C32.9557 9.48964 33.0551 9.50863 33.1522 9.52992C33.2488 9.55162 33.3429 9.5759 33.4342 9.60248C33.4795 9.61605 33.5244 9.63015 33.5684 9.64412C33.7446 9.70272 33.9084 9.77202 34.0595 9.85191C34.2372 8.71545 34.058 7.94168 33.4453 7.241C32.7698 6.46953 31.5507 6.1394 29.9906 6.1394H25.4615C25.1429 6.1394 24.8711 6.37174 24.8218 6.68803L22.9354 18.6796C22.8982 18.9168 23.0807 19.1309 23.3193 19.1309H26.1153L27.5726 9.86737" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0946 23.5209H9.79248C9.56648 23.5209 9.3743 23.6855 9.339 23.9093L8.00345 32.4009C7.97695 32.5686 8.10638 32.7195 8.27584 32.7195H9.85225C10.0782 32.7195 10.2704 32.555 10.3057 32.3308L10.6659 30.0404C10.7006 29.8162 10.8932 29.6516 11.1188 29.6516H12.1641C14.3393 29.6516 15.5946 28.5959 15.9226 26.5042C16.0703 25.589 15.9288 24.87 15.5014 24.3664C15.0321 23.8134 14.1997 23.5209 13.0946 23.5209ZM13.4755 26.6224C13.2949 27.8106 12.3896 27.8106 11.5143 27.8106H11.0159L11.3655 25.5914C11.3863 25.4573 11.5021 25.3585 11.6374 25.3585H11.8658C12.4621 25.3585 13.0246 25.3585 13.3152 25.6994C13.4886 25.9027 13.5416 26.2049 13.4755 26.6224Z" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0496 26.5199H21.4683C21.3336 26.5199 21.2171 26.6187 21.1964 26.7528L21.1264 27.1963L21.0159 27.0356C20.6736 26.5373 19.9101 26.3707 19.1483 26.3707C17.4008 26.3707 15.9084 27.698 15.6177 29.5598C15.4666 30.4885 15.6814 31.3766 16.2068 31.9959C16.6887 32.5653 17.3782 32.8026 18.1985 32.8026C19.6065 32.8026 20.3871 31.8947 20.3871 31.8947L20.3167 32.3354C20.2902 32.5038 20.4196 32.6549 20.5881 32.6549H22.0124C22.2389 32.6549 22.4301 32.4903 22.4659 32.2661L23.3205 26.8385C23.3475 26.6714 23.2185 26.5199 23.0496 26.5199ZM20.8453 29.6064C20.6928 30.5122 19.9759 31.1204 19.0613 31.1204C18.6022 31.1204 18.2353 30.9727 17.9995 30.6929C17.7658 30.415 17.6771 30.0194 17.7513 29.5787C17.8939 28.6805 18.6229 28.0524 19.5235 28.0524C19.9725 28.0524 20.3375 28.2022 20.578 28.4843C20.8188 28.7695 20.9145 29.1676 20.8453 29.6064Z" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M31.3495 26.6556H29.7604C29.6088 26.6556 29.4664 26.7312 29.3805 26.8576L27.1888 30.095L26.2598 26.9839C26.2014 26.7892 26.0223 26.6556 25.8195 26.6556H24.2581C24.0682 26.6556 23.9365 26.8416 23.9968 27.0208L25.7471 32.1718L24.1016 34.5014C23.9722 34.6849 24.1025 34.9372 24.3261 34.9372H25.9132C26.0639 34.9372 26.2048 34.8635 26.2903 34.7397L31.5754 27.089C31.702 26.906 31.572 26.6556 31.3495 26.6556" fill="#28356A"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M36.6469 23.5209H33.3444C33.1189 23.5209 32.9267 23.6855 32.8914 23.9093L31.5559 32.4009C31.5294 32.5686 31.6588 32.7195 31.8273 32.7195H33.5221C33.6794 32.7195 33.8141 32.6044 33.8387 32.4475L34.2178 30.0404C34.2525 29.8162 34.4453 29.6516 34.6707 29.6516H35.7156C37.8912 29.6516 39.1461 28.5959 39.4745 26.5042C39.6227 25.589 39.4803 24.87 39.0529 24.3664C38.584 23.8134 37.7521 23.5209 36.6469 23.5209ZM37.0279 26.6224C36.8478 27.8106 35.9424 27.8106 35.0666 27.8106H34.5689L34.9189 25.5914C34.9396 25.4573 35.0545 25.3585 35.1902 25.3585H35.4186C36.0144 25.3585 36.5774 25.3585 36.868 25.6994C37.0414 25.9027 37.094 26.2049 37.0279 26.6224Z" fill="#298FC2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M46.5999 26.5199H45.0195C44.8839 26.5199 44.7685 26.6187 44.7482 26.7528L44.6782 27.1963L44.5671 27.0356C44.2248 26.5373 43.4619 26.3707 42.6999 26.3707C40.9526 26.3707 39.4607 27.698 39.1701 29.5598C39.0194 30.4885 39.2332 31.3766 39.7585 31.9959C40.2415 32.5653 40.9299 32.8026 41.7503 32.8026C43.1582 32.8026 43.9389 31.8947 43.9389 31.8947L43.8685 32.3354C43.842 32.5038 43.9713 32.6549 44.1408 32.6549H45.5647C45.7902 32.6549 45.9823 32.4903 46.0176 32.2661L46.8727 26.8385C46.8988 26.6714 46.7693 26.5199 46.5999 26.5199ZM44.3958 29.6064C44.2442 30.5122 43.5262 31.1204 42.6116 31.1204C42.1534 31.1204 41.7856 30.9727 41.5498 30.6929C41.3163 30.415 41.2283 30.0194 41.3016 29.5787C41.4451 28.6805 42.1732 28.0524 43.0738 28.0524C43.5228 28.0524 43.8878 28.2022 44.1283 28.4843C44.3701 28.7695 44.4657 29.1676 44.3958 29.6064Z" fill="#298FC2"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M48.3324 23.7543L46.9771 32.4013C46.9506 32.569 47.0799 32.7199 47.2484 32.7199H48.611C48.8375 32.7199 49.0296 32.5554 49.0643 32.3312L50.4008 23.84C50.4275 23.6724 50.298 23.5209 50.1295 23.5209H48.6038C48.4691 23.5213 48.3532 23.6202 48.3324 23.7543" fill="#298FC2"></path> </g></svg>
                    </div>
                    <Link :href="route('checkout')" :class="`px-3 p-2 bg-green-500 text-white text-sm lg:text-lg rounded-lg shadow-lg flex flex-row flex place-self-center`" :as="`button`">Check Out</Link>
                </div>
            </template>
        </DialogModal>
    </div>
</template>
