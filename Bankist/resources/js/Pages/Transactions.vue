<script setup>
import { FilterMatchMode, FilterOperator } from "@primevue/core/api";
import axios from "axios";
import { DataTable, Toast } from "primevue";
import {IconField} from "primevue";
import {InputIcon} from "primevue";
import {Button} from "primevue";
import {Column } from "primevue";
import {InputText} from "primevue";

import { ref, onMounted } from "vue";
import MyLayout from '@/Layouts/MyLayout.vue';
import AddTrasaction from "@/Components/AddTrasaction.vue";
import { Link, usePage } from "@inertiajs/vue3";




const props = defineProps({
    transactions: Array,
    accounts:Array
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
        <Toast/>
        <div class="w-full h-[150px] pt-10 px-20">
            <p class="text-6xl font-bold text-gray-600">Transactions history</p>
        </div>
        <div class="w-full flex flex-col justify-center space-y-10 items-start px-20 ">
        <div class="items-center flex space-x-3">
            <AddTrasaction :accounts="props.accounts" />
            <a :href="route('transactions.pdf')">
                <Button icon="pi pi-save" label="Export transactions" />
            </a>
        </div>
         <DataTable
                v-model:filters="filters"
                v-model:selection="selectedTasks"
                :value="transactions"
                paginator
                :rows="10"
                class="w-full shadow-xl "
                dataKey="id"
                filterDisplay="menu"
                :globalFilterFields="[
                    'name',
                ]"
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
                <template #empty> No Transaction found. </template>
                <Column
                    field="senderAccount"
                    header="Source"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.sender_account.number }}
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
                    field="receiverAccount"
                    header="Destination"
                    sortable
                    style="min-width: 14rem"
                >
                    <template #body="{ data }">
                        {{ data.receiver_account.number }}
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
                        ${{ data.amount }}
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