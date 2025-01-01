<template>
    <div class="bg-white rounded-xl w-full shadow-sm p-6">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold text-gray-800">Spending Overview</h3>
        <select v-model="selectedPeriod" class="text-sm border-gray-200 rounded-lg">
          <option value="week">This Week</option>
          <option value="month">This Month</option>
          <option value="year">This Year</option>
        </select>
      </div>
      
      <Line
        :data="chartData"
        :options="chartOptions"
        class="w-full"
      />
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref, computed } from 'vue'
  import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
  } from 'chart.js'
  import { Line } from 'vue-chartjs'
  
  ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
  )
  
  const selectedPeriod = ref('month')
  
  const chartData = computed(() => ({
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [
      {
        label: 'Spending',
        data: [1200, 1900, 1500, 2100, 1800, 2300],
        borderColor: '#8b5cf6',
        backgroundColor: '#8b5cf6',
        tension: 0.4
      }
    ]
  }))
  
  const chartOptions = {
    responsive: false,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false
      }
    },
    scales: {
      y: {
        beginAtZero: true,
        grid: {
          display: true,
          color: '#f3f4f6'
        }
      },
      x: {
        grid: {
          display: false
        }
      }
    }
  }
  </script>