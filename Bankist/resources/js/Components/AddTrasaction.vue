<script setup>
import { useForm } from '@inertiajs/vue3';
import { Button, Dialog, InputNumber, InputText, Select } from 'primevue';
import { ref, computed } from 'vue';
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
const props = defineProps({
    accounts: Array
});
const selectedAccount = ref(null);

// Compute the maximum amount based on the selected account's balance
const maxAmount = computed(() => selectedAccount.value?.balance || 0);

// Log props and selectedAccount for debugging
console.log("Accounts:", props.accounts);

const handleAccountChange = (value) => {
    form.account = value;
    selectedAccount.value = props.accounts.find(account => account.number === value);
    console.log("Selected Account ID:", value);
    console.log("Selected Account Object:", selectedAccount.value);
};

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
            <Select 
                v-model="form.account" 
                :options="props.accounts" 
                optionLabel="account_type" 
                optionValue="number" 
                class="flex-auto"
                @update:modelValue="handleAccountChange"
            >
                <template #option="slotProps">
                    <div class="flex justify-between w-full px-5 items-center">
                        <div class="font-bold">{{ slotProps.option.account_type }}</div>
                        <p class="text-green-600 font-bold">{{ slotProps.option.balance }} {{ slotProps.option.currency }}</p>
                    </div>
                </template>
            </Select>
            <InputError class="mt-2" :message="form.errors.account" />
        </div>
        <div class="flex items-center gap-4 mb-8">
            <label for="email" class="font-semibold w-32">Password</label>
            <InputText id="email" v-model="form.password" class="flex-auto" autocomplete="off" />
            <InputError class="mt-2" :message="form.errors.password" />
        </div>
        <div class="flex items-center gap-4 mb-8">
            <label for="amount" class="font-semibold w-32">Amount</label>
            <InputNumber 
                id="amount" 
                v-model="form.amount" 
                mode="currency" 
                class="flex-auto" 
                currency="DZD" 
                locale="en-US" 
                :max="maxAmount"
            />
            <InputError class="mt-2" :message="form.errors.amount" />
        </div>
        <div class="flex justify-end gap-2">
            <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
            <Button type="button" label="Process" @click="submit"></Button>
        </div>
    </Dialog>
</template>
