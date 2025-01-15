<script setup>
import AccountHeader from '@/Components/AccountHeader.vue';
import Account from '@/Components/AccountHeader.vue';
import BankDashboard from '@/Components/BankDashboard.vue';
import CardDetails from '@/Components/CardDetails.vue';
import SpendingChart from '@/Components/SpendingChart.vue';
import TransactionList from '@/Components/TransactionList.vue';
import MyLayout from '@/Layouts/MyLayout.vue';
const props = defineProps({
    account: Object
})

</script>
<template>
    <MyLayout>
        <div class="w-full px-[15rem] h-full">
            <div class="w-full h-full pt-20  flex flex-col justify-start items-center  ">
                <div class="min-h-screen w-full rounded-xl bg-gray-50 p-6">
                    <div class="w-full mx-auto space-y-6">
                        <AccountHeader :account="props.account" />

                        <CardDetails :card="props.account.card" />

                        <div class="lg:col-span-2 space-y-6">
                            <SpendingChart />
                            <TransactionList />
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </MyLayout>
</template>