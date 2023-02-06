<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors.length">
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
                        <option value="1">USD</option>
                        <option value="1">EUR</option>
                        <option value="1">CLP</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label"><a href="#!">Tipo de cambio</a> (por dólar estadounidense)</label>
                    <input type="text" disabled name="project_name" class="form-control" id="name" v-model="$store.state.step8.exchange_rate">
                    <small>Guardado el 18/01/2023</small>
                </div>
            </div>
        </div>

        <hr>
        <p class="fw-bold">Presupuesto de la subveción</p>
        <p>Indica todos los rubros del presupuesto. El presupuesto total debe coincidir con el monto de los fondos el cual se calculará en el noveno paso. Por tal motivo, los presupuestos de las subvenciones, incluida la aportación del Fondo Mundial, deberán ser al menos US$ 30.000. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>

        <div class="table-responsive">
            <table class="table table-bordered">
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
                    <tr>
                        <td>1</td>
                        <td>
                            <select class="form-select" aria-label="Default select example">
                                <option disabled>--Please Select--</option>
                                <option value="1">Accommodation</option>
                                <option value="1">Equipments</option>
                                <option value="1">Monitoring/evaluation</option>
                                <option value="1">Operaations</option>
                                <option value="1">Personnel</option>
                                <option value="1">Project management</option>
                                <option value="1">Publicity</option>
                                <option value="1">Signage</option>
                                <option value="1">Supplies</option>
                                <option value="1">Trainig</option>
                                <option value="1">Travel</option>
                                <option value="1">Tuition</option>
                            </select>
                        </td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><input type="text" name="" id=""></td>
                        <td><label for="">0.00</label></td>
                        <td>
                            <div class="d-flex justify-content-between w-100">
                                <i class="fa-solid fa-floppy-disk"></i>
                                <i class="fa-solid fa-circle-xmark"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <a href="#!">+ Agregar rubro</a>
                        </td>
                    </tr>
                    <tr class="table-light">
                        <td colspan="4">
                            <span class="float-end">Presupuesto total:</span>
                        </td>

                        <td>
                            {{ $store.state.step8.exchange_rate }}
                        </td>

                        <td colspan="2">
                            {{ $store.state.step8.exchange_rate }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" cl>
                            <a href="#!" class="float-end"><i class="fa-solid fa-down-from-line"></i> Exportar a excel</a>
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
            <button class="btn btn-link" type="button">
                Salir
            </button>
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
        submit() {
            axios.post(route('simulation.save.step8'), {
                ...this.$store.state.step8,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Step 8 saved successfully', '', 'success');
                this.$page.props.errors = []
            })
            .catch((error) => {
                this.$swal('Error', 'Something went wrong', 'error');

                this.$page.props.errors = error.response.data.errors
            })
        }
    }
}
</script>
