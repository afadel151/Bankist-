<script setup>
import { useForm } from '@inertiajs/vue3';
import { Button, Dialog, InputNumber, InputText } from 'primevue';
import { ref } from 'vue';
import InputError from './InputError.vue';
import axios from 'axios';

const visible = ref(false);
const emit = defineEmits(['add_transaction']);
const form = useForm({
    account: '',
    password: "",
    destination: '',
    amount: ''
});
const submit = async () => {
    try {
        const response = await axios.post(route("transactions.add"), form);
        console.log(response.data);
        form.reset("password");
        visible.value = false;
    } catch (error) {
        if (error.response && error.response.status === 422) {
                form.setError(error.response.data.errors || {});
        } else {
            console.error("An unexpected error occurred:", error);
        }
    }
};

</script>
<template>
    <Button label="Add transaction" icon="pi pi-plus" @click="visible = true" />

    <Dialog v-model:visible="visible" modal header="Transaction" :style="{ width: '45rem' }">
        <span class="text-surface-500 dark:text-surface-400 block mb-8">Make a transaction to another account.</span>
        <div class="flex items-center gap-4 mb-8">
            <label for="username" class="font-semibold w-32">Account Number</label>
            <InputText id="username" v-model="form.destination" class="flex-auto" autocomplete="off" />
            <InputError class="mt-2" :message="form.errors.destination" />
        </div>
        <div class="flex items-center gap-4 mb-8">
            <label for="email" class="font-semibold w-32">Account</label>
            <InputText v-model="form.account" id="email" class="flex-auto" autocomplete="off" />
            <InputError class="mt-2" :message="form.errors.account" />
        </div>
        <div class="flex items-center gap-4 mb-8">
            <label for="email" class="font-semibold w-32">Password</label>
            <InputText id="email" v-model="form.password" class="flex-auto" autocomplete="off" />
            <InputError class="mt-2" :message="form.errors.password" />

        </div>
        <div class="flex items-center gap-4 mb-8">
            <label for="email" class="font-semibold w-32">Amount</label>
            <InputNumber v-model="form.amount" mode="currency" class="flex-auto" currency="DZD" locale="en-US" />
            <InputError class="mt-2" :message="form.errors.amount" />
        </div>
        <!--  -->
        <div class="flex justify-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
            <Button type="button" label="Process" @click="submit"></Button>
        </div>
    </Dialog>
</template>