<template>
    <form  @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>
        <div class="mb-3">
            <label for="textarea" class="form-label">
                Háblanos sobre el proyecto. ¿Cuáles son sus objetivos principales y quiénes serán sus beneficiarios?
                <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step3.objectives"></textarea>
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
            axios.post(route('simulation.save.step3'), {
                ...this.$store.state.step3,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Step 3 saved successfully', '', 'success');
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
