<script setup>
import Sidebar from "./Sidebar.vue";
import IconField from "primevue/iconfield";
import InputIcon from "primevue/inputicon";
import InputText from "primevue/inputtext";
</script>

<template>
  <div class="w-screen h-screen overflow-x-hidden">
    <div class="flex justify-center w-full">
      <div class="w-80 h-screen sticky top-0">
        <Sidebar class="w-[300px]"  />
      </div>
      <div class="w-full bg-[#b8c1d221]">
        <slot />
      </div>
    </div>
  </div>
</template>