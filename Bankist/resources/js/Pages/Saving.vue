<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';



import AccountHeader from '@/Components/AccountHeader.vue';
import SpendingChart from '@/Components/SpendingChart.vue';
import TransactionList from '@/Components/TransactionList.vue';
import CardDetails from '@/Components/CardDetails.vue';
import { Button } from 'primevue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    type: 'savings'
});

function create()
{
    form.post(route('accounts.create'))
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
                            <TransactionList :account_id="props.account.id" />
                        </div>


                    </div>
                </div>
            </div>
            <div v-else class=" h-full w-full flex justify-center items-center">
                <Button label="Open Savings Account" @click="create" />
            </div>
        </div>

    </MyLayout>
</template>