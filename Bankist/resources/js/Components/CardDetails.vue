<script setup lang="ts">
import { CreditCard , Lock, Settings } from 'lucide-vue-next'
import BaseButton from './BaseButton.vue';

const props = defineProps<{
  balance: number
  cardHolder: string
  expiry: string
  dailyLimit: number
}>()

const formatNumber = (num: number) => {
  return new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2
  }).format(num)
}
</script>
<template>
    <div class="bg-white rounded-xl shadow-sm p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-6">Linked Cards</h3>
      
      <div class="relative h-56 w-full max-w-sm mx-auto mb-6">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-xl p-6 text-white shadow-lg">
          <div class="flex justify-between items-start">
            <div>
              <p class="text-sm opacity-80">Current Balance</p>
              <p class="text-2xl font-semibold mt-1">${{ formatNumber(balance) }}</p>
            </div>
            <CreditCard class="w-8 h-8" />
          </div>
          
          <div class="mt-8">
            <p class="font-medium tracking-widest">**** **** **** 4589</p>
          </div>
          
          <div class="mt-6 flex justify-between items-center">
            <div>
              <p class="text-xs opacity-80">Card Holder</p>
              <p class="font-medium">{{ cardHolder }}</p>
            </div>
            <div>
              <p class="text-xs opacity-80">Expires</p>
              <p class="font-medium">{{ expiry }}</p>
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
          <p class="text-gray-600">Daily Limit</p>
          <p class="font-medium text-gray-800">${{ formatNumber(dailyLimit) }}</p>
        </div>
        <div class="flex justify-between items-center">
          <p class="text-gray-600">Status</p>
          <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-sm">Active</span>
        </div>
      </div>
  
      <div class="mt-6 flex items-center space-x-3">
        <BaseButton variant="secondary" size="sm">
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
  
