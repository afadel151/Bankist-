<template>
    <div :class="received == true ? 'bg-green-600' : 'bg-orange-600'" class="w-full text-white h-16  shadow-md px-4 rounded-xl flex justify-between items-center border-b">
        <p class=" font-bold">15-10-2024</p>
        <div>
            <p>Amine Harchouche</p>
        </div>
        <p>150$</p>
    </div>
</template>

<script setup>
defineProps({
    received: Boolean
})

</script>