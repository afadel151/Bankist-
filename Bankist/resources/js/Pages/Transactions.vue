<script setup>
import { FilterMatchMode, FilterOperator } from "@primevue/core/api";
import axios from "axios";
import { DataTable } from "primevue";
import {IconField} from "primevue";
import {InputIcon} from "primevue";
import {Button} from "primevue";
import {Column } from "primevue";
import {InputText} from "primevue";

import { ref, onMounted } from "vue";
import MyLayout from '@/Layouts/MyLayout.vue';
import AddTrasaction from "@/Components/AddTrasaction.vue";



const props = defineProps({
    transactions: Array
});





const transactions = ref(props.transactions);
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

</script>

<template>
    <MyLayout>
        <div class="w-full flex flex-col justify-center space-y-10 items-center mt-20">
        <AddTrasaction />

         <DataTable
                v-model:filters="filters"
                v-model:selection="selectedTasks"
                :value="transactions"
                paginator
                :rows="10"
                class="max-w-[80%]"
                dataKey="id"
                filterDisplay="menu"
                :globalFilterFields="[
                    'name',
                ]"
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
                    field="source"
                    header="Source"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.source.number }}
                    </template>
                    <template #filter="{ filterModel }">
                        <InputText
                            v-model="filterModel.value"
                            type="text"
                            placeholder="Search by name"
                        />
                    </template>
                </Column>
                <Column
                    field="destination"
                    header="Destination"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.destination.number }}
                    </template>
                    <template #filter="{ filterModel }">
                        <InputText
                            v-model="filterModel.value"
                            type="text"
                            placeholder="Search by platform"
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
                            placeholder="Search by Type"
                        />
                    </template>
                </Column>
                <Column
                    field="description"
                    header="description"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.description }}
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
                    field="created_at"
                    header="Created"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.created_at }}
                    </template>
                    <!-- <template #filter="{ filterModel }">
                        <InputText
                            v-model="filterModel.value"
                            type="text"
                            placeholder="Search by Link"
                        />
                    </template> -->
                </Column>
               
            </DataTable>
        </div>
    </MyLayout>

    
</template>