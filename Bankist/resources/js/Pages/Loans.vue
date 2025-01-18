<script setup>
import MyLayout from '@/Layouts/MyLayout.vue';
const props = defineProps({
    loans: Array
})

import { FilterMatchMode, FilterOperator } from "@primevue/core/api";
import axios from "axios";
import { DataTable } from "primevue";
import {IconField} from "primevue";
import {InputIcon} from "primevue";
import {Button} from "primevue";
import {Column } from "primevue";
import {InputText} from "primevue";

import { ref, onMounted } from "vue";
import AddTrasaction from "@/Components/AddTrasaction.vue";
import AddLoan from '@/Components/AddLoan.vue';
const loans = ref(props.loans);
const selectedTransactions = ref([]);
const filters = ref({
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        amount: {
            operator: FilterOperator.AND,
            constraints: [
                { value: null, matchMode: FilterMatchMode.EQUALS },
            ],
        },
        description: {
            operator: FilterOperator.OR,
            constraints: [
                { value: null, matchMode: FilterMatchMode.CONTAINS },
            ],
        },
        source : {
            operator: FilterOperator.OR,
            constraints: [
                { value: null, matchMode: FilterMatchMode.EQUALS },
            ],
        },
        destination : {
            operator: FilterOperator.OR,
            constraints: [
                { value: null, matchMode: FilterMatchMode.EQUALS },
            ],
        },
    });






const clearFilter = () => {
    initFilters();
};

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        amount: {
            operator: FilterOperator.AND,
            constraints: [
                { value: null, matchMode: FilterMatchMode.EQUALS },
            ],
        },
        description: {
            operator: FilterOperator.OR,
            constraints: [
                { value: null, matchMode: FilterMatchMode.CONTAINS },
            ],
        },
        source : {
            operator: FilterOperator.OR,
            constraints: [
                { value: null, matchMode: FilterMatchMode.EQUALS },
            ],
        },
        destination : {
            operator: FilterOperator.OR,
            constraints: [
                { value: null, matchMode: FilterMatchMode.EQUALS },
            ],

        },
        
        
    };
};
function formatTimestamp(timestamp) {
    const date = new Date(timestamp);

    // Extract components
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const year = date.getFullYear();

    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');

    // Return the formatted string
    return `${day}-${month}-${year} ${hours}:${minutes}`;
}
</script>
<template>
    <MyLayout>
        <div class="w-full h-[150px] pt-10 px-20">
            <p class="text-6xl font-bold text-gray-600">Loans history</p>
        </div>
        <div class="w-full flex flex-col   space-y-5 justify-center  items-start px-20 ">
            <AddLoan />
        <DataTable
                v-model:filters="filters"
                :value="loans"
                paginator
                :rows="10"
                dataKey="id"
                filterDisplay="menu"
                :globalFilterFields="[
                    'name',
                ]"
                class="w-full"
            >
                <template #header>
                    <div class="flex justify-between">
                        <Button
                            type="button"
                            icon="pi pi-filter-slash"
                            label="Clear"
                            outlined
                            @click="clearFilter()"
                        />
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
                <template #empty> No customers found. </template>
                <Column
                    selectionMode="multiple"
                    headerStyle="width: 3rem"
                ></Column>
                <Column
                    field="created_at"
                    header="Created"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ formatTimestamp(data.created_at) }}
                    </template>
                    
                </Column>
                <Column
                    field="loan_type"
                    header="Type"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.loan_type }}
                    </template>
                    <template #filter="{ filterModel }">
                        <InputText
                            v-model="filterModel.value"
                            type="text"
                            placeholder="Search by Type"
                        />
                    </template>
                </Column>
                <Column
                    field="amount"
                    header="Amount"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.amount }}
                    </template>
                    <template #filter="{ filterModel }">
                        <InputText
                            v-model="filterModel.value"
                            type="text"
                            placeholder="Search by Amount"
                        />
                    </template>
                </Column>
                <Column
                    field="start_date"
                    header="Start Date"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.start_date }}
                    </template>
                    <template #filter="{ filterModel }">
                        <InputText
                            v-model="filterModel.value"
                            type="text"
                            placeholder="Search by Type"
                        />
                    </template>
                </Column>
                <Column
                    field="nb_months"
                    header="Months"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.nb_months }}
                    </template>
                    <template #filter="{ filterModel }">
                        <InputText
                            v-model="filterModel.value"
                            type="text"
                            placeholder="Search by Link"
                        />
                    </template>
                </Column>
                <Column
                    field="status"
                    header="Status"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.status }}
                    </template>
                    
                </Column>
               
            </DataTable>
        </div>
    </MyLayout>
</template>