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
    <div className=" grid grid-cols-6 grid-rows-5 auto-cols-auto bg-[#f2f2f27d] w-full" style="height: calc(100vh - 64px);grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr; ">
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

</MyLayout>

</template>