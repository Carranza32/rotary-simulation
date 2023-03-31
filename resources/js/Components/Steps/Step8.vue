<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">Indica qué moneda se utilizará en el presupuesto del proyecto</p>
        <p>La moneda que selecciones deberá ser la que utilices para la mayoría de los gastos del proyecto. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Modena local</label>
                    <select class="form-select" aria-label="Default select example" v-model="$store.state.step8.currency">
                        <option value="USD" selected>USD</option>
                        <option value="EUR">EUR</option>
                        <option value="CLP">CLP</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exchange_rate" class="form-label"><a href="#!">Tipo de cambio</a> (por dólar estadounidense)</label>
                    <input type="number" class="form-control" id="exchange_rate" v-model="$store.state.step8.exchange_rate" >
                    <small>Guardado el 18/01/2023</small>
                </div>
            </div>
        </div>

        <hr>
        <p class="fw-bold">Presupuesto de la subvención</p>
        <p>Indica todos los rubros del presupuesto. El presupuesto total debe coincidir con el monto de los fondos el cual se calculará en el noveno paso. Por tal motivo, los presupuestos de las subvenciones, incluida la aportación del Fondo Mundial, deberán ser al menos US$ 30.000. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>


        <div class="table-responsiv">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Costo en USD</th>
                        <th scope="col">Costo en US$</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in budget_table" :key="item.id" >
                        <td>{{ item.id }}</td>
                        <td>
                            <select class="form-select" aria-label="Default select example" v-model="item.category">
                                <option disabled>--Selecciona una opción--</option>
                                <option value="Accommodation">Alojamiento</option>
                                <option value="Equipos">Equipos</option>
                                <option value="Monitoreo / evaluación">Monitoreo / evaluación</option>
                                <option value="Operaciones">Operaciones</option>
                                <option value="Personal">Personal</option>
                                <option value="Administración de proyecto">Administración de proyecto</option>
                                <option value="Publicidad">Publicidad</option>
                                <option value="Señalización">Señalización</option>
                                <option value="Suministros">Suministros</option>
                                <option value="Entrenamiento">Entrenamiento</option>
                                <option value="Viajes">Viajes</option>
                                <option value="Matrícula">Matrícula</option>
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
                            <button type="button" @click="addBudgetTableItem()">+ Agregar rubro</button>
                        </td>
                    </tr>
                    <tr class="table-light">
                        <td colspan="4">
                            <span class="float-end">Presupuesto total:</span>
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
            return this.budget_table.reduce((acc, item) => acc + item.cost, 0)
        },
        submit() {
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
