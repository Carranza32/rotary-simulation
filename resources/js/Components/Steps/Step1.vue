<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="mt-3 mb-4">{{ $lang?.step1?.page_title }}</p>

        <div class="mb-3">
            <label for="name" class="form-label">{{ $lang?.step1?.project_name }}</label>
            <input  type="text" name="project_name" class="form-control" id="name" v-model="$store.state.step1.project_name" maxlength="100">
            <small class="float-end">{{ $store.state.step1.project_name.length }}/{{ $lang?.step1?.caracter_limit }}</small>
        </div>

        <p class="fw-bold">{{ $lang?.step1?.project_type }}</p>
        <p>{{ $lang?.step1?.project_type_description }}</p>
        <hr>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" v-model="$store.state.step1.type" id="check_type1">
            <label class="form-check-label" for="check_type1">
                {{ $lang?.step1?.humanitarian }}
            </label>
            <small>{{ $lang?.step1?.humanitarian_description }}</small>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="2" v-model="$store.state.step1.type" id="check_type2">
            <label class="form-check-label" for="check_type2">
                {{ $lang?.step1?.team }}
            </label>
            <small>{{ $lang?.step1?.team_description }}</small>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="3" v-model="$store.state.step1.type" id="check_type3">
            <label class="form-check-label" for="check_type3">
                {{ $lang?.step1?.beca }}
            </label>
            <small>{{ $lang?.step1?.beca_description }}</small>
        </div>

        <hr>

        <p class="fw-bold">{{ $lang?.step1?.contacts }} <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ $lang?.step1?.contact_name }}</th>
                    <th scope="col">{{ $lang?.step1?.contact_club }}</th>
                    <th scope="col">{{ $lang?.step1?.contact_district }}</th>
                    <th scope="col">{{ $lang?.step1?.contact_patro }}</th>
                    <th scope="col">{{ $lang?.step1?.contact_paper }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="contact in $store.state.step1.contacts" :key="contact.id">
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.club }}</td>
                    <td>{{ contact.district }}</td>
                    <td>{{ contact.patrocinador }}</td>
                    <td>{{ contact.papel }}</td>
                </tr>
                <tr>
                    <td ><a href="#!" @click="showModal()" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ {{ $lang?.step1?.add_contact }}</a></td>
                </tr>
            </tbody>
        </table>



        <div class="d-flex justify-content-start gap-3">
            <button class="btn btn-primary" type="submit">
                {{ $lang?.layout?.save_and_continue }}
            </button>
            <button class="btn btn-outline-primary" type="submit">
                {{ $lang?.layout?.cancel }}
            </button>
            <a class="btn btn-link" :href="route('dashboard')">
                {{ $lang?.layout?.out }}
            </a>
        </div>


