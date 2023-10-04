<script setup>
import { Head } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({ //
});
</script>

<template>
    <Head title="Welcome" />
    <GuestLayout>
        <div class="container-fluid bg-main">
            <div class="row justify-content-center text-center pt-4">
                <div class="col col-lg-1 col-6 card bg-div text-white">
                    <div class="card-body">
                       AD
                    </div>
                </div>
                <div class="col col-12 col-lg-1">
                    <div>

                    </div>
                </div>
                <div class="col col-8 col-lg-3 card bg-div text-white">
                    <div class="card-body">
                    Top 10 player
                    </div>
                </div>
                <div class="col col-12 col-lg-1">
                    <div>

                    </div>
                </div>
                <div class="col col-8 col-lg-3 card bg-div text-white">
                    <div class="card-body">
                    Top 1 player/region
                    </div>
                </div>
                <div class="col col-12 col-lg-1">
                    <div>

                    </div>
                </div>
                <div class="col col-lg-1 col-6 card bg-div text-white">
                <div class="card-body">
                    AD
                </div>
            </div>
            </div>
        </div>

    </GuestLayout>

</template>
