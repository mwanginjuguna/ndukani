<template xmlns="http://www.w3.org/1999/html">
    <AppLayout title="Dashboard">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-4 grid grid-cols-1 md:grid-cols-4 gap-x-6">
                <div class="col-span-1 md:col-span-4">
                    <div class="pb-4 flex flex-wrap gap-x-1 align-middle text-xs">

                        <Link :href="route('home')">Home</Link>

                        <svg class="mt-1" width="9px" height="9px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#000000" d="M338.752 104.704a64 64 0 0 0 0 90.496l316.8 316.8-316.8 316.8a64 64 0 0 0 90.496 90.496l362.048-362.048a64 64 0 0 0 0-90.496L429.248 104.704a64 64 0 0 0-90.496 0z"></path></g></svg>

                        <Link :href="route('products')">Products</Link>

                        <svg class="mt-1" width="8px" height="8px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#000000" d="M338.752 104.704a64 64 0 0 0 0 90.496l316.8 316.8-316.8 316.8a64 64 0 0 0 90.496 90.496l362.048-362.048a64 64 0 0 0 0-90.496L429.248 104.704a64 64 0 0 0-90.496 0z"></path></g></svg>

                        <Link :href="route('samsung-show')">Samsung</Link>

                        <svg class="mt-1" width="8px" height="8px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#000000" d="M338.752 104.704a64 64 0 0 0 0 90.496l316.8 316.8-316.8 316.8a64 64 0 0 0 90.496 90.496l362.048-362.048a64 64 0 0 0 0-90.496L429.248 104.704a64 64 0 0 0-90.496 0z"></path></g></svg>

                        <Link :href="route('home')">Galaxy S23</Link>


                    </div>
                </div>
                <!--content-->
                <div class="mt-4 col-span-1 md:col-span-3 flex flex-col gap-y-3">

                    <!--product-->
                    <div class="pb-6 grid grid-cols-1 md:grid-cols-2 gap-4 bg-white rounded shadow-sm">

                        <!--product images-->
                        <div id="product-images" class="px-6 py-4">
                            <!--all images-->
                            <!--consider a slider-->
                            <!--for image in images-->
                            <img class="rounded object-cover" alt="image" :src="featuredUrl">

                            <hr class="mb-3 px-6 text-slate-100">

                            <p class="mb-4 text-slate-700 font-semibold uppercase">
                                Share with Friends:
                            </p>
                            <div class="mb-3 flex flex-wrap gap-6">

                                <svg width="26px" height="26px" class="p-px object-contain rounded-sm" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Facebook-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0"> <path d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z" id="Facebook"> </path> </g> </g> </g></svg>

                                <svg width="26px" height="26px" class="p-px object-contain rounded" viewBox="0 -4 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Twitter-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-300.000000, -164.000000)" fill="#00AAEC"> <path d="M348,168.735283 C346.236309,169.538462 344.337383,170.081618 342.345483,170.324305 C344.379644,169.076201 345.940482,167.097147 346.675823,164.739617 C344.771263,165.895269 342.666667,166.736006 340.418384,167.18671 C338.626519,165.224991 336.065504,164 333.231203,164 C327.796443,164 323.387216,168.521488 323.387216,174.097508 C323.387216,174.88913 323.471738,175.657638 323.640782,176.397255 C315.456242,175.975442 308.201444,171.959552 303.341433,165.843265 C302.493397,167.339834 302.008804,169.076201 302.008804,170.925244 C302.008804,174.426869 303.747139,177.518238 306.389857,179.329722 C304.778306,179.280607 303.256911,178.821235 301.9271,178.070061 L301.9271,178.194294 C301.9271,183.08848 305.322064,187.17082 309.8299,188.095341 C309.004402,188.33225 308.133826,188.450704 307.235077,188.450704 C306.601162,188.450704 305.981335,188.390033 305.381229,188.271578 C306.634971,192.28169 310.269414,195.2026 314.580032,195.280607 C311.210424,197.99061 306.961789,199.605634 302.349709,199.605634 C301.555203,199.605634 300.769149,199.559408 300,199.466956 C304.358514,202.327194 309.53689,204 315.095615,204 C333.211481,204 343.114633,188.615385 343.114633,175.270495 C343.114633,174.831347 343.106181,174.392199 343.089276,173.961719 C345.013559,172.537378 346.684275,170.760563 348,168.735283" id="Twitter"> </path> </g> </g> </g></svg>

                            </div>
                        </div>

                        <!--product details-->
                        <div id="product-details" class="px-6 py-4 text-sm text-slate-800 flex flex-col gap-y-3">

                            <div v-if="officialStore" class="flex justify-between">
                                <a
                                    href="#"
                                    class="mb-1 py-1 px-1.5 bg-sky-800 rounded-sm leading-tight text-slate-50 text-xs">
                                    Official store
                                </a>
                                <div class="max-w-fit">
                                    <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 392.577 392.577" xml:space="preserve" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon style="fill:#FFFFFF;" points="95.964,224.666 311.043,224.666 365.346,91.624 77.928,91.624 "></polygon> <path style="fill:#13ff0f;" d="M102.882,113.41l1.293,9.438h45.77c6.012,0,10.925,4.848,10.925,10.925 c0,6.012-4.848,10.925-10.925,10.925h-42.796l2.909,21.786h16.097c6.012,0,10.925,4.848,10.925,10.925 c0,6.012-4.848,10.925-10.925,10.925h-13.059l2.004,14.545h181.333l36.461-89.406H102.882V113.41z"></path> <g> <path style="fill:#91e15b;" d="M124.667,340.965c-8.21,0-14.804,6.659-14.804,14.869s6.659,14.869,14.804,14.869 c8.21,0,14.804-6.659,14.804-14.869S132.748,340.965,124.667,340.965z"></path> <path style="fill:#91e15b;" d="M300.118,340.965c-8.21,0-14.869,6.659-14.869,14.869s6.659,14.869,14.869,14.869 s14.869-6.659,14.869-14.869S308.328,340.965,300.118,340.965z"></path> </g> <g> <path style="fill:#13ff0f;" d="M124.667,319.18c-20.17,0-36.655,16.485-36.655,36.655s16.485,36.655,36.655,36.655 s36.655-16.485,36.655-36.655C161.322,335.6,144.837,319.18,124.667,319.18z M124.667,370.638c-8.21,0-14.804-6.659-14.804-14.869 s6.659-14.869,14.804-14.869c8.21,0,14.804,6.659,14.804,14.869S132.748,370.638,124.667,370.638z"></path> <path style="fill:#13ff0f;" d="M300.118,319.18c-20.17,0-36.655,16.485-36.655,36.655s16.485,36.655,36.655,36.655 s36.655-16.485,36.655-36.655C336.837,335.6,320.417,319.18,300.118,319.18z M300.118,370.638c-8.21,0-14.869-6.659-14.869-14.869 s6.659-14.869,14.869-14.869s14.869,6.659,14.869,14.869S308.328,370.638,300.118,370.638z"></path> <path style="fill:#13ff0f;" d="M256.676,147.22h-22.238v-22.238c0-6.012-4.848-10.925-10.925-10.925 c-6.012,0-10.925,4.848-10.925,10.925v22.238h-22.238c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.848,10.925,10.925,10.925 h22.238v22.238c0,6.012,4.848,10.925,10.925,10.925c6.012,0,10.925-4.848,10.925-10.925v-22.238h22.238 c6.012,0,10.925-4.848,10.925-10.925C267.536,152.068,262.688,147.22,256.676,147.22z"></path> <path style="fill:#13ff0f;" d="M353.516,224.666h-18.877l57.018-139.766c3.297-7.434-2.78-14.998-10.15-14.998H74.954 l-6.077-44.994c-0.517-4.202-3.491-7.564-7.434-8.857L14.316,0.666C8.498-1.273,2.421,1.83,0.546,7.519s1.228,11.895,6.982,13.77 l40.663,13.317L75.73,237.079c0.711,5.43,5.301,9.438,10.796,9.438h267.119c9.438,0,17.067,7.628,17.067,17.067 s-7.628,17.067-17.067,17.067H73.532c-6.012,0-10.925,4.848-10.925,10.925c0,6.012,4.848,10.925,10.925,10.925h280.048 c21.463,0,38.853-17.455,38.853-38.853S375.043,224.666,353.516,224.666z M95.964,224.666L77.863,91.624h287.483l-54.238,133.042 H95.964z"></path> </g> </g></svg>
                                </div>
                            </div>

                            <h2 class="font-medium text-lg text-slate-700 leading-tight">
                                {{ smartPhone.title }}
                            </h2>

                            <p class="text-sm font-light">
                                <span class="font-medium">Brand:</span>
                                <a href="#" class="px-1 inline-flex text-sky-700 hover:text-sky-600 hover:underline">{{ smartPhone.brand }}</a> |
                                <a href="#" class="pl-1 inline-flex text-sky-700 hover:text-sky-600 hover:underline">Similar products from {{ smartPhone.brand }}</a>
                            </p>

                            <!-- rating score -->
                            <div>
                                <div class="flex flex-row">
                                    <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                    <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                </div>
                            </div>

                            <div>

                                <a class="text-sky-600 hover:text-sky-500 hover:underline">({{ smartPhone.verifiedRatings }} verified ratings)</a>

                                <hr class="px-6 text-slate-100">

                                <div class="my-2 py-2">
                                    <p class="text-2xl text-black font-sans font-extrabold">KSh 28,399</p>
                                    <div class="mt-1.5 flex flex-wrap gap-x-2">
                                        <p class="pr-2 font-light text-slate-400 line-through">KSh 31,999</p>
                                        <p class="-mt-px p-1 text-sm text-[#f68b1e] bg-[#fef3e9]">-11%</p>
                                    </div>
                                </div>

                                <p class="mb-2 text-yellow-600">Few units left.</p>

                                <p class="mb-2 leading-relaxed text-xs">+ shipping from KSh 52 to CBD - UON/Globe/Koja/River Road</p>

                                <!-- button -->
                                <div id="cart-button"
                                     class="my-5 px-8 py-3 grid grid-cols-2 flex justify-between shadow-lg drop-shadow-lg rounded-sm bg-amber-500 hover:underline hover:underline-offset-2 uppercase"
                                     @click="addToCart(33)"
                                >
                                    <svg fill="#ffffff" width="24px" height="24px" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M12.2,9h1.6V6.8H16V5.2H13.8V3H12.2V5.2H10V6.8h2.2ZM20,5v5.5L7.45,12.72,5,3H1.25a1,1,0,0,0,0,2H3.47L6.7,18H20V16H8.26l-.33-1.33L22,12.18V5ZM7,19a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,7,19Zm12,0a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,19,19Z"></path></g></svg>
                                    <p class="font-bold text-base text-white">Add to cart</p>
                                </div>

                                <hr class="px-6 text-slate-300">

                                <div id="promotions" class="my-2 grid gap-y-3">

                                    <p class="mb-2 text-lg font-semibold uppercase">Promotions</p>

                                    <div class="flex flex-row gap-x-6 place-content-center">
                                        <svg height="84px" width="84px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.995 511.995" xml:space="preserve" fill="#fbbf24">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#f97316;" cx="255.998" cy="255.998" r="255.998"></circle> <path d="M452,256.608l-51.448-41.52l33.048-57.392l-69.824-6.104l-6.128-67.2l-58.8,28.088L258.447,60l-37.976,53.736 l-61.272-31.752l-3.672,69.6l-68.6,3.664l25.728,65.944l-52.656,31.752l53.904,40.296l-26.952,57.4l67.376,7.328L158,426.352 l62.472-29.312L262.128,452l36.752-54.952l57.6,28.088l4.896-68.384l67.376-1.224l-24.496-56.177L452,256.608z"></path> <g> <path style="fill:#FFFFFF;" d="M143.536,184h45.92v11.92h-31.392v21.96h29.256v11.92h-29.256v33.76h-14.528V184z"></path> <path style="fill:#FFFFFF;" d="M200.608,185.088c7.264-1.135,14.607-1.689,21.96-1.656c8.681-0.837,17.377,1.43,24.544,6.4 c4.567,4.012,7.081,9.87,6.84,15.944c-0.061,9.037-5.841,17.043-14.4,19.944v0.368c6.014,2.954,10.171,8.699,11.096,15.336 c1.545,7.54,3.638,14.957,6.264,22.192h-14.992c-2.308-6.091-4.083-12.37-5.304-18.768c-2.248-10.4-6.016-13.696-14.288-13.92 h-7.312v32.696h-14.4L200.608,185.088z M215.008,220.288h8.616c9.792,0,15.928-5.2,15.928-13.104 c0-8.736-6.144-12.752-15.576-12.752c-3.006-0.086-6.012,0.153-8.968,0.712L215.008,220.288z"></path> <path style="fill:#FFFFFF;" d="M312.224,228.288h-29.976v23.376h33.512v11.92h-48.04V184h46.272v11.92h-31.744v20.552h29.976 V228.288z"></path> <path style="fill:#FFFFFF;" d="M372.944,228.288h-29.976v23.376h33.512v11.92h-48.04V184h46.272v11.92h-31.744v20.552h29.976 V228.288z"></path> <path style="fill:#FFFFFF;" d="M144.672,320.312c2.856,1.592,6.067,2.44,9.336,2.464c4.512,0,7.04-2.112,7.04-5.256 c0-2.92-1.944-4.632-6.872-6.4c-6.352-2.28-10.4-5.672-10.4-11.2c0-6.296,5.256-11.096,13.6-11.096 c3.2-0.091,6.378,0.575,9.272,1.944l-1.72,5.656c-2.37-1.227-5.004-1.852-7.672-1.824c-4.456,0-6.4,2.4-6.4,4.632 c0,2.976,2.232,4.344,7.384,6.352c6.688,2.52,9.952,5.896,9.952,11.448c0,6.184-4.696,11.568-14.656,11.568 c-3.607,0.021-7.167-0.8-10.4-2.4L144.672,320.312z"></path> <path style="fill:#FFFFFF;" d="M181.6,289.408v15.456h16.312v-15.456h7.04V328h-7.04v-17.008H181.6V328h-7.056v-38.592H181.6z"></path> <path style="fill:#FFFFFF;" d="M220,289.408V328h-7.056v-38.592H220z"></path> <path style="fill:#FFFFFF;" d="M228.064,289.928c3.556-0.583,7.157-0.851,10.76-0.8c4.049-0.303,8.079,0.808,11.4,3.144 c2.465,2.139,3.846,5.266,3.768,8.528c0.165,3.252-1.035,6.424-3.312,8.752c-3.366,2.922-7.743,4.408-12.192,4.136 c-1.148,0.022-2.297-0.052-3.432-0.224V328h-6.992L228.064,289.928z M235.056,307.896c1.128,0.234,2.281,0.331,3.432,0.288 c5.256,0,8.464-2.568,8.464-7.096c0-4.288-2.976-6.584-7.84-6.584c-1.361-0.032-2.721,0.086-4.056,0.352L235.056,307.896z"></path> <path style="fill:#FFFFFF;" d="M260,289.928c3.556-0.583,7.157-0.851,10.76-0.8c4.049-0.303,8.079,0.808,11.4,3.144 c2.465,2.139,3.846,5.266,3.768,8.528c0.165,3.252-1.035,6.424-3.312,8.752c-3.366,2.922-7.743,4.408-12.192,4.136 c-1.148,0.022-2.297-0.052-3.432-0.224V328H260V289.928z M266.992,307.896c1.128,0.234,2.281,0.331,3.432,0.288 c5.256,0,8.464-2.568,8.464-7.096c0-4.288-2.976-6.584-7.84-6.584c-1.361-0.032-2.721,0.086-4.056,0.352L266.992,307.896 L266.992,307.896z"></path> <path style="fill:#FFFFFF;" d="M299.04,289.408V328H292v-38.592H299.04z"></path> <path style="fill:#FFFFFF;" d="M307.096,328v-38.592h8l9.952,16.536c2.482,4.16,4.681,8.482,6.584,12.936h0.104 c-0.456-5.152-0.624-10.12-0.624-16v-13.472h6.52V328h-7.232l-10.08-16.96c-2.554-4.309-4.862-8.758-6.912-13.328l-0.184,0.064 c0.288,4.968,0.352,10.064,0.352,16.416V328L307.096,328L307.096,328z"></path> <path style="fill:#FFFFFF;" d="M376.672,326.208c-3.988,1.413-8.185,2.149-12.416,2.176c-5.523,0.368-10.963-1.487-15.112-5.152 c-3.681-3.778-5.631-8.914-5.384-14.184c-0.271-10.822,8.283-19.813,19.105-20.083c0.787-0.02,1.575,0.008,2.359,0.083 c3.505-0.094,6.992,0.526,10.248,1.824l-1.552,5.672c-2.764-1.177-5.749-1.742-8.752-1.656c-7.102-0.64-13.379,4.6-14.018,11.702 c-0.064,0.713-0.069,1.431-0.014,2.145c-0.682,7.01,4.447,13.245,11.456,13.928c0.643,0.063,1.29,0.077,1.935,0.041 c1.814,0.092,3.629-0.179,5.336-0.8v-9.6h-6.808v-5.544h13.6L376.672,326.208z"></path> </g> </g></svg>

                                        <a href="#promotions" class="my-auto text-sky-700 hover:text-sky-600 hover:underline">Free delivery for orders above Ksh 1999 in selected major cities.</a>
                                    </div>

                                    <div class="flex flex-row place-content-center gap-x-6">
                                        <svg height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FDD042;" d="M419.006,503.449H94.063c-14.168,0-25.653-11.485-25.653-25.653V33.136 c0-14.168,11.485-25.653,25.653-25.653h324.944c14.168,0,25.653,11.485,25.653,25.653v444.66 C444.66,491.964,433.174,503.449,419.006,503.449z"></path> <path style="fill:#F2C127;" d="M444.66,101.545L273.935,202.427c-10.734,6.343-24.068,6.343-34.802,0L68.409,101.545V58.789 c0-14.168,11.485-25.653,25.653-25.653h324.944c14.168,0,25.653,11.485,25.653,25.653V101.545z"></path> <path style="fill:#9B9DA1;" d="M205.228,147.507c-7.084,0-12.827,5.743-12.827,12.827v95.132c0,7.084,5.743,12.827,12.827,12.827 c7.084,0,12.827-5.743,12.827-12.827v-95.132C218.054,153.249,212.311,147.507,205.228,147.507z"></path> <path style="fill:#88898E;" d="M205.228,147.507c-7.084,0-12.827,5.743-12.827,12.827v14.479l25.653,15.159v-29.638 C218.054,153.249,212.311,147.507,205.228,147.507z"></path> <path style="fill:#FDD042;" d="M444.66,75.891L273.935,176.774c-10.734,6.343-24.068,6.343-34.802,0L68.409,75.891V33.136 c0-14.168,11.485-25.653,25.653-25.653h324.944c14.168,0,25.653,11.485,25.653,25.653V75.891z"></path> <path style="fill:#9B9DA1;" d="M273.637,105.82h-17.102c-7.084,0-12.827,5.743-12.827,12.827s5.743,12.827,12.827,12.827h17.102 c11.788,0,21.378,9.59,21.378,21.378v102.614c0,7.084,5.743,12.827,12.827,12.827c7.084,0,12.827-5.743,12.827-12.827V152.852 C320.668,126.918,299.57,105.82,273.637,105.82z"></path> <path style="fill:#E5563C;" d="M333.495,400.835H179.574V272.568c0-9.446,7.656-17.102,17.102-17.102h119.716 c9.446,0,17.102,7.656,17.102,17.102V400.835z"></path> <path style="fill:#CF442B;" d="M222.33,255.466h-25.653c-9.446,0-17.102,7.658-17.102,17.102v128.267h25.653V272.568 C205.228,263.123,212.884,255.466,222.33,255.466z"></path> <circle style="fill:#606268;" cx="256.534" cy="315.324" r="25.653"></circle> <path style="fill:#4C4E55;" d="M273.637,332.426c-14.168,0-25.653-11.485-25.653-25.653c0-6.528,2.442-12.483,6.457-17.01 c-13.187,1.067-23.559,12.099-23.559,25.562c0,14.168,11.485,25.653,25.653,25.653c7.64,0,14.496-3.344,19.196-8.643 C275.039,332.39,274.342,332.426,273.637,332.426z"></path> <path d="M419.006,0H94.063C75.497,0,59.858,14.57,59.858,33.136v42.756v401.904c0,18.566,15.639,34.205,34.205,34.205h324.944 c18.566,0,33.136-15.639,33.136-34.205V187.056c0-4.427-3.589-8.017-8.017-8.017c-4.427,0-8.017,3.589-8.017,8.017v290.739 c0,9.725-7.378,18.171-17.102,18.171H94.063c-9.725,0-18.171-8.446-18.171-18.171V89.941l107.968,63.799 c-0.002,0.06-0.01,0.119-0.01,0.181v96.754c-7.482,4.311-12.827,12.506-12.827,21.893v128.267c0,4.427,4.124,8.551,8.551,8.551 h153.921c4.427,0,7.482-4.124,7.482-8.551V272.568c0-9.387-4.276-17.582-12.827-21.893v-96.94l107.958-63.794v62.911 c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-76.96V33.136C452.142,14.57,437.572,0,419.006,0z M209.503,168.893v79.091h-9.62v-84.775L209.503,168.893z M312.117,247.983h-9.62v-95.132c0-16.209-12.651-28.86-28.86-28.86 h-17.102c-2.652,0-4.81-2.158-4.81-4.81c0-2.652,2.158-4.81,4.81-4.81h17.102c21.513,0,38.48,16.968,38.48,38.48V247.983z M286.463,247.983h-60.927v-69.616l9.251,5.309c6.624,3.914,14.185,5.871,21.613,5.871c7.428,0,14.655-1.957,21.278-5.871 l8.784-5.309V247.983z M324.944,393.353H187.056V272.568c0-5.01,4.61-8.551,9.62-8.551h119.716c5.01,0,8.551,3.541,8.551,8.551 V393.353z M325.957,136.831c-6.961-22.426-27.635-38.493-52.32-38.493h-17.102c-11.493,0-20.843,9.351-20.843,20.843 s9.351,20.843,20.843,20.843h17.102c7.368,0,12.827,5.459,12.827,12.827v6.892l-16.874,10.129c-8.218,4.855-18.561,4.855-26.779,0 L75.891,71.317V33.136c0-9.725,8.446-17.102,18.171-17.102h324.944c9.725,0,17.102,7.378,17.102,17.102v38.181L325.957,136.831z"></path> <path d="M256.534,281.653c-18.566,0-33.937,15.105-33.937,33.67c0,15.804,11.491,29.091,25.386,32.699v18.608 c0,4.427,3.589,8.017,8.017,8.017c4.427,0,8.017-3.589,8.017-8.017v-18.608c14.965-3.606,25.921-16.895,25.921-32.699 C289.937,296.758,275.1,281.653,256.534,281.653z M256.534,332.96c-9.725,0-17.637-7.912-17.637-17.637 c0-9.725,7.912-17.637,17.637-17.637c9.725,0,17.637,7.912,17.637,17.637C274.171,325.048,266.259,332.96,256.534,332.96z"></path> </g></svg>

                                        <a href="#promotions" class="text-sky-700 hover:text-sky-600 my-auto hover:underline">Easy and safer payments via the JumiaPay App.</a>
                                    </div>
                                </div>


                            </div>

                        </div>
                        <a href="#" class="mt-28 p-3 text-sm text-sky-700 hover:text-sky-600 hover:underline">Report Wrong Product Details!</a>
                    </div>

                    <!--product description-->
                    <section class="pb-6 px-4 bg-white rounded flex flex-col">
                        <h2 class="my-2 font-semibold text-xl text-slate-900">Product Description</h2>

                        <div v-if="$slots.description" class="pt-4 text-sm border-t border-slate-200">
                            <p>
                                <slot name="description" />
                            </p>
                        </div>
                        <div v-for="coverImage in coverImages">
                            <div class="mt-2.5 mx-auto">
                                <a href="https://postimg.cc/K4yR8DjT" target="_blank">
                                    <img :alt="coverImage.name" :src="coverImage.url">
                                </a>
                            </div>
                        </div>

                        <div>
                            <h3 class="mt-2 mb-4 font-medium text-slate-700 text-lg">Technical Specifications</h3>

                            <div class="mb-4 text-sm">
                                <p class="mb-2 uppercase font-light">Display</p>
                                <ul class="mb-2 list-disc list-inside">
                                    <li>Type: PLS LCD, 90Hz</li>
                                    <li>Size: 6.6 inches, 104.9 cm2 (~83.0% screen-to-body ratio)</li>
                                    <li>Resolution: 1080 x 2408 pixels, 20:9 ratio (~400 ppi density)</li>
                                    <li>Protection: Corning Gorilla Glass 5</li>
                                </ul>
                            </div>

                            <div class="mb-4 text-sm">
                                <p class="mb-2 uppercase font-light">PLATFORM</p>
                                <ul class="mb-2 list-disc list-inside">
                                    <li>OS: Android 12, One UI 4.1</li>
                                    <li>Chipset: Qualcomm SM6225 Snapdragon 680 4G (6 nm)</li>
                                    <li>CPU: Octa-core (4x2.4 GHz Kryo 265 Gold & 4x1.9 GHz Kryo 265 Silver)</li>
                                    <li>GPU: Adreno 610</li>
                                </ul>
                            </div>

                            <div class="mb-4 text-sm">
                                <p class="mb-2 uppercase font-light">MEMORY</p>
                                <ul class="mb-2 list-disc list-inside">
                                    <li>
                                        Card slot: microSDXC (dedicated slot)
                                    </li>
                                    <li>
                                        Internal: 64GB
                                    </li>
                                    <li>
                                        RAM: 4GB
                                    </li>
                                </ul>
                            </div>

                            <div class="mb-4 text-sm">
                                <p class="mb-2 uppercase font-light">MAIN CAMERA</p>
                                <ul class="mb-2 list-disc list-inside">
                                    <li>
                                        Quad
                                        <ul class="mb-2 list-disc list-inside ml-3">
                                            <li>
                                                50 MP, f/1.8, (wide), PDAF, OIS
                                            </li>
                                            <li>
                                                5 MP, f/2.2, 123˚ (ultrawide), 1/5", 1.12µm
                                            </li>
                                            <li>
                                                2 MP, f/2.4, (macro)
                                            </li>
                                            <li>
                                                2 MP, f/2.4, (depth)
                                            </li>
                                            <li>
                                                Features    LED flash, panorama, HDR
                                            </li>
                                            <li>
                                                Video    4K@30fps, 1080p@30fps
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        Features    LED flash, panorama, HDR
                                    </li>
                                    <li>
                                        Video    4K@30fps, 1080p@30fps
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </section>

                    <!--product specifications-->
                    <section id="specifications" class="pb-6 bg-white rounded flex flex-col">
                        <h2 class="my-2 mx-4 font-medium text-xl text-slate-700">Specifications</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 border-t border-slate-200 pt-8 mx-6">

                            <div class="col-span-1 mx-4 pt-4 px-2.5 text-sm md:text-base rounded border border-slate-200">
                                <p class="mb-2 font-medium uppercase font-light">Display</p>
                                <ul class="mb-2 pt-2 font-light list-disc list-inside border-t border-slate-200">
                                    <li>Display: 6.6" PLS LCD</li>
                                    <li>Memory: 64GB + 4GB RAM</li>
                                    <li>Rear Camera: 50MP + 5MP + 2MP + 2MP</li>
                                    <li>Front Camera: 8MP</li>
                                    <li>OS: Android</li>
                                    <li>Processor:  Octa-core processor</li>
                                    <li>Battery: 5,000mAh</li>
                                </ul>
                            </div>

                            <div class="col-span-1 mx-4 pt-4 px-2.5 text-sm md:text-base rounded border border-slate-200">
                                <p class="mb-2 font-medium uppercase font-light">What's in the Box?</p>
                                <ul class="mb-2 pt-2 font-light list-disc list-inside border-t border-slate-200">
                                    <li>Samsung Galaxy A23 Handset</li>
                                    <li>Charger</li>
                                    <li>User Manual</li>
                                </ul>
                            </div>

                            <div class="col-span-1 mx-4 pt-4 px-2.5 text-sm md:text-base rounded border border-slate-200">
                                <p class="mb-2 font-medium uppercase font-light">Specifications</p>
                                <ul class="mb-2 pt-2 font-light border-t border-slate-200">
                                    <li><span class="font-semibold">SKU</span>: SA948MP1EB7I0NAFAMZ</li>
                                    <li><span class="font-semibold">Model</span>: Galaxy A23</li>
                                    <li><span class="font-semibold">Size (L x W x H cm)</span>: -</li>
                                    <li><span class="font-semibold">Weight (kg)</span>: 0.195</li>
                                    <li><span class="font-semibold">Main Material</span>: -</li>
                                    <li><span class="font-semibold">Shop Type</span>: Jumia Mall</li>
                                </ul>
                            </div>

                        </div>

                    </section>

                    <!--products also viewed-->
                    <section class="pb-6 px-4 bg-white rounded flex flex-col">
                        <h2 class="my-2 font-semibold text-xl text-slate-900">Customer who viewed this also viewed</h2>

                        <div class="mt-3">
                            <Slider>

                            </Slider>
                        </div>
                    </section>

                    <!--products you may like-->
                    <section class="pb-6 px-4 bg-white rounded flex flex-col">
                        <h2 class="my-2 font-semibold text-xl text-slate-900">You May Also Like These</h2>

                        <div class="mt-3">
                            <Slider>

                            </Slider>
                        </div>
                    </section>

                    <!--Customer feedback-->
                    <section id="feedback" class="pb-6 min-w-max max-w-4xl bg-white rounded flex flex-col">

                        <div class="px-4 mt-1 border-b flex justify-between">
                            <h3 class="mt-2 font-semibold">Customer Feedback</h3>
                            <a href="#feedback" class="flex gap-x-3 mt-2 hover:underline hover:underline-offset-4 decoration-amber-600">
                                <p class="uppercase font-semibold text-amber-600">See all</p>
                                <svg fill="#d97706" width="24px" height="24px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M419.3 264.8l-61.8 61.8L542.9 512 357.5 697.4l61.8 61.8L666.5 512z"></path></g></svg>
                            </a>
                        </div>

                        <div class="grid grid-cols-4 gap-x-4 py-4 px-2">
                            <div class="col-span-1">
                                <p class="mb-2 font-semibold uppercase text-sm">Verified Ratings(24)</p>

                                <div class="mx-auto grid gap-y-2 place-content-center py-6 bg-gray-100 rounded">
                                    <p class="text-xl text-center text-yellow-400 font-semibold">4.9/5</p>
                                    <div class="pt-1 flex flex-row justify-center">
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                    </div>
                                    <p class="text-sm text-center">24 verified ratings</p>
                                </div>

                                <div class="flex flex-row gap-x-2 px-3 mt-5">
                                    <p class="font-semibold">5</p>
                                    <svg class="" width="24px" height="24px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <p class="mt-1 text-sm text-gray-600">(20)</p>
                                    <div class="bg-gray-100 w-full mt-2 h-2 rounded-lg">
                                        <p class="w-4/5 rounded-l h-2 bg-yellow-400"></p>
                                    </div>
                                </div>


                                <div class="flex flex-row gap-x-2 px-3 mt-2">
                                    <p class="font-semibold">4</p>
                                    <svg class="" width="24px" height="24px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <p class="mt-1 text-sm text-gray-600">(2)</p>
                                    <div class="bg-gray-100 w-full mt-2 h-2 rounded-lg">
                                        <p class="w-1/12 rounded-l h-2 bg-yellow-400"></p>
                                    </div>
                                </div>


                                <div class="flex flex-row gap-x-2 px-3 mt-2">
                                    <p class="font-semibold">3</p>
                                    <svg class="" width="24px" height="24px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <p class="mt-1 text-sm text-gray-600">(0)</p>
                                    <div class="bg-gray-100 w-full mt-2 h-2 rounded-lg">
                                        <p class="w-0 rounded-l h-2 bg-yellow-400"></p>
                                    </div>
                                </div>


                                <div class="flex flex-row gap-x-2 px-3 mt-2">
                                    <p class="font-semibold">2</p>
                                    <svg class="" width="24px" height="24px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <p class="mt-1 text-sm text-gray-600">(0)</p>
                                    <div class="bg-gray-100 w-full mt-2 h-2 rounded-lg">
                                        <p class="w-0 rounded-l h-2 bg-yellow-400"></p>
                                    </div>
                                </div>


                                <div class="flex flex-row gap-x-2 px-3 mt-2">
                                    <p class="font-semibold">1</p>
                                    <svg class="" width="24px" height="24px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                    <p class="mt-1 text-sm text-gray-600">(2)</p>
                                    <div class="bg-gray-100 w-full mt-2 h-2 rounded-lg">
                                        <p class="w-1/12 rounded-l h-2 bg-yellow-400"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="ml-4 col-span-3">
                                <p class="mb-2 font-semibold uppercase text-sm">Product Reviews(16)</p>

                                <div class="grid gap-y-3 border-b pb-3">
                                    <div class="pt-1 flex flex-row">
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                    </div>
                                    <p class="font-semibold">As expected</p>
                                    <p class="text-sm">Exactly as described.</p>
                                    <div class="flex justify-between">
                                        <p class="text-sm text-gray-600">08-03-2023 by Kariuki</p>
                                        <div class="text-green-600 flex gap-1 text-xs place-content-center">
                                            <svg fill="#16a34a" width="24px" height="24px" viewBox="0 0 200 200" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#16a34a">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M177.6,80.43a10,10,0,1,0-19.5,4.5,60.76,60.76,0,0,1-6,44.5c-16.5,28.5-53.5,38.5-82,22-28.5-16-38.5-53-22-81.5s53.5-38.5,82-22a9.86,9.86,0,1,0,10-17c-38.5-22.5-87-9.5-109.5,29a80.19,80.19,0,1,0,147,20.5Zm-109.5,11a10.12,10.12,0,0,0-11,17l40,25a10.08,10.08,0,0,0,5.5,1.5,10.44,10.44,0,0,0,8-4l52.5-67.5c3.5-4.5,2.5-10.5-2-14s-10.5-2.5-14,2l-47,60Z"></path></g></svg>
                                            <p class="mt-1.5">Verified Purchase</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid gap-y-3 border-b pb-3">
                                    <div class="pt-1 flex flex-row">
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                    </div>
                                    <p class="font-semibold">I love Jumia</p>
                                    <p class="text-sm">Delivery period was good</p>
                                    <div class="flex justify-between">
                                        <p class="text-sm text-gray-600">6-10-2022 by Otieno</p>
                                        <div class="text-green-600 flex gap-1 text-xs place-content-center">
                                            <svg fill="#16a34a" width="24px" height="24px" viewBox="0 0 200 200" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#16a34a">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M177.6,80.43a10,10,0,1,0-19.5,4.5,60.76,60.76,0,0,1-6,44.5c-16.5,28.5-53.5,38.5-82,22-28.5-16-38.5-53-22-81.5s53.5-38.5,82-22a9.86,9.86,0,1,0,10-17c-38.5-22.5-87-9.5-109.5,29a80.19,80.19,0,1,0,147,20.5Zm-109.5,11a10.12,10.12,0,0,0-11,17l40,25a10.08,10.08,0,0,0,5.5,1.5,10.44,10.44,0,0,0,8-4l52.5-67.5c3.5-4.5,2.5-10.5-2-14s-10.5-2.5-14,2l-47,60Z"></path></g></svg>
                                            <p class="mt-1.5">Verified Purchase</p>
                                        </div>
                                    </div>

                                </div>

                                <div class="grid gap-y-3 border-b pb-3">
                                    <div class="pt-1 flex flex-row">
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>
                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                        <svg width="14px" height="14px" viewBox="0 -0.5 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0005 0L21.4392 9.27275L32.0005 11.5439L24.8005 19.5459L25.889 30.2222L16.0005 25.895L6.11194 30.2222L7.20049 19.5459L0.000488281 11.5439L10.5618 9.27275L16.0005 0Z" fill="#FFCB45"></path> </g></svg>

                                    </div>
                                    <p class="font-semibold">Good product from Samsung</p>
                                    <p class="text-sm">A good processor, with 2 days battery. Worth the money</p>
                                    <div class="flex justify-between">
                                        <p class="text-sm text-gray-600">28-02-2023 by Juma</p>
                                        <div class="text-green-600 flex gap-1 text-xs place-content-center">
                                            <svg fill="#16a34a" width="24px" height="24px" viewBox="0 0 200 200" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#16a34a">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M177.6,80.43a10,10,0,1,0-19.5,4.5,60.76,60.76,0,0,1-6,44.5c-16.5,28.5-53.5,38.5-82,22-28.5-16-38.5-53-22-81.5s53.5-38.5,82-22a9.86,9.86,0,1,0,10-17c-38.5-22.5-87-9.5-109.5,29a80.19,80.19,0,1,0,147,20.5Zm-109.5,11a10.12,10.12,0,0,0-11,17l40,25a10.08,10.08,0,0,0,5.5,1.5,10.44,10.44,0,0,0,8-4l52.5-67.5c3.5-4.5,2.5-10.5-2-14s-10.5-2.5-14,2l-47,60Z"></path></g></svg>
                                            <p class="mt-1.5">Verified Purchase</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!--products also viewed-->
                    <section class="pb-6 px-4 bg-white rounded flex flex-col">
                        <h2 class="my-2 font-semibold text-xl text-slate-900">More items from this seller</h2>

                        <div class="mt-3">
                            <Slider>

                            </Slider>
                        </div>
                    </section>

                    <!--products you may like-->
                    <section class="pb-6 px-4 bg-white rounded flex flex-col">
                        <h2 class="my-2 font-semibold text-xl text-slate-900">Recently viewed products</h2>

                        <div class="mt-3">
                            <Slider>

                            </Slider>
                        </div>
                    </section>

                </div>

                <!--right sidebar-->
                <div class="col-span-1 md:col-span-1">
                    <section id="delivery" class="mb-6 bg-white rounded divide-y text-black">
                        <div class="p-2">
                            <h3 class="font-medium">Jumia Delivery and Returns</h3>
                        </div>

                        <div class="pt-3 p-2">
                            <p class="italic text-xs uppercase font-serif">Jumia<span class="text-orange-500 font-sans text-base font-semibold font-serif">Express</span></p>
                            <p class="block text-xs">Express delivery in main cities. <a href="#delivery" class="text-sky-700"> Details</a></p>
                        </div>

                        <div class="mx-2 grid gap-y-3">

                            <p class="mt-2 text-slate-700 font-semibold">Choose your location</p>

                            <div>
                                <select class="w-3/4 text-sm rounded border-gray-400">
                                    <option>Eldoret</option>
                                    <option>Nairobi</option>
                                    <option>Mombasa</option>
                                </select>
                            </div>

                            <div class="">
                                <select class="w-full text-sm rounded border-gray-400">
                                    <option>CBD - Barngetuny Plaza</option>
                                    <option>CBD - UON/Globe/Koja/River Road</option>
                                    <option>Mtwapa - Ferry</option>
                                </select>
                            </div>

                            <div class="mt-2 mx-2 grid grid-cols-5 gap-x-4 text-xs">
                                <div class="col-span-1">
                                    <svg fill="#000000" width="24px" height="24px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M 0 6 L 0 8 L 19 8 L 19 23 L 12.84375 23 C 12.398438 21.28125 10.851563 20 9 20 C 7.148438 20 5.601563 21.28125 5.15625 23 L 4 23 L 4 18 L 2 18 L 2 25 L 5.15625 25 C 5.601563 26.71875 7.148438 28 9 28 C 10.851563 28 12.398438 26.71875 12.84375 25 L 21.15625 25 C 21.601563 26.71875 23.148438 28 25 28 C 26.851563 28 28.398438 26.71875 28.84375 25 L 32 25 L 32 16.84375 L 31.9375 16.6875 L 29.9375 10.6875 L 29.71875 10 L 21 10 L 21 6 Z M 1 10 L 1 12 L 10 12 L 10 10 Z M 21 12 L 28.28125 12 L 30 17.125 L 30 23 L 28.84375 23 C 28.398438 21.28125 26.851563 20 25 20 C 23.148438 20 21.601563 21.28125 21.15625 23 L 21 23 Z M 2 14 L 2 16 L 8 16 L 8 14 Z M 9 22 C 10.117188 22 11 22.882813 11 24 C 11 25.117188 10.117188 26 9 26 C 7.882813 26 7 25.117188 7 24 C 7 22.882813 7.882813 22 9 22 Z M 25 22 C 26.117188 22 27 22.882813 27 24 C 27 25.117188 26.117188 26 25 26 C 23.882813 26 23 25.117188 23 24 C 23 22.882813 23.882813 22 25 22 Z"></path></g></svg>
                                </div>

                                <div class="col-span-3">
                                    <p class="font-semibold text-slate-600">Door Delivery</p>
                                </div>

                                <div class="col-span-1">
                                    <a href="#delivery" class="inline-flex text-sky-600 hover:text-sky-700">Details</a>
                                </div>
                                <div class="col-span-4 col-start-2">
                                    <p>Delivery <strong>KSh 101</strong></p>
                                    <p>Delivery by <strong>28 March</strong> when you order within next <strong>7hrs 59mins</strong></p>
                                </div>
                            </div>

                            <div class="mt-2 mx-2 grid grid-cols-5 gap-x-4 text-xs">
                                <div class="col-span-1">
                                    <svg width="24px" height="24px" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>Ecommerce copia 3</title><polygon points="80 48.04 80 92.04 74 92.04 74 73.29 62.26 73.29 62.26 54.29 38.26 54.29 38.26 73.29 26 73.29 26 92.04 20 92.04 20 48.04 80 48.04" fill="#e1f6fa"></polygon><polygon points="66.5 74.19 66.5 84.19 62 80.02 57.5 84.19 57.5 74.19 66.5 74.19" fill="#9ae3f0"></polygon><polygon points="54.76 55.19 54.76 65.19 50.26 61.02 45.76 65.19 45.76 55.19 54.76 55.19" fill="#9ae3f0"></polygon><polygon points="42.5 74.19 42.5 84.19 38 80.02 33.5 84.19 33.5 74.19 42.5 74.19" fill="#9ae3f0"></polygon><rect x="20" y="47.04" width="60" height="2" fill="#495771"></rect><path d="M91,93H79V35H21V93H9V35H5V25.37l0.62-.25L50,7l0.38,0.15L95,25.37V35H91V93ZM81,91h8V33h4V26.71L50,9.12,7,26.71V33h4V91h8V33H81V91Z" fill="#495771"></path><rect x="20" y="40.04" width="60" height="2" fill="#495771"></rect><path d="M74,93H26a1,1,0,0,1-1-1V73.29a1,1,0,0,1,1-1H74a1,1,0,0,1,1,1V92A1,1,0,0,1,74,93ZM27,91H73V74.29H27V91Z" fill="#495771"></path><rect x="49" y="73.29" width="2" height="19.5" fill="#495771"></rect><path d="M63.26,73.79h-2V55.29h-22v18.5h-2V54.29a1,1,0,0,1,1-1h24a1,1,0,0,1,1,1v19.5Z" fill="#495771"></path><rect width="100" height="100" fill="none"></rect></g></svg>
                                </div>

                                <div class="col-span-3">
                                    <p class="font-semibold text-slate-600">Pickup Station</p>
                                </div>

                                <div class="col-span-1">
                                    <a href="#delivery" class="inline-flex text-sky-600 hover:text-sky-700">Details</a>
                                </div>
                                <div class="col-span-4 col-start-2">
                                    <p>Delivery <strong>KSh 52</strong></p>
                                    <p>Available for pick up from <strong>28 March</strong> when you order within the next <strong>7hrs 59mins</strong></p>
                                </div>
                            </div>

                            <div class="mt-2 mx-2 grid grid-cols-5 gap-x-4 text-xs">
                                <div class="col-span-1">
                                    <svg width="24px" height="24px" viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M488.006 999.898C218.982 999.898 0.106 781.022 0.106 512c0-269.022 218.876-487.898 487.9-487.898 156.624 0 304.81 76.03 396.386 203.364a8.016 8.016 0 0 1-1.828 11.17c-3.61 2.562-8.592 1.766-11.17-1.828C782.818 113.63 639.49 40.1 488.006 40.1 227.792 40.098 16.104 251.788 16.104 512c0 260.21 211.69 471.902 471.902 471.902 260.21 0 471.902-211.692 471.902-471.902a7.992 7.992 0 0 1 7.998-7.998 7.994 7.994 0 0 1 7.998 7.998c0 269.022-218.876 487.898-487.898 487.898z" fill=""></path><path d="M1015.896 567.988a7.976 7.976 0 0 1-5.656-2.344l-47.99-47.99a7.996 7.996 0 1 1 11.31-11.31l47.99 47.992a7.994 7.994 0 0 1 0 11.308 7.96 7.96 0 0 1-5.654 2.344z" fill=""></path><path d="M919.916 567.988a7.994 7.994 0 0 1-5.656-13.652l47.99-47.992a7.996 7.996 0 1 1 11.31 11.31l-47.99 47.99a7.96 7.96 0 0 1-5.654 2.344zM727.956 735.954H280.048c-4.422 0-8-3.578-8-7.998V376.028a7.994 7.994 0 0 1 8-7.998h447.906c4.422 0 8 3.578 8 7.998v351.928a7.994 7.994 0 0 1-7.998 7.998z m-439.91-15.996h431.91V384.026H288.046v335.932z" fill=""></path><path d="M727.956 384.026H280.048a8.002 8.002 0 0 1-7.39-4.936 8.018 8.018 0 0 1 1.734-8.716l63.988-63.986a7.992 7.992 0 0 1 5.656-2.344h319.934c2.124 0 4.154 0.844 5.654 2.344l63.988 63.986a8.02 8.02 0 0 1 1.734 8.716 8.002 8.002 0 0 1-7.39 4.936z m-428.598-15.996h409.29l-47.99-47.99H347.346l-47.988 47.99z" fill=""></path><path d="M456.012 384.026a8.008 8.008 0 0 1-7.156-11.576l31.994-63.988c2-3.936 6.78-5.546 10.732-3.578a8.006 8.006 0 0 1 3.578 10.732l-31.994 63.986a8.014 8.014 0 0 1-7.154 4.424zM551.992 384.026a8.016 8.016 0 0 1-7.154-4.42l-31.994-63.986a8.006 8.006 0 0 1 3.578-10.732 7.992 7.992 0 0 1 10.732 3.578l31.992 63.988a8.006 8.006 0 0 1-3.578 10.732 7.992 7.992 0 0 1-3.576 0.84z" fill=""></path><path d="M456.012 448.014a7.994 7.994 0 0 1-7.998-8v-63.988c0-4.42 3.578-7.998 7.998-7.998s7.998 3.578 7.998 7.998v63.988c0 4.422-3.578 8-7.998 8z" fill=""></path><path d="M551.992 448.014h-95.98c-4.42 0-7.998-3.578-7.998-8s3.578-7.998 7.998-7.998h95.98c4.42 0 7.998 3.578 7.998 7.998s-3.578 8-7.998 8z" fill=""></path><path d="M551.992 448.014a7.994 7.994 0 0 1-7.998-8v-63.988a7.994 7.994 0 0 1 7.998-7.998 7.994 7.994 0 0 1 7.998 7.998v63.988c0 4.422-3.578 8-7.998 8zM456.012 456.012a7.994 7.994 0 0 1-7.998-7.998v-8c0-4.42 3.578-7.998 7.998-7.998s7.998 3.578 7.998 7.998v8a7.994 7.994 0 0 1-7.998 7.998zM488.006 456.012c-4.422 0-8-3.578-8-7.998v-8a7.994 7.994 0 0 1 8-7.998 7.994 7.994 0 0 1 7.998 7.998v8a7.994 7.994 0 0 1-7.998 7.998zM519.998 456.012a7.994 7.994 0 0 1-7.998-7.998v-8a7.994 7.994 0 0 1 7.998-7.998c4.422 0 8 3.578 8 7.998v8a7.994 7.994 0 0 1-8 7.998z" fill=""></path><path d="M551.992 456.012a7.994 7.994 0 0 1-7.998-7.998v-8a7.994 7.994 0 0 1 7.998-7.998 7.994 7.994 0 0 1 7.998 7.998v8a7.994 7.994 0 0 1-7.998 7.998zM695.962 703.96h-31.994a7.994 7.994 0 0 1-7.998-8v-31.992c0-4.422 3.578-8 7.998-8h31.994a7.994 7.994 0 0 1 7.998 8v31.992c0 4.422-3.578 8-7.998 8z m-23.996-15.998h15.996v-15.996h-15.996v15.996zM631.974 703.96h-31.992a7.994 7.994 0 0 1-7.998-8v-31.992c0-4.422 3.576-8 7.998-8h31.992c4.422 0 8 3.578 8 8v31.992c0 4.422-3.578 8-8 8z m-23.994-15.998h15.996v-15.996h-15.996v15.996zM472.008 671.966H312.04a7.994 7.994 0 0 1-7.998-7.998c0-4.422 3.578-8 7.998-8h159.968a7.994 7.994 0 0 1 7.998 8 7.994 7.994 0 0 1-7.998 7.998zM392.026 703.96h-79.984a7.994 7.994 0 0 1-7.998-8 7.994 7.994 0 0 1 7.998-7.998h79.984a7.994 7.994 0 0 1 7.998 7.998c0 4.422-3.578 8-7.998 8z" fill=""></path></g></svg>
                                </div>

                                <div class="col-span-3">
                                    <p class="font-semibold text-slate-600" id="policy">Return Policy</p>
                                </div>

                                <div class="col-span-1">
                                    <a href="#delivery" class="inline-flex text-sky-600 hover:text-sky-700">Details</a>
                                </div>
                                <div class="col-span-4 col-start-2">
                                    <p>Easy Return, Quick Refund.<a href="#policy" class="text-sky-600">See more</a></p>
                                </div>
                            </div>

                            <div class="mt-2 mx-2 grid grid-cols-5 gap-x-4 text-xs">
                                <div class="col-span-1">
                                    <svg fill="#000000" width="24px" height="24px" viewBox="0 0 100 100" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M50,20c3.79,0,6.79,4.11,10.11,5.53s8.52.63,11,3.31,1.89,7.58,3.31,11.05S80,46.21,80,50s-4.11,6.79-5.53,10.11-.63,8.52-3.31,11c-2.53,2.52-7.58,1.89-11,3.31S53.79,80,50,80s-6.79-4.11-10.11-5.53-8.52-.63-11-3.31c-2.52-2.53-1.89-7.58-3.31-11S20,53.79,20,50s4.11-6.79,5.53-10.11.63-8.52,3.31-11S36.42,27,39.89,25.53,46.21,20,50,20Zm0,9.47A20.53,20.53,0,1,0,70.53,50,20.59,20.59,0,0,0,50,29.47Zm9.52,11.44,2,1.9a1.55,1.55,0,0,1,0,1.89L48.78,58.84a2.55,2.55,0,0,1-2,.88,2.76,2.76,0,0,1-2-.88L37.9,52a1.26,1.26,0,0,1,0-1.89l2-1.9a1.37,1.37,0,0,1,2,0l4.87,5L57.52,40.91A1.37,1.37,0,0,1,59.52,40.91Z"></path></g></svg>
                                </div>

                                <div class="col-span-3">
                                    <p class="font-semibold text-slate-600">Warranty</p>
                                </div>

                                <div class="col-span-1">
                                    <a href="#delivery" class="inline-flex text-sky-600 hover:text-sky-700">Details</a>
                                </div>
                                <div class="col-span-4 col-start-2">
                                    <p class="pb-3">2 Years</p>
                                </div>
                            </div>





                        </div>
                    </section>

                    <!--seller info-->
                    <section id="seller" class="mb-6 px-2 bg-white rounded divide-y text-black">
                        <div class="flex justify-between pt-2">
                            <h3 class="uppercase text-slate-700 font-medium">Seller Information</h3>
                            <svg fill="#475569" width="24px" height="24px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M419.3 264.8l-61.8 61.8L542.9 512 357.5 697.4l61.8 61.8L666.5 512z"></path></g></svg>
                        </div>

                        <div class="pb-4 grid grid-cols-2 gap-3">
                            <p class="mt-2 col-span-2 text-sm font-semibold">Avenue Phones</p>
                            <div>
                                <p class="text-xs"><span class="font-semibold">86% </span>Seller Score</p>
                                <p class="text-xs"><span class="font-semibold">644 </span>Followers</p>
                            </div>
                            <button class="p-2 px-2.5 my-auto rounded-lg shadow-lg bg-amber-400 text-white font-semibold">Follow</button>
                        </div>

                        <div class="pb-4 text-xs">

                            <div class="mt-3 flex flex-row gap-2">
                                <p class="text-sm font-semibold">Seller Performance</p>
                                <svg fill="#475569" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M960 0c530.193 0 960 429.807 960 960s-429.807 960-960 960S0 1490.193 0 960 429.807 0 960 0Zm0 101.053c-474.384 0-858.947 384.563-858.947 858.947S485.616 1818.947 960 1818.947 1818.947 1434.384 1818.947 960 1434.384 101.053 960 101.053Zm-42.074 626.795c-85.075 39.632-157.432 107.975-229.844 207.898-10.327 14.249-10.744 22.907-.135 30.565 7.458 5.384 11.792 3.662 22.656-7.928 1.453-1.562 1.453-1.562 2.94-3.174 9.391-10.17 16.956-18.8 33.115-37.565 53.392-62.005 79.472-87.526 120.003-110.867 35.075-20.198 65.9 9.485 60.03 47.471-1.647 10.664-4.483 18.534-11.791 35.432-2.907 6.722-4.133 9.646-5.496 13.23-13.173 34.63-24.269 63.518-47.519 123.85l-1.112 2.886c-7.03 18.242-7.03 18.242-14.053 36.48-30.45 79.138-48.927 127.666-67.991 178.988l-1.118 3.008a10180.575 10180.575 0 0 0-10.189 27.469c-21.844 59.238-34.337 97.729-43.838 138.668-1.484 6.37-1.484 6.37-2.988 12.845-5.353 23.158-8.218 38.081-9.82 53.42-2.77 26.522-.543 48.24 7.792 66.493 9.432 20.655 29.697 35.43 52.819 38.786 38.518 5.592 75.683 5.194 107.515-2.048 17.914-4.073 35.638-9.405 53.03-15.942 50.352-18.932 98.861-48.472 145.846-87.52 41.11-34.26 80.008-76 120.788-127.872 3.555-4.492 3.555-4.492 7.098-8.976 12.318-15.707 18.352-25.908 20.605-36.683 2.45-11.698-7.439-23.554-15.343-19.587-3.907 1.96-7.993 6.018-14.22 13.872-4.454 5.715-6.875 8.77-9.298 11.514-9.671 10.95-19.883 22.157-30.947 33.998-18.241 19.513-36.775 38.608-63.656 65.789-13.69 13.844-30.908 25.947-49.42 35.046-29.63 14.559-56.358-3.792-53.148-36.635 2.118-21.681 7.37-44.096 15.224-65.767 17.156-47.367 31.183-85.659 62.216-170.048 13.459-36.6 19.27-52.41 26.528-72.201 21.518-58.652 38.696-105.868 55.04-151.425 20.19-56.275 31.596-98.224 36.877-141.543 3.987-32.673-5.103-63.922-25.834-85.405-22.986-23.816-55.68-34.787-96.399-34.305-45.053.535-97.607 15.256-145.963 37.783Zm308.381-388.422c-80.963-31.5-178.114 22.616-194.382 108.33-11.795 62.124 11.412 115.76 58.78 138.225 93.898 44.531 206.587-26.823 206.592-130.826.005-57.855-24.705-97.718-70.99-115.729Z" fill-rule="evenodd"></path> </g></svg>
                            </div>

                            <div class="mt-1.5 flex flex-row gap-2">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" transform="matrix(4.37114e-08 -1 -1 -4.37114e-08 24 24)" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM10.5066 6.65264C11.0199 5.26682 12.98 5.26683 13.4933 6.65264L14.1209 8.34727C14.2662 8.73956 14.6403 8.99995 15.0586 8.99995L16.5269 8.99995C17.9614 8.99995 18.6798 10.7343 17.6655 11.7487L16.1306 13.2835C15.8942 13.52 15.7915 13.8589 15.8571 14.1868L16.2262 16.0319C16.4943 17.3727 15.0333 18.3872 13.8707 17.6675L12.5263 16.8352C12.2038 16.6356 11.7961 16.6356 11.4736 16.8352L10.1292 17.6675C8.96662 18.3872 7.5056 17.3727 7.77375 16.0319L8.14279 14.1868C8.20836 13.8589 8.10574 13.52 7.86931 13.2835L6.29284 11.7071C5.29385 10.7081 6.00138 8.99995 7.41416 8.99995L8.94126 8.99995C9.35959 8.99995 9.73371 8.73956 9.87901 8.34727L10.5066 6.65264Z" fill="#84cc16"></path> </g></svg>

                                <p>Order Fulfillment Rate: <span class="font-semibold">Excellent</span> </p>
                            </div>

                            <div class="mt-1 flex flex-row gap-2">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" transform="matrix(4.37114e-08 -1 -1 -4.37114e-08 24 24)" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM10.5066 6.65264C11.0199 5.26682 12.98 5.26683 13.4933 6.65264L14.1209 8.34727C14.2662 8.73956 14.6403 8.99995 15.0586 8.99995L16.5269 8.99995C17.9614 8.99995 18.6798 10.7343 17.6655 11.7487L16.1306 13.2835C15.8942 13.52 15.7915 13.8589 15.8571 14.1868L16.2262 16.0319C16.4943 17.3727 15.0333 18.3872 13.8707 17.6675L12.5263 16.8352C12.2038 16.6356 11.7961 16.6356 11.4736 16.8352L10.1292 17.6675C8.96662 18.3872 7.5056 17.3727 7.77375 16.0319L8.14279 14.1868C8.20836 13.8589 8.10574 13.52 7.86931 13.2835L6.29284 11.7071C5.29385 10.7081 6.00138 8.99995 7.41416 8.99995L8.94126 8.99995C9.35959 8.99995 9.73371 8.73956 9.87901 8.34727L10.5066 6.65264Z" fill="#84cc16"></path> </g></svg>

                                <p>Quality Score: <span class="font-semibold">Good</span> </p>
                            </div>

                            <div class="mt-1 flex flex-row gap-2">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" transform="matrix(4.37114e-08 -1 -1 -4.37114e-08 24 24)" fill="white"></rect> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM10.5066 6.65264C11.0199 5.26682 12.98 5.26683 13.4933 6.65264L14.1209 8.34727C14.2662 8.73956 14.6403 8.99995 15.0586 8.99995L16.5269 8.99995C17.9614 8.99995 18.6798 10.7343 17.6655 11.7487L16.1306 13.2835C15.8942 13.52 15.7915 13.8589 15.8571 14.1868L16.2262 16.0319C16.4943 17.3727 15.0333 18.3872 13.8707 17.6675L12.5263 16.8352C12.2038 16.6356 11.7961 16.6356 11.4736 16.8352L10.1292 17.6675C8.96662 18.3872 7.5056 17.3727 7.77375 16.0319L8.14279 14.1868C8.20836 13.8589 8.10574 13.52 7.86931 13.2835L6.29284 11.7071C5.29385 10.7081 6.00138 8.99995 7.41416 8.99995L8.94126 8.99995C9.35959 8.99995 9.73371 8.73956 9.87901 8.34727L10.5066 6.65264Z" fill="#84cc16"></path> </g></svg>

                                <p>Customer Rating: <span class="font-semibold">Good</span> </p>
                            </div>

                        </div>
                    </section>

                    <!--product menu-->
                    <section id="product-menu " class="grid bg-white rounded divide-y">

                        <NavLink :href="`#product-details`" :class="`flex gap-x-4 active:bg-gray-100 px-2 py-2`">
                            <svg width="24px" height="24px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>item-details</title> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="icon" fill="#000000" transform="translate(42.666667, 85.333333)"> <path d="M426.666667,1.42108547e-14 L426.666667,341.333333 L3.55271368e-14,341.333333 L3.55271368e-14,1.42108547e-14 L426.666667,1.42108547e-14 Z M384,42.6666667 L42.6666667,42.6666667 L42.6666667,298.666667 L384,298.666667 L384,42.6666667 Z M341.333333,213.333333 L341.333333,245.333333 L234.666667,245.333333 L234.666667,213.333333 L341.333333,213.333333 Z M341.333333,149.333333 L341.333333,181.333333 L234.666667,181.333333 L234.666667,149.333333 L341.333333,149.333333 Z M192,85.3333333 L192,170.666667 L85.3333333,170.666667 L85.3333333,85.3333333 L192,85.3333333 Z M341.333333,85.3333333 L341.333333,117.333333 L234.666667,117.333333 L234.666667,85.3333333 L341.333333,85.3333333 Z" id="Combined-Shape"> </path> </g> </g> </g></svg>
                            <p>Product details</p>
                        </NavLink>

                        <NavLink :href="`#specifications`" :class="`flex gap-x-4 pt-3 active:bg-gray-100 px-2 py-2`">
                            <svg width="20px" height="20px" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M320 89.6h640v76.8H320V89.6z m0 768h640v76.8H320v-76.8z m-256-768h128v76.8H64V89.6z m256 384h640v76.8H320V473.6z m-256 0h128v76.8H64V473.6z m0 384h128v76.8H64v-76.8z" fill="#000000"></path></g></svg>
                            <p>Specifications</p>
                        </NavLink>

                        <NavLink :href="`#feedback`" :class="`flex gap-x-4 pt-3 active:bg-gray-100 px-2 py-2`">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path fill="none" d="M0 0h24v24H0z"></path> <path d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM4 18.385L5.763 17H20V5H4v13.385zM11 13h2v2h-2v-2zm0-6h2v5h-2V7z"></path> </g> </g></svg>
                            <p>Customer Feedback</p>
                        </NavLink>

                    </section>

                    <div class="mt-4 pb-6 grid grid-cols-1 md:grid-cols-2 gap-1 bg-white rounded shadow-sm">

                        <!--product images-->
                        <div class="py-1">
                            <!--all images-->
                            <!--consider a slider-->
                            <!--for image in images-->
                            <img class="rounded object-cover" alt="image" :src="`https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/84/503736/2.jpg?1607`">

                        </div>

                        <!--product details-->
                        <div class="px-1 py-4 text-sm text-slate-800 flex flex-col gap-y-1.5">

                            <h2 class="h-4 overflow-hidden font-light text-xs text-slate-700 leading-tight">
                                Samsung Galaxy A23, 6.6″, 64GB + 4GB RAM (Dual SIM), 5000mAh, Black
                            </h2>

                            <div>
                                <div class="py-2">
                                    <p class="text-base text-black font-sans font-bold">KSh 28,399</p>
                                    <div class="mt-1.5 flex flex-wrap gap-x-2">
                                        <p class="pr-2 font-light text-xs text-slate-400 line-through">KSh 31,999</p>
                                        <p class="-mt-px p-1 text-xs text-[#f68b1e] bg-[#fef3e9]">-11%</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- button -->
                        <div id="cart-button"
                             class="col-span-2 mx-2 px-4 py-2 flex gap-x-4 shadow-lg drop-shadow-lg rounded-sm bg-amber-500 hover:bg-amber-600 hover:cursor-pointer uppercase"
                             @click="addToCart(33)"
                        >
                            <svg fill="#ffffff" width="24px" height="24px" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title></title><path d="M12.2,9h1.6V6.8H16V5.2H13.8V3H12.2V5.2H10V6.8h2.2ZM20,5v5.5L7.45,12.72,5,3H1.25a1,1,0,0,0,0,2H3.47L6.7,18H20V16H8.26l-.33-1.33L22,12.18V5ZM7,19a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,7,19Zm12,0a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,19,19Z"></path></g></svg>
                            <p class="font-bold text-base text-white pl-3">Add to cart</p>
                        </div>

                    </div>

                    <!--ask-->
                    <section class="mt-6 py-4 bg-white rounded-lg shadow-md mx-auto">
                        <p class="text-xs text-center">
                            Questions about this product?
                        </p>
                        <p class="flex place-content-center mt-2">
                            <svg width="24px" height="24px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#f59e0b" d="M273.536 736H800a64 64 0 0 0 64-64V256a64 64 0 0 0-64-64H224a64 64 0 0 0-64 64v570.88L273.536 736zM296 800 147.968 918.4A32 32 0 0 1 96 893.44V256a128 128 0 0 1 128-128h576a128 128 0 0 1 128 128v416a128 128 0 0 1-128 128H296z"></path><path fill="#f59e0b" d="M512 499.2a51.2 51.2 0 1 1 0-102.4 51.2 51.2 0 0 1 0 102.4zm192 0a51.2 51.2 0 1 1 0-102.4 51.2 51.2 0 0 1 0 102.4zm-384 0a51.2 51.2 0 1 1 0-102.4 51.2 51.2 0 0 1 0 102.4z"></path></g></svg>
                            <span class="inline pl-2 uppercase text-amber-500 font-semibold">Chat</span>
                        </p>
                    </section>
                </div>

            </div>

            <!--navigation-->
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import Slider from "../../Components/Slider.vue";
import Navlink from "../../Components/NavLink.vue"
import {Link} from "@inertiajs/vue3";
import {defineProps, ref} from "vue";

