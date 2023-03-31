
<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <div class="step-5-checks" v-if="$store.state.step4.interest_area">
            <Step5PazPrev v-if="$store.state.step4.interest_area.includes('1')" />
            <Step52PrevTrat v-if="$store.state.step4.interest_area.includes('2')" />
            <Step53AguaSan v-if="$store.state.step4.interest_area.includes('3')" />
            <Step54SaludMatern v-if="$store.state.step4.interest_area.includes('4')" />
            <Step55AlfEdu v-if="$store.state.step4.interest_area.includes('5')" />
            <Step56DesaEcono v-if="$store.state.step4.interest_area.includes('6')" />
            <Step57Ambiente v-if="$store.state.step4.interest_area.includes('7')" />
        </div>

        <hr>

        <p class="fw-bold">¿Cómo medirás el impacto del proyecto? Para más información, consulta la publicación <a href="https://www.rotary.org/myrotary/es/document/global-grant-monitoring-and-evaluation-plan-supplement">Suplemento - Plan de monitoreo y evaluación de Subvenciones Globales</a>. Como parte de la solicitud, deberás incluir al menos una medida estandarizada de las incluidas en el menú desplegable.</p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Medida</th>
                    <th scope="col">Método para obtener la información</th>
                    <th scope="col">Frecuencia</th>
                    <th scope="col">Beneficiarios</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="measure in $store.state.step5.measures" :key="measure.id">
                    <td>{{ measure.measure }}</td>
                    <td>{{ measure.method }}</td>
                    <td>{{ measure.frecuencie }}</td>
                    <td>{{ measure.benefits }}</td>
                </tr>
                <tr>
                    <td><a href="#!" @click="showModal()" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalStep5" >+ Añadir medida</a></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label class="form-label">¿Ya sabes quíen recopilará la información necesario para la evaluación y le monitoreo?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="1" v-model="$store.state.step5.evaluation">
                <label class="form-check-label">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="0" v-model="$store.state.step5.evaluation">
                <label class="form-check-label">No</label>
            </div>
        </div>

        <div class="my-3" v-if="$store.state.step5.evaluation == true">
            <div class="mb-3">
                <label class="form-label">Nombre de la empresa u organización</label>
                <input type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label for="textarea" class="form-label">
                    Explica brevemente por qué esta persona u organización están capacitadas para realizar esta tarea.
                </label>

                <textarea class="form-control" id="textarea" rows="5" ></textarea>
            </div>
        </div>

        <div class="my-3" v-if="$store.state.step5.evaluation == false">
            <div class="mb-3">
                <label for="textarea" class="form-label">
                    Indica cómo buscarás a la persona u organización que se encargará de realizar esta tarea.
                </label>

                <textarea class="form-control" id="textarea" rows="5" ></textarea>
            </div>
        </div>

        <div class="d-flex justify-content-start gap-3 mt-4">
            <button class="btn btn-primary" type="submit">
                Guardar y continuar
            </button>
            <button class="btn btn-outline-primary" type="submit">
                Guardar
            </button>
            <a class="btn btn-link" :href="route('dashboard')">
                Salir
            </a>
        </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="modalStep5" tabindex="-1" aria-labelledby="modalStep5Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalStep5Label">Patrocinadores local</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Medida</label>
                            <select class="form-select" id="measure" aria-label="Default select example">
                                <option value="Número de grupos y organizaciones que participan en los esfuerzos de consolidación de la paz">Número de grupos y organizaciones que participan en los esfuerzos de consolidación de la paz</option>
                                <option value="Número de personas capacitadas">Número de personas capacitadas</option>
                                <option value="Número de conflictos mediados">Número de conflictos mediados</option>
                                <option value="Número de comunidades que informan una reducción en el nivel de conflicto">Número de comunidades que informan una reducción en el nivel de conflicto</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Método para obtener la información</label>
                            <select class="form-select" id="method" aria-label="Default select example">
                                <option value="Observación directa">Observación directa</option>
                                <option value="Grupos focales/entrevistas">Grupos focales/entrevistas</option>
                                <option value="Registros e informes de subvenciones">Registros e informes de subvenciones</option>
                                <option value="Registros Públicos">Registros Públicos</option>
                                <option value="Imágenes de satélite">Imágenes de satélite</option>
                                <option value="Encuestas/cuestionarios">Encuestas/cuestionarios</option>
                                <option value="Pruebas">Pruebas</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label">Frecuencia</label>
                            <select class="form-select" id="frecuencie" aria-label="Default select example">
                                <option value="Cada semana">Cada semana</option>
                                <option value="Cada dos semanas">Cada dos semanas</option>
                                <option value="Cada mes">Cada mes</option>
                                <option value="Cada dos meses">Cada dos meses</option>
                                <option value="Cada tres meses">Cada tres meses</option>
                                <option value="Cada cuatro meses">Cada cuatro meses</option>
                                <option value="Cada cinco meses">Cada cinco meses</option>
                                <option value="Cada Año">Cada Año</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Beneficiarios</label>
                            <select class="form-select" id="benefits" aria-label="Default select example">
                                <option value="1-19">1-19</option>
                                <option value="20-49">20-49</option>
                                <option value="50-99">50-99</option>
                                <option value="100-499">100-499</option>
                                <option value="500-999">500-999</option>
                                <option value="1000-2499">1000-2499</option>
                                <option value="2500+">2500+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="addMeasure()" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import Step5PazPrev from '@/Components/Steps/Step51PazPrev.vue';
