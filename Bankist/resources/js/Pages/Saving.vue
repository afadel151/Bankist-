<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';



import AccountHeader from '@/Components/AccountHeader.vue';
import SpendingChart from '@/Components/SpendingChart.vue';
import TransactionList from '@/Components/TransactionList.vue';
import CardDetails from '@/Components/CardDetails.vue';


const accountData = {
    balance: 12458.96,
    cardHolder: 'JOHN DOE',
    cardExpiry: '12/25',
    dailyLimit: 5000.00
}

const props = defineProps({
    account: Object
})
</script>
<template>
    <MyLayout>
        <div class="w-full px-[15rem] h-full">
            <div v-if="props.account != null" class="">
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
            <div v-else class="">

            </div>
        </div>

    </MyLayout>
</template>