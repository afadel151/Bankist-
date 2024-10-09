<script setup>
import Chart from "primevue/chart";
import { ref, onMounted } from "vue";

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);

    return {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [
            {
                label: 'Spending',
                backgroundColor: documentStyle.getPropertyValue('--p-orange-500'),
                borderColor: documentStyle.getPropertyValue('--p-orange-500'),
                data: [65, 59, 80, 81, 56, 55, 40],
                borderRadius: 10,
                borderSkipped : false
            }
        ]
    };
};
const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--p-text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--p-text-muted-color');
    const surfaceBorder = documentStyle.getPropertyValue('--p-content-border-color');

    return {
        maintainAspectRatio: false,
        aspectRatio: 0.8,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary,
                    font: {
                        weight: 400
                    }
                },
                grid: {
                    display: false,
                    drawBorder: false
                }
            },
            y: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder,
                    drawBorder: false
                }
            }
        }
    };
}
</script>


<template>
    <div class="flex flex-col justify-center items-center bg-white p-5 border rounded-3xl w-full h-full">
        <div class="px-5 w-full">
            <h1 class="font-bold text-3xl text-start">Spendings</h1>
            <h1 class="font-boldtext-start">Last 6 months</h1>
        </div>
        <Chart type="bar" :data="chartData" :options="chartOptions" class="w-full h-full"  />
    </div>
</template>