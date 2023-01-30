<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import countries from "@/Utils/countries.json";

    const form = useForm({
        name: "",
        email: "",
        password: "",
        countries: countries,
        country: "",
        district: "",
        club: "",
        phone: "",
        position: "",
        password_confirmation: "",
        terms: false,
    });

    const submit = () => {
        form.post(route("register"), {
            onFinish: () => form.reset("password", "password_confirmation"),
        });
    };
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div id="okta-register" data-label="OneColumn" class="container my-5">
            <h1 class="h2">Crea una cuenta</h1>
            <p>
                <span class="mr-3">¿Ya dispones de una cuenta en Mi Rotary?</span>
                <Link :href="route('login')" type="button" class="uppercase inline-flex items-center font-bold text-bright-blue-600 text-xs leading-xs-heading">
                    Abrir sesión
                    <svg
                        width="12"
                        height="12"
                        class="ml-2 fill-current text-bright-blue-600"
                        viewBox="0 0 16 24"
                        fill="currentColor"
                    >
                        <path
                            d="M0 3L3.2608 0L16 12L3.2608 24L0 21L9.6 12L0 3Z"
                            fill="currentColor"
                        ></path>
                    </svg>
                </Link>
            </p>
            <form action="#" @submit.prevent="submit">
                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="name"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Nombre(s)</span
                            ><span aria-hidden="true">*</span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="name"
                            name="name"
                            type="text"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                </div>

                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="email"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Correo electrónico</span
                            ><span aria-hidden="true">*</span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="email"
                            name="email"
                            type="text"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                </div>
                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="country"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>País</span
                            ><span aria-hidden="true"></span></label
                        >
                    </div>
                    <div class="relative">
                        <select
                            id="country"
                            name="country"
                            type="text"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.country"
                            required
                            autocomplete="country">

                            <option v-for="country in form.countries" :value="country" :key="country[0]">
                                {{ country }}
                            </option>

                        </select>

                        <InputError class="mt-2" :message="form.errors.country" />
                    </div>
                </div>

                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="district"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Distrito</span
                            ><span aria-hidden="true"></span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="district"
                            name="district"
                            type="text"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.district"
                            required
                            autocomplete="username"
                            maxlength="4"
                        />

                        <InputError class="mt-2" :message="form.errors.district" />
                    </div>
                </div>

                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="club"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Club rotatorio</span
                            ><span aria-hidden="true"></span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="club"
                            name="club"
                            type="text"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.club"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.club" />
                    </div>
                </div>

                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="phone"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Teléfono</span
                            ><span aria-hidden="true"></span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="phone"
                            name="phone"
                            type="text"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.phone"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>
                </div>

                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="position"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Cargo</span
                            ><span aria-hidden="true"></span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="position"
                            name="position"
                            type="text"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.position"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.position" />
                    </div>
                </div>


                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="password"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Contraseña</span
                            ><span aria-hidden="true">*</span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="password"
                            name="password"
                            type="password"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>
                </div>

                <div class="form-element mb-4">
                    <div class="flex items-center mb-3">
                        <label
                            for="password_confirmation"
                            class="text-small font-bold block text-gray-600 block"
                            ><span>Confirmar Contraseña</span
                            ><span aria-hidden="true">*</span></label
                        >
                    </div>
                    <div class="relative">
                        <TextInput
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="border shadow-none border-gray-300 focus:border-dark-blue-400 rounded-sm w-full py-3 px-4 text-xs leading-loose focus-visible:outline-0 focus:shadow-none placeholder-gray-400"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>
                </div>
                <!-- <div class="form-element mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <label
                            for="youthFlag"
                            class="text-small font-bold d-block text-gray-600 d-block"
                            ><span>¿Tienes 18 años de edad o más?</span
                            ><span aria-hidden="true">*</span></label
                        >
                    </div>
                    <div class="relative">
                        <div class="RadioOption mr-auto">
                            <input
                                data-testid="youthFlag-yes"
                                type="radio"
                                name="youthFlag"
                                class="RadioInput"
                                aria-label="youthFlag-yes"
                                id="youthFlag-yes"
                                value="yes"
                            />
                            <div class="align-items-center d-inline-flex mb-2 text-xs">
                                <label
                                    data-testid="label-youthFlag-yes"
                                    class="RadioLabel"
                                    for="youthFlag-yes"
                                    ><span>Sí</span></label
                                >
                            </div>
                        </div>
                        <div class="RadioOption me-auto">
                            <input
                                data-testid="youthFlag-no"
                                type="radio"
                                name="youthFlag"
                                class="RadioInput"
                                aria-label="youthFlag-no"
                                id="youthFlag-no"
                                value="no"
                            />
                            <div class="align-items-center d-inline-flex mb-2 text-xs">
                                <label
                                    data-testid="label-youthFlag-no"
                                    class="RadioLabel"
                                    for="youthFlag-no"
                                    ><span>No</span></label
                                >
                            </div>
                        </div>
                    </div>
                </div> -->
                <hr
                    class="border-t-0 border-b border-gray-300 w-full mt-6 desktop:mt-16 mb-6"
                />
                <p class="text-sm font-extralight">
                    <span>
                        Al crear una cuenta aceptas las
                        <a>Condiciones de uso</a> y muestras tu conformidad con
                        nuestra <a>Política de privacidad</a>.</span
                    >
                </p>
                <!-- <div>
                    <div>
                        <div style="width: 304px; height: 78px">
                            <div>
                                <iframe
                                    title="reCAPTCHA"
                                    src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdfeGMUAAAAACQdcAJgGO0UOk_wgLAbRL06-9Wk&amp;co=aHR0cHM6Ly9teS5yb3Rhcnkub3JnOjQ0Mw..&amp;hl=es&amp;type=image&amp;v=RGRQD9tdxHtnt-Bxkx9pM75S&amp;theme=light&amp;size=normal&amp;badge=bottomright&amp;cb=bv1x4asqaj5d"
                                    width="304"
                                    height="78"
                                    role="presentation"
                                    name="a-w4cn6xcx2b1a"
                                    frameborder="0"
                                    scrolling="no"
                                    sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"
                                ></iframe>
                            </div>
                            <textarea
                                id="g-recaptcha-response-1"
                                name="g-recaptcha-response"
                                class="g-recaptcha-response"
                                style="
                                    width: 250px;
                                    height: 40px;
                                    border: 1px solid rgb(193, 193, 193);
                                    margin: 10px 25px;
                                    padding: 0px;
                                    resize: none;
                                    display: none;
                                "
                            ></textarea>
                        </div>
                        <iframe style="display: none"></iframe>
                    </div>
                </div> -->
                <button
                    data-testid=""
                    class="d-inline-block tracking-wide w-full tablet:w-auto transition ease-in-out duration-150 font-bold uppercase min-w-16 justify-content-center text-center px-6 rounded-full py-4 bg-gray-300 cursor-not-allowed text-white"
                    type="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Continuar
                </button>
            </form>
        </div>

        <!-- <form >

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <PrimaryButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Register
                </PrimaryButton>
            </div>
        </form> -->
    </GuestLayout>
</template>
