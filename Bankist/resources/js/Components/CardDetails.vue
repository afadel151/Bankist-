<script setup>
import { CreditCard, Lock, Settings } from 'lucide-vue-next'
import BaseButton from './BaseButton.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  card: Object
})
const formatDate = (inputDate) => {
  const date = new Date(inputDate); // Convert input to a Date object
  if (isNaN(date)) {
    throw new Error("Invalid date"); // Handle invalid dates
  }
  const year = date.getFullYear().toString().slice(-2); // Last two digits of the year
  const month = String(date.getMonth() + 1).padStart(2, '0'); // Zero-padded month
  return `${year}/${month}`;
};
const form = useForm({
  card_id : props.card.id
})
function lock()
{
  form.post(route('cards.lock'));
}
const formatNumber = (num) => {
  return new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }).format(num)
}
</script>
<template>
  <div class="bg-white rounded-xl shadow-sm p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-6">Linked Cards</h3>

    <div class=" h-56 w-full max-w-sm mx-auto mb-6">
      <div class="relative inset-0 overflow-hidden  bg-green-500 rounded-xl p-6 text-white shadow-lg">
        <div class="absolute h-40 w-40 top-0 -right-10 rounded-full bg-slate-200  opacity-20">
        </div>
        <div class="absolute h-20 w-20 bottom-0 -right-10 rounded-full bg-slate-200  opacity-20">
        </div>
        <div class="flex justify-between items-start">
          <div>
            <p class="text-sm opacity-80">Current Balance</p>
            <p class="text-2xl font-semibold mt-1">${{ formatNumber(card.account.balance) }}</p>
          </div>
          <img src="/imgs/icon.png" class="w-10" alt="">
        </div>

        <div class="mt-8">
          <p class="font-medium tracking-widest"> {{ props.card.card_number }}</p>
        </div>

        <div class="mt-6 flex justify-between items-center">
          <div>
            <p class="text-xs opacity-80">Card Holder</p>
            <p class="font-medium">{{ card.user.last_name }} {{ card.user.first_name }}</p>
          </div>
          <div>
            <p class="text-xs opacity-80">Expires</p>
            <p class="font-medium">{{ formatDate(card.expiry_date) }}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="space-y-4">
      <div class="flex justify-between items-center">
        <p class="text-gray-600">Card Type</p>
        <p class="font-medium text-gray-800">Visa Debit</p>
      </div>
      <div class="flex justify-between items-center">
        <p class="text-gray-600">Card Lemit</p>
        <p class="font-medium text-gray-800">${{ card.credit_limit }}</p>
      </div>
      <div class="flex justify-between items-center">
        <p class="text-gray-600">Status</p>
        <span :class="props.card.locked ? 'text-red-700 bg-red-100' : ' text-green-700 bg-green-100'" class="px-2 py-1   rounded-full text-sm">{{props.card.locked ? 'Locked' : 'Actif'}}</span>
      </div>
    </div>

    <div class="mt-6 flex items-center space-x-3">
      <BaseButton variant="secondary" size="sm" @click="lock">
        <Lock class="w-4 h-4 mr-2" />
        Lock Card
      </BaseButton>
      <BaseButton variant="secondary" size="sm">
        <Settings class="w-4 h-4 mr-2" />
        Card Settings
      </BaseButton>
    </div>
  </div>
</template>
