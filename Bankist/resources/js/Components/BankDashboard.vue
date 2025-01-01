<template>
    <div class="min-h-screen w-full rounded-xl bg-gray-50 p-6">
      <div class="w-full mx-auto space-y-6">
        <AccountHeader :balance="accountData.balance" />
        
            <CardDetails 
              :balance="accountData.balance"
              :card-holder="accountData.cardHolder"
              :expiry="accountData.cardExpiry"
              :daily-limit="accountData.dailyLimit"
            />
          
          <div class="lg:col-span-2 space-y-6">
            <SpendingChart />
            <TransactionList />
          </div>
          
          
      </div>
    </div>
  </template>
  
  <script setup lang="ts">
  import AccountHeader from './AccountHeader.vue'
  import SpendingChart from './SpendingChart.vue'
  import TransactionList from './TransactionList.vue'
  import CardDetails from './CardDetails.vue'
  
  // This would typically come from your API
  const accountData = {
    balance: 12458.96,
    cardHolder: 'JOHN DOE',
    cardExpiry: '12/25',
    dailyLimit: 5000.00
  }
  </script>