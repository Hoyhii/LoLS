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

    isLoggedIn: {
        type: Boolean,
    }
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
        <div class="p-4 sm:p-8 bg-div text-white shadow sm:rounded-lg">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <section>
            <header>
                <h2 class="text-lg font-medium text-white">Add Summoner</h2>

                <p class="mt-1 text-sm text-white">
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
                    <InputLabel for="region" value="Region" class="pb-1"/>

                    <SelectInput id="region" v-model="form.region" :options="regions"  class="bg-button" />

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
                        <p v-if="form.recentlySuccessful" class="text-sm text-white">Summoner Added.</p>
                    </Transition>
                </div>
            </form>

        </section>
            </div>
        </div>
    </Summoner>

</template>

