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
      <div class="w-full bg-[radial-gradient(circle,rgba(0,0,0,0.075)_1.5px,transparent_1px)] bg-[length:10px_10px] ">
        <slot />
      </div>
    </div>
  </div>
</template>