<template>
    <div>
        <h4>PAZ Y PREVENCIÓN DE CONFLICTOS</h4>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="51_1">
            <label class="form-check-label" for="1">
                Potenciar la capacidad de las personas y comunidades para transformar los conflictos y construir la paz.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="51_2">
            <label class="form-check-label" for="2">
                Capacitar a los integrantes de la comunidad en campos como la educación, el liderazgo para la paz y la prevención y resolución de conflictos.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="51_3">
            <label class="form-check-label" for="3">
                Proporcionar servicios que contribuyen a integrar en la sociedad a los grupos vulnerables.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="51_4">
            <label class="form-check-label" for="4">
                Mejorar el diálogo y las relaciones en la comunidad para determinar el mejor modo de administrar los recursos naturales.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="51_5">
            <label class="form-check-label" for="5">
                Otorgar becas de postgrado para profesionales en el campo de la paz y la prevención de conflictos.
            </label>
        </div>

        <Step5MeasuresTable :id="51" :measures="$store.state.step5.measures" />

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

        <step-5-measures-modal :id="51" title="PAZ Y PREVENCIÓN DE CONFLICTOS" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
    </div>
</template>

<script>
import Step5MeasuresTable from '@/Components/Step5MeasuresTable.vue'
import Step5MeasuresModal from '../Step5MeasuresModal.vue'

export default {
    components: {
        Step5MeasuresTable,
        Step5MeasuresModal
    },
    mounted: function () {
        if (this.$store.state.step5.monitoring_51 == undefined) {
            this.$store.state.step5.monitoring_51 = {
                evaluation: 0,
                name: '',
                explication: '',
                person_name: '',
            }
        }
    },
    data(){
        return {
            modalMeasures: [
                "Número de grupos y organizaciones que participan en los esfuerzos de consolidación de la paz",
                "Número de personas capacitadas",
                "Número de conflictos mediados",
                "Número de comunidades que informan una reducción en el nivel de conflicto",
                "Otro",
            ],
            modalInformations: [
                "Observación directa",
                "Grupos focales/entrevistas",
                "Registros e informes de subvenciones",
                "Registros Públicos",
                "Imágenes de satélite",
                "Encuestas/cuestionarios",
                "Pruebas",
            ],
            modalFrecuencies: [
                "Cada semana",
                "Cada dos semanas",
                "Cada mes",
                "Cada dos meses",
                "Cada tres meses",
                "Cada cuatro meses",
                "Cada cinco meses",
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
                if (this.$store.state.step5.monitoring_51 == undefined) {
                    this.$store.state.step5.monitoring_51 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_51.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_51.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_51 == undefined) {
                    this.$store.state.step5.monitoring_51 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_51.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_51.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_51 == undefined) {
                    this.$store.state.step5.monitoring_51 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_51.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_51.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_51 == undefined) {
                    this.$store.state.step5.monitoring_51 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_51.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_51.person_name = value
            }
        },
    }
}
</script>
