<script setup>
import Sidebar from './Sidebar.vue';
import Spendings from '@/Components/Spendings.vue';
import Accounts from '@/Components/Accounts.vue';
import Incomes from '@/Components/Incomes.vue';
import SpendIncomChart from '@/Components/SpendIncomChart.vue';
import AllSpending from '@/Components/AllSpending.vue';
</script>

<template>
    <div class="w-screen h-screen overflow-x-hidden">
        <div class="flex items-center px-10 border-b-2 w-screen h-16">
            <img src="/imgs/logo.png" class="h-[50px]" alt="">
        </div>
        <div class="flex justify-center">
            <Sidebar class="w-[300px]" style="height: calc(100vh - 64px);" />
            <div className="gap-4 grid grid-cols-6 grid-rows-5 auto-cols-auto bg-[#f2f2f27d] w-full" style="height: calc(100vh - 64px);grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr; ">
                <div  class="col-span-2 row-span-2">
                    <Accounts />
                </div>
                <div class="col-span-2 row-span-2 p-5">
                    <Spendings />
                </div>
                <div class="col-span-2 col-start-5 row-span-2 p-5">

                    <Incomes />
                </div>
                <div class="col-span-4 row-span-3 row-start-3 p-5">
                    <SpendIncomChart />
                </div>
                <div class="col-span-2 col-start-5 row-span-3 row-start-3 p-5">

                    <AllSpending />
                </div>
            </div>
        </div>
    </div>
</template>