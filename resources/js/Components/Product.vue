<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {defineProps} from "vue";
import PrimaryButton from "./PrimaryButton.vue";
import {Link} from "@inertiajs/vue3";
import ProductCard from "./ProductCard.vue";
import SliderSlick from "./SliderSlick.vue";

defineProps({
    topCategories: Object,
    bestSellers: Object,
})
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-indigo-100 border-b border-gray-200">
            <h1 class="mt-3 mb-5 text-2xl font-medium text-slate-900">
                Mulika X-r - 2023 Edition
            </h1>
            <section class="grid grid-cols-1 md:grid-cols-3 gap-3">

                <!--product main picture-->
                <img alt="Main"
                     class="md:col-span-2 shadow-sm rounded-lg max-h-[36rem]"
                     :src="`https://www.mobilephonemuseum.com/assets/static/e57d5c2a34aef9308ac96a89187daa3b/9d75f/fd09a85d-5dfd-436d-be83-4667ecd73e05.png`">

                <!--product preview-->
                <ProductCard title="Nokia - 2600 Classic" percent-off="20" price="99.99" image-url="https://www.mobilephonemuseum.com/assets/static/377e56fa5c723ad0f77b6c2a68300cc5/9d75f/5f32b76a-dcf5-40de-87cc-ec0bf865fb3d.png">

                    <template v-slot:description>

                        <div class="mt-2 flex flex-col gap-y-3">
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Size: </span> 12cm x 25cm x 2.5cm (w x l x h).
                            </p>
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Storage: </span> 64MB Memory and 128MB HDD
                            </p>
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Network: </span> 3G NET WWW
                            </p>
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Speed: </span> 800MHZ
                            </p>
                            <p class="text-sm text-justify leading-tight"><span class="font-semibold">Lifespan: </span> Eternal
                            </p>
                        </div>

                    </template>
                </ProductCard>

                <!--Nangos 103R-->
                <ProductCard image-url="" percent-off="10" title="Details about Nangos 103R" features="" price="9.99" details="">
                    <template v-slot:description>
                        <div class="text-sm text-justify leading-tight" ><span class="font-semibold">Features: </span>
                            <li>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm</li>
                            <li>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted</li>
                            <li>The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.</li>
                        </div>
                    </template>

                </ProductCard>

                <!--product image-->
                <div class="md:col-span-2 place-content-center py-4 pl-4 rounded-md">
                    <img class="w-3/4 px-4 rounded-md" :src="`https://www.mobilephonemuseum.com/assets/static/377e56fa5c723ad0f77b6c2a68300cc5/9d75f/5f32b76a-dcf5-40de-87cc-ec0bf865fb3d.png`">
                </div>

                <!--product image-->
                <div class="md:col-span-2 mx-auto py-4 pl-4 rounded-md">
                    <img class="w-3/4 px-4 rounded-md" :src="`https://www.mobilephonemuseum.com/assets/static/e57d5c2a34aef9308ac96a89187daa3b/9d75f/fd09a85d-5dfd-436d-be83-4667ecd73e05.png`">
                </div>

                <!--product image-->
                <div class="md:col-span-1 mx-auto py-4 pl-4 rounded-md">
                    <img class="w-3/4 px-4 rounded-md" :src="`https://www.mobilephonemuseum.com/assets/static/25fdc07c536fd411b335b240cc508a3d/9d75f/33794b70-cc12-41a9-842a-381ce3f91155.png`">
                </div>
            </section>


        </div>

        <div class="bg-gray-300 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <h2 class="md:col-span-2 mt-3 mb-5 font-bold text-indigo-900">
                More from Our Store
            </h2>
            <div>

                <!--product Nokia 1011-->
                <ProductCard image-url="https://www.mobilephonemuseum.com/assets/static/fb49d0fdc35e6f2d317adf44a59b432a/9d75f/5d64750f-0eb2-45d9-8ba5-682b30effe83.png" percent-off="10" title="Nokia 1011" features="Hadithi hizi zinaangazia hali halisi za maisha ya wanadamu kupitia wahusika wanayama." price="9.99">

                </ProductCard>

            </div>

            <div>

                <!--product Motorolla-->
                <ProductCard image-url="https://www.mobilephonemuseum.com/assets/static/29d32f22b3b8c6c5a3d98cb2503df664/9d75f/7bf4f930-6e93-4a0b-9dc0-4be12e10367a.png" percent-off="20" title="Motorolla RIZl Z10" features="Hapo zamani katika kijiji hiki waliishi watu, sio wengi sana kwani nyumba zilihesabika" price="99.99">

                </ProductCard>

            </div>

            <div>

                <!--product Ericsson-->
                <ProductCard image-url="https://www.mobilephonemuseum.com/assets/static/48c4ec08bff03f1ad095a5b96277fb52/49c31/97f76917-c2b0-438b-9fd0-9f03bcb79e34.png" percent-off="20" title="Ericsson JB988" features="Miongoni mwa watu hao alikuwepo bibi na wajukuu zake ambao aliwapenda sana na aliwapa kila walichotaka ambacho aliweza kukimiliki. Kwa bahati mbaya kijiji hiki kilikuwa hakina jina." price="99.99">

                </ProductCard>

            </div>

            <div>

                <!--product S23-->
                <ProductCard image-url="https://fdn.gsmarena.com/imgroot/reviews/23/samsung-galaxy-s23-ultra/lifestyle/-1024w2/gsmarena_011.jpg" percent-off="30" title="Samsung S23 Plus" features="Siku moja wale watoto walikiona kitu ndani ya nyumba yao. Kile kitu yule bibi alikihitaji na wale walikipenda sana kile kitu kiwe chao. K" price="">

                </ProductCard>

            </div>
            <div>
                <SliderSlick></SliderSlick>
            </div>
        </div>
    </div>
</template>
