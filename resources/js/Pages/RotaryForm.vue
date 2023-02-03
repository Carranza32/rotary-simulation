<template>
    <Head title="Formulario" />

    <AuthenticatedLayout>
        <div class="row mt-5">
            <div class="col-8">
                <div class="primary-bg">
                    <p class="p-3 text-white fw-bold" >
                        <span class="mx-4">District Number: {{ user?.district }}</span>

                        District Status:
                        <span style="color: #9add6b;"><i class="fa-solid fa-circle-check"></i> Distrito certificado</span>
                    </p>
                </div>

                <h4 class="title-color my-3">Solicitud de Subvención Global</h4>

                <p class="mt-5 mb-3"><strong>Todos los campos son obligatorios salvo que se indique que son optativos.</strong></p>

                <div class="accordion accordion-flush" style="margin: 2px 0px;" id="accordionStepper">
                    <accordion id="step-1" title="Paso #1 Información general">
                        <Step1 />
                    </accordion>

                    <accordion id="step-2" title="Paso #2 Integrantes del comité">
                        <Step2 />
                    </accordion>

                    <accordion id="step-3" title="Paso #3 Panorama general del proyecto">
                        <Step3 />
                    </accordion>

                    <accordion id="step-4" title="Paso #4 Áreas de interés">
                        <Step4 />
                    </accordion>

                    <accordion id="step-5" title="Paso #5 Medición del éxito">
                        <Step5 />
                    </accordion>

                    <accordion id="step-6" title="Paso #6 Sede y fechas">
                        <Step6 />
                    </accordion>

                    <accordion id="step-7" title="Paso #7 Participantes">
                        <Step7 />
                    </accordion>

                    <accordion id="step-8" title="Paso #8 Presupuesto">
                        <Step8 />
                    </accordion>

                    <accordion id="step-9" title="Paso #9 Financiación">
                        <Step9 />
                    </accordion>

                    <accordion id="step-10" title="Paso #10 Sostenibilidad">
                        <Step10 />
                    </accordion>

                    <accordion id="step-11" title="Paso #11 Documentos justificantes">
                        <Step11Documents />
                    </accordion>

                    <accordion id="step-12" title="Paso #12 Autorizaciones">
                        <Step12 />
                    </accordion>
                </div>
            </div>
            <aside class="col-4 p-4">
                Paso actual: {{ $store.state.currentStep }}
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
    import Step6 from '@/Components/Steps/Step6.vue';
    import Step7 from '@/Components/Steps/Step7.vue';
    import Step8 from '@/Components/Steps/Step8.vue';
    import Step9 from '@/Components/Steps/Step9.vue';
    import Step10 from '@/Components/Steps/Step10.vue';
    import Step11Documents from '@/Components/Steps/Step11Documents.vue';
    import Step12 from '@/Components/Steps/Step12.vue';

    export default {
        props: {
            form: Object,
        },
        components: {
            AuthenticatedLayout,
            Head,
            Accordion,
            Step1,
            Step2,
            Step3,
            Step4,
            Step5,
            Step6,
            Step7,
            Step8,
            Step9,
            Step10,
            Step11Documents,
            Step12,
        },
        computed: {
            user() {
                return this.$page.props.auth.user
            },
        },
        mounted() {
            if (this.form) {
                this.$store.commit('setFormState', this.form)
            }
        },
    }
</script>
