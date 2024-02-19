<template>
    <form @submit.prevent="submit">
        <p class="fw-bold text-uppercase">{{ useTrans('stepDocuments')?.page_title }}
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>

        <table class="w-100">
            <tr>
                <td>
                    <div class="d-flex justify-content-start">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">{{ useTrans('stepDocuments')?.add_file }}</label>
                            <input class="form-control w-100" type="file" ref="files" multiple id="formFile" @change="handleFileUploads()">
                        </div>
                        <button type="button" @click="submit(false)" class="btn btn-primary float-start mt-3 ms-4 align-self-center">Cargar</button>
                    </div>
                </td>
            </tr>
        </table>

        <p class="fw-bold mt-3">{{ useTrans('stepDocuments')?.uploaded_files }}
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>
        <table class="w-100" id="documentsTable">
            <tr v-for="(file, index) in uploadedFiles" :key="index">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" :value="file" v-model="selectedFiles">
                </div>

                <td>{{ file }}</td>
            </tr>
        </table>

        <button class="btn btn-link mt-3 mb-4 text-danger" type="button" @click="deleteSelectedFiles()" :disabled="(selectedFiles.length == 0)" ><i class="fa-solid fa-circle-xmark "></i> {{ useTrans('stepDocuments')?.deleted_file }}</button>

        <div class="d-flex justify-content-start gap-3 mt-4">
            <button class="btn btn-primary" type="submit">
                {{ useTrans('layout')?.save_and_continue }}
            </button>
            <button class="btn btn-outline-primary" type="submit">
                {{ useTrans('layout')?.save }}
            </button>
            <a class="btn btn-link" :href="route('dashboard')">
                {{ useTrans('layout')?.out }}
            </a>
        </div>
    </form>
</template>

<script>
import axios from 'axios'
import { useTrans } from '@/Composables/trans';

export default {
    props: {
        errors: [],
        data: Object,
    },
    setup() {
        return {
            useTrans,
        };
    },
    data() {
        return {
            files: [],
            selectedFiles: [],
            uploadedFiles: [],
        }
    },
    async mounted() {
        this.getUploadedFiles();
    },
    methods: {
        handleFileUploads(){
            this.files = this.$refs.files.files;
            this.$store.state.stepDocuments.files = this.files
            console.log(this.files);
        },

        async getUploadedFiles(){
            let res = await axios.get(route('simulation.save.step11.documents.uploaded', {
                id: this.$page.props?.form?.id,
            }));

            this.uploadedFiles = res?.data?.data;
        },

        async deleteSelectedFiles(){
            let resp = await axios.post(route('simulation.save.step11.documents.delete'), {
                selected: this.selectedFiles,
                id: this.$page.props?.form?.id,
            });

            this.uploadedFiles = resp?.data?.data;

            console.log(resp);
        },

        submit(passNextStep = true) {
            let formData = new FormData();

            for( var i = 0; i < this.files.length; i++ ){
                let file = this.files[i];

                formData.append('files[]', file);
            }

            formData.append('current_step', 10);
            formData.append('id', this.$page.props?.form?.id);

            axios.post(route('simulation.save.step11.documents'), formData,
            {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then((response) => {
                this.$store.state.currentStep = (passNextStep) ? 11 : 'documents';
                this.$swal('Documento guardado con éxito', '', 'success');

                this.getUploadedFiles();

                this.$refs.files.value = null;
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
