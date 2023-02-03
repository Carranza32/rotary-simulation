<template>
    <form @submit.prevent="submit">
        <p class="fw-bold">¿Quiénes son los integrantes locales del comité del proyecto?
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Club</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Papel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Añadir contacto principal</a></td>
                </tr>
            </tbody>
        </table>

        <p class="fw-bold">¿Quiénes son los integrantes internacionales del comité del proyecto?
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Club</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Papel</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Añadir contacto principal</a></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="name" class="form-label">¿Existe entre los integrantes del comité algún posible conflicto de interés?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="0" v-model="$store.state.step2.members_conflict">
                <label class="form-check-label" for="local">No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="1" v-model="$store.state.step2.members_conflict">
                <label class="form-check-label" for="internacional">Si</label>
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
export default {
    props: {
        errors: Object,
        data: Object,
    },
    methods: {
        submit() {
            this.$inertia.post(route('simulation.save.step2'), {
                ...this.$store.state.step2,
                current_step: this.$store.state.currentStep,
            },
            {
                preserveState: true,
                preserveScroll: true,
                only: ['step2'],
                onSuccess: (page) => {
                    this.$store.state.currentStep++;

                    this.$swal('Step 2 saved successfully', '', 'success');

                    console.log(page);
                    console.log(this.$page.props.data);
                },
                onError: (error) => {
                    this.$swal('Error', 'Something went wrong', 'error');
                    console.log(error);
                }
            }
            )
        }
    }
}
</script>
