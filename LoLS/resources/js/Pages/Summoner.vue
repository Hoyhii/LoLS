<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { InertiaLink } from '@inertiajs/inertia-vue3';

defineProps({
    currentPage: String,
})
</script>

<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <nav>

                    <InertiaLink :href="route('summoner.create')" class="px-5 text-lg font-medium text-gray-900 dark:text-gray-100">Add new Summoner</InertiaLink>
                    <InertiaLink :href="route('summoner.edit')" class="px-5 text-lg font-medium text-gray-900 dark:text-gray-100">Edit summoners</InertiaLink>

                    <Link :href="route('summoner.create')" class="px-5 text-lg font-medium text-white">Add new Summoner</Link>
                    <Link :href="route('summoner.edit')" class="px-5 text-lg font-medium text-white">Edit summoners</Link>

                </nav>

                <article class="mt-10">
                    <slot />
                </article>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
