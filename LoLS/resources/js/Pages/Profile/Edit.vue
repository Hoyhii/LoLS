<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import UpdateSocials from "@/Pages/Profile/Partials/UpdateSocials.vue";
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const currentTab = ref('UpdateProfileInformationForm')

const tabs = {
    UpdateProfileInformationForm,
    UpdateSocials,
    UpdatePasswordForm,
    DeleteUserForm,
}
const tabNames = ref(["Update Profile","Socials","Update Password","Delete user"])

</script>

<template>
    <Head title="Profile" />
    <AuthenticatedLayout>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <button class="px-5 text-lg font-medium text-white"
                        v-for="(_, tab, index) in tabs"
                        :key="tab"
                        :class="['tab-button', { active: currentTab === tab }]"
                        @click="currentTab = tab"
                >
                    {{tabNames[index]}}
                </button>
                <div class="p-4 sm:p-8 bg-div text-white shadow sm:rounded-lg">
                    <component :is="tabs[currentTab]" class="tab"></component>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
