<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import SelectInput from '@/Components/SelectInput.vue';
import Summoner from "@/Pages/Summoner.vue"

const form = useForm({
    summoner_name: '',
    region: '',
});

const regions = usePage().props.regions;

defineProps({
    currentPage:String,
})
const submit = () => {
    form.post(route('summoner.store'), {
        summoner_name: form.summoner_name,
        region: form.region,
    });
};
</script>

<template>
    <Summoner :current-page="currentPage">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Add Summoner</h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Add new Summoner to your account.
                </p>
            </header>

            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="summoner_name" value="Summoner Name" />

                    <TextInput
                        id="summoner_name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.summoner_name"
                        required
                        autofocus
                        autocomplete="summoner_name"
                    />

                    <InputError class="mt-2" :message="form.errors.summoner_name" />
                </div>

                <div>
                    <InputLabel for="region" value="Region" />

                    <SelectInput id="region" v-model="form.region" :options="regions" />

                    <p>Selected Option: {{ form.region }}</p>

                    <InputError class="mt-2" :message="form.errors.region" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Add Summoner</PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Summoner Added.</p>
                    </Transition>
                </div>

            </form>
        </section>
    </Summoner>
</template>
