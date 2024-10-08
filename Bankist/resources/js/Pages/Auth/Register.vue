<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import DatePicker from "primevue/datepicker";
import { ref } from "vue";
const birthDate = ref('');
import Stepper from "primevue/stepper";
import StepList from "primevue/steplist";
import StepPanels from "primevue/steppanels";
import StepItem from "primevue/stepitem";
import Button from "primevue/button";
import Step from "primevue/step";
import StepPanel from "primevue/steppanel";
import InputText from "primevue/inputtext";
function formatDateToDDMMYY(dateString) {
    const date = new Date(dateString);

    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    const year = String(date.getFullYear()).slice(-2); // Get last 2 digits of the year

    return `${day}-${month}-${year}`;
}
const form = useForm({
  first_name: "",
  last_name: "",
  email: "",
  birth_date: "",
  adress : "",
  password: "",
  password_confirmation: "",
  phone_number: "",
});
import Select from 'primevue/select';
const submit = () => {
  form.birth_date = formatDateToDDMMYY(form.birth_date);  
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
const cities = ref([
    { name: 'New York', code: 'NY' },
    { name: 'Rome', code: 'RM' },
    { name: 'London', code: 'LDN' },
    { name: 'Istanbul', code: 'IST' },
    { name: 'Paris', code: 'PRS' }
]);
</script>

<template>
  <GuestLayout>
    <Head title="Register" />
    <form @submit.prevent="submit">
      <p class="text-center text-lg">Create an account</p>
      
      <Stepper value="1">
        <StepItem value="1">
          <Step>First & last name</Step>
          <StepPanel v-slot="{ activateCallback }">
            <div class="flex flex-col h-60">
              <div
                class=" px-10  border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex flex-col justify-center items-stretch font-medium"
              >
                <div>
                  <InputLabel for="first_name" value="First name" />

                  <TextInput
                    id="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.first_name"
                    required
                    autofocus
                    autocomplete="first_name"
                  />

                  <InputError class="mt-2" :message="form.errors.first_name" />
                </div>

                <div class="mt-4">
                  <InputLabel for="last_name" value="Last name" />

                  <TextInput
                    id="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.last_name"
                    required
                    autofocus
                    autocomplete="last_name"
                  />

                  <InputError class="mt-2" :message="form.errors.last_name" />
                </div>
                <div class="mt-4">
                  <InputLabel for="birth_date" value="Birth date" />
                  <DatePicker
                    v-model="form.birth_date"
                    showIcon
                    fluid
                    dateFormat="dd-mm-yy"
                    class="rounded-xl border-2 mt-1 block "
                    :showOnFocus="false"
                    inputId="buttondisplay"
                  />
                </div>
              </div>
            </div>
            <div class="py-6">
              <Button label="Next" @click="activateCallback('2')" />
            </div>
          </StepPanel>
        </StepItem>
        <StepItem value="2">
          <Step>Email & phone</Step>
          <StepPanel v-slot="{ activateCallback }">
            <div class="flex flex-col h-60">
              <div
              class=" px-10  border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex flex-col justify-center items-stretch font-medium"
              >
                <div class="mt-4">
                  <InputLabel for="email" value="Email" />

                  <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                  />

                  <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mt-4">
                  <InputLabel for="phone_number" value="Phone number" />

                  <TextInput
                    id="phone_number"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.phone_number"
                    required
                    autofocus
                    autocomplete="phone_number"
                  />

                  <InputError
                    class="mt-2"
                    :message="form.errors.phone_number"
                  />
                </div>
                <div>
                  <InputLabel for="adress" value="Adress" />

                  <Select v-model="form.adress" :options="cities" optionValue="name" optionLabel="name" placeholder="Select a City" class="mt-1 block w-full" />

                  <InputError class="mt-2" :message="form.errors.adress" />
                </div>
              </div>
            </div>
            <div class="flex py-6 gap-2">
              <Button
                label="Back"
                severity="secondary"
                @click="activateCallback('1')"
              />
              <Button label="Next" @click="activateCallback('3')" />
            </div>
          </StepPanel>
        </StepItem>
        <StepItem value="3">
          <Step>Password</Step>
          <StepPanel v-slot="{ activateCallback }">
            <div class="flex flex-col h-48">
              <div
              class=" px-10  border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex flex-col justify-center items-stretch font-medium"
              >
                <div class="mt-4">
                  <InputLabel for="password" value="Password" />

                  <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                  />

                  <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                  <InputLabel
                    for="password_confirmation"
                    value="Confirm Password"
                  />

                  <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                  />

                  <InputError
                    class="mt-2"
                    :message="form.errors.password_confirmation"
                  />
                </div>
              </div>
            </div>
            <div class="py-6">
              <Button
                label="Back"
                severity="secondary"
                @click="activateCallback('2')"
              />
            </div>
          </StepPanel>
        </StepItem>
      </Stepper>

      <div class="mt-4 flex items-center justify-end">
        <Link
          :href="route('login')"
          class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          Already registered?
        </Link>

        <PrimaryButton
          class="ms-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Register
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
