<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

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
                <tr v-for="contact in $store.state.step2.local_members" :key="contact.id">
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.club }}</td>
                    <td>{{ contact.district }}</td>
                    <td>{{ contact.papel }}</td>
                </tr>
                <tr>
                    <td><a href="#!"  @click="showModal1()" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalStep21" >+ Añadir contacto principal</a></td>
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
                <tr v-for="contact in $store.state.step2.international_members" :key="contact.id">
                    <td>{{ contact.name }}</td>
                    <td>{{ contact.club }}</td>
                    <td>{{ contact.district }}</td>
                    <td>{{ contact.papel }}</td>
                </tr>
                <tr>
                    <td><a href="#!" @click="showModal2()" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalStep22" >+ Añadir contacto principal</a></td>
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
            <a class="btn btn-link" :href="route('dashboard')">
                Salir
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalStep21" tabindex="-1" aria-labelledby="modalStep21Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalStep21Label">Patrocinadores local</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="form-label">Su distrito</label>
                                <select class="form-select" aria-label="Default select example" v-model="local_members.district">
                                    <option value="4060" selected>4060</option>
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
                                    <option value="4380">4380</option>
                                </select>
                            </div>

                            <div class="col my-3">
                                <label for="name" class="form-label">Tipo de club</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club1" value="Club Rotary" v-model="local_members.type">
                                    <label class="form-check-label" for="local">Club Rotary</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club2" value="Club Rotaract" v-model="local_members.type">
                                    <label class="form-check-label" for="internacional">Club Rotaract</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="" class="form-label">Su club</label>
                                <select class="form-select" aria-label="Default select example" v-model="local_members.club">
                                    <option v-for="(item, index) in clubs" :key="index" :value="item" >{{ item }}</option>
                                </select>
                            </div>
                        </div>

                        <table class="display mt-5" width="100%">
                            <thead>
                                <tr>
                                    <th>Número de socio</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>{{ local_members.names.length }} seleccionados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in step2_local_members" :key="index">
                                    <td>{{ item.code }}</td>
                                    <td>{{ item.firstname }}</td>
                                    <td>{{ item.lastname }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2" :class="(this.local_members.names.indexOf(item) === -1) ? 'btn-outline-primary' : 'btn-primary text-white' " @click="addLocalMemberName(item)">Seleccionar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="addNational()" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" @click="addNational()" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalStep22" tabindex="-1" aria-labelledby="modalStep22Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalStep22Label">Patrocinadores internacional</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="form-label">Su distrito</label>
                                <select class="form-select" aria-label="Default select example" v-model="internacional_members.district">
                                    <option value="7230" selected>7230</option>
                                    <option value="4060">4060</option>
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
                                    <option value="4380">4380</option>
                                </select>
                            </div>

                            <div class="col my-3">
                                <label for="name" class="form-label">Tipo de club</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club1" value="Club Rotary" v-model="internacional_members.type">
                                    <label class="form-check-label" for="local">Club Rotary</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club2" value="Club Rotaract" v-model="internacional_members.type">
                                    <label class="form-check-label" for="internacional">Club Rotaract</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="" class="form-label">Selecciona el club</label>
                                <select class="form-select" aria-label="Default select example" v-model="internacional_members.club">
                                    <option v-for="(item, index) in international_clubs" :key="index" :value="item" >{{ item }}</option>
                                </select>
                            </div>
                        </div>

                        <table class="display mt-5" width="100%">
                            <thead>
                                <tr>
                                    <th>Número de socio</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>{{ internacional_members.names.length }} seleccionados</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in step2_internacional_members" :key="index">
                                    <td>{{ item.code }}</td>
                                    <td>{{ item.firstname }}</td>
                                    <td>{{ item.lastname }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2" :class="(this.internacional_members.names.indexOf(item) === -1) ? 'btn-outline-primary' : 'btn-primary text-white' " @click="addInternacionalMemberName(item)">Seleccionar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="addInternational()" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" @click="addInternational()" data-bs-dismiss="modal">Guardar</button>
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
import step2_local_members from '@/Utils/step2_local_members.json'
import step2_internacional_members from '@/Utils/step2_internacional_members.json'
import step2_international_clubs from '@/Utils/international_clubs.json'

export default {
    props: {
        errors: [],
        data: Object,
    },
    data() {
        return {
            local_members: {
                club: 'Aguadulce (89493)',
                district: '4240',
                type: 'Club Rotary',
                names: [],
            },
            internacional_members: {
                club: 'Aguadulce (89493)',
                district: '7230',
                type: 'Club Rotary',
                names: [],
            },
            clubs: clubs,
            international_clubs: step2_international_clubs,
            clubs_rotary: clubs,
            club_rotarac: club_rotarac,
            step2_local_members: step2_local_members,
            step2_internacional_members: step2_internacional_members,
        }
    },
    methods: {
        showModal1() {
            console.log(document.querySelector('#modalStep21'));
            document.body.appendChild( document.querySelector('#modalStep21') )
        },
        showModal2() {
            document.body.appendChild( document.querySelector('#modalStep22') )
        },

        addLocalMemberName(item) {
            if (this.local_members.names.indexOf(item) === -1) {
                this.local_members.names.push(item)
            }else{
                this.local_members.names.splice(this.local_members.names.indexOf(item), 1)
            }
        },

        addInternacionalMemberName(item) {
            if (this.internacional_members.names.indexOf(item) === -1) {
                this.internacional_members.names.push(item)
            }else{
                this.internacional_members.names.splice(this.internacional_members.names.indexOf(item), 1)
            }
        },

        addNational() {
            this.$store.state.step2.local_members = []

            this.local_members.names.forEach((el, i) => {
                this.$store.state.step2.local_members?.push({
                    id: i,
                    name: `${el.firstname} ${el.lastname}`,
                    club: this.local_members.club ?? 'Harlem',
                    district: this.local_members.district ?? '4240',
                    papel: 'Contacto secundario',
                })
            })


        },

        addInternational() {
            this.$store.state.step2.international_members = []

            this.internacional_members.names.forEach((el, i) => {
                this.$store.state.step2.international_members?.push({
                    id: i,
                    name: `${el.firstname} ${el.lastname}`,
                    club: this.internacional_members.club ?? '1010',
                    district: this.internacional_members.district ?? '4240',
                    papel: 'Internacional',
                })
            })
        },

        submit() {
            console.log(this.$page);
            axios.post(route('simulation.save.step2'), {
                ...this.$store.state.step2,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 2 guardado con éxito', '', 'success');
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
		"local_members.type": function (val) {
            console.log(val);
            this.clubs = []

			if (val == "Club Rotaract") {
                this.clubs = this.club_rotarac
            }else{
                this.clubs = this.clubs_rotary
            }
		},

		/*"internacional_members.type": function (val) {
            console.log(val);
            this.international_clubs = []

			if (val == "Club Rotaract") {
                this.international_clubs = this.club_rotarac
            }else{
                this.international_clubs = this.clubs_rotary
            }
		},*/
	}
}
</script>
