<template>
    <div>
        <h3>SALUD MATERNO-INFANTIL</h3>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="54_1">
            <label class="form-check-label">
                Reducir la tasa de mortalidad neonatal.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="54_2">
            <label class="form-check-label">
                Reducir la tasa de mortalidad y morbilidad de los niños menores de cinco años.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="54_3">
            <label class="form-check-label">
                Reducir la tasa de mortalidad y morbilidad materna.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="54_4">
            <label class="form-check-label">
                Mejorar el acceso a los servicios médicos esenciales, los trabajadores comunitarios de salud capacitados y a los proveedores de servicios de atención de la salud.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="54_5">
            <label class="form-check-label">
                Financiar becas de postgrado para profesionales en campos relacionados con la salud materno-infantil.
            </label>
        </div>

        <Step5MeasuresTable :id="54" :measures="$store.state.step5.measures54"/>

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

        <step-5-measures-modal :id="54" title="SALUD MATERNO-INFANTIL" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
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
                "Número de niños menores de 5 años recibiendo tratamiento médico.",
                "Número de madres recibiendo cuidado prenatal.",
                "Número de profesionales de la salud materno-infantil capacitados.",
                "Número de comunidades que reportan disminución de tasa de mortalidad de niños menores de 5 años.",
                "Número de comunidades que reportan disminución de tasa de morbilidad de niños menores de 5 años.",
                "Número de comunidades que reportan disminución de tasa de mortalidad de madres.",
                "Número de comunidades que reportan disminución de tasa de morbilidad de madres.",
                "Número de establecimientos de salud beneficiados.",
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
                if (this.$store.state.step5.monitoring_54 == undefined) {
                    this.$store.state.step5.monitoring_54 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_54.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_54.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_54 == undefined) {
                    this.$store.state.step5.monitoring_54 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_54.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_54.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_54 == undefined) {
                    this.$store.state.step5.monitoring_54 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_54.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_54.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_54 == undefined) {
                    this.$store.state.step5.monitoring_54 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_54.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_54.person_name = value
            }
        },
    }
}
</script>
