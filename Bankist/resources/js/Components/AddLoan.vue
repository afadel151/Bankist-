<script setup>
import { useForm } from '@inertiajs/vue3';
import { Button, Dialog, InputNumber, InputText } from 'primevue';
import { ref } from 'vue';
import InputError from './InputError.vue';
import axios from 'axios';
import Select from 'primevue/select';
const visible = ref(false);
const emit = defineEmits(['add_loan']);
const selectedType = ref('');
const form = useForm({
    type: '',
    amount: "",
    nb_months: '',
});

const types = ref([
    'home',
    'car',
    'personal',
    'business'
]);
const submit = async () => {
    form.post(route('loans.request'), {
        onFinish: () => form.reset('password'),
    });
};

</script>
<template>
    <Button label="Request a Loan" icon="pi pi-plus" @click="visible = true" />

    <Dialog v-model:visible="visible" modal header="Transaction" :style="{ width: '45rem' }">
        <span class="text-surface-500 dark:text-surface-400 block mb-8">Make a transaction to another account.</span>
        <div class="flex items-center gap-4 mb-8">
            <label  class="font-semibold w-32">Type</label>
            <Select v-model="form.type" :options="types" placeholder="Select a Type" class="flex-auto" />
            <InputError class="mt-2" :message="form.errors.type" />
        </div>
        <div class="flex items-center gap-4 mb-8">
            <label  class="font-semibold w-32">Amount</label>
            <InputNumber v-model="form.amount" mode="currency" class="flex-auto" currency="USD" locale="en-US" />
        
            <InputError class="mt-2" :message="form.errors.amount" />

        </div>
        <div class="flex items-center gap-4 mb-8">
            <label for="months" class="font-semibold w-32">Months</label>
            <InputNumber id="months" v-model="form.nb_months" class="flex-auto" autocomplete="off" />
            <InputError class="mt-2" :message="form.errors.nb_months" />
        </div>
        <!--  -->
        <div class="flex justify-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
            <Button type="button" label="Process" @click="submit"></Button>
        </div>
    </Dialog>
</template>