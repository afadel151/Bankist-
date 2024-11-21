<script setup>
import Sidebar from "./Sidebar.vue";
import IconField from "primevue/iconfield";
import InputIcon from "primevue/inputicon";
import InputText from "primevue/inputtext";
</script>

<template>
  <div class="w-screen h-screen overflow-x-hidden">
    <!-- <div class="flex items-center justify-between px-10 border-b-2 w-screen h-16">
            <img src="/imgs/logo.png" class="h-[50px]" alt="">
            <IconField class="w-80">
                <InputIcon class="pi pi-search" />
                <InputText v-model="value1" placeholder="Search" class="w-80"/>
            </IconField>
        </div> -->
    <div class="flex justify-center">
      <div class="w-80 h-screen sticky top-0">
        <Sidebar class="w-[300px]"  />
      </div>
      <div class="w-full ">
        <slot />
      </div>
    </div>
  </div>
</template>