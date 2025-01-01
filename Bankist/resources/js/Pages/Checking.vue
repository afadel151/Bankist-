<script setup>
import Account from '@/Components/AccountHeader.vue';
import BankDashboard from '@/Components/BankDashboard.vue';
import MyLayout from '@/Layouts/MyLayout.vue';

</script>
<template>
    <MyLayout>
        <div class="w-full px-[15rem] h-full">
            <div class="w-full h-full pt-20  flex flex-col justify-start items-center  ">
                <BankDashboard />
            </div>
        </div>

    </MyLayout>
</template>