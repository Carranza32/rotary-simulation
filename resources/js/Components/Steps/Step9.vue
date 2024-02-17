<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">{{ $lang?.step9?.page_title }}</p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ $lang?.step9?.source }}</th>
                        <th scope="col">{{ $lang?.step9?.details }}</th>
                        <th scope="col">{{ $lang?.step9?.amount }}</th>
                        <th scope="col">{{ $lang?.step9?.support }}*</th>
                        <th scope="col">{{ $lang?.step9?.total }}</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="source in $store.state.step9.sources" :key="source.id">
                        <td>{{ source.id }}</td>
                        <td>{{ source.source }}</td>
                        <td>{{ source.detail }}</td>
                        <td>{{ source.amount }}</td>
                        <td>{{ source.support }}</td>
                        <td>{{ source.total }}</td>
                        <td>
                            <div class="d-flex justify-content-between w-100">
                                <a style="cursor: pointer;" @click="editRowTable(source)" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalStep9"><i class="fa-solid fa-pen text-secondary"></i></a>
                                <a style="cursor: pointer;" @click="deleteRowTable(source)"><i class="fa-solid fa-circle-xmark text-secondary ms-2"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <a href="#!" @click="newFontSource()" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalStep9" >+ {{ $lang?.step9?.add_source }}</a>
                        </td>
                    </tr>
                </tfoot>
                <caption>* {{ $lang?.step9?.add_source_description }}</caption>
            </table>
        </div>

        <p class="fw-bold">{{ $lang?.step9?.amount_project }}
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>
        <div class="bg-light p-3">
            <div class="row">
                <div class="col-6">
                    <p class="tw-bold">{{ $lang?.step9?.amount_project_description }}</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" v-model="$store.state.step9.world_donation">
                    <div class="invalid-feedback">
                        {{ $lang?.step9?.amount_project_validation }}
                    </div>
                </div>
            </div>
        </div>

        <p class="fw-bold">{{ $lang?.step9?.finantiation_resume }}
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>
        <div class="alert alert-warning d-flex align-items-center" role="alert" v-if="showAlert()">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div class="ms-3">
                <span class="text-uppercase">{{ $lang?.step9?.atention }}:</span><br>
                {{ $lang?.step9?.finantiation_resume_validation }}
            </div>
        </div>

        <div class="row my-3">
            <div class="col"></div>
            <div class="col">
                <table class="w-100">
                    <tr>
                        <td class="text-end">{{ $lang?.step9?.contributions }}:</td>
                        <td class="text-end">{{ sumFDD() }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">{{ $lang?.step9?.money_contributions }}:</td>
                        <td class="text-end">{{ sumClub() }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">{{ $lang?.step9?.globla_fond }}:</td>
                        <td class="text-end">{{ $store.state.step9.world_donation }}</td>
                    </tr>
                    <tr class="p-3">
                        <td class="text-end fw-bold my-3">{{ $lang?.step9?.total_fund }}:</td>
                        <td class="text-end">{{ totalFinanciado() }}</td>
                    </tr>
                    <tr>
                        <td class="text-end">{{ $lang?.step9?.budget_total }}:</td>
                        <td class="text-end">{{ $store.state.step8.budget_step8 }}</td>
                    </tr>
                </table>
            </div>
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

    <!-- Modal -->
    <div class="modal fade" id="modalStep9" tabindex="-1" aria-labelledby="modalStep9Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalStep9Label">{{ $lang?.step9?.add_source }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">{{ $lang?.step9?.source }}</label>
                            <select class="form-select" id="source_money" aria-label="Default select example" v-model="source">
                                <option value="Fondo Distrital Designado (FDD)">{{ $lang?.step9?.fdd_contributions }}</option>
                                <option value="Efectivo procedente del distrito">{{ $lang?.step9?.district_money }}</option>
                                <option value="Efectivo procedente del club">{{ $lang?.step9?.club_money }}</option>
                                <option value="Contribuciones realizadas por personas ajenas a Rotary NO equipadas por la Fundación">{{ $lang?.step9?.no_rotary_money }}</option>
                                <option value="Fondo Designado por los Donantes de la Fundación Rotaria">{{ $lang?.step9?.rotary_money }}</option>
                                <option value="Endowed/Directed gift - T10031 - Ernesto Leal Memorial Named Ambassadorial Scholarship">{{ $lang?.step9?.own_money }}</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">{{ $lang?.step9?.amount }}</label>
                            <input type="number" min="0" class="form-control" v-model="amount">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">{{ $lang?.step9?.details }}</label>
                            <input type="text" class="form-control" v-model="detail">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">{{ $lang?.step9?.support }}</label>
                            <input type="text" class="form-control" v-model="support">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $lang?.layout?.cancel }}</button>
                    <button type="button" class="btn btn-primary" @click="addFontSource()" data-bs-dismiss="modal">{{ $lang?.layout?.save }}</button>
                </div>
            </div>
        </div>
    </div>
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
            source: 'Fondo Distrital Designado (FDD)',
            detail: '',
            amount: 0,
            support: '',
            total: 0,
            show_alert: this.showAlert(),
        }
    },
    mounted() {
        this.$store.state.step9.total_financed = 0;

        //this.show_alert = this.$store.state.step9.total_financed == this.sumTotal();
    },
    methods: {
        showModalStep9(){
            document.body.appendChild( document.querySelector('#modalStep9') )
        },

        newFontSource() {
            this.$store.state.step9.is_editing = false;

            this.$store.state.step9.selected_source = {
                source: '',
                detail: '',
                amount: '',
                support: '',
                total: '',
            };

            this.showModalStep9()
        },

        addFontSource() {
            if (this.$store.state.step9.sources == null) {
                this.$store.state.step9.sources = []
            }

            if (this.$store.state.step9.is_editing == true) {
                let index = this.$store.state.step9.sources.findIndex(x => x.id == this.$store.state.step9.editing_id);

                this.$store.state.step9.sources[index] = {
                    id: this.$store.state.step9.editing_id,
                    source: (this.source?.length > 0) ? this.source : 'Fondo Distrital Designado (FDD)',
                    detail: this.detail,
                    amount: (this.amount == "") ? 0 : this.amount,
                    support: this.support,
                    amount: (this.amount == "") ? 0 : this.amount,
                }

                return;
            }

            console.log("Source: " + this.source ?? 'Fondo Distrital Designado (FDD)');
            console.log("amount: " + this.amount ?? 0);

            this.$store.state.step9.sources.push({
                id: this.$store.state.step9.sources.length + 1,
                source: (this.source?.length > 0) ? this.source : 'Fondo Distrital Designado (FDD)',
                detail: this.detail,
                amount: (this.amount == "") ? 0 : this.amount,
                support: this.support,
                total: (this.amount == "") ? 0 : this.amount,
            })
        },

        deleteRowTable(item) {
            this.$store.state.step9.sources.splice(this.$store.state.step9.sources.indexOf(item), 1)
        },

        editRowTable(item) {
            this.$store.state.step9.is_editing = true;
            this.$store.state.step9.editing_id = item.id;
            this.$store.state.step9.selected_source = item;

            this.showModalStep9()
        },

        sumFDD() {
            let sum = 0;

            this.$store.state.step9?.sources?.forEach(el => {
                if (el.source == 'Fondo Distrital Designado (FDD)') {
                    sum += parseInt(el.amount)
                }
            });

            this.$store.state.step9.world_donation = ((sum * 80) / 100).toFixed(2)

            return sum;
        },

        sumClub() {
            let sum = 0;

            this.$store.state.step9?.sources?.forEach(el => {
                if (el.source == 'Efectivo procedente del club' || el.source == 'Efectivo procedente del distrito') {
                    sum += parseInt(el.amount)
                }
            });

            return sum;
        },

        totalFinanciado() {
            let sum = 0;

            sum += Number(this.sumFDD());
            sum += Number(this.sumClub());
            sum += Number(this.$store.state.step9.world_donation);

            this.$store.state.step9.total_budget = Number(sum)

            return sum.toFixed(2);
        },

        showAlert() {
            let sum = 0;

            this.$store.state.step9?.sources?.forEach(el => {
                sum += parseInt(el.amount)
            });

            console.log(this.$store.state.step8.budget_step8, sum);

            return this.$store.state.step8.budget_step8 != sum;;
        },

        submit() {
            axios.post(route('simulation.save.step9'), {
                ...this.$store.state.step9,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 9 guardado con éxito', '', 'success');
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
    },

    watch: {
        '$store.state.step9.selected_source': function (val) {
            console.log(val);
            if (val != undefined) {
                this.source = val?.source
                this.detail = val?.detail
                this.amount = val?.amount
                this.support = val?.support
                this.total = val?.total
            }
        },
        "$store.state.step8.budget_step8": function (val) {
            if (val != undefined) {
                let sum = 0;

                this.$store.state.step9?.sources?.forEach(el => {
                    sum += parseInt(el.amount)
                });

                this.show_alert = val != sum;
            }
        },
    },
}
</script>
