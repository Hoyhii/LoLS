<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


defineProps({
    isLoggedIn: {
        type: Boolean,
    }});
</script>

<template>
    <Head title="Dashboard" />
    <component :is="isLoggedIn ? AuthenticatedLayout : GuestLayout">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-div overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">You're logged in!</div>
                </div>
            </div>
        </div>
    </component>
</template>
