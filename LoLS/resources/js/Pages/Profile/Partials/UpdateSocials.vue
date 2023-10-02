<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';


const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    country: user.country,
    role: user.role,
    youtube: user.youtube || '',
    twitch: user.twitch || '',
    discord: user.discord || '',
    twitter: user.twitter || '',
    leaguepedia: user.leaguepedia || '',
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Socials</h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Update your account's socials.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <div>
                <InputLabel for="youtube" value="Youtube" />

                <TextInput
                    id="youtube"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.youtube"
                    autofocus
                    autocomplete="youtube"
                />

                <InputError class="mt-2" :message="form.errors.youtube" />
            </div>

            <div>
                <InputLabel for="twitch" value="Twitch" />

                <TextInput
                    id="twitch"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.twitch"
                    autofocus
                    autocomplete="twitch"
                />

                <InputError class="mt-2" :message="form.errors.twitch" />
            </div>

            <div>
                <InputLabel for="discord" value="Discord" />

                <TextInput
                    id="discord"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.discord"
                    autofocus
                    autocomplete="discord"
                />

                <InputError class="mt-2" :message="form.errors.discord" />
            </div>

            <div>
                <InputLabel for="twitter" value="Twitter" />

                <TextInput
                    id="twitter"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.twitter"
                    autofocus
                    autocomplete="twitter"
                />

                <InputError class="mt-2" :message="form.errors.twitter" />
            </div>

            <div>
                <InputLabel for="leaguepedia" value="Leaguepedia" />

                <TextInput
                    id="leaguepedia"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.leaguepedia"
                    autofocus
                    autocomplete="leaguepedia"
                />

                <InputError class="mt-2" :message="form.errors.leaguepedia" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600 dark:text-gray-400">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
