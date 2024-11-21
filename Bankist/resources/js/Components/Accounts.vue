<script setup>
import Button from 'primevue/button';
import $ from 'jquery';
import Divider from 'primevue/divider';
</script>



<template>
    <div class="p-5 w-full h-full">
        <div class="relative flex flex-col justify-start items-center space-y-4 bg-white py-5 border rounded-3xl w-full h-full">
            <div class="flex justify-between px-14 items-center w-full">
                <p class="from-bold text-3xl">Accounts</p>
                <div class="flex items-center gap-2">
                    <Button icon="pi pi-ellipsis-v" severity="secondary" rounded outlined aria-label="Bookmark" />
                </div>
            </div>
        
            <img data-aos="fade-up"  src="/svgs/NewCardMockup.svg" class="shadow-gray-500/50 shadow-lg rounded-[1.9rem]" alt="">
            <p class="bottom-[150px] left-[75px] absolute font-bold text-2xl text-white">$15200,20.01</p>
            <p class="bottom-[75px] left-[75px] absolute font-bold text-base text-white">FADEL AKRAM <span class="ml-10">09/24</span></p>
            <p class="bottom-[45px] left-[75px] absolute font-bold font-sans text-base text-white">1234 1234 1234 1234</p>

           
        </div>
    </div>
</template>
