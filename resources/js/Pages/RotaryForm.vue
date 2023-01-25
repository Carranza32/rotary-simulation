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

                <accordion id="step-3" title="Paso #3">
					<Step3 />
                </accordion>

                <accordion id="step-4" title="Paso #4 Áreas de interés">
					<Step4 />
                </accordion>

                <accordion id="step-5" title="Paso #5 Medición del éxito">
					<Step5 />
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
    import Step3 from '@/Components/Steps/Step3.vue';
    import Step4 from '@/Components/Steps/Step4.vue';
    import Step5 from '@/Components/Steps/Step5.vue';

    export default {
        components: {
            AuthenticatedLayout,
            Head,
            Accordion,
            Step1,
            Step2,
            Step3,
            Step4,
            Step5,
        },
    }
</script>
