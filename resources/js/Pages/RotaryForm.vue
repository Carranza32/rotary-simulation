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

                <vue3-html2pdf
                    :show-layout="false"
                    :float-layout="true"
                    :enable-download="true"
                    :preview-modal="true"
                    :paginate-elements-by-height="1400"
                    filename="formulario"
                    :pdf-quality="2"
                    :manual-pagination="false"
                    pdf-format="a4"
                    :pdf-margin="10"
                    pdf-orientation="portrait"
                    pdf-content-width="800px"
                    :html-to-pdf-options="pdfoptions"
                    @progress="onProgress($event)"
                    ref="html2Pdf"
                >

                    <template v-slot:pdf-content>
                        <div id="pdf-content">
                            <div class="primary-bg">
                                <p class="p-3 text-white fw-bold" >
                                    <span class="mx-4">District Number: {{ user?.district }}</span>

                                    District Status:
                                    <span style="color: #9add6b;"><i class="fa-solid fa-circle-check"></i> Distrito certificado</span>
                                </p>
                            </div>

                            <h4 class="title-color my-3">Solicitud de Subvención Global</h4>

                            <AccordionPdf id="step-1" title="Paso #1 Información general">
                                <Step1 />
                            </AccordionPdf>

                            <AccordionPdf id="step-2" title="Paso #2 Integrantes del comité">
                                <Step2 />
                            </AccordionPdf>

                            <AccordionPdf id="step-3" title="Paso #3 Panorama general del proyecto">
                                <Step3 />
                            </AccordionPdf>

                            <AccordionPdf id="step-4" title="Paso #4 Áreas de interés">
                                <Step4 />
                            </AccordionPdf>

                            <AccordionPdf id="step-5" title="Paso #5 Medición del éxito">
                                <Step5 />
                            </AccordionPdf>

                            <AccordionPdf id="step-6" title="Paso #6 Sede y fechas">
                                <Step6 />
                            </AccordionPdf>

                            <AccordionPdf id="step-7" title="Paso #7 Participantes">
                                <Step7 />
                            </AccordionPdf>

                            <AccordionPdf id="step-8" title="Paso #8 Presupuesto">
                                <Step8 />
                            </AccordionPdf>

                            <AccordionPdf id="step-9" title="Paso #9 Financiación">
                                <Step9 />
                            </AccordionPdf>

                            <AccordionPdf id="step-10" title="Paso #10 Sostenibilidad">
                                <Step10 />
                            </AccordionPdf>

                            <AccordionPdf id="step-11" title="Paso #11 Documentos justificantes">
                                <Step11Documents />
                            </AccordionPdf>

                            <AccordionPdf id="step-12" title="Paso #12 Autorizaciones">
                                <Step12 />
                            </AccordionPdf>
                        </div>
                    </template>

                </vue3-html2pdf>

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

                    <accordion id="step-documents" title="Documentos justificantes">
                        <Step11Documents />
                    </accordion>

                    <accordion id="step-11" title="Paso #11 Repaso y bloqueo de la solicitud”">
                        <Step11 />
                    </accordion>

                    <accordion id="step-12" title="Paso #12 Autorizaciones">
                        <Step12 />

                        <div class="progress mb-3" v-show="loading">
                            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" :style="{ 'width': loading + '%' }" :aria-valuenow="loading" aria-valuemin="0" aria-valuemax="100">Generando: {{ loading }}%</div>
                        </div>
                        <div @click="generatePDF()" class="btn btn-primary">
                            Generar PDF
                        </div>

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
    import AccordionPdf from '@/Components/AccordionPdf.vue';
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
    import Step11 from '@/Components/Steps/Step11.vue';
    import Step12 from '@/Components/Steps/Step12.vue';
    import Vue3Html2pdf from 'vue3-html2pdf'

    export default {
        props: {
            form: Object,
        },
        data() {
            return {
                pdfoptions: {
                    margin: 0.2,
                    filename: 'Formulario.pdf',
                    pagebreak:  { after: '.sautDePage' },
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 1, letterRendering: true },
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
                },
                loading: 0,
            }
        },
        components: {
            AuthenticatedLayout,
            Head,
            Accordion,
            AccordionPdf,
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
            Step11,
            Step12,
            Vue3Html2pdf,
        },
        computed: {
            user() {
                return this.$page.props.auth.user
            },
        },
        methods: {
            onProgress(event) {
                this.loading = event
            },
            hasGenerated() {
                alert("PDF generated successfully!");
            },
            generatePDF() {
                this.$refs.html2Pdf.generatePdf()
            },
        },
        mounted() {
            if (this.form) {
                this.$store.commit('setFormState', this.form)
                this.$store.commit('setFormId', this.form?.id)
            }

            let button = document.querySelector('#collapsestep-' + this.$store.state.currentStep + ' button')

            button.disabled = false

            button.click()

            button.disabled = true
        },
        watch: {
            '$store.state.currentStep': function (val) {
                let button = document.querySelector('#collapsestep-' + val + ' button')

                // button.disabled = false

                button.click()

                // button.disabled = true
            }
        },
    }
</script>
