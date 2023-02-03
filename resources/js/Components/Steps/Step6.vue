<template>
    <form @submit.prevent="submit">
        <h4>PROYECTO HUMANITARIO</h4>

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
            <select class="form-select" aria-label="Default select example" v-model="$store.state.step6.country">
                <option value="1">España</option>
                <option value="1">España</option>
                <option value="1">España</option>
                <option value="1">España</option>
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
            this.$inertia.post(route('simulation.save.step6'), {
                ...this.$store.state.step6,
                current_step: this.$store.state.currentStep,
            },
            {
                preserveState: true,
                preserveScroll: true,
                only: ['step6'],
                onSuccess: (page) => {
                    this.$store.state.currentStep++;

                    this.$swal('Step 6 saved successfully', '', 'success');

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
