<template>
    <Head title="demo-subvenciones globales" />
    <AuthenticatedLayout>
        <div class="py-5">
            <div class="d-flex justify-content-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-5">{{ useTrans('dashboard')?.created_forms }}</h2>
                <a :href="route('simulation.form')" class="btn btn-primary ms-auto align-self-baseline">{{ useTrans('dashboard')?.create }}</a>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col" v-for="form in forms" :key="form.id">
                    <a :href="route('simulation.form', form.id)" class="card custom-card custom-shadow h-100 p-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ form.project_name }}</h5>
                            <p class="card-text">{{ form.description }}</p>
                            <p class="card-text"><small class="text-muted">Creado: {{ form.created_at }}</small></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { useTrans } from '@/Composables/trans';

export default {
    props: {
        forms: [],
    },
    components: {
        AuthenticatedLayout,
        Link,
        Head,
    },
    setup() {
        return {
            useTrans,
        };
    },
}
</script>
