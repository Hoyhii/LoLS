<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/inertia-vue3'; // Correct import
import { RouterLink } from 'vue-router'; // Ha a Vue Router-t használod
import { ref } from 'vue';
import AddSummoner from "@/Pages/AddSummoner.vue";
import EditSummoner from "@/Pages/EditSummoner.vue";

defineProps({
    currentPage: String,
})
</script>

<template>
    <component :is="isLoggedIn ? AuthenticatedLayout : GuestLayout">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <nav>
                    <Link :href="route('summoner.create')" class="px-5 text-lg font-medium text-gray-900 dark:text-gray-100">Add new Summoner</Link>
                    <Link :href="route('summoner.edit', 1)" class="px-5 text-lg font-medium text-gray-900 dark:text-gray-100">Edit summoners</Link>
                </nav>
                <!-- Az oldal tartalma a választott route-nak megfelelően fog betöltődni -->

                <article class="mt-10">
                    <slot />
                </article>
            </div>
        </div>
    </component>
</template>
