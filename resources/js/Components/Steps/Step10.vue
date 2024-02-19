<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">{{ useTrans('step10')?.page_description }}</p>
        <h4>{{ useTrans('step10')?.page_title }}</h4>

        <p class="fw-bold">{{ useTrans('step10')?.project_plan }}</p>
        <hr>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.nececities }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.necesities"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.process }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.necesities_process"></textarea>
        </div>
        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.integrants }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.participants1"></textarea>
        </div>
        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.participation }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.participants2"></textarea>
        </div>

        <p class="fw-bold">{{ useTrans('step10')?.implement }}</p>
        <hr>

        <p class="fw-bold">{{ useTrans('step10')?.resume_imp }}</p>
        <small>{{ useTrans('step10')?.disclamer }}</small>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"># {{ useTrans('step10')?.activ }}</th>
                    <th scope="col">{{ useTrans('step10')?.duration }}</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, i) in activities" :key="item.id">
                    <td><input type="text" class="form-control" v-model="item.name"></td>
                    <td><input type="text" class="form-control" v-model="item.duration"></td>
                    <td>
                        <div class="d-flex justify-content-between w-100">
                            <button type="button" :data-id="item.id" @click="removeActivity(i)"><i class="fa-solid fa-circle-xmark"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <button type="button" @click="addActivity()">+ {{ useTrans('step10')?.add_activ }}</button>
                    </td>
                </tr>
            </tfoot>
        </table>

        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step10')?.cooperative }}</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="coo_work_yes" value="1" v-model="$store.state.step10.coo_work">
                <label class="form-check-label" for="coo_work_yes">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="coo_work_no" value="0" v-model="$store.state.step10.coo_work">
                <label class="form-check-label" for="coo_work_no">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.capacitation }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.capacitation"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.determinate_necesities }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.determinate_necesities"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.incentives }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.incentives"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.supervisors_names }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.supervisors_names"></textarea>
        </div>

        <h4>{{ useTrans('step10')?.budget }}</h4>
        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step10')?.providers }}</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_providers_yes" value="1" v-model="$store.state.step10.use_providers">
                <label class="form-check-label" for="use_providers_yes">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_providers_no" value="0" v-model="$store.state.step10.use_providers">
                <label class="form-check-label" for="use_providers_no">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step10')?.licit }}</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_tender_yes" value="1" v-model="$store.state.step10.use_tender">
                <label class="form-check-label" for="use_tender_yes">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="use_tender_no" value="0" v-model="$store.state.step10.use_tender">
                <label class="form-check-label" for="use_tender_no">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step10')?.integ }}</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="has_conflict_providers_yes" value="1" v-model="$store.state.step10.has_conflict_providers">
                <label class="form-check-label" for="has_conflict_providers_yes">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="has_conflict_providers_no" value="0" v-model="$store.state.step10.has_conflict_providers">
                <label class="form-check-label" for="has_conflict_providers_no">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.adqui }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.equipment_included"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.community_inte }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.equipment_maintenance"></textarea>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step10')?.subvenc }}</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="local" value="1" v-model="$store.state.step10.use_founds">
                <label class="form-check-label" for="local">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="internacional" value="0" v-model="$store.state.step10.use_founds">
                <label class="form-check-label" for="internacional">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.completed_project }}</label>
            <textarea class="form-control" id="txtarea1" rows="4" v-model="$store.state.step10.completed_proyect"></textarea>
        </div>

        <h4>{{ useTrans('step10')?.finantiation }}</h4>
        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step10')?.credit }}</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="local" value="1" v-model="$store.state.step10.has_microcredit">
                <label class="form-check-label" for="local">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="internacional" value="0" v-model="$store.state.step10.has_microcredit">
                <label class="form-check-label" for="internacional">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{ useTrans('step10')?.account }}</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="local" value="1" v-model="$store.state.step10.has_local_founds">
                <label class="form-check-label" for="local">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="internacional" value="0" v-model="$store.state.step10.has_local_founds">
                <label class="form-check-label" for="internacional">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">{{ useTrans('step10')?.element }}</label>
            <textarea class="form-control" id="txtarea1" rows="5" v-model="$store.state.step10.generate_income"></textarea>
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
            activities: [
                {
                    id: 1,
                    name: '',
                    duration: '',
                },
            ],
        }
    },
    mounted() {
        if (this.$page.props.form?.activities) {
            this.activities = JSON.parse(this.$page.props.form.activities)
        }
    },
    methods: {
        addActivity() {
            this.activities.push({
                name: '',
                duration: '',
            })
        },
        removeActivity(index) {
            this.activities = this.activities.filter((el, i) => i !== index)
        },
        submit() {
            axios.post(route('simulation.save.step10'), {
                ...this.$store.state.step10,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id,
                activities: this.activities,
            })
            .then((response) => {
                this.$store.state.currentStep = 'documents'
                this.$swal('Paso 10 guardado con éxito', '', 'success');
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
