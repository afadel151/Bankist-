<template>
    <div class="bg-white rounded-xl shadow-sm p-6">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold text-gray-800">Recent Transactions</h3>
        <div class="flex space-x-2">
          <BaseButton variant="secondary" size="sm">
            <Filter class="w-4 h-4 mr-2" />
            Filter
          </BaseButton>
          <BaseButton variant="secondary" size="sm">
            <Search class="w-4 h-4 mr-2" />
            Search
          </BaseButton>
        </div>
      </div>
  
      <div class="space-y-4">
        <div 
          v-for="transaction in transactions" 
          :key="transaction.id"
          class="flex items-center justify-between p-4 rounded-lg hover:bg-gray-50 transition-colors"
        >
          <div class="flex items-center space-x-4">
            <div :class="[
              'p-2 rounded-full',
              transaction.type === 'credit' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'
            ]">
              <component :is="transaction.type === 'credit' ? ArrowDownLeft : ArrowUpRight" class="w-5 h-5" />
            </div>
            <div>
              <p class="font-medium text-gray-800">{{ transaction.description }}</p>
              <p class="text-sm text-gray-500">{{ formatDate(transaction.date) }}</p>
            </div>
          </div>
          <p :class="[
            'font-semibold',
            transaction.type === 'credit' ? 'text-green-600' : 'text-red-600'
          ]">
            {{ transaction.type === 'credit' ? '+' : '-' }}${{ formatNumber(transaction.amount) }}
          </p>
        </div>
      </div>
  
      <div class="mt-6 text-center">
        <BaseButton variant="secondary">View All Transactions</BaseButton>
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import { Filter, Search, ArrowDownLeft, ArrowUpRight } from 'lucide-vue-next'
  import { format } from 'date-fns'
  import BaseButton from './BaseButton.vue'
  
  interface Transaction {
    id: number
    description: string
    amount: number
    date: Date
    type: 'credit' | 'debit'
  }
  
  const transactions = [
    {
      id: 1,
      description: 'Direct Deposit - Employer',
      amount: 2500.00,
      date: new Date('2024-03-15'),
      type: 'credit'
    },
    {
      id: 2,
      description: 'Amazon.com',
      amount: 84.99,
      date: new Date('2024-03-14'),
      type: 'debit'
    },
    {
      id: 3,
      description: 'Transfer from Savings',
      amount: 1000.00,
      date: new Date('2024-03-13'),
      type: 'credit'
    },
    {
      id: 4,
      description: 'Starbucks Coffee',
      amount: 5.75,
      date: new Date('2024-03-13'),
      type: 'debit'
    },
    {
      id: 5,
      description: 'Netflix Subscription',
      amount: 15.99,
      date: new Date('2024-03-12'),
      type: 'debit'
    }
  ]
  
  const formatDate = (date: Date) => {
    return format(date, 'MMM d, yyyy')
  }
  
  const formatNumber = (num: number) => {
    return new Intl.NumberFormat('en-US', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    }).format(num)
  }
  </script>