<template>
    <form  @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>
        <div class="mb-3">
            <label for="textarea" class="form-label">
                {{ $lang?.step3?.page_title }}
                <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step3.objectives"></textarea>
        </div>

        <div class="d-flex justify-content-start gap-3 mt-4">
            <button class="btn btn-primary" type="submit">
                {{ $lang?.layout?.save_and_continue }}
            </button>
            <button class="btn btn-outline-primary" type="submit">
                {{ $lang?.layout?.save }}
            </button>
            <a class="btn btn-link" :href="route('dashboard')">
                {{ $lang?.layout?.out }}
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
            axios.post(route('simulation.save.step3'), {
                ...this.$store.state.step3,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 3 guardado con éxito', '', 'success');
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
