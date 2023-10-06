<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import SelectInput from "@/Components/SelectInput.vue";
import Summoner from "@/Pages/Summoner.vue"

defineProps({
    currentPage:String,
})

const summoner_name = usePage().props.summoner_name;
const regions = usePage().props.regions;
const defaultRegion = usePage().props.defaultRegion;

const form = useForm({
    summoner_name: summoner_name.summoner_name,
    region: summoner_name.region,
});
</script>

<template>
    <Summoner :current-page="currentPage">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Summoner Information</h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Update your summoner's information.
                </p>
            </header>

            <form @submit.prevent="form.put(route('summoner.update', summoner_name.id))" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="summoner_name" value="Summoner Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.summoner_name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.summoner_name" />
                </div>

                <div>
                    <InputLabel for="region" value="Region" />

                    <SelectInput
                        v-model="form.region"
                        :options="regions"
                    />

                    <InputError class="mt-2" :message="form.errors.region" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                    </Transition>
                </div>
            </form>
        </section>
    </Summoner>
</template>
