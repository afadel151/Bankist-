<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Button from 'primevue/button';
defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-green-600 text-sm">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <Button icon="pi pi-google " severity="secondary" class="w-full" label="Login with Google" />
            <div class="mt-2">
                <InputLabel for="email" value="Email or Phone number" />

                <TextInput
                    id="email"
                    type="email"
                    class="block mt-1 w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="block mt-1 w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="text-gray-600 text-sm ms-2"
                        >Remember me</span
                    >
                </label>
            </div>

            <div class="flex justify-end items-center mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="rounded-md focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-gray-600 text-sm hover:text-gray-900 underline focus:outline-none"
                >
                    Forgot your password?
                </Link>

                <Button
                    class="ms-4"
                    label="Log in"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                />
                   
            </div>
        </form>
    </GuestLayout>
</template>
