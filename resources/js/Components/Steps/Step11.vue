<template>
    <form @submit.prevent="submit">
        <img src="../../assets/images/step11_1.png" alt="step11_1">
        <img src="../../assets/images/step11_2.png" alt="step11_2">
        <img src="../../assets/images/step11_3.png" alt="step11_3">

        <div class="d-flex justify-content-start gap-3 mt-4">
            <button class="btn btn-primary" type="submit">
                Guardar y continuar
            </button>
            <button class="btn btn-outline-primary" type="submit">
                Guardar
            </button>
            <button class="btn btn-outline-primary" type="button">
                Bloqueo de solicitud
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
    methods: {
        submit() {
            axios.post(route('simulation.save.step11'), {
                ...this.$store.state.step11,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 11 guardado con éxito', '', 'success');
                console.log(response);
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
