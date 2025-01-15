<script setup>
import Button from "primevue/button";
import $ from "jquery";
import Divider from "primevue/divider";
import { usePage } from "@inertiajs/vue3";
const formatNumber = (num) => {
    return new Intl.NumberFormat("en-US", {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(num);
};
import Popover from "primevue/popover";
import { onMounted, ref } from "vue";
import axios from "axios";

const op = ref();
const toggle = (event) => {
    op.value.toggle(event);
};
const cardExample = {
    account : {
        balance : 0
    },
    user:{
        first_name: 'user',
        last_name: 'user'
    },
    card_number: 0,
    expiry_date: '2025-01-01'
}
const currentCard = ref(cardExample);
const user = usePage().props.auth.user;
const allCards = ref([]);
async function get_cards() {
    try {
        let response = await axios.get("/cards");
        console.log(response.data);
        allCards.value = response.data;
        currentCard.value = allCards.value.filter(
            (card) => card.account.account_type == "checking"
        )[0];
    } catch (error) {
        console.log(error);
    }
}
const formatDate = (inputDate) => {
    const date = new Date(inputDate); // Convert input to a Date object
    if (isNaN(date)) {
        throw new Error("Invalid date"); // Handle invalid dates
    }
    const year = date.getFullYear().toString().slice(-2); // Last two digits of the year
    const month = String(date.getMonth() + 1).padStart(2, "0"); // Zero-padded month
    return `${year}/${month}`;
};
onMounted(() => {
    get_cards();
});

function changeCurrentCard(card){
    currentCard.value = card
}
</script>

<template>
    <div class="p-5 w-full h-full">
        <div
            class="relative flex flex-col justify-between p-5 items-center bg-white border-2 border-gray-100 shadow-md rounded-xl w-full h-full"
        >
            <div class="flex justify-between mb-4 items-center w-full">
                <div class="h-fit">
                    <p class="text-2xl text-gray-500 ml-2 font-thin">{{currentCard.account.account_type}}</p>
                </div>
                <div class="flex items-center gap-2">
                    <Button
                        icon="pi pi-list"
                        severity="secondary"
                        outlined
                        aria-label="Bookmark"
                        @click="toggle"
                    />
                    <Popover ref="op">
                        <div class="flex flex-col  justify-center items-stretch space-y-3">
                            <Button v-for="card in allCards" :key="card.id" :label="card.account.account_type" :severity="card.account.account_type == 'checking' ? 'primary' : card.account.account_type == 'savings' ? 'warn' : 'contrast'" @click="changeCurrentCard(card)" />
                        </div>    
                    </Popover>
                </div>
            </div>
            <div class="h-44 w-full max-w-sm mx-auto mb-6">
                <div :class="currentCard.account.account_type == 'checking' ? 'bg-green-500' : currentCard.account.account_type == 'savings' ? 'bg-orange-500' : 'bg-gray-900'"
                    class="relative inset-0 overflow-hidden  rounded-xl p-6 text-white shadow-lg"
                >
                    <div
                        class="absolute h-40 w-40 top-0 -right-10 rounded-full bg-slate-200 opacity-20"
                    ></div>
                    <div
                        class="absolute h-20 w-20 bottom-0 -right-10 rounded-full bg-slate-200 opacity-20"
                    ></div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-80">Current Balance</p>
                            <p class="text-2xl font-semibold mt-1">
                                ${{ formatNumber(currentCard.account.balance) }}
                            </p>
                        </div>
                        <img src="/imgs/icon.png" class="w-10" alt="" />
                    </div>

                    <div class="mt-2">
                        <p class="font-medium tracking-widest">
                            {{ currentCard.card_number }}
                        </p>
                    </div>

                    <div class="mt-4 flex justify-between items-center">
                        <div>
                            <p class="text-xs opacity-80">Card Holder</p>
                            <p class="font-medium">
                                {{ currentCard.user.last_name }}
                                {{ currentCard.user.first_name }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs opacity-80">Expires</p>
                            <p class="font-medium">
                                {{ formatDate(currentCard.expiry_date) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
