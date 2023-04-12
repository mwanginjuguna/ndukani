<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm, usePage} from "@inertiajs/vue3";
import {computed, defineProps, ref, watch} from "vue";
import Modal from "../../Components/Modal.vue";
import PrimaryButton from "../../Components/PrimaryButton.vue";
import SecondaryButton from "../../Components/SecondaryButton.vue";
import axios from "axios";
import {useFlash} from "../../Composables/useFlash.js";

let { flash } = useFlash();

defineProps({
    tags: Object,
})
const newTag = ref(false);
const addedTag = ref(null)

const allTags = ref(usePage().props.tags );

watch([usePage().props.tags, addedTag], () => {
    allTags.value = Object.assign({}, usePage().props.tags, addedTag.value);
});

const tagForm = useForm({
    name: '',
    description: ''
});

function modalClose() {
    newTag.value = false;
}

function addTag() {

    // fetch API
    fetch(route('tag.store'), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            'name': tagForm.name,
            'description': tagForm.description
        })
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network Responded with an error.');
        }
        return response.json();
    })
        .then(data => {
            if (data.success === true) {
                console.log(data.data);
                // usePage().props.flash.message = data.message;
                flash('Success', data.message, 'success');
                tagForm.reset();
                modalClose();
                // update all the categories
            }
        })
        .catch(error => {
            flash("Error", error.message, "danger")
        })
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 id="tags" class="font-semibold text-xl text-gray-700 uppercase leading-tight">
                Dukani Tags
            </h2>
        </template>

        <div class="py-12">
            <div class="relative max-w-7xl sm:px-4 grid grid-cols-1 md:grid-cols-5 gap-x-6">
                <!--side panel-->
                <div class="hidden sticky top-0 md:top-32 right-0 md:block md:col-span-1 h-fit px-4 py-4 text-xs xl:text-sm bg-gray-50 rounded-md shadow-sm">

                    <button class="my-2 p-1.5 px-3 text-slate-100 rounded hover:underline hover:bg-slate-900 bg-slate-700 transition-all 300ms ease-in-out" @click="newTag = true">Add New</button>
                    <!-- Modal -->
                    <Modal :show="newTag" :closeable="true">
                        <div class="max-w-lg pt-4 pb-10 mx-auto">
                            <div>

                                <div class="mt-3 px-6 mx-auto flex flex-col">
                                    <label class="font-semibold">
                                        Name
                                    </label>
                                    <input name="name" v-model="tagForm.name" type="text" class="px-1 w-full bg-white text-slate-900 border border-gray-300 rounded">
                                </div>

                                <div class="mt-3 px-6 flex flex-col">
                                    <label class="font-semibold">
                                        Description
                                    </label>
                                    <textarea rows="6" name="description" v-model="tagForm.description" class="px-1 w-full bg-white text-slate-900 border border-gray-300 rounded"></textarea>
                                </div>

                                <div class="mt-3 px-6 max-w-lg flex justify-between">
                                    <PrimaryButton @click="addTag" @close="modalClose" :class="{ 'opacity-25': tagForm.processing }" :disabled="tagForm.processing">
                                        Add Tags
                                    </PrimaryButton>
                                    <SecondaryButton @click="newTag = false" :class="`bg-amber-600 text-white hover:bg-amber-700 hover:text-gray-100`">Cancel</SecondaryButton>
                                </div>
                            </div>
                        </div>
                    </Modal>

                    <h4 class="font-semibold text-slate-500">Main Tags</h4>

                    <div class="mt-6 flex flex-row gap-1 text-gray-600 font-semibold">
                        <svg viewBox="0 0 24 24" fill="none" width="29px" height="29px" xmlns="http://www.w3.org/2000/svg" stroke="#828282"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect x="7.5" y="4.5" width="9" height="15" rx="1.5" stroke="#475569"></rect> <rect x="9.5" y="6.5" width="5" height="5" rx="0.75" stroke="#475569"></rect> <rect width="1.5" height="1" rx="0.5" transform="matrix(1 0 0 -1 9.5 14.5)" stroke="#475569"></rect> <rect width="1.5" height="1" rx="0.5" transform="matrix(1 0 0 -1 13 14.5)" stroke="#475569"></rect> </g>
                        </svg>
                        <button @click.prevent="" class="hover:underline hover:underline-offset-2">
                            Phones & Tablets
                        </button>
                    </div>

                    <div class="flex flex-row gap-1 text-gray-600 font-semibold mt-6">
                        <svg width="24px" height="24px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M725.719319 260.364622c0-28.813231-17.549235-62.336861-39.159159-74.815533L373.308075 4.689565C351.69109-7.782044 334.148917 5.480517 334.148917 34.293748v705.020226c0 28.813231 17.542173 62.336861 39.159158 74.815533l313.252085 180.852462c21.609924 12.478672 39.159159-0.783889 39.159159-29.597121V260.364622z" fill="#6D8ACA"></path><path d="M349.021629 1.935359L305.229754 27.231682l58.459787 19.335938 31.998223-28.954473L349.021629 1.935359zM668.68607 1021.930815l43.777751-25.063275-27.817481-15.932022-15.96027 40.995297z" fill="#6D8ACA"></path><path d="M684.64634 284.079041c0-28.813231-17.549235-62.336861-39.159158-74.815532L332.235096 28.403985C310.618111 15.932375 293.075938 29.194936 293.075938 58.008168v705.013163c0 28.820294 17.542173 62.343923 39.159158 74.815533l313.252086 180.859524c21.609924 12.478672 39.159159-0.783889 39.159158-29.604183V284.079041z" fill="#4762AF"></path><path d="M668.68607 288.521081c0-26.398005-16.073263-57.117994-35.875298-68.55148L345.773078 54.251148c-19.802035-11.433486-35.875298 0.720331-35.875298 27.125398v675.161808c0 26.398005 16.073263 57.117994 35.875298 68.55148L632.810772 990.808287c19.802035 11.433486 35.875298-0.720331 35.875298-27.125397V288.521081z" fill="#FFFFFF"></path><path d="M710.140401 358.393167c0-4.427916-2.697709-9.583224-6.016881-11.497044-3.319171-1.920882-6.016881 0.120055-6.016881 4.547971v151.036417c0 4.427916 2.697709 9.583224 6.016881 11.497044 3.319171 1.920882 6.016881-0.120055 6.016881-4.547971V358.393167zM710.140401 546.809102c0-4.427916-2.697709-9.576162-6.016881-11.497044-3.319171-1.91382-6.016881 0.127117-6.016881 4.555033v49.046052c0 4.427916 2.697709 9.576162 6.016881 11.497044 3.319171 1.91382 6.016881-0.120055 6.016881-4.54797v-49.053115z" fill="#4762AF"></path><path d="M710.140401 433.907845l-12.033762-6.942012v11.560603l12.033762 6.949074v-11.567665z" fill="#6D8ACA"></path><path d="M544.527878 210.322819c0-10.056383-6.122812-21.758227-13.665098-26.10846l-84.497626-48.784756c-7.542287-4.357295-13.672161 0.275421-13.672161 10.331803 0 10.056383 6.129874 21.758227 13.672161 26.10846l84.497626 48.784756c7.542287 4.357295 13.665099-0.268359 13.665098-10.331803z"></path><path d="M366.96634 367.55973c0-1.186427-0.720331-2.570592-1.610152-3.079061l-39.674689-22.909344c-0.88982-0.515531-1.610151 0.03531-1.610151 1.221737v17.196132c0 1.186427 0.720331 2.56353 1.610151 3.079061l39.674689 22.902282c0.88982 0.515531 1.610151-0.028248 1.610152-1.214675v-17.196132zM591.307007 497.07803c0-1.186427-0.720331-2.56353-1.610151-3.079061l-65.726653-37.944484c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214676v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.086123l65.726653 37.944483c0.88982 0.515531 1.610151-0.03531 1.610151-1.221737v-17.196132z" fill="#F2F2F2"></path><path d="M510.298042 450.305963c0-1.186427-0.720331-2.56353-1.610151-3.079061l-23.142392-13.354367c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214675v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l23.142392 13.36143c0.88982 0.515531 1.610151-0.03531 1.610151-1.221738v-17.196132z" fill="#7058FF"></path><path d="M470.390304 427.269502c0-1.186427-0.720331-2.56353-1.610151-3.079061L378.569315 372.100639c-0.88982-0.508469-1.617213 0.03531-1.617213 1.221737v17.196132c0 1.186427 0.727393 2.570592 1.617213 3.079061L468.780153 445.687372c0.88982 0.508469 1.610151-0.03531 1.610151-1.221738v-17.196132z" fill="#F2F2F2"></path><path d="M354.982013 444.988227c5.141184 2.966068 9.307804 10.190562 9.307803 16.122698 0 5.932136-4.166619 8.340301-9.307803 5.374233-5.134122-2.966068-9.307804-10.190562-9.307804-16.122698 0-5.932136 4.173681-8.340301 9.307804-5.374233z" fill="#7058FF"></path><path d="M416.00533 482.367745c0-1.186427-0.727393-2.570592-1.617214-3.086123l-39.674689-22.902281c-0.88982-0.515531-1.610151 0.028248-1.610152 1.214675v17.203194c0 1.186427 0.720331 2.56353 1.610152 3.079061l39.674689 22.902282c0.88982 0.515531 1.617213-0.028248 1.617214-1.214676v-17.196132zM595.530123 586.017696c0-1.186427-0.720331-2.570592-1.610151-3.079061l-22.45031-12.965954c-0.88982-0.508469-1.610151 0.03531-1.610151 1.221737v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l22.45031 12.958892c0.88982 0.515531 1.610151-0.028248 1.610151-1.214675v-17.196132zM654.512503 620.070981c0-1.186427-0.720331-2.570592-1.610152-3.079061l-42.690192-24.646613c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214676v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.086123l42.690192 24.646612c0.88982 0.508469 1.610151-0.03531 1.610152-1.221737v-17.196132z" fill="#F2F2F2"></path><path d="M556.208536 563.313152c0-1.186427-0.720331-2.56353-1.610151-3.079061l-23.13533-13.36143c-0.88982-0.508469-1.617213 0.03531-1.617213 1.221738v17.196132c0 1.186427 0.727393 2.56353 1.617213 3.079061l23.13533 13.361429c0.88982 0.508469 1.610151-0.03531 1.610151-1.221737v-17.196132z" fill="#7058FF"></path><path d="M517.112936 540.742787c0-1.186427-0.720331-2.570592-1.610151-3.079061l-90.2179-52.089802c-0.88982-0.515531-1.610151 0.03531-1.610151 1.221737v17.196132c0 1.186427 0.720331 2.56353 1.610151 3.079061l90.2179 52.082741c0.88982 0.515531 1.610151-0.028248 1.610151-1.214676V540.742787z" fill="#F2F2F2"></path><path d="M354.982013 482.840904c5.141184 2.966068 9.307804 10.190562 9.307803 16.115636 0 5.932136-4.166619 8.340301-9.307803 5.374232-5.134122-2.966068-9.307804-10.1835-9.307804-16.115636 0-5.932136 4.173681-8.340301 9.307804-5.374232z" fill="#7058FF"></path><path d="M416.00533 520.220422c0-1.186427-0.727393-2.570592-1.617214-3.086123l-39.674689-22.902282c-0.88982-0.515531-1.610151 0.028248-1.610152 1.214676v17.196132c0 1.186427 0.720331 2.570592 1.610152 3.086123l39.674689 22.902281c0.88982 0.515531 1.617213-0.028248 1.617214-1.214675v-17.196132zM595.530123 623.870372c0-1.186427-0.720331-2.570592-1.610151-3.079061l-22.45031-12.965954c-0.88982-0.508469-1.610151 0.03531-1.610151 1.221738v17.196132c0 1.186427 0.720331 2.56353 1.610151 3.079061l22.45031 12.958892c0.88982 0.515531 1.610151-0.028248 1.610151-1.214676v-17.196132zM654.512503 657.923657c0-1.186427-0.720331-2.570592-1.610152-3.079061l-42.690192-24.646612c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214676v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l42.690192 24.646612c0.88982 0.515531 1.610151-0.028248 1.610152-1.214676v-17.196132z" fill="#F2F2F2"></path><path d="M556.208536 601.165829c0-1.186427-0.720331-2.570592-1.610151-3.079061l-23.13533-13.36143c-0.88982-0.515531-1.617213 0.03531-1.617213 1.221737v17.196132c0 1.186427 0.727393 2.56353 1.617213 3.079061l23.13533 13.36143c0.88982 0.508469 1.610151-0.03531 1.610151-1.221737v-17.196132z" fill="#7058FF"></path><path d="M517.112936 578.595464c0-1.186427-0.720331-2.570592-1.610151-3.086123l-90.2179-52.082741c-0.88982-0.515531-1.610151 0.03531-1.610151 1.221738v17.196132c0 1.186427 0.720331 2.56353 1.610151 3.079061l90.2179 52.08274c0.88982 0.515531 1.610151-0.028248 1.610151-1.214675V578.595464z" fill="#F2F2F2"></path><path d="M366.96634 407.898254c0-1.186427-0.720331-2.56353-1.610152-3.079061L325.681499 381.916911c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214676v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.086123l39.674689 22.902281c0.88982 0.515531 1.610151-0.03531 1.610152-1.221737v-17.196132zM591.307007 537.423616c0-1.186427-0.720331-2.56353-1.610151-3.079061l-65.726653-37.951545c-0.88982-0.508469-1.610151 0.03531-1.610151 1.221737v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l65.726653 37.951546c0.88982 0.515531 1.610151-0.03531 1.610151-1.221738V537.423616z" fill="#F2F2F2"></path><path d="M510.298042 490.651549c0-1.186427-0.720331-2.56353-1.610151-3.079061l-23.142392-13.361429c-0.88982-0.508469-1.610151 0.03531-1.610151 1.221737v17.196132c0 1.186427 0.720331 2.56353 1.610151 3.079061l23.142392 13.36143c0.88982 0.508469 1.610151-0.03531 1.610151-1.221738v-17.196132z" fill="#7058FF"></path><path d="M470.390304 467.615088c0-1.186427-0.720331-2.570592-1.610151-3.079061l-90.210838-52.089802c-0.88982-0.515531-1.617213 0.03531-1.617213 1.221737v17.196132c0 1.186427 0.727393 2.56353 1.617213 3.079061l90.210838 52.082741c0.88982 0.515531 1.610151-0.028248 1.610151-1.214676v-17.196132z" fill="#F2F2F2"></path><path d="M364.727665 619.611946c0-1.186427-0.720331-2.56353-1.610152-3.079061l-37.436014-21.609923c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214675v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l37.436014 21.616986c0.88982 0.515531 1.610151-0.03531 1.610152-1.221738v-17.196132z" fill="#7058FF"></path><path d="M418.625356 650.734474c0-1.186427-0.720331-2.570592-1.610151-3.086124l-37.436015-21.609923c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214675v17.203194c0 1.179365 0.720331 2.56353 1.610151 3.079061l37.436015 21.609924c0.88982 0.515531 1.610151-0.028248 1.610151-1.214675v-17.196132zM536.011026 718.502064c0-1.186427-0.720331-2.56353-1.610151-3.079061L444.182975 663.340262c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214676v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l90.2179 52.089802c0.88982 0.515531 1.610151-0.03531 1.610151-1.221737v-17.196132z" fill="#F2F2F2"></path><path d="M473.864841 604.527372c0-1.186427-0.720331-2.570592-1.610151-3.086123l-42.548951-24.561867c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214675v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.086123l42.548951 24.561868c0.88982 0.515531 1.610151-0.028248 1.610151-1.214676v-17.196132zM531.222945 637.641402c0-1.186427-0.720331-2.570592-1.610151-3.079061l-42.548951-24.568929c-0.88982-0.515531-1.610151 0.03531-1.610151 1.221737v17.196132c0 1.186427 0.720331 2.56353 1.610151 3.079061l42.548951 24.56893c0.88982 0.508469 1.610151-0.03531 1.610151-1.221738v-17.196132z" fill="#7058FF"></path><path d="M417.50955 571.98537c0-1.186427-0.720331-2.56353-1.610151-3.079061L325.681499 516.823568c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214675v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l90.2179 52.089803c0.88982 0.508469 1.610151-0.03531 1.610151-1.221737v-17.196132zM619.858942 688.813136c0-1.186427-0.720331-2.56353-1.610151-3.079061l-72.047203-41.595572c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214676v17.203194c0 1.186427 0.720331 2.56353 1.610151 3.079061l72.047203 41.595572c0.88982 0.508469 1.610151-0.03531 1.610151-1.221738v-17.196132z" fill="#F2F2F2"></path><path d="M473.864841 645.4238c0-1.186427-0.720331-2.56353-1.610151-3.079061l-42.548951-24.561868c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214676v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.086123l42.548951 24.561867c0.88982 0.515531 1.610151-0.028248 1.610151-1.214675v-17.203194zM531.222945 678.544892c0-1.186427-0.720331-2.570592-1.610151-3.079061l-42.548951-24.56893c-0.88982-0.515531-1.610151 0.03531-1.610151 1.221738v17.196132c0 1.186427 0.720331 2.56353 1.610151 3.079061l42.548951 24.561867c0.88982 0.515531 1.610151-0.028248 1.610151-1.214675v-17.196132z" fill="#7058FF"></path><path d="M417.50955 612.888859c0-1.186427-0.720331-2.56353-1.610151-3.079061L325.681499 557.719995c-0.88982-0.508469-1.610151 0.03531-1.610151 1.221738v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.079061l90.2179 52.089803c0.88982 0.508469 1.610151-0.03531 1.610151-1.221738v-17.196132zM619.858942 729.716626c0-1.186427-0.720331-2.570592-1.610151-3.079061l-72.047203-41.595572c-0.88982-0.515531-1.610151 0.028248-1.610151 1.214675v17.196132c0 1.186427 0.720331 2.570592 1.610151 3.086123l72.047203 41.595572c0.88982 0.508469 1.610151-0.03531 1.610151-1.221737v-17.196132z" fill="#F2F2F2"></path></g>
                        </svg>
                        <button @click.prevent="" class="hover:underline hover:underline-offset-2">
                            Fashion & Clothings
                        </button>
                    </div>

                    <div class="flex flex-row gap-1 text-gray-600 font-semibold mt-6">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.448 511.448" xml:space="preserve" width="24px" height="24px" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M371.159,87.266v336.915H140.289V87.266H371.159z M352.38,132.004c0-4.573-3.712-8.285-8.285-8.285 h-70.697c-4.573,0-8.285,3.712-8.285,8.285c0,4.573,3.712,8.285,8.285,8.285h70.697C348.668,140.289,352.38,136.578,352.38,132.004z M352.38,220.375c0-4.573-3.712-8.285-8.285-8.285h-70.697c-4.573,0-8.285,3.712-8.285,8.285s3.712,8.285,8.285,8.285h70.697 C348.668,228.66,352.38,224.949,352.38,220.375z M352.38,308.746c0-4.573-3.712-8.285-8.285-8.285h-70.697 c-4.573,0-8.285,3.712-8.285,8.285c0,4.573,3.712,8.285,8.285,8.285h70.697C348.668,317.031,352.38,313.32,352.38,308.746z M352.38,397.118c0-4.573-3.712-8.285-8.285-8.285h-17.674c-4.573,0-8.285,3.712-8.285,8.285c0,4.573,3.712,8.285,8.285,8.285 h17.674C348.668,405.402,352.38,401.691,352.38,397.118z M317.031,167.353c0-4.573-3.712-8.285-8.285-8.285h-35.348 c-4.573,0-8.285,3.712-8.285,8.285c0,4.573,3.712,8.285,8.285,8.285h35.348C313.32,175.638,317.031,171.926,317.031,167.353z M317.031,255.724c0-4.573-3.712-8.285-8.285-8.285h-35.348c-4.573,0-8.285,3.712-8.285,8.285s3.712,8.285,8.285,8.285h35.348 C313.32,264.009,317.031,260.297,317.031,255.724z M317.031,344.095c0-4.573-3.712-8.285-8.285-8.285h-35.348 c-4.573,0-8.285,3.712-8.285,8.285s3.712,8.285,8.285,8.285h35.348C313.32,352.38,317.031,348.668,317.031,344.095z M299.357,397.118c0-4.573-3.712-8.285-8.285-8.285h-17.674c-4.573,0-8.285,3.712-8.285,8.285c0,4.573,3.712,8.285,8.285,8.285 h17.674C295.645,405.402,299.357,401.691,299.357,397.118z M246.334,352.932v-53.023c0-4.573-3.712-8.285-8.285-8.285h-70.697 c-4.573,0-8.285,3.712-8.285,8.285v53.023c0,4.573,3.712,8.285,8.285,8.285h70.697C242.623,361.217,246.334,357.505,246.334,352.932 z M246.334,264.561v-53.023c0-4.573-3.712-8.285-8.285-8.285h-70.697c-4.573,0-8.285,3.712-8.285,8.285v53.023 c0,4.573,3.712,8.285,8.285,8.285h70.697C242.623,272.846,246.334,269.134,246.334,264.561z M246.334,176.19v-53.023 c0-4.573-3.712-8.285-8.285-8.285h-70.697c-4.573,0-8.285,3.712-8.285,8.285v53.023c0,4.573,3.712,8.285,8.285,8.285h70.697 C242.623,184.475,246.334,180.763,246.334,176.19z M246.334,397.118c0-4.573-3.712-8.285-8.285-8.285h-17.674 c-4.573,0-8.285,3.712-8.285,8.285c0,4.573,3.712,8.285,8.285,8.285h17.674C242.623,405.402,246.334,401.691,246.334,397.118z M193.312,397.118c0-4.573-3.712-8.285-8.285-8.285h-17.674c-4.573,0-8.285,3.712-8.285,8.285c0,4.573,3.712,8.285,8.285,8.285 h17.674C189.6,405.402,193.312,401.691,193.312,397.118z"></path> <g> <path style="fill:#C2E95D;" d="M371.159,440.751v27.064c0,14.924-12.14,27.064-27.064,27.064H167.353 c-14.924,0-27.064-12.14-27.064-27.064v-27.064H371.159z M271.741,467.814c0-8.837-7.18-16.017-16.017-16.017 s-16.017,7.18-16.017,16.017c0,8.837,7.18,16.017,16.017,16.017S271.741,476.652,271.741,467.814z"></path> <rect x="175.638" y="308.194" style="fill:#C2E95D;" width="54.127" height="36.453"></rect> <rect x="175.638" y="219.823" style="fill:#C2E95D;" width="54.127" height="36.453"></rect> <path style="fill:#C2E95D;" d="M371.159,43.633v27.064H140.289V43.633c0-14.924,12.14-27.064,27.064-27.064h176.742 C359.019,16.57,371.159,28.71,371.159,43.633z M290.52,43.633c0-4.573-3.712-8.285-8.285-8.285h-53.023 c-4.573,0-8.285,3.712-8.285,8.285s3.712,8.285,8.285,8.285h53.023C286.808,51.918,290.52,48.206,290.52,43.633z"></path> <rect x="175.638" y="131.452" style="fill:#C2E95D;" width="54.127" height="36.453"></rect> </g> <g> <path style="fill:#535757;" d="M387.728,43.633v424.181c0,24.059-19.574,43.633-43.633,43.633H167.353 c-24.059,0-43.633-19.574-43.633-43.633V43.633C123.72,19.574,143.294,0,167.353,0h176.742 C368.154,0,387.728,19.574,387.728,43.633z M371.159,467.814v-27.064H140.289v27.064c0,14.924,12.14,27.064,27.064,27.064h176.742 C359.019,494.878,371.159,482.738,371.159,467.814z M371.159,424.181V87.266H140.289v336.915H371.159z M371.159,70.697V43.633 c0-14.924-12.14-27.064-27.064-27.064H167.353c-14.924,0-27.064,12.14-27.064,27.064v27.064H371.159z"></path> <path style="fill:#535757;" d="M344.095,123.72c4.573,0,8.285,3.712,8.285,8.285c0,4.573-3.712,8.285-8.285,8.285h-70.697 c-4.573,0-8.285-3.712-8.285-8.285c0-4.573,3.712-8.285,8.285-8.285H344.095z"></path> <path style="fill:#535757;" d="M344.095,212.091c4.573,0,8.285,3.712,8.285,8.285s-3.712,8.285-8.285,8.285h-70.697 c-4.573,0-8.285-3.712-8.285-8.285s3.712-8.285,8.285-8.285H344.095z"></path> <path style="fill:#535757;" d="M344.095,300.462c4.573,0,8.285,3.712,8.285,8.285c0,4.573-3.712,8.285-8.285,8.285h-70.697 c-4.573,0-8.285-3.712-8.285-8.285c0-4.573,3.712-8.285,8.285-8.285H344.095z"></path> <path style="fill:#535757;" d="M344.095,388.833c4.573,0,8.285,3.712,8.285,8.285c0,4.573-3.712,8.285-8.285,8.285h-17.674 c-4.573,0-8.285-3.712-8.285-8.285c0-4.573,3.712-8.285,8.285-8.285H344.095z"></path> <path style="fill:#535757;" d="M308.746,159.068c4.573,0,8.285,3.712,8.285,8.285c0,4.573-3.712,8.285-8.285,8.285h-35.348 c-4.573,0-8.285-3.712-8.285-8.285c0-4.573,3.712-8.285,8.285-8.285H308.746z"></path> <path style="fill:#535757;" d="M308.746,247.439c4.573,0,8.285,3.712,8.285,8.285s-3.712,8.285-8.285,8.285h-35.348 c-4.573,0-8.285-3.712-8.285-8.285s3.712-8.285,8.285-8.285H308.746z"></path> <path style="fill:#535757;" d="M308.746,335.81c4.573,0,8.285,3.712,8.285,8.285s-3.712,8.285-8.285,8.285h-35.348 c-4.573,0-8.285-3.712-8.285-8.285s3.712-8.285,8.285-8.285H308.746z"></path> <path style="fill:#535757;" d="M291.072,388.833c4.573,0,8.285,3.712,8.285,8.285c0,4.573-3.712,8.285-8.285,8.285h-17.674 c-4.573,0-8.285-3.712-8.285-8.285c0-4.573,3.712-8.285,8.285-8.285H291.072z"></path> <path style="fill:#535757;" d="M282.235,35.348c4.573,0,8.285,3.712,8.285,8.285s-3.712,8.285-8.285,8.285h-53.023 c-4.573,0-8.285-3.712-8.285-8.285s3.712-8.285,8.285-8.285H282.235z"></path> <path style="fill:#535757;" d="M255.724,451.797c8.837,0,16.017,7.18,16.017,16.017c0,8.837-7.18,16.017-16.017,16.017 s-16.017-7.18-16.017-16.017C239.707,458.977,246.887,451.797,255.724,451.797z M256.276,467.814c0-0.309-0.243-0.552-0.552-0.552 c-0.309,0-0.552,0.243-0.552,0.552c0,0.309,0.243,0.552,0.552,0.552C256.033,468.367,256.276,468.124,256.276,467.814z"></path> <path style="fill:#535757;" d="M246.334,299.909v53.023c0,4.573-3.712,8.285-8.285,8.285h-70.697c-4.573,0-8.285-3.712-8.285-8.285 v-53.023c0-4.573,3.712-8.285,8.285-8.285h70.697C242.623,291.625,246.334,295.336,246.334,299.909z M229.765,344.647v-36.453 h-54.127v36.453H229.765z"></path> <path style="fill:#535757;" d="M246.334,211.538v53.023c0,4.573-3.712,8.285-8.285,8.285h-70.697c-4.573,0-8.285-3.712-8.285-8.285 v-53.023c0-4.573,3.712-8.285,8.285-8.285h70.697C242.623,203.253,246.334,206.965,246.334,211.538z M229.765,256.276v-36.453 h-54.127v36.453H229.765z"></path> <path style="fill:#535757;" d="M246.334,123.167v53.023c0,4.573-3.712,8.285-8.285,8.285h-70.697c-4.573,0-8.285-3.712-8.285-8.285 v-53.023c0-4.573,3.712-8.285,8.285-8.285h70.697C242.623,114.882,246.334,118.594,246.334,123.167z M229.765,167.905v-36.453 h-54.127v36.453H229.765z"></path> <path style="fill:#535757;" d="M238.05,388.833c4.573,0,8.285,3.712,8.285,8.285c0,4.573-3.712,8.285-8.285,8.285h-17.674 c-4.573,0-8.285-3.712-8.285-8.285c0-4.573,3.712-8.285,8.285-8.285H238.05z"></path> <path style="fill:#535757;" d="M185.027,388.833c4.573,0,8.285,3.712,8.285,8.285c0,4.573-3.712,8.285-8.285,8.285h-17.674 c-4.573,0-8.285-3.712-8.285-8.285c0-4.573,3.712-8.285,8.285-8.285H185.027z"></path> </g> </g>
                        </svg>
                        <button @click.prevent="" class="hover:underline hover:underline-offset-2">
                            Computing
                        </button>
                    </div>

                    <div class="flex flex-row gap-1 text-gray-600 font-semibold mt-6">
                        <svg width="24px" height="24px" viewBox="0 0 48 48" version="1" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 48 48" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#455A64" d="M4,31V8c0-2.2,1.8-4,4-4h12c2.2,0,4,1.8,4,4v23c0,2.2-1.8,4-4,4H8C5.8,35,4,33.2,4,31z"></path> <path fill="#BBDEFB" d="M20,7H8C7.4,7,7,7.4,7,8v21c0,0.6,0.4,1,1,1h12c0.6,0,1-0.4,1-1V8C21,7.4,20.6,7,20,7z"></path> <circle fill="#37474F" cx="14" cy="32.5" r="1.5"></circle> <path fill="#546E7A" d="M14,36V13c0-2.2,1.8-4,4-4h12c2.2,0,4,1.8,4,4v23c0,2.2-1.8,4-4,4H18C15.8,40,14,38.2,14,36z"></path> <path fill="#BBDEFB" d="M30,12H18c-0.6,0-1,0.4-1,1v21c0,0.6,0.4,1,1,1h12c0.6,0,1-0.4,1-1V13C31,12.4,30.6,12,30,12z"></path> <circle fill="#37474F" cx="24" cy="37.5" r="1.5"></circle> <path fill="#E38939" d="M24,40V18c0-2.2,1.8-4,4-4h12c2.2,0,4,1.8,4,4v22c0,2.2-1.8,4-4,4H28C25.8,44,24,42.2,24,40z"></path> <path fill="#FFF3E0" d="M40,17H28c-0.6,0-1,0.4-1,1v20c0,0.6,0.4,1,1,1h12c0.6,0,1-0.4,1-1V18C41,17.4,40.6,17,40,17z"></path> <circle fill="#A6642A" cx="34" cy="41.5" r="1.5"></circle> </g>
                        </svg>
                        <button @click.prevent="" class="hover:underline hover:underline-offset-2">
                            Groceries
                        </button>
                    </div>

                    <div class="flex flex-row gap-1 text-gray-600 font-semibold mt-6">
                        <svg width="24px" height="24px" viewBox="-23 0 100 100" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#1C3C50" d="M10 0h34c6.014 0 10 4.035 10 10v80c0 5.926-4.004 10-10 10H10c-5.974 0-10-3.996-10-10V10C0 4.104 3.95 0 10 0z"></path><path fill="#23475F" d="M4 10h46v79H4V10zm18.5 82h9a2.499 2.499 0 1 1 0 5h-9a2.5 2.5 0 1 1 0-5z"></path></g>
                        </svg>
                        <button @click.prevent="" class="hover:underline hover:underline-offset-2">
                            Others
                        </button>
                    </div>

                </div>

                <div class="col-span-1 md:col-span-4 bg-gray-50">

                    <!--all brands-->
                    <div class="pb-3 bg-white rounded">
                        <div class="px-4 py-3 bg-amber-500 text-slate-900 flex justify-between">
                            <h3 class="font-semibold text-lg text-slate-900">All Categories</h3>
                            <Link :href="route('samsung-show')" class="font-semibold flex flex-row place-content-center">
                                <p class="pr-2">See All</p>
                                <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                            </Link>
                        </div>

                        <div class="grid grid-cols-3 gap-1 p-1">

                            <a href="#tags" class="rounded shadow-sm max-w-[260px] min-w-fit shadow-xl sm:rounded-lg">
                                <img :src="`https://ke.jumia.is/cms/2021/W28/NewHome/Grocery/Brands/Mobile/Tusker.jpg`" alt="img-sm">
                            </a>

                            <a href="#tags" class="rounded shadow-sm max-w-[260px] min-w-fit shadow-xl sm:rounded-lg">
                                <img :src="`https://ke.jumia.is/cms/2021/W28/NewHome/Phones/Brands/Mobile/Samsung.jpg`" alt="img-sm">
                            </a>


                            <a href="#tags" class="rounded shadow-sm max-w-[260px] min-w-fit shadow-xl sm:rounded-lg">
                                <img :src="`https://ke.jumia.is/cms/2023/W08/brands/Sony.png`" alt="img-sm">
                            </a>


                            <a href="#tags" class="rounded shadow-sm max-w-[260px] min-w-fit shadow-xl sm:rounded-lg">
                                <img :src="`https://ke.jumia.is/cms/2021/JMALL/Brands/EPSON.jpg`" alt="img-sm">
                            </a>


                            <a href="/tags"
                               class="rounded bg-amber-800 hover:scale-[1.009] max-w-[260px] max-h-[144px] min-w-fit  min-h-[80px] bg-no-repeat bg-center bg-cover text-white text-center flex place-content-center shadow-sm">
                                <span class="my-auto h-fit px-1.5 font-semibold bg-opacity-50 rounded-lg">Featured</span>
                            </a>

                            <a href="/tags"
                               style="background-image: url('https://ke.jumia.is/cms/2021/W28/NewHome/Grocery/Brands/Mobile/coca-cola_260x144.png');"
                               class="rounded bg-slate-800 hover:scale-[1.009] max-w-[260px] max-h-[144px] min-h-[80px] min-w-fit bg-no-repeat bg-center bg-cover text-white text-center flex place-content-center shadow-sm">
                                <span class="mt-2 h-fit px-1.5 font-semibold text-amber-500 bg-opacity-50 rounded-lg">Others</span>
                            </a>

                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-4 gap-1 p-1">

                            <a href="/tags"
                               v-for="tag in allTags"
                               :key="tag.id"
                               class="rounded bg-slate-800 hover:scale-[1.009] max-w-[260px] max-h-[144px] min-w-fit min-h-[80px] bg-no-repeat bg-center bg-cover text-white text-center flex place-content-center shadow-sm">
                                <span class="my-auto h-fit px-1.5 font-semibold bg-opacity-50 rounded-lg">{{ tag.name }}</span>
                            </a>

                        </div>
                    </div>

                    <!--Savannist Fashion-->
                    <div class="mt-5 p-2 pb-3 sm:col-span-2 bg-white rounded">
                        <div class="flex justify-between py-3 px-4 bg-lime-700">
                            <h3 class="font-semibold text-lg text-slate-100">Savannist Fashion</h3>
                            <Link :href="route('samsung-show')" class="text-amber-300 font-semibold flex flex-row place-content-center">
                                <p class="pr-2">See All</p>
                                <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                            </Link>
                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

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

                    <!--phones-->
                    <div class="mt-5 m-1 p-px pb-3 sm:col-span-2 bg-white rounded shadow-sm">
                        <div class="px-4 py-3 flex justify-between bg-green-300">
                            <h3 class="font-semibold text-lg text-slate-900">Phones</h3>
                            <Link :href="route('samsung-show')" class="text-amber-600 font-semibold flex flex-row place-content-center">
                                <p class="pr-2">See All</p>
                                <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                            </Link>
                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/59/786019/1.jpg?4815`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Freeyond F9</p>
                                <p class="mt-1 font-semibold">$ 8.25</p>
                                <p class="text-xs text-gray-600 line-through">$ 10.25</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/34/207378/1.jpg?8371`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Nokia<span class="align-super text-xs">105</span> - Africa Ed.</p>
                                <p class="mt-1 font-semibold">Ksh 900.00</p>
                                <p class="text-xs text-gray-600 line-through">Ksh 1200.00</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/07/782736/1.jpg?3156`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Samsung Galaxy A-13</p>
                                <p class="mt-1 font-semibold">$ 100.00</p>
                                <p class="text-xs text-gray-600 line-through">$ 110.99</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/71/553217/1.jpg?8252`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Tecno CAMON 19</p>
                                <p class="mt-1 font-semibold">$ 15.99</p>
                                <p class="text-xs text-gray-600 line-through">$ 16.50</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/73/1926121/1.jpg?8690`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">HP Elitepad Notepad</p>
                                <p class="mt-1 font-semibold">$ 10.99</p>
                                <p class="text-xs text-gray-600 line-through">$ 15.00</p>
                            </div>

                        </div>
                    </div>

                    <!--fashion-->
                    <div class="mt-5 m-1 p-px pb-3 sm:col-span-2 bg-white rounded shadow-sm">
                        <div class="px-4 py-3 flex justify-between bg-yellow-200">
                            <h3 class="font-semibold text-lg text-slate-900">Fashion</h3>
                            <Link :href="route('samsung-show')" class="text-amber-600 font-semibold flex flex-row place-content-center">
                                <p class="pr-2">See All</p>
                                <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                            </Link>
                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light">

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

                    <!--recently viewed-->
                    <div class="mt-5 m-1 p-2 pb-3 sm:col-span-2 bg-white rounded shadow-sm">
                        <div class="py-3 px-4 flex justify-between bg-lime-300">
                            <h3 class="font-semibold text-lg text-slate-900">Recently Viewed</h3>
                            <Link :href="route('samsung-show')" class="text-amber-600 font-semibold flex flex-row place-content-center">
                                <p class="pr-2">See All</p>
                                <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                            </Link>
                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/08/858804/1.jpg?3397`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Cooking Oil</p>
                                <p class="mt-1 font-semibold">$ 1,758.25</p>
                                <p class="text-xs text-gray-600 line-through">$ 1,676.25</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/19/010765/1.jpg?1054`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">E =mc<span class="align-super text-xs">2</span></p>
                                <p class="mt-1 font-semibold">299,792,458 m/s</p>
                                <p class="text-xs text-gray-600 line-through">3×108 m/s</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/31/626983/1.jpg?1034`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Wireless Earplugs</p>
                                <p class="mt-1 font-semibold">$ 100.00</p>
                                <p class="text-xs text-gray-600 line-through">$ 110.99</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/36/934533/1.jpg?0646`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Generic F9 BT</p>
                                <p class="mt-1 font-semibold">$ 5.99</p>
                                <p class="text-xs text-gray-600 line-through">$ 6.50</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/490956/1.jpg?4111`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Ladies Shoes</p>
                                <p class="mt-1 font-semibold">$ 104,758.99</p>
                                <p class="text-xs text-gray-600 line-through">$ 155,676.00</p>
                            </div>

                        </div>
                    </div>

                    <!--Savannist Fashion-->
                    <div class="mt-5 p-2 pb-3 sm:col-span-2 bg-white rounded">
                        <div class="flex justify-between py-3 px-4 bg-lime-700">
                            <h3 class="font-semibold text-lg text-slate-100">Savannist Fashion</h3>
                            <Link :href="route('samsung-show')" class="text-amber-300 font-semibold flex flex-row place-content-center">
                                <p class="pr-2">See All</p>
                                <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                            </Link>
                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

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

                    <!--trending-->
                    <div class="mt-5 m-1 p-2 pb-3 sm:col-span-2 bg-white rounded shadow-sm">
                        <div class="py-3 px-4 flex justify-between bg-lime-300">
                            <h3 class="font-semibold text-lg text-slate-900">Trending in Categories</h3>
                            <Link :href="route('samsung-show')" class="text-amber-600 font-semibold flex flex-row place-content-center">
                                <p class="pr-2">See All</p>
                                <svg width="18px" height="18px" class="pt-1.5" viewBox="-4.5 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>arrow_right [#336]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-305.000000, -6679.000000)" fill="#d97706"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M249.365851,6538.70769 L249.365851,6538.70769 C249.770764,6539.09744 250.426289,6539.09744 250.830166,6538.70769 L259.393407,6530.44413 C260.202198,6529.66364 260.202198,6528.39747 259.393407,6527.61699 L250.768031,6519.29246 C250.367261,6518.90671 249.720021,6518.90172 249.314072,6519.28247 L249.314072,6519.28247 C248.899839,6519.67121 248.894661,6520.31179 249.302681,6520.70653 L257.196934,6528.32352 C257.601847,6528.71426 257.601847,6529.34685 257.196934,6529.73759 L249.365851,6537.29462 C248.960938,6537.68437 248.960938,6538.31795 249.365851,6538.70769" id="arrow_right-[#336]"> </path> </g> </g> </g> </g></svg>
                            </Link>
                        </div>

                        <div class="grid grid-cols-3 md:grid-cols-5 gap-x-1 gap-y-3 mt-1 font-light ">

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/56/709275/1.jpg?4535`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Men Official</p>
                                <p class="mt-1 font-semibold">$ 1,758.25</p>
                                <p class="text-xs text-gray-600 line-through">$ 1,676.25</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/490956/1.jpg?4111`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">High Heels</p>
                                <p class="mt-1 font-semibold">$ 100.00</p>
                                <p class="text-xs text-gray-600 line-through">$ 110.99</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/34/207378/1.jpg?8371`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Nokia<span class="align-super text-xs">105</span> - Africa Ed.</p>
                                <p class="mt-1 font-semibold">Ksh 900.00</p>
                                <p class="text-xs text-gray-600 line-through">Ksh 1200.00</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/08/858804/1.jpg?3397`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Cooking Oil</p>
                                <p class="mt-1 font-semibold">$ 1,758.25</p>
                                <p class="text-xs text-gray-600 line-through">$ 1,676.25</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/68/272633/1.jpg?7170`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Mali Safi</p>
                                <p class="mt-1 font-semibold">$ 8.00</p>
                                <p class="text-xs text-gray-600 line-through">$ 8.01</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/19/010765/1.jpg?1054`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">E =mc<span class="align-super text-xs">2</span></p>
                                <p class="mt-1 font-semibold">299,792,458 m/s</p>
                                <p class="text-xs text-gray-600 line-through">3×108 m/s</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/73/1926121/1.jpg?8690`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">HP Elitepad Notepad</p>
                                <p class="mt-1 font-semibold">$ 10.99</p>
                                <p class="text-xs text-gray-600 line-through">$ 15.00</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/31/626983/1.jpg?1034`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Wireless Earplugs</p>
                                <p class="mt-1 font-semibold">$ 100.00</p>
                                <p class="text-xs text-gray-600 line-through">$ 110.99</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/84/788253/1.jpg?3496`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Big Five Africa</p>
                                <p class="mt-1 font-semibold">$ 204,758.00</p>
                                <p class="text-xs text-gray-600 line-through">$ 205,676.99</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/36/934533/1.jpg?0646`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Generic F9 BT</p>
                                <p class="mt-1 font-semibold">$ 5.99</p>
                                <p class="text-xs text-gray-600 line-through">$ 6.50</p>
                            </div>

                            <div class="bg-slate-50 px-1 hover:bg-white hover:shadow-md hover:rounded">
                                <img :src="`https://ke.jumia.is/unsafe/fit-in/300x300/filters:fill(white)/product/06/443053/1.jpg?7625`" alt="product">
                                <p class="h-6 mt-1 overflow-hidden">Mara Mbili</p>
                                <p class="mt-1 font-semibold">$ 758.99</p>
                                <p class="text-xs text-gray-600 line-through">$ 976.50</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>
