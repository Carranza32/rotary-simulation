<template>
    <Head title="Formulario" />

    <AuthenticatedLayout>
        <div class="row mt-5">
            <div class="col-8">
                <div class="primary-bg">
                    <p class="p-3 text-white fw-bold" >
                        <span class="mx-4">District Number: 4240</span>

                        District Status:
                        <span style="color: #9add6b;"><i class="fa-solid fa-circle-check"></i> Distrito certificado</span>
                    </p>
                </div>

                <h4 class="title-color my-3">Solicitud de Subvención Global</h4>

                <p class="mt-5 mb-3"><strong>Todos los campos son obligatorios salvo que se indique que son optativos.</strong></p>

                <accordion id="step-1" title="Paso #1 Información general">
                    <Step1 />
                </accordion>

                <accordion id="step-2" title="Paso #2">
                    <Step2 />
                </accordion>

                <accordion id="step-2" title="Paso #2">
                    <p><strong>Contactos principales</strong></p>

                    PRIMER CONTACTO PRINCIPAL
                    Has sido designado automáticamente como contacto principal del proyecto. Antes de seleccionar al segundo, háblanos sobre tu papel y los patrocinadores del proyecto.
                    Tu papel
                    Local  Internacional

                    Tu patrocinador
                    Distrito  Club


                    SEGUNDO CONTACTO PRINCIPAL
                    ¿Quién es el contacto principal internacional? Búscalo en los campos de búsqueda que figuran continuación.
                    Su patrocinador
                    Distrito  Rotaract Club  Rotary Club

                </accordion>
            </div>
            <aside class="col-4">
                Aside
            </aside>
        </div>
    </AuthenticatedLayout>
</template>

<script>
    import { Head } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Accordion from '@/Components/Accordion.vue';
    import Step1 from '@/Components/Steps/Step1.vue';
    import Step2 from '@/Components/Steps/Step2.vue';

    export default {
        components: {
            AuthenticatedLayout,
            Head,
            Accordion,
            Step1,
            Step2
        },
    }
</script>
