<script setup>
import Button from 'primevue/button';
import Dialog from 'primevue/dialog';
import InputText from 'primevue/inputtext';
import { ref } from 'vue';
const visible = ref(false);
</script>

<template>
    <Button class="btn" label="Show" @click="visible = true" />
    <Dialog v-model:visible="visible" modal header="Edit Profile" :style="{ width: '40rem', }" class="p-10 text-xl scale-125">
            <span class="block mb-8 text-surface-500 dark:text-surface-400">Update your information.</span>
            <div class="flex items-center gap-4 mb-4">
                <label for="username" class="w-24 font-semibold">Username</label>
                <InputText id="username" class="flex-auto rounded-xl" autocomplete="off" />
            </div>
            <div class="flex items-center gap-4 mb-8">
                <label for="email" class="w-24 font-semibold">Email</label>
                <InputText id="email" class="flex-auto rounded-xl" autocomplete="off" />
            </div>
            <div class="flex justify-end gap-2">
                <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
                <Button type="button" label="Save" @click="visible = false"></Button>
            </div>
        </Dialog>

</template>
