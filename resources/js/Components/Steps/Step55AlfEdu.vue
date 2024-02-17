<template>
    <div>
        <h3>ALFABETIZACIÓN Y EDUCACIÓN BÁSICA</h3>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_1">
            <label class="form-check-label">
                Apoyar programas destinados a fortalecer la capacidad de las comunidades para proporcionar educación básica y alfabetización a todos sus integrantes.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_2">
            <label class="form-check-label">
                Aumentar el nivel de alfabetización de los adultos.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_3">
            <label class="form-check-label">
                Trabajar para reducir la disparidad educativa entre los géneros.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_4">
            <label class="form-check-label">
                Financiar becas de postgrado para profesionales en campos relacionados con la alfabetización y la educación básica.
            </label>
        </div>

        <Step5MeasuresTable :id="55" :measures="$store.state.step5.measures55"/>

        <div class="mb-3">
            <label class="form-label">¿Ya sabes quíen recopilará la información necesario para la evaluación y el monitoreo?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="1" v-model="evaluation">
                <label class="form-check-label">{{ $lang?.layout?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="0" v-model="evaluation">
                <label class="form-check-label">{{ $lang?.layout?.no }}</label>
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

        <step-5-measures-modal :id="55" title="ALFABETIZACIÓN Y EDUCACIÓN BÁSICA" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
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
                "Número de niños beneficiados en edad escolar",
                "Número de nuevos estudiantes en edad escolar.",
                "Número de nuevas niñas estudiantes en edad escolar.",
                "Número de profesores recibiendo entrenamiento en educación de adultos.",
                "Número de adultos recibiendo entrenamiento en alfabetización.",
                "Número de instituciones participando en el programa.",
                "Número de adultos usando nuevas habilidades de alfabetización .",
                "Número de nuevos puestos docentes creados.",
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
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.person_name = value
            }
        },
    }
}
</script>
