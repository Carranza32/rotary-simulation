<template>
    <div>
        <h3>PREVENCIÓN Y TRATAMIENTO DE ENFERMEDADES</h3>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="52_1">
            <label class="form-check-label">
                Mejorar las competencias de los profesionales médicos locales.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="52_2">
            <label class="form-check-label">
                Promover programas de prevención y tratamiento de enfermedades con el objetivo de contener la propagación de enfermedades transmisibles y reducir la incidencia y las consecuencias de las enfermedades no transmisibles.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="52_3">
            <label class="form-check-label">
                Fortalecer los sistemas de atención sanitaria.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="52_4">
            <label class="form-check-label">
                Proporcionar tratamientos clínicos y de rehabilitación a personas que sufren discapacidades físicas.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="52_5">
            <label class="form-check-label">
                Financiar becas de postgrado para profesionales que se desempeñen en el campo de prevención y tratamiento de enfermedades.
            </label>
        </div>

        <Step5MeasuresTable :id="52" :measures="$store.state.step5.measures52"/>

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

        <step-5-measures-modal :id="52" title="PREVENCIÓN Y TRATAMIENTO DE ENFERMEDADES" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
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
                "Número de médicos y personal de salud entrenados.",
                "Número de personas que informan una mejor calidad de servicios de cuidado de la salud.",
                "Número de beneficiarios de la intervención de prevención de enfermedades.",
                "Número de comunidades reportando disminución en casos de enfermedades.",
                "Número de establecimientos de salud beneficiados.",
                "Número de comunidades reportando incremento en el acceso de establecimientos de salud.",
                "Número de eventos enfocados en la salud.",
                "Número de campañas educativas de salud.",
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
                if (this.$store.state.step5.monitoring_52 == undefined) {
                    this.$store.state.step5.monitoring_52 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_52.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_52.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_52 == undefined) {
                    this.$store.state.step5.monitoring_52 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_52.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_52.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_52 == undefined) {
                    this.$store.state.step5.monitoring_52 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_52.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_52.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_52 == undefined) {
                    this.$store.state.step5.monitoring_52 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_52.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_52.person_name = value
            }
        },
    }
}
</script>
