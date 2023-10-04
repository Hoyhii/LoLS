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
        <div class="container-fluid">
            <div class="row justify-content-center text-center pt-4">
                <div class="col col-lg-1 col-6 card">
                    <div class="card-body">
                       AD
                    </div>
                </div>
                <div class="col col-12 col-lg-1">
                    <div>

                    </div>
                </div>
                <div class="col col-8 col-lg-3 card">
                    <div class="card-body">
                    Top 10 player
                    </div>
                </div>
                <div class="col col-12 col-lg-1">
                    <div>

                    </div>
                </div>
                <div class="col col-8 col-lg-3 card">
                    <div class="card-body">
                    Top 1 player/region
                    </div>
                </div>
                <div class="col col-12 col-lg-1">
                    <div>

                    </div>
                </div>
                <div class="col col-lg-1 col-6 card">
                <div class="card-body">
                    AD
                </div>
            </div>
            </div>
        </div>

    </GuestLayout>

</template>
