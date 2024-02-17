<template>
    <div>
        <h3>AGUA, SANEAMIENTO E HIGIENE</h3>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_1">
            <label class="form-check-label">
                Facilitar el acceso universal y equitativo y accesible al agua potable.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_2">
            <label class="form-check-label">
                Mejorar la calidad del agua mediante la protección y el mantenimiento de los recursos hídricos superficiales o subterráneos, la reducción de la polución y los contaminantes, y la promoción de la reutilización de las aguas residuales.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_3">
            <label class="form-check-label">
                Facilitar el acceso universal y equitativo a servicios mejorados de saneamiento y tratamiento de residuos con el fin de acabar con la práctica de la defecación al aire libre en las comunidades.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_4">
            <label class="form-check-label">
                Mejorar los conocimientos, hábitos y prácticas de higiene de la comunidad para así contribuir a la prevención de la transmisión de enfermedades.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_5">
            <label class="form-check-label">
                Fortalecer las capacidad de los gobiernos, instituciones y comunidades para diseñar, financiar, administrar y mantener servicios de suministro de agua y saneamiento sostenibles.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_6">
            <label class="form-check-label">
                Financiar becas de postgrado para profesionales de campos relacionados con el agua, el saneamiento y la higiene.
            </label>
        </div>

        <Step5MeasuresTable :id="53" :measures="$store.state.step5.measures53"/>

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

        <step-5-measures-modal :id="53" title="AGUA, SANEAMIENTO E HIGIENE" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
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
                "Número de personas con acceso a fuentes mejoradas de agua potable.",
                "Número de personas con acceso a instalaciones de saneamiento mejoradas.",
                "Número de personas con acceso a agua desinfectada a través del tratamiento de agua doméstico.",
                "Número de comunidades con un comité de gobierno en funcionamiento.",
                "Número de comunidades utilizando una estructura de tarifa / uso.",
                "Número de personas capacitadas.",
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
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.person_name = value
            }
        },
    }
}
</script>

