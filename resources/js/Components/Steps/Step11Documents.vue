<template>
    <form @submit.prevent="submit">
        <p class="fw-bold text-uppercase">Documentos justificantes
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>

        <table class="w-100">
            <tr>
                <td>
                    <div class="d-flex justify-content-between">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Agregar archivo</label>
                            <input class="form-control w-100" type="file" id="formFile">
                        </div>
                    </div>
                </td>
            </tr>
        </table>

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
            axios.post(route('simulation.save.step11'), {
                ...this.$store.state.step11,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Step 11 saved successfully', '', 'success');
                console.log(response);
            })
            .catch((error) => {
                this.$swal('Error', 'Something went wrong', 'error');

                this.$page.props.errors = error.response.data.errors
            })
        }
    }
}
</script>
