<template>
    <AppLayout title="Dashboard">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-4 grid grid-cols-1 md:grid-cols-4 gap-x-6">
                <!--content-->
                <div class="col-span-1 md:col-span-3 flex flex-col gap-y-3">

                    <!--product-->
                    <div class="pb-6 grid grid-cols-1 md:grid-cols-2 gap-4 bg-white rounded shadow-sm">

                        <!--product images-->
                        <div class="px-6 py-4">
                            <!--all images-->
                            <!--consider a slider-->
                            <!--for image in images-->
                            <img class="rounded object-cover" alt="image" :src="`https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/84/503736/2.jpg?1607`">

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
                        <div class="px-6 py-4 text-sm text-slate-800 flex flex-col gap-y-3">

                            <div class="flex justify-between">
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
                                Samsung Galaxy A23, 6.6″, 64GB + 4GB RAM (Dual SIM), 5000mAh, Black
                            </h2>

                            <p class="text-sm font-light">
                                <span class="font-medium">Brand:</span>
                                <a href="#" class="px-1 inline-flex text-sky-700 hover:text-sky-600 hover:underline">Samsung</a> |
                                <a href="#" class="pl-1 inline-flex text-sky-700 hover:text-sky-600 hover:underline">Similar products from Samsung</a>
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

                                <a class="text-sky-600 hover:text-sky-500 hover:underline">(24 verified ratings)</a>

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

                    <!--product-->
                    <section class="pb-6 px-4 bg-white rounded flex flex-col">
                        <h2 class="my-2 font-semibold text-xl text-slate-900">Product Description</h2>

                        <div class="pt-4 text-sm border-t border-slate-200">
                            <p>Take in more, all at once. The Samsung Galaxy A23's 6.6-inch V-Cut Display gives you room to see and do more. With FHD+ technology and a 90Hz refresh rate, the content you see every day will look smoother and sharper. An advanced octa-core processor with<strong> 4GB of RAM</strong> ensures that Galaxy A23 runs seamlessly and without a glitch no matter what you’re doing, whether that’s using multiple apps at the same time, streaming a video or gaming online. Enjoy <strong>64GB of internal storage</strong> and add up to 1TB more with MicroSD card. Snap memorable moments in clear detail with Galaxy A23’s unique Quad Camera system including 50MP main, 5MP ultrawide, 2MP macro, 2MP depth and 8MP front selfie camera. Order for this&nbsp;Samsung Galaxy A23 Smartphone online from Jumia Kenya&nbsp;and have it delivered to your doorstep.</p>
                        </div>

                        <div class="mt-2.5 mx-auto">
                            <a href="https://postimg.cc/K4yR8DjT" target="_blank">
                                <img alt="image" :src="`https://ke.jumia.is/cms/external/pet/SA948MP1EB7I0NAFAMZ/b6fea5e658ea1f9d38aebbb3d285a8d7.jpg`">
                            </a>
                        </div>

                        <div class="mt-2.5 mx-auto">
                            <a href="https://postimg.cc/Mv6HyZyK" target="_blank">
                                <img alt="image" :src="`https://ke.jumia.is/cms/external/pet/SA948MP1EB7I0NAFAMZ/7c7b7b43fa1c32c0c7ca8bf340f4ddc7.jpg`">
                            </a>
                        </div>

                        <div class="mt-2.5 mx-auto">
                            <a href="https://postimg.cc/gngJ49Dy" target="_blank">
                                <img alt="image" :src="`https://ke.jumia.is/cms/external/pet/SA948MP1EB7I0NAFAMZ/d9d863e8adfb36bab4c8fb3cf951685e.jpg`">
                            </a>
                        </div>

                        <div>
                            <h3 class="mt-2 mb-4 font-medium text-slate-700 text-lg">Technical Specifications</h3>

                            <div class="mb-4 text-sm">
                                <p class="mb-2 uppercase font-light">Display</p>
                                <ul class="mb-2 list-disc list-inside text-xs">
                                    <li>Type: PLS LCD, 90Hz</li>
                                    <li>Size: 6.6 inches, 104.9 cm2 (~83.0% screen-to-body ratio)</li>
                                    <li>Resolution: 1080 x 2408 pixels, 20:9 ratio (~400 ppi density)</li>
                                    <li>Protection: Corning Gorilla Glass 5</li>
                                </ul>
                            </div>

                            <div class="mb-4 text-sm">
                                <p class="mb-2 uppercase font-light">PLATFORM</p>
                                <ul class="mb-2 list-disc list-inside text-xs">
                                    <li>OS: Android 12, One UI 4.1</li>
                                    <li>Chipset: Qualcomm SM6225 Snapdragon 680 4G (6 nm)</li>
                                    <li>CPU: Octa-core (4x2.4 GHz Kryo 265 Gold & 4x1.9 GHz Kryo 265 Silver)</li>
                                    <li>GPU: Adreno 610</li>
                                </ul>
                            </div>

                            <div class="mb-4 text-sm">
                                <p class="mb-2 uppercase font-light">MEMORY</p>
                                <ul class="mb-2 list-disc list-inside text-xs">
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
                                <ul class="mb-2 list-disc list-inside text-xs">
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
                                        Internal: 64GB
                                    </li>
                                    <li>
                                        RAM: 4GB
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </section>

                    <!--product-->
                    <section class="pb-6 bg-white rounded flex flex-col">
                        <h2 class="my-2 mx-4 font-medium text-xl text-slate-700">Specifications</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-8 border-t border-slate-200 pt-8 mx-6">

                            <div class="col-span-1 mx-4 pt-4 px-2.5 text-sm md:text-base border border-slate-200">
                                <p class="mb-2 uppercase font-light">Display</p>
                                <ul class="mb-2 pt-2 list-disc list-inside border-t border-slate-200">
                                    <li>Display: 6.6" PLS LCD</li>
                                    <li>Memory: 64GB + 4GB RAM</li>
                                    <li>Rear Camera: 50MP + 5MP + 2MP + 2MP</li>
                                    <li>Front Camera: 8MP</li>
                                    <li>OS: Android</li>
                                    <li>Processor:  Octa-core processor</li>
                                    <li>Battery: 5,000mAh</li>
                                </ul>
                            </div>

                            <div class="col-span-1 mx-4 pt-4 px-2.5 text-sm md:text-base border border-slate-200">
                                <p class="mb-2 uppercase font-light">What's in the Box?</p>
                                <ul class="mb-2 pt-2 list-disc list-inside border-t border-slate-200">
                                    <li>Samsung Galaxy A23 Handset</li>
                                    <li>Charger</li>
                                    <li>User Manual</li>
                                </ul>
                            </div>

                            <div class="col-span-1 mx-4 pt-4 px-2.5 text-sm md:text-base border border-slate-200">
                                <p class="mb-2 uppercase font-light">Specifications</p>
                                <ul class="mb-2 pt-2 border-t border-slate-200">
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

                    <!--product-->
                    <section class="pb-6 px-4 bg-white rounded flex flex-col">
                        <h2 class="my-2 font-semibold text-xl text-slate-900">Similar Products</h2>

                        <div>
                            <Slider>
                                <div>
                                    <img alt="product-image" :src="`https://ke.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/84/503736/1.jpg?1607`">
                                </div>
                            </Slider>
                        </div>
                    </section>
                </div>

                <!--right sidebar-->
                <div class="col-span-1 md:col-span-1">
                    Right Sidebar
                </div>

            </div>

            <!--navigation-->
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "../../Layouts/AppLayout.vue";
import Slider from "../../Components/Slider.vue";

</script>
