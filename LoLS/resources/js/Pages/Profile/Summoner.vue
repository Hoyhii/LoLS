<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import AddSummoner from "@/Pages/Profile/Partials/AddSummoner.vue";
import EditSummoner from "@/Pages/Profile/Partials/EditSummoner.vue";

const currentTab = ref('AddSummoner')

const tabs = {
    AddSummoner,
    EditSummoner,
}
const tabNames = ref(["Add new Summoner","Edit summoners"])

</script>

<template>
    <Head title="Summoner" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Summoner</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <button class="px-5 text-lg font-medium text-gray-900 dark:text-gray-100"
                        v-for="(_, tab, index) in tabs"
                        :key="tab"
                        :class="['tab-button', { active: currentTab === tab }]"
                        @click="currentTab = tab"
                >
                    {{tabNames[index]}}
                </button>
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <component :is="tabs[currentTab]" class="tab"></component>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
