<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold text-uppercase">Organizadores y colaboradoras (optitivo)
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Sitio web</th>
                    <th scope="col">Dirección</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Agregar organización</a></td>
                </tr>
            </tbody>
        </table>

        <p class="fw-bold text-uppercase">Colaboradores (optitivo)</p>

        <div class="mb-3">
            <label for="textarea" class="form-label">
                Indica los demás colaboradores que participarán en este proyecto
                <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step7.members"></textarea>
        </div>

        <p class="fw-bold text-uppercase">VIAJEROS VOLUNTARIOS (OPTATIVO)</p>

        <div class="mb-3">
            <p>Las subvenciones para proyectos humanitarios pueden financiar los viajes de un máximo de dos personas para que proporcionen capacitación o contribuyan a la implementación del proyecto (siempre que en el ámbito local no pudieran encontrarse personas con tales competencias). Cargar un currículum para cada viajero voluntario. No incluyas datos personales confidenciales, como números de identificación gubernamentales, religión, raza, información de salud, etc. Eres responsable de informar a los viajeros voluntarios sobre los datos personales que has proporcionado sobre ellos a Rotary y de que serán procesados de conformidad con la <a href="https://my.rotary.org/es/privacy-policy">política de privacidad</a>  de Rotary.</p>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo electrónico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Agregar viajero</a></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <p class="fw-bold text-uppercase">Participantes de rotary</p>
        <div class="mb-3">
            <label for="textarea" class="form-label">
                Describe el papel que desempeñarán los patrocinadores locales en el proyecto:
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step7.local_sponsors"></textarea>
        </div>

        <div class="mb-3">
            <label for="textarea" class="form-label">
                Describe el papel que desempeñarán los patrocinadores internacionales en el proyecto:
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step7.international_sponsors"></textarea>
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
            axios.post(route('simulation.save.step7'), {
                ...this.$store.state.step7,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Step 7 saved successfully', '', 'success');
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
