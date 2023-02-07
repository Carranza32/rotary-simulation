
<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <div class="step-5-checks">
            <Step5PazPrev />
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
                <tr>
                    <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Añadir medida</a></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="name" class="form-label">¿Ya sabes quíen recopilará la información necesario para la evaluación y le monitoreo?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="1" v-model="$store.state.step5.evaluation">
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="0" v-model="$store.state.step5.evaluation">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="d-flex justify-content-start gap-3 mt-4">
            <button class="btn btn-primary" type="submit">
                Guardar y continuar
            </button>
            <button class="btn btn-outline-primary" type="submit">
                Guardar
            </button>
            <button class="btn btn-link" type="button">
                Salir
            </button>
        </div>
    </form>
</template>

<script>
import Step5PazPrev from '@/Components/Steps/Step51PazPrev.vue';
import axios from 'axios'

export default {
    components: {
        Step5PazPrev,
    },
    props: {
        errors: [],
        data: Object,
    },
    mounted() {
        if (this.$store.state.step5.interest_area_goals == null || this.$store.state.step5.interest_area_goals.length == 0) {
            this.$store.state.step5.interest_area_goals = []
        }else{
            JSON.parse(this.$page.props.form.interest_area_goals)?.forEach((item) => {
                document.querySelector(`.step-5-checks input[value="${item}"]`).checked = true
            })
        }

        document.querySelectorAll('.step-5-checks input')?.forEach((input) => {
            input.addEventListener('change', (e) => {
                if (this.$store.state.step5.interest_area_goals == null || this.$store.state.step5.interest_area_goals?.length == 0) {
                    this.$store.state.step5.interest_area_goals = []
                }

                if (e.target.checked) {
                    console.log(this.$store.state.step5.interest_area_goals);
                    this.$store.state.step5.interest_area_goals.push(parseInt(e.target.value))
                } else {
                    this.$store.state.step5.interest_area_goals = this.$store.state.step5.interest_area_goals.filter((item) => item !== parseInt(e.target.value))
                }

                console.log(this.$store.state.step5.interest_area_goals);
            })
        })
    },
    methods: {
        submit() {
            axios.post(route('simulation.save.step5'), {
                ...this.$store.state.step5,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Step 5 saved successfully', '', 'success');
                this.$page.props.errors = []
            })
            .catch((error) => {
                this.$swal('Error', 'Something went wrong', 'error');

                this.$page.props.errors = error.response.data.errors
            })
        }
    }
}
</script>
