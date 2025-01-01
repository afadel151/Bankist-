<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import Button from "primevue/button";
import Avatar from "primevue/avatar";
import Popover from 'primevue/popover';
const op = ref();
const toggle = (event) => {
  op.value.toggle(event);
}

const count = ref(0);
import $ from "jquery";
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
</script>
<template>
  <div class="flex flex-col border-r pt-5 h-screen">
    <div class="w-full flex h-fit justify-center my-5 items-center">
      <img src="/imgs/logo.png" class="w-56" alt="">
    </div>
    <div class="overflow-y-auto">
      <ul class="m-0 p-3 list-none">
        <li>
          <ul id="favs" class="m-0 p-0 overflow-hidden">
            <li>
              <Link :href="route('dashboard')"
                class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100"
                :class="route().current('dashboard') ? 'text-white bg-gray-600' : ''">
              <i class="mr-2 pi pi-home"></i>
              <span class="font-medium">Dashboard</span>
              </Link>
            </li>
            <!-- <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-bookmark"></i>
                <span class="font-medium">A</span>
              </a>
            </li> -->
            <li>
              <a v-ripple @click="$('#reports').slideToggle()"
                class="flex items-center p-3 border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-wallet"></i>
                <span class="font-medium">Accounts</span>
                <i class="ml-auto pi pi-chevron-down"></i>
              </a>
              <ul id="reports" class="hidden m-0 py-0 pr-0 pl-3 overflow-y-hidden">
                <li>
                  <Link :href="route('accounts.checking')"
                    class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100"
                    :class="route().current('accounts.checking') ? 'text-white bg-gray-600' : ''"> <i
                    class="mr-2 pi pi-list-check"></i>
                  <span class="font-medium">Checking</span>
                  </Link>
                </li>
                <li>
                  <Link :href="route('accounts.saving')"
                    class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100"
                    :class="route().current('accounts.saving') ? 'text-white bg-gray-600' : ''"> 
                      <i class="mr-2 pi pi-save"></i>
                    <span class="font-medium">Saving</span>
                </Link>
                </li>
                <li>
                  <Link :href="route('accounts.loan')"
                    class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100"
                    :class="route().current('accounts.loan') ? 'text-white bg-gray-600' : ''"> 
                    <i class="mr-2 pi pi-money-bill"></i>
                    <span class="font-medium">Loan</span>
                </Link>
                </li>

              </ul>
            </li>
            <li>
              <Link :href="route('payments.index')"
                    class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100"
                    :class="route().current('payments.index') ? 'text-white bg-gray-600' : ''"> 
                    <i class="mr-2 pi pi-credit-card"></i>
                <span class="font-medium">Payments</span>
            </Link>
            </li>
            <li>
              <Link :href="route('loans.index')"
                    class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100"
                    :class="route().current('loans.index') ? 'text-white bg-gray-600' : ''">
                    <i class="mr-2 pi pi-dollar"></i>
                <span class="font-medium">Loans</span>
                <span class="inline-flex justify-center items-center border-circle bg-primary ml-auto"
                  style="min-width: 1.5rem; height: 1.5rem">3</span>
            </Link>
            </li>
            <li>
              <Link :href="route('transactions.index')"
                    class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100"
                    :class="route().current('transactions.index') ? 'text-white bg-gray-600' : ''">
                    <i class="mr-2 pi pi-send"></i>
                <span class="font-medium">Transactions</span>
            </Link>
            </li>
            <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-cog"></i>
                <span class="font-medium">Settings</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="m-0 p-3 list-none">
        <li>
          <div @click="$('#application').slideToggle()"
            class="flex justify-between items-center p-3 p-ripple text-600 cursor-pointer">
            <span class="font-medium">APPLICATION</span>
            <i class="pi pi-chevron-down"></i>
          </div>
          <ul class="m-0 p-0 overflow-hidden list-none" id="application">
            <li>
              <a v
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-folder"></i>
                <span class="font-medium">Projects</span>
              </a>
            </li>
            <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-chart-bar"></i>
                <span class="font-medium">Performance</span>
              </a>
            </li>
            <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-cog"></i>
                <span class="font-medium">Settings</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="mt-auto">
      <hr class="mx-3 mb-3 surface-border border-top-1 border-none" />
      <Button type="button" icon="pi pi-arrow-up" severity="secondary" :label="$page.props.auth.user.first_name"
        @click="toggle" class="w-full" />
      <Popover ref="op">
        <div class="list-none w-52 flex  flex-col justify-center  items-stretch">
          <Link :href="route('profile.edit')" class="   cursor-pointer rounded-border">
          Profile
          </Link>
          <hr>
          <Link :href="route('logout')" method="post" class="  cursor-pointer rounded-border">
          Log out
          </Link>
        </div>
      </Popover>
    </div>
  </div>


</template>
