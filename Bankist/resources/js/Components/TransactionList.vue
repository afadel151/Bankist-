<template>
  <div
    class="bg-white border-2 border-gray-100 shadow-md rounded-xl h-full flex flex-col justify-between p-4"
  >
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-xl font-semibold text-gray-800">Recent Transactions</h3>
    </div>

    <div class=" flex flex-col justify-start h-full">
      <div
        v-if="transactions.length"
        v-for="transaction in transactions"
        :key="transaction.id"
        class="flex items-center justify-between py-4 rounded-lg hover:bg-gray-50 transition-colors"
      >
        <div class="flex items-center space-x-4">
          <div
            :class="[ 
              'p-2 rounded-full',
              transaction.type === 'credit' ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600'
            ]"
          >
            <component
              :is="transaction.type === 'credit' ? ArrowDownLeft : ArrowUpRight"
              class="w-5 h-5"
            />
          </div>
          <div>
            <p class="font-medium text-gray-800">
              {{ transaction.type === 'credit' ? 'From' : 'To' }}: {{ transaction.other_party_name }}
            </p>
            <p class="text-sm text-gray-500">
              {{ formatDate(new Date(transaction.date)) }}
            </p>
          </div>
        </div>
        <p
          :class="[ 
            'font-semibold',
            transaction.type === 'credit' ? 'text-green-600' : 'text-red-600'
          ]"
        >
          {{ transaction.type === 'credit' ? '+' : '-' }}${{ formatNumber(transaction.amount) }}
        </p>
      </div>

      <div v-else class="text-center text-gray-500">
        No transactions done.
      </div>
    </div>

    <div class="mt-10 text-center">
      <BaseButton size="sm" variant="secondary">View All Transactions</BaseButton>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ArrowDownLeft, ArrowUpRight } from "lucide-vue-next";
import { format } from "date-fns";
import { ref, onMounted } from "vue";
import axios from "axios";
import BaseButton from "./BaseButton.vue";

interface Transaction {
  id: number;
  description: string;
  amount: number;
  date: string;
  type: "credit" | "debit";
  other_party_name: string;
}

// Reactive data
const transactions = ref<Transaction[]>([]);

// Format functions
const formatDate = (dateString: string) => {
  const date = new Date(dateString);
  if (isNaN(date.getTime())) {
    return "Invalid Date";
  }
  return format(date, "MMM d, yyyy");
};
const formatNumber = (num: number) => new Intl.NumberFormat("en-US", { minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(num);

// Fetch transactions on component mount
onMounted(async () => {
  try {
    const response = await axios.get('/api/transactions/recent-transactions');
    transactions.value = response.data;
  } catch (error) {
    console.error('Failed to fetch transactions:', error);
  }
});
</script>
