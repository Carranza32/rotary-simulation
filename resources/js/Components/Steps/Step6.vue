<template>
    <form @submit.prevent="submit">
        <h4>PROYECTO HUMANITARIO</h4>

        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">¿Dónde se llevará a cabo el proyecto?</p>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Ciudad o localidad</label>
                    <input type="text" name="project_name" class="form-control" id="name" v-model="$store.state.step6.city">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Estado, provincia o departamento (optativo)</label>
                    <input type="text" name="project_name" class="form-control" id="name" v-model="$store.state.step6.state">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">País</label>
            <select class="form-select" aria-label="Default select example" v-model="selected_country">
                <option v-for="country in countries" :value="country.code" :key="country.code">
                    {{ country.name }}
                </option>
            </select>
        </div>

        <p class="fw-bold">Cúando se llevará a cabo el proyecto?</p>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Fecha de inicio</label>
                    <input type="date" placeholder="dd/mm/yyyy" name="start_date" class="form-control" id="start_date" v-model="$store.state.step6.start_date">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Fecha de conclusión</label>
                    <input type="date" placeholder="dd/mm/yyyy" name="end_date" class="form-control" id="end_date" v-model="$store.state.step6.end_date">
                </div>
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
</template>

<script>
import axios from 'axios'
import countries from "@/Utils/countries.json";

export default {
    props: {
        errors: [],
        data: Object,
    },
    data() {
        return {
            countries: countries,
            selected_country: null,
        }
    },
    mounted() {
        if (this.$page.props?.form?.country) {
            this.selected_country = JSON.parse(this.$page.props?.form?.country)?.code
        }
    },
    methods: {
        submit() {
            axios.post(route('simulation.save.step6'), {
                ...this.$store.state.step6,
                country: this.countries.find(el => el.code == this.selected_country),
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 6 guardado con éxito', '', 'success');
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
