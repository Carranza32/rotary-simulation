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

        <p class="fw-bold">{{ useTrans('step6')?.page_title }}</p>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ useTrans('step6')?.city }}</label>
                    <input type="text" name="project_name" class="form-control" id="name" v-model="$store.state.step6.city">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label"></label>
                    <input type="text" name="project_name" class="form-control" id="name" v-model="$store.state.step6.state">
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step6')?.country }}</label>
            <select class="form-select" aria-label="Default select example" v-model="selected_country">
                <option v-for="country in countries" :value="country.code" :key="country.code">
                    {{ country.name }}
                </option>
            </select>
        </div>

        <p class="fw-bold">{{ useTrans('step6')?.project }}</p>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ useTrans('step6')?.start_date }}</label>
                    <input type="date" placeholder="dd/mm/yyyy" name="start_date" class="form-control" id="start_date" v-model="$store.state.step6.start_date">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ useTrans('step6')?.end_date }}</label>
                    <input type="date" placeholder="dd/mm/yyyy" name="end_date" class="form-control" id="end_date" v-model="$store.state.step6.end_date">
                </div>
            </div>
        </div>

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
import countries from "@/Utils/countries.json";
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
