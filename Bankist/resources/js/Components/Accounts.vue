<script setup>
import Button from 'primevue/button';
import $ from 'jquery';
import Divider from 'primevue/divider';
const formatNumber = (num) => {
    return new Intl.NumberFormat('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }).format(num)
}

</script>



<template>
    <div class="p-5 w-full  h-full">
        <div class="relative flex flex-col justify-between p-5 items-center  bg-white  border rounded-xl w-full h-full">
            <div class="flex justify-between items-center w-full">
                <div class="h-fit">
                    <p class="text-2xl text-gray-500 font-thin">cheking</p>
                </div>
                <div class="flex items-center gap-2">
                    <Button icon="pi pi-list" severity="secondary"  outlined aria-label="Bookmark" />
                </div>
            </div>
            <div
                class="w-full inset-0 bg-gradient-to-br from-[10%] from-green-600 to-yellow-500 rounded-xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm opacity-80">Current Balance</p>
                        <p class="text-2xl font-semibold mt-1">$20</p>
                    </div>
                    <CreditCard class="w-8 h-8" />
                </div>

                <div class="mt-8">
                    <p class="font-medium tracking-widest">**** **** **** 4589</p>
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <div>
                        <p class="text-xs opacity-80">Card Holder</p>
                        <p class="font-medium">{{ cardHolder }}</p>
                    </div>
                    <div>
                        <p class="text-xs opacity-80">Expires</p>
                        <p class="font-medium">{{ expiry }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
