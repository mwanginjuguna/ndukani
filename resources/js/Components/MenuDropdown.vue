<script setup>
import { Link } from '@inertiajs/vue3';
import {ref} from "vue";

const showMenu = ref(false);

function toggleMenu() {
    showMenu.value = !showMenu.value;
}

</script>

<template>
    <div class="relative md:mt-0 ">
        <!--trigger-->
        <div @click.prevent="toggleMenu" class="text-sm rounded-xl px-3 py-1.5">
            <slot name="trigger" />
        </div>

        <!-- Full Screen Dropdown Overlay -->

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
                class="absolute z-50 mt-2 bg-white shadow-md ring-1 ring-gray-300 rounded-md md:w-96 max-w-2xl"
                style="display: none;"
                @click="toggleMenu"
            >
                <slot name="default" />
            </div>
        </transition>
    </div>
</template>
