<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import SelectInput from "@/Components/SelectInput.vue";
import Summoner from "@/Pages/Summoner.vue"
import {ref} from "vue";

defineProps({
    currentPage: String,
})

const summonerData = usePage().props.summonerData;
const regions = usePage().props.regions;

const selectedSummonerIndex = ref(0);

const form = useForm({
    summoner_name: summonerData[0].summoner_name,
    region: summonerData[0].region,
});


console.log('summonerData:', summonerData);
console.log('regions:', regions);

const selectSummoner = (index) => {
    selectedSummonerIndex.value = index;
    form.summoner_name = summonerData[index].summoner_name;
    form.region = summonerData[index].region;
}
</script>

<template>
    <Summoner :current-page="currentPage">
        <div class="p-4 sm:p-8 bg-div text-white shadow sm:rounded-lg">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <section>
            <header>
                <h2 class="text-lg font-medium text-white">Summoner Information</h2>

                <p class="mt-1 text-sm text-white">
                    Update your summoner's information.
                </p>
            </header>

            <div class="flex flex-wrap gap-2">
                <button
                    v-for="(summoner, index) in summonerData"
                    :key="summoner.id"
                    @click="selectSummoner(index)"
                    :class="{ 'bg-indigo-500': index === selectedSummonerIndex, 'bg-div hover:bg-gray-400': index !== selectedSummonerIndex }"
                    class="py-2 px-4 rounded-md text-white font-medium"
                >
                    {{ summoner.summoner_name }}
                </button>
            </div>

            <form @submit.prevent="form.put(route('summoner.update', {id: summonerData[selectedSummonerIndex].id}))" class="mt-6 space-y-6">
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
                    <InputLabel for="region" value="Region" class="pb-2"/>

                    <SelectInput
                        v-model="form.region"
                        :options="regions"
                        class="bg-button"
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
                        <p v-if="form.recentlySuccessful" class="text-sm text-white">Saved.</p>
                    </Transition>
                </div>
            </form>
        </section>
            </div>
        </div>
    </Summoner>
</template>
