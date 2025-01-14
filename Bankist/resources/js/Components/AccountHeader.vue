<template>
  <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
    <div class="flex justify-between items-start">
      <div>
        <h2 class="text-2xl font-semibold text-gray-800">Checking Account</h2>
        <p class="text-gray-500 mt-1">Account ending in 4589</p>
      </div>
      <BaseButton size="sm">
        <Download class="w-4 h-4 mr-2" />
        Export Statement
      </BaseButton>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-sm text-gray-500">Available Balance</p>
        <p class="text-2xl font-semibold text-gray-800 mt-1">${{ formatNumber(props.account.balance) }}</p>
      </div>
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-sm text-gray-500">Account Number</p>
        <p class="text-lg font-medium text-gray-800 mt-1">{{ props.account.number }}</p>
      </div>
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-sm text-gray-500">Routing Number</p>
        <p class="text-lg font-medium text-gray-800 mt-1">021000021</p>
      </div>
    </div>
  </div>
</template>

<script setup >
import { Download } from 'lucide-vue-next'
import BaseButton from './BaseButton.vue';


const props = defineProps({
  account: Object
})

const formatNumber = (num) => {
  return new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }).format(num)
}
</script>