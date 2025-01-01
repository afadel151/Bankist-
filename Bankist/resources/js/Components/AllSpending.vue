
<template>
    <div class="flex flex-col bg-white p-5 border rounded-xl h-full card">
        <p class="font-bold text-3xl text-gray-700">Recent transactions</p>
       
        <div class="w-full h-full flex flex-col mt-5  justify-start space-y-2 items-stretch">
            <DashboardTransaction :received="true" />
            <DashboardTransaction :received="false" />

        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import DashboardTransaction from "./DashboardTransaction.vue";
const props = defineProps({
    transactions: Array
})
</script>
