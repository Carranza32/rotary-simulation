
<template>
    <div>
        <Step5PazPrev />

        <hr>

        <p class="fw-bold">¿Cómo medirás el impacto del proyecto? Para más información, consulta la publicación <a href="https://www.rotary.org/myrotary/es/document/global-grant-monitoring-and-evaluation-plan-supplement">Suplemento - Plan de monitoreo y evaluación de Subvenciones Globales</a>. Como parte de la solicitud, deberás incluir al menos una medida estandarizada de las incluidas en el menú desplegable.</p>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Medida</th>
                    <th scope="col">Método para obtener la información</th>
                    <th scope="col">Frecuencia</th>
                    <th scope="col">Beneficiarios</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Añadir medida</a></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="name" class="form-label">¿Ya sabes quíen recopilará la información necesario para la evaluación y le monitoreo?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>
    </div>
</template>

<script>
import Step5PazPrev from '@/Components/Steps/Step51PazPrev.vue';

export default {
    components: {
        Step5PazPrev,
    },
}
</script>
