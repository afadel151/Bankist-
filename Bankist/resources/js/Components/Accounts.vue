<script setup>
import Button from 'primevue/button';
import $ from 'jquery';
import Divider from 'primevue/divider';
import { usePage } from '@inertiajs/vue3';
const formatNumber = (num) => {
    return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(num)
}

const user = usePage().props.auth.user

</script>



<template>
    <div class="p-5 w-full  h-full">
        <div class="relative flex flex-col justify-between p-5 items-center  bg-white  border-2 border-gray-100 shadow-md rounded-xl w-full h-full">
            <div class="flex justify-between mb-4 items-center w-full">
                <div class="h-fit">
                    <p class="text-2xl text-gray-500 font-thin">cheking</p>
                </div>
                <div class="flex items-center gap-2">
                    <Button icon="pi pi-list" severity="secondary" outlined aria-label="Bookmark" />
                </div>
            </div>
            <div
                class="w-96 h-52 m-auto  bg-green-500 rounded-xl relative text-white shadow-sm  transition-transform transform hover:scale-[101%]">
                <div class="absolute h-40 w-40 -right-10 rounded-full bg-slate-200  opacity-20">
                </div>
                <div class="absolute h-20 w-20 bottom-0 -right-10 rounded-full bg-slate-200  opacity-20">
                </div>
                <div class="w-full h-full px-8 flex flex-col justify-center  top-2">
                    <div class="flex justify-between">
                        <div class="">
                            <p class="font-light">
                                Name
                            </p>
                            <p class="font-medium tracking-widest">
                                Karthik P
                            </p>
                        </div>
                    </div>
                    <div class="pt-1">
                        <p class="font-light">
                            Card Number
                        </p>
                        <p class="font-medium tracking-more-wider">
                            4642 3489 9867 7632
                        </p>
                    </div>
                    <div class="pt-6 pr-6">
                        <div class="flex justify-between">
                            <div class="">
                                <p class="font-light text-xs">
                                    Valid
                                </p>
                                <p class="font-medium tracking-wider text-sm">
                                    11/15
                                </p>
                            </div>
                            <div class="">
                                <p class="font-light text-xs ">
                                    Expiry
                                </p>
                                <p class="font-medium tracking-wider text-sm">
                                    03/25
                                </p>
                            </div>

                            <div class="">
                                <p class="font-light text-xs">
                                    CVV
                                </p>
                                <p class="font-bold tracking-more-wider text-sm">
                                    ···
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