import Step52PrevTrat from '@/Components/Steps/Step52PrevTrat.vue';
import Step53AguaSan from '@/Components/Steps/Step53AguaSan.vue';
import Step54SaludMatern from '@/Components/Steps/Step54SaludMatern.vue';
import Step55AlfEdu from '@/Components/Steps/Step55AlfEdu.vue';
import Step56DesaEcono from '@/Components/Steps/Step56DesaEcono.vue';
import Step57Ambiente from '@/Components/Steps/Step57Ambiente.vue';

export default {
    components: {
    Step5PazPrev,
    Step52PrevTrat,
    Step53AguaSan,
    Step54SaludMatern,
    Step55AlfEdu,
    Step56DesaEcono,
    Step57Ambiente,
},
    props: {
        errors: [],
        data: Object,
    },
    mounted() {
        try {
            this.$store.state.step5.interest_area_goals = JSON.parse(this.$page.props.form.interest_area_goals)
        } catch (error) {
            this.$store.state.step5.interest_area_goals = []
        }

        var mi_array_step5 = this.$store.state.step5.interest_area_goals ?? []

        console.log('mi_array_step5', mi_array_step5);

        document.querySelectorAll('#accordionStepper .step-5-checks input.form-check-input')?.forEach((input) => {
            input.addEventListener('change', (e) => {
                if (e.target.checked) {
                    mi_array_step5?.push(e.target.value)
                } else {
                    mi_array_step5 = mi_array_step5?.filter((item) => item !== e.target.value)
                }

                this.$store.state.step5.interest_area_goals = mi_array_step5
                console.log(this.$store.state.step5.interest_area_goals);
            })
        })

        if (mi_array_step5?.length > 0) {
            try {
                mi_array_step5.forEach((item) => {
                    let el = document.querySelector(`#accordionStepper .step-5-checks input[value='${item}']`)
                    let el2 = document.querySelector(`#pdf-content .step-5-checks input[value='${item}']`)
                    console.log(el);
                    el.checked = true
                    el2.checked = true
                })
            } catch (error) {
                console.log(error);
            }
        }
    },
    watch: {
        '$store.state.currentStep': function (val) {
            if (val == 5) {
                console.log(val);
                try {
                    this.$store.state.step5.interest_area_goals = JSON.parse(this.$page.props.form.interest_area_goals)
                } catch (error) {
                    this.$store.state.step5.interest_area_goals = []
                }

                var mi_array_step5 = this.$store.state.step5.interest_area_goals ?? []

                console.log('mi_array_step5', mi_array_step5);

                document.querySelectorAll('#accordionStepper .step-5-checks input.form-check-input')?.forEach((input) => {
                    input.addEventListener('change', (e) => {
                        if (e.target.checked) {
                            mi_array_step5?.push(e.target.value)
                        } else {
                            mi_array_step5 = mi_array_step5?.filter((item) => item !== e.target.value)
                        }

                        this.$store.state.step5.interest_area_goals = mi_array_step5
                        console.log(this.$store.state.step5.interest_area_goals);
                    })
                })

                if (mi_array_step5?.length > 0) {
                    try {
                        mi_array_step5.forEach((item) => {
                            let el = document.querySelector(`#accordionStepper .step-5-checks input[value='${item}']`)
                            let el2 = document.querySelector(`#pdf-content .step-5-checks input[value='${item}']`)
                            console.log(el);
                            el.checked = true
                            el2.checked = true
                        })
                    } catch (error) {
                        console.log(error);
                    }
                }
            }
        }
    },
    methods: {
        showModal() {
            document.body.appendChild( document.querySelector('#modalStep5') )
        },

        addMeasure() {
            this.$store.state.step5.measures = []

            this.$store.state.step5.measures.push({
                measure: document.querySelector('select#measure').value,
                method: document.querySelector('select#method').value,
                frecuencie: document.querySelector('select#frecuencie').value,
                benefits: document.querySelector('select#benefits').value,
            })

            console.log(this.$store.state.step5.measures);
        },

        submit() {
            axios.post(route('simulation.save.step5'), {
                ...this.$store.state.step5,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 5 guardado con éxito', '', 'success');
                this.$page.props.errors = []
            })
            .catch((error) => {
                this.$page.props.errors = error.response.data.errors

                let list = '<ul>'

                this.$page.props.errors?.forEach(el => {
                    list += `<li>${el}</li>`
                });

                list += '</ul>'

                this.$swal({
                    title: 'Error!',
                    html: list,
                    icon: 'error',
                });
            })
        }
    }
}
</script>
