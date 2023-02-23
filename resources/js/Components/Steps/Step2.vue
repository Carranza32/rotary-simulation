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
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">4240</option>
                                    <option value="1">4240</option>
                                    <option value="1">4240</option>
                                    <option value="1">4240</option>
                                </select>
                            </div>

                            <div class="col my-3">
                                <label for="name" class="form-label">Tipo de club</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club1" value="rotary">
                                    <label class="form-check-label" for="local">Club Rotary</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club2" value="rotaract">
                                    <label class="form-check-label" for="internacional">Club Rotaract</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="" class="form-label">Su club</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">1010</option>
                                    <option value="1">1010</option>
                                    <option value="1">1010</option>
                                    <option value="1">1010</option>
                                </select>
                            </div>
                        </div>

                        <table class="display mt-5" width="100%">
                            <thead>
                                <tr>
                                    <th>Número de socio</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
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
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">4240</option>
                                    <option value="1">4240</option>
                                    <option value="1">4240</option>
                                    <option value="1">4240</option>
                                </select>
                            </div>

                            <div class="col my-3">
                                <label for="name" class="form-label">Tipo de club</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club1" value="rotary">
                                    <label class="form-check-label" for="local">Club Rotary</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="club2" value="rotaract">
                                    <label class="form-check-label" for="internacional">Club Rotaract</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="" class="form-label">Selecciona el club</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Harlem</option>
                                    <option value="1">Harlem</option>
                                    <option value="1">Harlem</option>
                                    <option value="1">Harlem</option>
                                </select>
                            </div>
                        </div>

                        <table class="display mt-5" width="100%">
                            <thead>
                                <tr>
                                    <th>Número de socio</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5879654</td>
                                    <td>Adrian</td>
                                    <td>Blake</td>
                                    <td>
                                        <button class="btn btn-outline-primary my-2">Select</button>
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
export default {
    props: {
        errors: [],
        data: Object,
    },
    methods: {
        showModal1() {
            console.log(document.querySelector('#modalStep21'));
            document.body.appendChild( document.querySelector('#modalStep21') )
        },
        showModal2() {
            document.body.appendChild( document.querySelector('#modalStep22') )
        },

        addNational() {
            this.$store.state.step2.local_members = []

            this.$store.state.step2.local_members?.push({
                id: 1,
                name: this.$page.props.auth.user.name,
                club: this.$page.props.auth.user.club,
                district: this.$page.props.auth.user.district,
                papel: 'Contacto secundario',
            })

            this.$store.state.step2.local_members?.push({
                id: 2,
                name: 'John Doe',
                club: 'San Salvador',
                district: '4240',
                papel: 'Contacto secundario',
            })

            console.log(this.$store.state.step2.local_members);
        },

        addInternational() {
            this.$store.state.step2.international_members = []

            this.$store.state.step2.international_members?.push({
                id: 1,
                name: this.$page.props.auth.user.name,
                club: this.$page.props.auth.user.club,
                district: this.$page.props.auth.user.district,
                papel: 'Contacto secundario',
            })

            this.$store.state.step2.international_members?.push({
                id: 2,
                name: 'John Doe',
                club: 'New York',
                district: '7230',
                papel: 'Internacional',
            })

            console.log(this.$store.state.step2.international_members);
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
                this.$swal('Step 2 saved successfully', '', 'success');
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
