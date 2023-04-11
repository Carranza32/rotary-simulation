<template>
    <div>
        <hr>

        <p class="fw-bold">¿Cómo medirás el impacto del proyecto? Para más información, consulta la publicación <a href="https://www.rotary.org/myrotary/es/document/global-grant-monitoring-and-evaluation-plan-supplement">Suplemento - Plan de monitoreo y evaluación de Subvenciones Globales</a>. Como parte de la solicitud, deberás incluir al menos una medida estandarizada de las incluidas en el menú desplegable.</p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Medida</th>
                    <th scope="col">Método para obtener la información</th>
                    <th scope="col">Frecuencia</th>
                    <th scope="col">Beneficiarios</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="measure in measures" :key="measure.id">
                    <td>{{ measure.measure }}</td>
                    <td>{{ measure.method }}</td>
                    <td>{{ measure.frecuencie }}</td>
                    <td>{{ measure.benefits }}</td>
                    <td>
                        <div class="d-flex justify-content-between w-100">
                            <a style="cursor: pointer;" @click="editRowTable(measure)" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" :data-bs-target="'#modalStep'+id" ><i class="fa-solid fa-pen me-3 text-secondary"></i></a>
                            <a style="cursor: pointer;" @click="deleteRowTable(measure)"><i class="fa-solid fa-circle-xmark text-secondary"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><a href="#!" @click="addRowTable()" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" :data-bs-target="'#modalStep'+id" >+ Añadir medida</a></td>
                </tr>
            </tbody>
        </table>


    </div>
</template>

<script>
export default {
    props: {
        measures: [],
        id: String,
    },
    methods: {
        showModal() {
            document.body.appendChild( document.querySelector(`#modalStep${this.id}`) )
        },

        addRowTable() {
            this.$store.state.step5.is_editing = false;

            this.$store.state.step5.selected_measure = {
                measure: '',
                method: '',
                frecuencie: '',
                benefits: '',
            };

            this.showModal();
        },

        deleteRowTable(item) {
            this.$store.commit('setStep5DeleteMeasure', this.id, item);
        },

        editRowTable(item) {
            //this.$store.commit('setStep5EditMeasure', this.id, item);
            this.$store.state.step5.is_editing = true;
            this.$store.state.step5.editing_id = item.id;
            this.$store.state.step5.selected_measure = item;

            this.showModal();
        }
    }
}
</script>
