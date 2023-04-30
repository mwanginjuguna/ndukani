<template>
    <div class="flex items-center justify-center min-h-screen bg-amber-600 text-amber-500">
        <div class="max-w-lg mx-auto text-center">
            <div class="flex justify-between px-6">
                <img class="h-fit" :src="`https://www.fg-a.com/under-construction/under-construction-2.gif`">
                <img class="h-fit bg-white" :src="`https://www.fg-a.com/under-construction/under-construction-truck.gif`" alt="Under Construction">

            </div>
            <h1 class="mt-8 text-3xl font-bold text-gray-50">This page is under construction.</h1>
            <p class="mt-4 text-gray-900">We are working hard to make it available soon. Please come back
                later.</p>
            <div class="flex flex-wrap gap-x-6 px-6">
                <button
                    class="mt-8 px-4 py-2 text-sm font-medium text-slate-300 bg-amber-800 rounded hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-gray-500"
                    @click="goBack">Go Back
                </button>

                <a href="https://mwangikanothe.com/" target="_blank"
                    class="mt-8 px-4 py-2 text-sm font-medium text-slate-300 underline underline-offset-4 decoration-dashed shadow-sm rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500"
                    >Request this page from developer >>
                </a>
            </div>

        </div>
    </div>
</template>

<script setup>
import {onMounted} from 'vue';
import {usePage} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";

const page = usePage();

function goBack() {
    window.history.back();
}

onMounted(() => {
    // Send a fetchAPI call to server for analytics purposes
    fetch(`/api/analytics/${page.props.url}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action: 'page_view',
            timestamp: Date.now()
        })
    });
});
</script>

<style scoped>
/* Add custom styles here */
</style>
