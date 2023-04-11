<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold text-uppercase">Organizadores y colaboradoras (OPTATIVO)
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Sitio web</th>
                    <th scope="col">Dirección</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="organize in $store.state.step7.organizers" :key="organize.id">
                    <td>{{ organize.name }}</td>
                    <td>{{ organize.website }}</td>
                    <td>{{ organize.address }}</td>
                </tr>
                <tr>
                    <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalStep7" @click="showModalStep7()">+ Agregar organización</a></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="name" class="form-label">¿Tiene alguno de los integrantes del comité un posible conflicto de interés con una de las organizaciones colaboradoras?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="has_interes_conflict" value="1" v-model="$store.state.step7.has_interes_conflict">
                <label class="form-check-label" for="has_interes_conflict">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="has_interes_conflict" value="0" v-model="$store.state.step7.has_interes_conflict">
                <label class="form-check-label" for="has_interes_conflict">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="textarea" class="form-label">
                ¿Por qué decidiste colaborar con esta organización y qué papel desempeñará?
                <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step7.colaboration_org"></textarea>
        </div>

        <p class="fw-bold text-uppercase">Colaboradores (OPTATIVO)</p>

        <div class="mb-3">
            <label for="textarea" class="form-label">
                Indica los demás colaboradores que participarán en este proyecto
                <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step7.members"></textarea>
        </div>

        <p class="fw-bold text-uppercase">VIAJEROS VOLUNTARIOS (OPTATIVO)</p>

        <div class="mb-3">
            <p>Las subvenciones para proyectos humanitarios pueden financiar los viajes de un máximo de dos personas para que proporcionen capacitación o contribuyan a la implementación del proyecto (siempre que en el ámbito local no pudieran encontrarse personas con tales competencias). Cargar un currículum para cada viajero voluntario. No incluyas datos personales confidenciales, como números de identificación gubernamentales, religión, raza, información de salud, etc. Eres responsable de informar a los viajeros voluntarios sobre los datos personales que has proporcionado sobre ellos a Rotary y de que serán procesados de conformidad con la <a href="https://my.rotary.org/es/privacy-policy">política de privacidad</a>  de Rotary.</p>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Nacionalidad</th>
                        <th scope="col">Es socio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="travel in $store.state.step7.travellers" :key="travel.id">
                        <td>{{ travel.name }}</td>
                        <td>{{ travel.email }}</td>
                        <td>{{ travel.nacionalidad }}</td>
                        <td>{{ (travel.is_socio == 0) ? 'No' : 'Si' }}</td>
                    </tr>
                    <tr>
                        <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalStep72" @click="showModalStep72()">+ Agregar viajero</a></td>
                    </tr>
                </tbody>
            </table>
        </div>


        <p class="fw-bold text-uppercase">Participantes de rotary</p>
        <div class="mb-3">
            <label for="textarea" class="form-label">
                Describe el papel que desempeñarán los patrocinadores locales en el proyecto:
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step7.local_sponsors"></textarea>
        </div>

        <div class="mb-3">
            <label for="textarea" class="form-label">
                Describe el papel que desempeñarán los patrocinadores internacionales en el proyecto:
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step7.international_sponsors"></textarea>
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
    </form>

    <!-- Modal -->
    <div class="modal fade" id="modalStep7" tabindex="-1" aria-labelledby="modalStep7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalStep7Label"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">Nombre de la organización</label>
                            <input type="text" id="organ_name" class="form-control" v-model="org.name">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Sitio web</label>
                            <input type="text" id="organ_web" class="form-control" v-model="org.website">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Dirección</label>
                            <textarea class="form-control" id="organ_address" rows="3" v-model="org.address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="addAddress()" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalStep72" tabindex="-1" aria-labelledby="modalStep72Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalStep72Label">Agregar viajeros</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="name" class="form-label">¿La persona que viaja es socio/a de Rotary?</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_socio" :value="0" v-model="travelers.is_socio">
                                <label class="form-check-label" for="is_socio">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="is_socio" :value="1" v-model="travelers.is_socio">
                                <label class="form-check-label" for="is_socio">Si</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" v-model="travelers.name">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" v-model="travelers.email">
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-control" v-model="travelers.nacionalidad">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" @click="addTraveler()" data-bs-dismiss="modal">Guardar</button>
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
	data(){
        return {
            org: {
                id: 1,
                name: '',
                website: '',
                address: '',
            },
            travelers: {
                id: 1,
                name: '',
                email: '',
                nacionalidad: '',
                is_socio: false,
            }
        }
    },
    methods: {
        showModalStep7(){
            document.body.appendChild( document.querySelector('#modalStep7') )
        },

        showModalStep72(){
            document.body.appendChild( document.querySelector('#modalStep72') )
        },

        addAddress() {
            if (this.$store.state.step7.organizers == null) {
                this.$store.state.step7.organizers = []
            }

            this.$store.state.step7.organizers.push({
                id: this.$store.state.step7.organizers.length + 1,
                name: this.org.name,
                website: this.org.website,
                address: this.org.address
            })

            console.log(this.$store.state.step7.organizers);
        },

        addTraveler() {
            if (this.$store.state.step7.travellers == null) {
                this.$store.state.step7.travellers = []
            }

            this.$store.state.step7.travellers.push({
                id: this.$store.state.step7.travellers + 1,
                name: this.travelers.name,
                email: this.travelers.email,
                nacionalidad: this.travelers.nacionalidad,
                is_socio: this.travelers.is_socio
            })

            console.log(this.$store.state.step7.travellers);
        },

        submit() {
            axios.post(route('simulation.save.step7'), {
                ...this.$store.state.step7,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 7 guardado con éxito', '', 'success');
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
