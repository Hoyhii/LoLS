<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="bg-header block w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-gray-100 dark:hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out "
    >
        <slot />
    </Link>
</template>
