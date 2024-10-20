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
import $ from "jquery";
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
</script>

<template>
  <div class="flex flex-col border-x-2">

    <div class="overflow-y-auto">
      <ul class="m-0 p-3 list-none">
        <li>

          <ul id="favs" class="m-0 p-0 overflow-hidden">
            <li>
              <a v-ripple
                class="flex items-center p-3 border-round text-700 transition-colors transition-duration-300 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-home"></i>
                <span class="font-medium">Dashboard</span>
              </a>
            </li>
            <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-bookmark"></i>
                <span class="font-medium">Bookmarks</span>
              </a>
            </li>
            <li>
              <a v-ripple @click="$('#reports').slideToggle()"
                class="flex items-center p-3 border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-chart-line"></i>
                <span class="font-medium">Reports</span>
                <i class="ml-auto pi pi-chevron-down"></i>
              </a>
              <ul id="reports" class="hidden m-0 py-0 pr-0 pl-3 overflow-y-hidden">
                <li>
                  <a @click="$('#revenue').slideToggle()"
                    class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                    <i class="mr-2 pi pi-chart-line"></i>
                    <span class="font-medium">Revenue</span>
                    <i class="ml-auto pi pi-chevron-down"></i>
                  </a>
                  <ul id="revenue" class="hidden m-0 py-0 pr-0 pl-3 overflow-y-hidden list-none">
                    <li>
                      <a v-ripple
                        class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                        <i class="mr-2 pi pi-table"></i>
                        <span class="font-medium">View</span>
                      </a>
                    </li>
                    <li>
                      <a v-ripple
                        class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                        <i class="mr-2 pi pi-search"></i>
                        <span class="font-medium">Search</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a v-ripple
                    class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                    <i class="mr-2 pi pi-chart-line"></i>
                    <span class="font-medium">Expenses</span>
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-users"></i>
                <span class="font-medium">Team</span>
              </a>
            </li>
            <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-comments"></i>
                <span class="font-medium">Messages</span>
                <span class="inline-flex justify-center items-center border-circle bg-primary ml-auto"
                  style="min-width: 1.5rem; height: 1.5rem">3</span>
              </a>
            </li>
            <li>
              <a v-ripple
                class="flex items-center p-3 p-ripple border-round text-700 transition-colors transition-duration-150 cursor-pointer hover:surface-100">
                <i class="mr-2 pi pi-calendar"></i>
                <span class="font-medium">Calendar</span>
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
      <Button type="button" icon="pi pi-arrow-up" severity="secondary" :label="$page.props.auth.user.first_name" @click="toggle"
        class="w-full" />
      <Popover ref="op">
        <div class="list-none w-52 flex  flex-col justify-center  items-stretch">
          <Link  :href="route('profile.edit')"
            class="   cursor-pointer rounded-border">
              Profile
          </Link>
          <hr>
          <Link :href="route('profile.edit')"
          class="  cursor-pointer rounded-border">
            Log out
          </Link>
        </div>
      </Popover>
    </div>
  </div>


</template>
