<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({ //
});
</script>

<template>
    <Head title="Ladders" />
    <component :is="isLoggedIn ? AuthenticatedLayout : GuestLayout">

    </component>
</template>