const props = defineProps({
    smartPhone: Object,
    phoneReviews: Object,
    images: Object,
    featuredUrl: String,
    coverImages: Object, // blog or From Seller images preferably landscape
    officialStore: true
})

const officialStore = ref(true);
const smartPhone = {
    "title": 'Apple IPhone 14 PRO Max – 6.7″ – 6GB RAM 128GB ROM 48MP CAMERA – Esim - Deep Purple',
    "officialStore": props.officialStore ?? true,
    "brand" : "Samsung",
    "verifiedRatings": 25,
    "averageStars": 4.98,
    "price": "Ksh 185,000",
    "initialPrice": "Ksh 205,000",
    "percentOff": "18",
    "warranty": "2 Years",
    "description": "Take in more, all at once. The Samsung Galaxy A23's 6.6-inch V-Cut Display gives you room to see and do more. With FHD+ technology and a 90Hz refresh rate, the content you see every day will look smoother and sharper. An advanced octa-core processor with<strong> 4GB of RAM</strong> ensures that Galaxy A23 runs seamlessly and without a glitch no matter what you’re doing, whether that’s using multiple apps at the same time, streaming a video or gaming online. Enjoy <strong>64GB of internal storage</strong> and add up to 1TB more with MicroSD card. Snap memorable moments in clear detail with Galaxy A23’s unique Quad Camera system including 50MP main, 5MP ultrawide, 2MP macro, 2MP depth and 8MP front selfie camera. Order for this&nbsp;Samsung Galaxy A23 Smartphone online from Jumia Kenya&nbsp;and have it delivered to your doorstep.",

}


</script>
