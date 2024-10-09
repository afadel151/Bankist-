
<template>
    <div class="flex flex-col bg-white p-5 border rounded-3xl h-full card">
        <p class="font-bold text-3xl">All Spendings</p>
        <Chart  type="polarArea" :data="chartData" :options="chartOptions" class="w-full" />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Chart from "primevue/chart";
onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    const documentStyle = getComputedStyle(document.body);

    return {
        labels: ['A', 'B', 'C','D'],
        datasets: [
            {
                data: [540, 325, 702,600],
                backgroundColor: [documentStyle.getPropertyValue('--p-green-500'), documentStyle.getPropertyValue('--p-orange-500'), documentStyle.getPropertyValue('--p-gray-500'),documentStyle.getPropertyValue('--p-yellow-500')],
                hoverBackgroundColor: [documentStyle.getPropertyValue('--p-cyan-400'), documentStyle.getPropertyValue('--p-orange-400'), documentStyle.getPropertyValue('--p-gray-400')],
                borderRadius: 10,
                borderSkipped : false

            }
        ]
    };
};

const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--p-text-color');

    return {
        plugins: {
            legend: {
                labels: {
                    usePointStyle: true,
                    color: textColor
                }
            }
        }
    };
};
</script>
