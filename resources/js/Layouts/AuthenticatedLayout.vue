<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import { useTrans } from '@/Composables/trans';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div class="hidden desktop:block bg-dark-blue-600 text-white">
            <div class="DesktopHeaderTop container text-end text-xs">
                <ul class="d-inline-block">
                    <li class="d-inline-block">
                        <a href="https://www.rotary.org/" class="text-white mr-5 LinkDivider">
                            <svg width="14" height="14" class="d-inline-block align-baseline mr-1 fill-current text-white" viewBox="0 0 12 10" fill="none" style="color: white;"><path d="M11.8468 5.70533L6.49957 0.218335C6.43519 0.149613 6.35792 0.0949338 6.2724 0.0575822C6.18688 0.0202305 6.09488 0.000976562 6.00192 0.000976562C5.90897 0.000976562 5.81697 0.0202305 5.73145 0.0575822C5.64593 0.0949338 5.56866 0.149613 5.50428 0.218335L0.153169 5.70533C-0.120046 5.99533 -0.01759 6.23533 0.379548 6.23533H1.49388V10.4483C1.49388 10.7523 1.50656 11.0003 2.04421 11.0003H4.63975V6.77333H7.35824V11.0003H10.0836C10.4934 11.0003 10.5031 10.7533 10.5031 10.4483V6.23433H11.6194C12.0156 6.23433 12.1171 5.99633 11.8438 5.70433" fill="currentColor"></path></svg>
                            Rotary.org
                        </a>
                    </li>
                </ul>
                <span class="LinkDivider">
                    <label data-testid="language-switcher" for="language-switcher" class="text-white LanguageSwitcher">
                        <span class="sr-only">Cambiar idioma:</span>
                        <select @change="onlanguagechange($event)" id="language-switcher" class="pe-4 bg-transparent appearance-none rounded-none border-0 text-white">
                            <option value="en" lang="en" :selected="locale === 'en'" class="text-black">English</option>
                            <option value="es" lang="es" :selected="locale === 'es'" class="text-black">Español</option>
                        </select>
                    </label>
                </span>
                <div class="ml-3 d-inline-block">
                    <a class="me-3 text-white" :href="route('dashboard')">{{ useTrans('layout').dashboard }}</a>
                    <a class="me-3 text-white" :href="route('profile.edit')">{{ useTrans('layout').profile }}</a>
                    <button class="me-3 text-white" @click="logout()">{{ useTrans('layout').logout }}</button>
                </div>
            </div>
        </div>
        <header>
            <nav class="navbar navbar-expand-lg bg-dark-blue-500 text-white pt-3">
                <div class="container">
                    <div class="w-100 d-flex justify-content-between align-items-start">
                        <div class="mw-100">
                            <a class="d-block hover:shadow-none" title="Volver a la página principal" :href="route('dashboard')">
                                <img src="https://my.rotary.org/logo.png" alt="Rotary International" class="DesktopHeaderLogo"/>
                            </a>
                        </div>
                        <div>
                            <ul class="CallToActionContainer">
                                <li class="CallToActionItem">
                                    <a href="https://www.rotary.org/es/donate" class="CallToActionButton bg-dark-blue-400 font-bold text-bright-blue-100 text-center text-decoration-none hover:underline focus:underline"
                                        >{{ useTrans('layout').donate }}
                                    </a>
                                </li>
                                <li class="CallToActionItem">
                                    <a href="https://www.rotary.org/en/get-involved/join" class="CallToActionButton bg-dark-blue-400 font-bold text-bright-blue-100 text-center text-decoration-none hover:underline focus:underline">{{ useTrans('layout').join }}</a>
                                </li>
                                <nav class="d-inline-block position-relative">
                                    <button type="button" aria-expanded="false" class="w-15 h-15 order-3 border-0">
                                        <span class="sr-only">Mostrar el formulario de búsqueda</span>
                                        <svg width="24" height="24" class="inline-block fill-current text-bright-blue-300" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M22.7471 20.14L16.9475 14.3155C17.7965 12.9726 18.2867 11.3822 18.2867 9.67808C18.2876 4.894 14.4096 1 9.64335 1C4.87709 1 1 4.894 1 9.679C1 14.4649 4.87709 18.3589 9.64335 18.3589C11.2574 18.3589 12.7664 17.9125 14.0609 17.137L19.8998 23L22.7471 20.14ZM4.22072 9.679C4.22072 6.67875 6.6536 4.23583 9.64244 4.23583C12.6322 4.23583 15.0651 6.67783 15.0651 9.679C15.0651 12.6811 12.6322 15.1231 9.64244 15.1231C6.6536 15.1231 4.22072 12.6811 4.22072 9.679Z"
                                                fill="currentColor"
                                            ></path>
                                        </svg>
                                    </button>
                                </nav>
                            </ul>
                        </div>
                    </div>
                    <!-- <Link class="navbar-brand" :href="route('dashboard')">
                        <ApplicationLogo width="30" height="24" />
                    </Link> -->

                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </header>

        <div class="min-h-screen bg-gray-100 container">
            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="">
                <slot />
            </main>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        locale() {
            return this.$page.props.locale
        },
    },
    methods: {
        logout() {
            this.$inertia.post(this.route('logout'))
        },
        onlanguagechange(event) {
            this.$inertia.get(this.route('locale', event.target.value))
        },
        mounted() {
            console.log(locale)
            document.addEventListener('click', (event) => {
                if (showingNavigationDropdown.value && !this.$el.contains(event.target)) {
                    showingNavigationDropdown.value = false
                }
            })
        },
    },
}
</script>
