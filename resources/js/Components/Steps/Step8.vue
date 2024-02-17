<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">{{ $lang?.step8?.page_title }}</p>
        <p>{{ $lang?.step8?.page_description }}<span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ $lang?.step8?.currency }}</label>
                    <select class="form-select" aria-label="Default select example" v-model="$store.state.step8.currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="CLP">CLP</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exchange_rate" class="form-label"><a href="#!">{{ $lang?.step8?.change_currency }}</a> {{ $lang?.step8?.change_for_dollar }}</label>
                    <input type="number" class="form-control" id="exchange_rate" v-model="$store.state.step8.exchange_rate" >
                    <small>{{ $lang?.step8?.saved_date }}</small>
                </div>
            </div>
        </div>

        <hr>
        <p class="fw-bold">{{ $lang?.step8?.budget }}</p>
        <p>{{ $lang?.step8?.budget_description }} <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>


        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ $lang?.step8?.category }}</th>
                        <th scope="col">{{ $lang?.step8?.description }}</th>
                        <th scope="col">{{ $lang?.step8?.provider }}</th>
                        <th scope="col">{{ $lang?.step8?.usd_cost }}</th>
                        <th scope="col">{{ $lang?.step8?.cost_in_usd }}$</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in budget_table" :key="item.id" >
                        <td>{{ item.id }}</td>
                        <td>
                            <select class="form-select" aria-label="Default select example" v-model="item.category">
                                <option disabled>--{{ $lang?.layout?.select_option }}--</option>
                                <option value="Accommodation">{{ $lang?.step8?.accommodation }}</option>
                                <option value="Equipos">{{ $lang?.step8?.equipment }}</option>
                                <option value="Monitoreo / evaluación">{{ $lang?.step8?.monitoring }}</option>
                                <option value="Operaciones">{{ $lang?.step8?.operations }}</option>
                                <option value="Personal">{{ $lang?.step8?.personnel }}</option>
                                <option value="Administración de proyecto">{{ $lang?.step8?.admin_proyect }}</option>
                                <option value="Publicidad">{{ $lang?.step8?.advertising }}</option>
                                <option value="Señalización">{{ $lang?.step8?.Signaling }}</option>
                                <option value="Suministros">{{ $lang?.step8?.supplies }}</option>
                                <option value="Entrenamiento">{{ $lang?.step8?.training }}</option>
                                <option value="Viajes">{{ $lang?.step8?.traveling }}</option>
                                <option value="Matrícula">{{ $lang?.step8?.tuition }}</option>
                            </select>
                        </td>
                        <td><input type="text" name="" id="" v-model="item.description"></td>
                        <td><input type="text" name="" id="" v-model="item.provider"></td>
                        <td><input type="number" min="0" name="" id="" v-model="item.cost"></td>
                        <td><label for="">{{ item.cost }}</label></td>
                        <td>
                            <div class="d-flex justify-content-between w-100">
                                <button type="button" @click="deleteBudgetTableItem(item.id)"><i class="fa-solid fa-circle-xmark"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <button type="button" @click="addBudgetTableItem()">+ {{ $lang?.step8?.add_rubro }}</button>
                        </td>
                    </tr>
                    <tr class="table-light">
                        <td colspan="4">
                            <span class="float-end">{{ $lang?.step8?.total_budget }}:</span>
                        </td>

                        <td>
                            {{ sumBudgetTable() }}
                        </td>

                        <td colspan="2">
                            {{ $store.state.step8.exchange_rate }}
                        </td>
                    </tr>
                </tfoot>
            </table>
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
    data() {
        return {
            budget_table: [
                {
                    id: 1,
                    category: 'Accommodation',
                    description: '',
                    provider: '',
                    cost: 0,
                }
            ],
        }
    },
    mounted() {
        if (this.$page.props.form.headings) {
            this.budget_table = this.$page.props.form.headings
        }

        if (this.$page.props.form.budget_step8) {
            this.$store.state.step8.budget_step8 = this.$page.props.form.budget_step8
        }
    },
    methods: {
        addBudgetTableItem() {
            this.budget_table.push({
                id: this.budget_table.length + 1,
                category: 'Accommodation',
                description: '',
                provider: '',
                cost: 0,
            })
        },
        deleteBudgetTableItem(id) {
            this.budget_table = this.budget_table.filter(item => item.id !== id)
        },
        sumBudgetTable() {
            let sum = this.budget_table.reduce((acc, item) => acc + item.cost, 0);

            this.$store.state.step8.budget_step8 = sum

            return sum;
        },
        submit() {
            this.$store.state.step8.headings = this.budget_table

            axios.post(route('simulation.save.step8'), {
                ...this.$store.state.step8,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 8 guardado con éxito', '', 'success');
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
