<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import Spendings from '@/Components/Spendings.vue';
import Accounts from '@/Components/Accounts.vue';
import Incomes from '@/Components/Incomes.vue';
import SpendIncomChart from '@/Components/SpendIncomChart.vue';
import AllSpending from '@/Components/AllSpending.vue';
</script>

<template>
    <MyLayout>
        <div class="w-full h-[150px] pt-10 px-[6rem]">
            <p class="text-6xl font-bold text-gray-600">Banking dashboard</p>
            <p class="text-xl text-gray-500">Welcome back ! Akram</p>
        </div>
        <div class="px-[5rem] grid grid-cols-6 grid-rows-5 auto-cols-auto h-[calc(100vh-150px)]  w-full"
            style="grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr; ">

            <div class="col-span-2 row-span-2">
                <Accounts />
            </div>
            <div class="col-span-2 row-span-2 p-5">
                <Incomes/>
            </div>
            <div class="col-span-2 col-start-5 row-span-2 p-5">

                <Spendings />
            </div>
            <div class="col-span-4 row-span-3 row-start-3 p-5">
                <SpendIncomChart />
            </div>
            <div class="col-span-2 col-start-5 row-span-3 row-start-3 p-5">
                <AllSpending />
            </div>
        </div>
    </MyLayout>

</template>