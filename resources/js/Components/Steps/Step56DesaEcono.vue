<template>
    <div>
        <h3>DESARROLLO ECONÓMICO DE LA COMUNIDAD</h3>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_1">
            <label class="form-check-label">
                Fortalecer la capacidad de los líderes cívicos, organizaciones locales y redes comunitarias para apoyar el desarrollo económico de comunidades empobrecidas.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_2">
            <label class="form-check-label">
                Crear oportunidades de empleo productivo y mejorar el acceso a fuentes de sustento sostenibles.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_3">
            <label class="form-check-label">
                Empoderar a comunidades marginadas brindándoles acceso a servicios y oportunidades económicas.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_4">
            <label class="form-check-label">
                Fortalecer la capacidad de los emprendedores, las empresas sociales y los empresarios innovadores basados en la comunidad.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_5">
            <label class="form-check-label">
                Luchar contra las disparidades de género o clase que impiden que las personas afectadas obtengan empleo productivo y accedan a los mercados y servicios financieros.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_6">
            <label class="form-check-label">
                Mejorar el acceso a fuentes de energía renovables y la adopción de medidas para el ahorro de energía orientadas a crear comunidades sostenibles y económicamente resilientes.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_7">
            <label class="form-check-label">
                Empoderar a las comunidades para que adquieran habilidades para la conservación del medioambiente y los recursos naturales de modo que puedan obtener rendimiento económico de ellos.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_8">
            <label class="form-check-label">
                Fortalecer las capacidades de resiliencia y adaptabilidad económica de las comunidades de modo que puedan responder a los desastres naturales y a los riesgos relacionados con el medioambiente y el cambio climático.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_9">
            <label class="form-check-label">
                Desarrollar y apoyar servicios comunitarios básicos para situaciones de emergencia orientados a mejorar la resiliencia económica.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="56_10">
            <label class="form-check-label">
                Financiar becas para profesionales que se desempeñen en el área de desarrollo económico de las comunidades.
            </label>
        </div>

        <Step5MeasuresTable :id="56" :measures="$store.state.step5.measures56"/>

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

        <step-5-measures-modal :id="56" title="DESARROLLO ECONÓMICO DE LA COMUNIDAD" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
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
                "Número de emprendedores apoyados.",
                "Número de negocios apoyados.",
                "Número de personas entrenadas.",
                "Número de empleados creados.",
                "Número de jóvenes empleados en actividades de generación de ingresos.",
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
                if (this.$store.state.step5.monitoring_56 == undefined) {
                    this.$store.state.step5.monitoring_56 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_56.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_56.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_56 == undefined) {
                    this.$store.state.step5.monitoring_56 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_56.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_56.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_56 == undefined) {
                    this.$store.state.step5.monitoring_56 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_56.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_56.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_56 == undefined) {
                    this.$store.state.step5.monitoring_56 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_56.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_56.person_name = value
            }
        },
    }
}
</script>
