<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="mt-3 mb-4">Proporciónanos cierta información básica y asignaremos un número a tu solicitud.</p>

        <div class="mb-3">
            <label for="name" class="form-label">Indica el nombre del proyecto.</label>
            <input  type="text" name="project_name" class="form-control" id="name" v-model="$store.state.step1.project_name" maxlength="100">
            <small class="float-end">{{ $store.state.step1.project_name.length }}/100 caracteres</small>
        </div>

        <p class="fw-bold">¿Qué tipo de proyecto piensas llevar a cabo?</p>
        <p>Marca todas las opciones que correspondan, a fin de determinar qué otros datos se necesitan.</p>
        <hr>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" v-model="$store.state.step1.type" id="check_type1">
            <label class="form-check-label" for="check_type1">
                Proyecto humanitario
            </label>
            <small>Aborda necesidades de la comunidad con resultados mensurables y sostenibles.</small>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="2" v-model="$store.state.step1.type" id="check_type2">
            <label class="form-check-label" for="check_type2">
                Equipo de capacitación profesional
            </label>
            <small>Mejorar las competencias de la comunidad mediante el financiamiento del viaje de un grupo de profesionales para que capaciten a sus pares locales o adquieran nuevas habilidades.</small>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="3" v-model="$store.state.step1.type" id="check_type3">
            <label class="form-check-label" for="check_type3">
                Beca
            </label>
            <small>Financia estudios de postgrado de personas interesadas en seguir una carrera profesional en una de las áreas de interés de Rotary.</small>
        </div>

        <hr>

        <p class="fw-bold">Selecciona a los contactos principales (local e internacional) del proyecto <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Club</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Patrocinador</th>
                    <th scope="col">Papel</th>
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
                    <td ><a href="#!" @click="showModal()" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Añadir contacto principal</a></td>
                </tr>
            </tbody>
        </table>



        <div class="d-flex justify-content-start gap-3">
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="mb-3">Contactos principales</h3>
                        <h6 class="text-uppercase">Primer contacto principal</h6>
                        <small>Has sido designado automáticamente como contacto principal del proyecto. Antes de seleccionar al segundo, háblanos sobre tu papel y los patrocinadores del proyecto.</small>
                        <hr>

                        <div class="mb-3">
                            <label for="name" class="form-label">Tu papel</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                                <label class="form-check-label" for="local">Local</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                                <label class="form-check-label" for="internacional">Internacional</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tu patrocinador</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                                <label class="form-check-label" for="local">Local</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                                <label class="form-check-label" for="internacional">Internacional</label>
                            </div>
                        </div>


                        <h6 class="text-uppercase">Segundo contacto principal</h6>
                        <small>¿Quién es el contacto principal internacional? Búscalo en los campos de búsqueda que figuran continuación.</small>
                        <hr>

                        <div class="mb-3">
                            <label for="name" class="form-label">Su patrocinador</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                                <label class="form-check-label" for="local">Distrito</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                                <label class="form-check-label" for="internacional">Rotarac Club</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                                <label class="form-check-label" for="internacional">Rotary Club</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="" class="form-label">Su distrito</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">1010</option>
                                    <option value="1">1010</option>
                                    <option value="1">1010</option>
                                    <option value="1">1010</option>
                                </select>
                            </div>
                            <div class="col">
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
                        <button type="button" class="btn btn-secondary" @click="addContacts()" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" @click="addContacts()" data-bs-dismiss="modal">Guardar</button>
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
    data() {
        return {
        }
    },
    mounted: function () {
        console.log(this.$store.state.step1.contacts)
        console.log(this.$page);
    },
    methods: {
        addContacts() {
            // let find = this.$store.state.step1.contacts?.find(c => c.id == item[0])

            // if (find?.length == 0 || find == undefined) {
            //     this.$store.state.step1.contacts?.push({
            //         id: item[0],
            //         name: item[1],
            //         lastname: item[2]
            //     })
            // }

            this.$store.state.step1.contacts = []

            this.$store.state.step1.contacts?.push({
                id: 1,
                name: this.$page.props.auth.user.name,
                club: this.$page.props.auth.user.club,
                district: this.$page.props.auth.user.district,
                patrocinador: 'Distrito',
                papel: 'Local',
            })

            this.$store.state.step1.contacts?.push({
                id: 2,
                name: 'John Doe',
                club: 'New York',
                district: '7230',
                patrocinador: 'Distrito',
                papel: 'Internacional',
            })

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
                this.$swal('Step 1 saved successfully', '', 'success');

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
    }
}
</script>
