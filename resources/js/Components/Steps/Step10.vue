<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">Los proyectos sostenibles ofrecen soluciones a largo plazo a los problemas que enfrenta una comunidad. Para que un proyecto sea sostenible, los integrantes de la comunidad deberán mantener por si mismos las actividades del proyecto una vez se agoten los fondos de la subvención. Tus respuestas a las preguntas que se incluyen a continuación nos ayudarán a determinar qué elementos del proyecto lo hacen sostenible.</p>
        <h4>PROYECTOS HUMANITARIOS</h4>

        <p class="fw-bold">Planificaión del proyecto</p>
        <hr>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Describe las necesidades de la comunidad que abordará el proyecto.</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.necesities"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué proceso se siguió para determinar estas necesidades?</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.necesities_process"></textarea>
        </div>
        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Cómo participaron los integrantes de la comunidad beneficiaria en la búsqueda de soluciones?</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.participants1"></textarea>
        </div>
        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué participación tuvieron los integrantes de la comunidad local en la planificación del proyecto?</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.participants2"></textarea>
        </div>

        <p class="fw-bold">Implementación del proyecto</p>
        <hr>

        <p class="fw-bold">Resume cada etapa de la implementación del proyecto.</p>
        <small>Do not include sensitive personal data, such as government ID numbers, religion, race, health information, etc. If you include personal data, you are responsible for informing those whose personal data is included that you are providing it to Rotary and that it will be processed in accordance with Rotary’s Privacy Policy.</small>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"># Actividad</th>
                    <th scope="col">Duración</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="form-control" v-model="activities[0]['name']"></td>
                    <td><input type="text" class="form-control" v-model="activities[0]['duration']"></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="name" class="form-label">¿Trabajarás en coordinación con otras iniciativas afines que estuvieran en marcha en la comunidad?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="coo_work_yes" value="1" v-model="$store.state.step10.coo_work">
                <label class="form-check-label" for="coo_work_yes">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="coo_work_no" value="0" v-model="$store.state.step10.coo_work">
                <label class="form-check-label" for="coo_work_no">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Describe los programas de capacitación, educación o divulgación a la comunidad que abarcará el proyecto.</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.capacitation"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué proceso se siguió para determinar las necesidades?</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.determinate_necesities"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué incentivos (por ejemplo: compensación económica, premios, certificaciones o publicidad) se utilizarán para animar a los integrantes de la comunidad a participar en el proyecto?</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.incentives"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Ingresa el nombre de los integrantes o grupos de la comunidad que supervisarán las actividades del proyecto una vez concluidas las actividades financiadas con la subvención.</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.supervisors_names"></textarea>
        </div>

        <h4>PRESUPUESTO</h4>
        <div class="mb-3">
            <label for="name" class="form-label">¿Usarás proveedores locales para adquirir los equipos y materiales presupuestados?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_providers_yes" value="1" v-model="$store.state.step10.use_providers">
                <label class="form-check-label" for="use_providers_yes">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_providers_no" value="0" v-model="$store.state.step10.use_providers">
                <label class="form-check-label" for="use_providers_no">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">¿Se utilizó un proceso de licitación para seleccionar a los proveedores?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_tender_yes" value="1" v-model="$store.state.step10.use_tender">
                <label class="form-check-label" for="use_tender_yes">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_tender_no" value="0" v-model="$store.state.step10.use_tender">
                <label class="form-check-label" for="use_tender_no">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">¿Tiene alguno de los integrantes del comité un posible conflicto de interés con alguno de los proveedores?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="has_conflict_providers_yes" value="1" v-model="$store.state.step10.has_conflict_providers">
                <label class="form-check-label" for="has_conflict_providers_yes">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="has_conflict_providers_no" value="0" v-model="$store.state.step10.has_conflict_providers">
                <label class="form-check-label" for="has_conflict_providers_no">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Si el proyecto incluye la adquisición de equipos o materiales, proporciona el plan de operación y mantenimiento. El plan deberá indicar quiénes estarán a cargo de operar y brindar mantenimiento a los equipos y la capacitación que recibirán</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.equipment_included"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Describe como los integrantes de la comunidad brindarán mantenimiento a los equipos una vez concluidas las actividades de la subvención. ¿Podrán encontrarse repuestos?</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.equipment_maintenance"></textarea>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Si se utilizarán fondos de la subvención para adquirir equipos, ¿serán éstos adecuados al entorno cultural y los estándares tecnológicos de la comunidad?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="local" value="1" v-model="$store.state.step10.use_founds">
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="internacional" value="0" v-model="$store.state.step10.use_founds">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Una vez completado el proyecto, ¿a quién pertenecerán los artículos adquiridos con los fondos de la subvención? Ningún artículo podrá ser propiedad de un distrito, club o socio.</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.completed_proyect"></textarea>
        </div>

        <h4>FINANCIACIÓN</h4>
        <div class="mb-3">
            <label for="name" class="form-label">¿Incluye tu proyecto actividades de microcrédito?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="local" value="1" v-model="$store.state.step10.has_microcredit">
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="internacional" value="0" v-model="$store.state.step10.has_microcredit">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">¿Cuentas con una fuente de financiación local para mantener los resultados del proyecto a largo plazo? </label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="local" value="1" v-model="$store.state.step10.has_local_founds">
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="internacional" value="0" v-model="$store.state.step10.has_local_founds">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Generará algún elemento del proyecto ingresos que se destinarán a financiar el proyecto a largo plazo? De ser así, explica.</label>
            <textarea class="form-control" id="txtarea1" rows="5" v-model="$store.state.step10.generate_income"></textarea>
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
</template>

<script>
import axios from 'axios'

export default {
    props: {
        errors: [],
        data: Object,
    },
    data() {
        return {
            activities: [
                {
                    name: '',
                    duration: '',
                },
            ],
        }
    },
    methods: {
        mounted() {
            this.activities = this.$store.state.step10.activities
        },
        submit() {
            axios.post(route('simulation.save.step10'), {
                ...this.$store.state.step10,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id,
                activities: this.activities,
            })
            .then((response) => {
                this.$store.state.currentStep = 'documents'
                this.$swal('Paso 10 guardado con éxito', '', 'success');
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
