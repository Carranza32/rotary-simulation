<template>
    <div>
        <h3>MEDIOAMBIENTE</h3>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_1">
            <label class="form-check-label">
                Proteger y restaurar los recursos terrestres, costeros, marinos y de agua dulce.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_2">
            <label class="form-check-label">
                Mejorar la capacidad de las comunidades y los gobiernos locales para apoyar la gestión y conservación de los recursos naturales.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_3">
            <label class="form-check-label">
                Apoyar la agroecología y las prácticas de agricultura, pesca y acuicultura sostenibles para mejorar la salud ecológica.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_4">
            <label class="form-check-label">
                Abordar las causas del cambio climático y de la alteración del clima y apoyar soluciones para reducir la emisión de gases de efecto invernadero.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_5">
            <label class="form-check-label">
                Fortalecimiento de la resiliencia de los ecosistemas y las comunidades afectadas por el cambio climático y la alteración del clima.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_6">
            <label class="form-check-label">
                Apoyar la educación para promover comportamientos que protejan el medioambiente.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_7">
            <label class="form-check-label">
                Abogar por el consumo sostenible de productos y la gestión ambientalmente racional de los desechos para construir una economía más eficiente en el uso de los recursos.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_8">
            <label class="form-check-label">
                Abordar las cuestiones de justicia ambiental y las preocupaciones de salud pública en materia de medioambiente.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="57_9">
            <label class="form-check-label">
                Financiar becas para profesionales de campos relacionados con el medioambiente
            </label>
        </div>

        <Step5MeasuresTable :id="57" :measures="$store.state.step5.measures57"/>

        <div class="mb-3">
            <label class="form-label">¿Ya sabes quíen recopilará la información necesario para la evaluación y el monitoreo?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="1" v-model="evaluation">
                <label class="form-check-label">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="0" v-model="evaluation">
                <label class="form-check-label">No</label>
            </div>
        </div>

        <div class="my-3" v-if="evaluation == true">
            <div class="mb-3">
                <label class="form-label">Nombre de la empresa u organización</label>
                <input type="text" class="form-control" v-model="name">
            </div>

            <div class="mb-3">
                <label for="textarea" class="form-label">
                    Explica brevemente por qué esta persona u organización están capacitadas para realizar esta tarea.
                </label>

                <textarea class="form-control" id="textarea" rows="5" v-model="explication"></textarea>
            </div>
        </div>

        <div class="my-3" v-if="evaluation == false">
            <div class="mb-3">
                <label for="textarea" class="form-label">
                    Indica cómo buscarás a la persona u organización que se encargará de realizar esta tarea.
                </label>

                <textarea class="form-control" id="textarea" rows="5" v-model="person_name"></textarea>
            </div>
        </div>

        <step-5-measures-modal :id="57" title="MEDIOAMBIENTE" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
    </div>
</template>

<script>
import Step5MeasuresTable from '@/Components/Step5MeasuresTable.vue'
import Step5MeasuresModal from '@/Components/Step5MeasuresModal.vue'

export default {
    components: {
        Step5MeasuresTable,
        Step5MeasuresModal
    },
    data(){
        return {
            modalMeasures: [
                "Número total de beneficiarios directos.",
                "Número de personas entrenadas.",
                "Otros",
            ],
            modalInformations: [
                "Observación directa",
                "Grupos de enfoque/entrevistas",
                "Registros e informes de subvenciones",
                "Registros Públicos",
                "Imágenes de satélite",
                "Encuestas/cuestionarios",
                "Pruebas",
            ],
            modalFrecuencies: [
                "Semanal",
                "Cada dos semanas",
                "Cada mes",
                "Cada dos meses",
                "Cada tres meses",
                "Cada cuatro meses",
                "Cada seis meses",
                "Cada Año",
            ],
            modalBenefits: [
                "1-19",
                "20-49",
                "50-99",
                "100-499",
                "500-999",
                "1000-2499",
                "2500+",
            ],
            evaluation: 0,
            name: '',
            explication: '',
            person_name: '',
        }
    },
    computed: {
        evaluation: {
            get() {
                if (this.$store.state.step5.monitoring_57 == undefined) {
                    this.$store.state.step5.monitoring_57 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_57.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_57.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_57 == undefined) {
                    this.$store.state.step5.monitoring_57 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_57.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_57.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_57 == undefined) {
                    this.$store.state.step5.monitoring_57 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_57.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_57.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_57 == undefined) {
                    this.$store.state.step5.monitoring_57 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_57.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_57.person_name = value
            }
        },
    }
}
</script>
