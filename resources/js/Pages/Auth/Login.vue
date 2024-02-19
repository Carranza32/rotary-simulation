<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { useTrans } from '@/Composables/trans';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Login" />

        <div id="okta-sign-in" class="auth-container main-container no-beacon">
            <div class="okta-sign-in-header auth-header">
                <div data-type="beacon-container" class="beacon-container">
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>
                </div>
            </div>

            <div class="auth-content">
                <h2 class="okta-form-title o-form-head">{{ useTrans('auth').singin }}</h2>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" :value="useTrans('auth').email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="form-control mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" :value="useTrans('auth').password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="form-control mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="block mt-4">
                        <label class="flex items-center">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ useTrans('auth').remember }}</span>
                        </label>
                    </div>

                    <div class="o-form-button-bar mt-3">
                        <input class="button button-primary" type="submit" :value="useTrans('auth').singin" id="okta-signin-submit" data-type="save" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="link help js-help"
                        >
                        {{ useTrans('auth').forgot_password }}
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
