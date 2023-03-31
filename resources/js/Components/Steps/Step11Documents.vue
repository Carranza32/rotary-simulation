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
                            <input class="form-control w-100" type="file" ref="files" multiple id="formFile" @change="handleFileUploads()">
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
            files: [],
        }
    },
    methods: {
        handleFileUploads(){
            this.files = this.$refs.files.files;
            this.$store.state.stepDocuments.files = this.files
            console.log(this.files);
        },

        submit() {
            let formData = new FormData();

            for( var i = 0; i < this.files.length; i++ ){
                let file = this.files[i];

                formData.append('files[]', file);
            }

            formData.append('current_step', 11);
            formData.append('id', this.$page.props?.form?.id);

            axios.post(route('simulation.save.step11.documents'), formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then((response) => {
                this.$store.state.currentStep = 11
                this.$swal('Documento guardado con éxito', '', 'success');
            })
            .catch((error) => {
                this.$page.props.errors = []
                console.log(error);
                try {
                    this.$page.props.errors = error.response?.data?.errors

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
                } catch (error) {
                    console.log(error);
                    this.$page.props.errors = []
                }
            })
        }
    }
}
</script>
