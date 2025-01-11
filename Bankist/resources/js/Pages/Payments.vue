<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
import { ref, onMounted } from 'vue'
// defineProps({
//     payments: Array
// })
const payments = ref([
    {
        id: '1',
        card_id: '4532XXXXXXXX1234',
        amount: -156.78,
        destination: 'Amazon.com',
        datetime: '2024-03-15T10:30:00Z'
    },
    {
        id: '2',
        card_id: '4532XXXXXXXX1234',
        amount: -49.99,
        destination: 'Netflix',
        datetime: '2024-03-14T15:45:00Z'
    },
    {
        id: '3',
        card_id: '4532XXXXXXXX1234',
        amount: -89.99,
        destination: 'Apple Store',
        datetime: '2024-03-13T09:20:00Z'
    },
    // Add more sample data as needed
])
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
})
import { format } from 'date-fns'
import { FilterMatchMode } from "@primevue/core/api";
import { Column, DataTable, IconField, InputIcon, InputText } from 'primevue';

const formatNumber = (num) => {
    return Math.abs(num).toFixed(2)
}

const formatDateTime = (datetime) => {
    return format(new Date(datetime), 'MMM d, yyyy HH:mm')
}


</script>
<template>
    <MyLayout>
        <div class="w-full h-[150px] pt-10 px-[6rem]">
            <p class="text-6xl font-bold text-gray-600">Payments history</p>
        </div>
        <div class="w-full flex flex-col justify-center space-y-10 items-center mt-20">
            
            <DataTable :value="payments" :paginator="true" :rows="10" :filters="filters"
                :globalFilterFields="['card_id', 'destination', 'amount']" :rows-per-page-options="[10, 20, 50]"
                class="min-w-[90%]   shadow-lg "
                >
                <template #header>
                    <div class="flex justify-between">
                       
                        <IconField>
                            <InputIcon>
                                <i class="pi pi-search" />
                            </InputIcon>
                            <InputText
                                v-model="filters.global.value"
                                placeholder="Keyword Search"
                            />
                        </IconField>
                    </div>
                </template>
                <Column field="card_id" header="Card ID" sortable>
                    <template #body="{ data }">
                        <span class="font-medium">{{ data.card_id }}</span>
                    </template>
                </Column>

                <Column field="amount" header="Amount" sortable>
                    <template #body="{ data }">
                        <span :class="['font-semibold', data.amount >= 0 ? 'text-green-600' : 'text-red-600']">
                            ${{ formatNumber(data.amount) }}
                        </span>
                    </template>
                </Column>

                <Column field="destination" header="Destination" sortable>
                    <template #body="{ data }">
                        <span class="text-gray-700">{{ data.destination }}</span>
                    </template>
                </Column>

                <Column field="datetime" header="Date & Time" sortable>
                    <template #body="{ data }">
                        <span class="text-gray-600">{{ formatDateTime(data.datetime) }}</span>
                    </template>
                </Column>

                <Column :exportable="false" style="min-width: 8rem">
                    <template #body="{ data }">
                        <Button icon="pi pi-eye" class="p-button-text p-button-sm" @click="viewPaymentDetails(data)" />
                    </template>
                </Column>
            </DataTable>
        </div>
    </MyLayout>
</template>
