<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({ //
});
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Welcome</h2>
        </template>
    </GuestLayout>

</template>