<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="mb-3">{{ $lang?.step1?.modal?.title }}</h3>
                        <h6 class="text-uppercase">{{ $lang?.step1?.modal?.first_contact }}</h6>
                        <small>{{ $lang?.step1?.modal?.default }}</small>
                        <hr>

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ $lang?.step1?.modal?.role }}</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contacto1_papel" id="local" value="Local" v-model="prin_contact.papel">
                                <label class="form-check-label" for="local">{{ $lang?.step1?.modal?.local }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contacto1_papel" id="internacional" v-model="prin_contact.papel" value="Internacional">
                                <label class="form-check-label" for="internacional">{{ $lang?.step1?.modal?.international }}</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ $lang?.step1?.modal?.your_patro }}</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contacto1_patrocinador" id="patrocinador_local" v-model="prin_contact.patrocinador" value="Local" checked>
                                <label class="form-check-label" for="patrocinador_local">{{ $lang?.step1?.modal?.local }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contacto1_patrocinador" id="patrocinador_internacional" v-model="prin_contact.patrocinador" value="Internacional">
                                <label class="form-check-label" for="patrocinador_internacional">{{ $lang?.step1?.modal?.international }}</label>
                            </div>
                        </div>


                        <h6 class="text-uppercase">{{ $lang?.step1?.modal?.second_contact }}</h6>
                        <small>{{ $lang?.step1?.modal?.second_contact_description }}</small>
                        <hr>

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ $lang?.step1?.modal?.his_patro }}</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contacto2_patrocinador" id="distrito" v-model="secun_contact.patrocinador" value="Distrito" checked>
                                <label class="form-check-label" for="distrito">{{ $lang?.step1?.modal?.district }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contacto2_patrocinador" id="rotarac_club" v-model="secun_contact.patrocinador" value="Rotarac Club">
                                <label class="form-check-label" for="rotarac_club">{{ $lang?.step1?.modal?.rotarac_club }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contacto2_patrocinador" id="rotary_club" v-model="secun_contact.patrocinador" value="Rotary Club">
                                <label class="form-check-label" for="rotary_club">{{ $lang?.step1?.modal?.rotary_club }}</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="" class="form-label">{{ $lang?.step1?.modal?.his_district }}</label>
                                <select class="form-select" aria-label="Default select example" v-model="secun_contact.district">
                                    <option value="6990" selected>6990</option>
                                    <!-- <option value="4060" selected>4060</option>
                                    <option value="4100">4100</option>
                                    <option value="4110">4110</option>
                                    <option value="4130">4130</option>
                                    <option value="4140">4140</option>
                                    <option value="4170">4170</option>
                                    <option value="4185">4185</option>
                                    <option value="4195">4195</option>
                                    <option value="4240">4240</option>
                                    <option value="4250">4250</option>
                                    <option value="4271">4271</option>
                                    <option value="4281">4281</option>
                                    <option value="4370">4370</option>
                                    <option value="4380">4380</option> -->
                                </select>
                            </div>
                            <div class="col">
                                <label for="" class="form-label">{{ $lang?.step1?.modal?.his_club }}</label>
                                <select class="form-select" aria-label="Default select example" v-model="secun_contact.club">
                                    <!-- <option v-for="(item, index) in clubs" :key="index" :value="item" >{{ item }}</option> -->
                                    <option value="New York" selected>New York</option>
                                </select>
                            </div>
                        </div>

                        <table class="display mt-5" width="100%">
                            <thead>
                                <tr>
                                    <th>{{ $lang?.step1?.modal?.member_number }}</th>
                                    <th>{{ $lang?.step1?.modal?.names }}</th>
                                    <th>{{ $lang?.step1?.modal?.last_names }}</th>
                                    <th>{{ secun_contact.names.length }} {{ $lang?.step1?.modal?.selected }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in step1_contacts" :key="index">
                                    <td>{{ item.code }}</td>
                                    <td>{{ item.firstname }}</td>
                                    <td>{{ item.lastname }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2" :class="(this.secun_contact.names.indexOf(item) === -1) ? 'btn-outline-primary' : 'btn-primary text-white' " @click="addContactName(item)">{{ $lang?.step1?.modal?.select }}</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ $lang?.layout?.cancel }}</button>
                        <button type="button" class="btn btn-primary" @click="addContacts()" data-bs-dismiss="modal">{{ $lang?.layout?.save }}</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</template>

<script>
import axios from 'axios'
import clubs from '@/Utils/clubes.json'
import club_rotarac from '@/Utils/clubes_rotarac.json'
import step1_contacts from '@/Utils/step1_contacts.json'

export default {
    props: {
        errors: [],
        data: Object,
    },
    data() {
        return {
            prin_contact: {
                patrocinador: this.$lang?.step1?.modal?.international,
                papel: this.$lang?.step1?.modal?.local,
            },
            secun_contact: {
                club: 'New York',
                district: '6990',
                patrocinador: this.$lang?.step1?.modal?.local,
                papel: this.$lang?.step1?.modal?.local,
                names: [],
            },
            clubs: clubs,
            clubs_rotary: clubs,
            club_rotarac: club_rotarac,
            step1_contacts: step1_contacts,
        }
    },
    mounted: function () {
        console.log(this.$store.state.step1.contacts)
        console.log(this.$page);
    },
    methods: {
        addContactName(item) {
            if (this.secun_contact.names.indexOf(item) === -1) {
                this.secun_contact.names.push(item)
            }else{
                this.secun_contact.names.splice(this.secun_contact.names.indexOf(item), 1)
            }
        },

        addContacts() {
            this.$store.state.step1.contacts = []

            this.$store.state.step1.contacts?.push({
                id: 1,
                name: this.$page.props.auth.user.name,
                club: this.$page.props.auth.user.club,
                district: this.$page.props.auth.user.district,
                patrocinador: this.$lang?.step1?.modal?.local,
                papel: this.$lang?.step1?.modal?.local,
            })

            this.secun_contact.names.forEach((el, i) => {
                this.$store.state.step1.contacts?.push({
                    id: i,
                    name: `${el.firstname} ${el.lastname}`,
                    club: 'New York',
                    district: '6990',
                    patrocinador: this.$lang?.step1?.modal?.international,
                    papel: this.$lang?.step1?.modal?.international,
                })
            })

            /*
            this.$store.state.step1.contacts?.push({
                id: 1,
                name: this.$page.props.auth.user.name,
                club: this.$page.props.auth.user.club,
                district: this.$page.props.auth.user.district,
                patrocinador: this.prin_contact.patrocinador ?? 'Internacional',
                papel: this.prin_contact.papel ?? 'Internacional',
            })

            this.secun_contact.names.forEach((el, i) => {
                this.$store.state.step1.contacts?.push({
                    id: i,
                    name: `${el.firstname} ${el.lastname}`,
                    club: this.secun_contact.club ?? 'Harlem',
                    district: this.secun_contact.district ?? '4240',
                    patrocinador: this.secun_contact.patrocinador ?? 'Local',
                    papel: this.secun_contact.papel ?? 'Local',
                })
            })
            */

            console.log(this.$store.state.step1.contacts);
        },

        findId(id) {
            let find = this.$store.state.step1.contacts?.includes(item => item.id == id)

            return find
        },

        showModal() {
            document.body.appendChild( document.querySelector('#exampleModal') )
        },

        submit() {
            axios.post(route('simulation.save.step1'), {
                ...this.$store.state.step1,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal(this.$lang?.step1?.success_message, '', 'success');

                let url = `${window.location.origin}/simulation/${response?.data?.data?.id}`;

                window.location.href = url;

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
    watch:{
		"secun_contact.patrocinador": function (val) {
            console.log(val);
            this.clubs = []

			if (val == "Rotarac Club") {
                this.clubs = this.club_rotarac
            }else{
                this.clubs = this.clubs_rotary
            }
		},
	}
}
</script>
