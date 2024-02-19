<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';
import { useTrans } from '@/Composables/trans';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">{{ useTrans('profile')?.delete_account }}</h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ useTrans('profile')?.delete_account_description }}
            </p>
        </header>

        <DangerButton data-bs-toggle="modal" data-bs-target="#deleteModal" @click="confirmUserDeletion">{{ useTrans('profile')?.delete_account }}</DangerButton>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-card-shadow">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">{{ useTrans('profile')?.delete_account_warning_title }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="p-6">
                            <p class="text-sm text-gray-600">
                                {{ useTrans('profile')?.delete_account_warning }}
                            </p>

                            <div class="my-4">
                                <InputLabel for="password" :value="useTrans('profile')?.password" class="sr-only" />

                                <TextInput
                                    id="password"
                                    ref="passwordInput"
                                    v-model="form.password"
                                    type="password"
                                    class="mt-1 d-block w-3/4 form-control"
                                    placeholder="Password"
                                    @keyup.enter="deleteUser"
                                />

                                <InputError :message="form.errors.password" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <SecondaryButton data-bs-dismiss="modal"> {{ useTrans('profile')?.cancel }} </SecondaryButton>

                        <DangerButton class="ms-1"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            @click="deleteUser"
                            >
                            {{ useTrans('profile')?.delete_account }}
                        </DangerButton>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
