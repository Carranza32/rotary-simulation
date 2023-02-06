<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">¿A qué áreas de interés pertenece el proyecto?</p>
        <p>Selecciona al menos un área. Te pediremos que establezcas metas y respondas a ciertas preguntas para cada área de interés que selecciones. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" v-model="$store.state.step4.interest_area" name="paz" id="paz">
            <label class="form-check-label" for="paz">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Paz y prevención de conflictos
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="2" v-model="$store.state.step4.interest_area" id="prev" name="prev">
            <label class="form-check-label" for="prev">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Prevención y tratamiento de enfermedades
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="3"  id="agua" name="agua">
            <label class="form-check-label" for="agua">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Agua, saneamiento e higiene
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="4"  id="salud" name="salud">
            <label class="form-check-label" for="salud">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Salud materno-infantil
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="5"  id="alf" name="alf">
            <label class="form-check-label" for="alf">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Alfabetización y educación básica
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="6"  id="des" name="des">
            <label class="form-check-label" for="des">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Desarrollo económico de la comunidad
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="7"  id="ambiente" name="ambiente">
            <label class="form-check-label" for="ambiente">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Medioambiente
            </label>
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
import axios from 'axios'
export default {
    props: {
        errors: [],
        data: Object,
    },
    methods: {
        submit() {
            axios.post(route('simulation.save.step4'), {
                ...this.$store.state.step4,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Step 4 saved successfully', '', 'success');
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
