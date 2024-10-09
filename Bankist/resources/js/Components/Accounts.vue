<script setup>
import Button from 'primevue/button';
import $ from 'jquery';
import Divider from 'primevue/divider';
</script>



<template>
    <div class="p-5 w-full h-full">
        <div class="relative flex flex-col justify-start items-center space-y-4 bg-white py-5 border rounded-3xl w-full h-full">
            <div class="flex justify-around items-center w-full">
                <p class="from-bold text-3xl">Accounts</p>
                <div class="flex items-center gap-2">
                    <!-- <Button icon="pi pi-plus" label="Add" rounded /> -->
                    <Button icon="pi pi-ellipsis-v" severity="secondary" rounded outlined aria-label="Bookmark" />
                </div>
            </div>
            <!-- <Divider /> -->
            <!-- <div class="flex justify-between items-center px-5 w-full font-bold text-2xl">
                <p>Net worth </p>
                <p>$16,531,98</p>
            </div> -->
            <img src="/svgs/NewCardMockup.svg" class="shadow-gray-500/50 shadow-lg rounded-[1.9rem]" alt="">
            <p class="bottom-[150px] left-[75px] absolute font-bold text-2xl text-white">$15200,20.01</p>
            <p class="bottom-[75px] left-[75px] absolute font-bold text-base text-white">FADEL AKRAM <span class="ml-10">09/24</span></p>
            <p class="bottom-[45px] left-[75px] absolute font-bold font-sans text-base text-white">1234 1234 1234 1234</p>

            <!-- <Divider     /> -->
            <!-- <div class="px-5 pt-5 w-full">
                <div class="flex justify-between items-center w-full font-bold">
                    <div @click="$('#banking').slideToggle()"
                        class="flex justify-center items-center gap-1 cursor-pointer">
                        <i class="pi pi-angle-down"></i>
                        <p class="hover:text-gray-600">Banking</p>
                    </div>
                    <p class="font-bold">$250</p>
                </div>
                <ul id="banking">
                    <li class="flex justify-between items-center pl-10">
                        <p>Interest</p>
                        <p>$15</p>
                    </li>
                    <li class="flex justify-between items-center pl-10">
                        <p>Profits</p>
                        <p>$150</p>
                    </li>
                </ul>
            </div>
            <div class="px-5 w-full">
                <div class="flex justify-between items-center w-full font-bold">
                    <div @click="$('#cash').slideToggle()"
                        class="flex justify-center items-center gap-1 cursor-pointer">
                        <i class="pi pi-angle-down"></i>
                        <p class="hover:text-gray-600">Cash & Checking </p>
                    </div>
                    <p class="font-bold">$250</p>
                </div>
                <ul id="cash">
                    <li class="flex justify-between items-center pl-10">
                        <p>Interest</p>
                        <p>$15</p>
                    </li>
                    <li class="flex justify-between items-center pl-10">
                        <p>Profits</p>
                        <p>$150</p>
                    </li>
                </ul>
            </div>
            <div class="px-5 w-full">
                <div class="flex justify-between items-center w-full font-bold">
                    <div @click="$('#invest').slideToggle()"
                        class="flex justify-center items-center gap-1 cursor-pointer">
                        <i class="pi pi-angle-down"></i>
                        <p class="hover:text-gray-600">Investments </p>
                    </div>
                    <p class="font-bold">$250</p>
                </div>
                <ul id="invest">
                    <li class="flex justify-between items-center pl-10">
                        <p>Interest</p>
                        <p>$15</p>
                    </li>
                    <li class="flex justify-between items-center pl-10">
                        <p>Profits</p>
                        <p>$150</p>
                    </li>
                </ul>
            </div>
            <div class="px-5 w-full">
                <div class="flex justify-between items-center w-full font-bold">
                    <div @click="$('#assets').slideToggle()"
                        class="flex justify-center items-center gap-1 cursor-pointer">
                        <i class="pi pi-angle-down"></i>
                        <p class="hover:text-gray-600">Assets </p>
                    </div>
                    <p class="font-bold">$250</p>
                </div>
                <ul id="assets">
                    <li class="flex justify-between items-center pl-10">
                        <div class="w-full">
                            <div class="flex justify-between items-center w-full font-bold">
                                <div @click="$('#real').slideToggle()"
                                    class="flex justify-center items-center gap-1 cursor-pointer">
                                    <i class="pi pi-angle-down"></i>
                                    <p class="hover:text-gray-600">Real estate </p>
                                </div>
                                <p class="font-bold">$250</p>
                            </div>
                            <ul id="real">
                                <li class="flex justify-between items-center pl-10">
                                    <p>REITs</p>
                                    <p>$1000</p>
                                </li>
                                
                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <div class="p-5 w-full">
                <div class="p-2 border rounded-xl">
                    <p class="text-2xl">Liabilities</p>
                    <div class="flex justify-start items-center space-x-2 text-indigo-500 text-lg"><i class="pi pi-plus"></i><p>Liability accound</p></div>
                </div>
            </div> -->
        </div>
    </div>
</template>
