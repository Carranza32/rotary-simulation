<template>
    <div>
        <p class="fw-bold">Háblanos sobre los fondos que has conseguido para el proyecto. Utilizaremos esta información para calcular la máxima aportación de contrapartida que podrías recibir del Fondo Mundial.</p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fuente</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Monto (en USD$)</th>
                        <th scope="col">Apoyo*</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Efectivo procedente</td>
                        <td>120</td>
                        <td>24.00</td>
                        <td>1.20</td>
                        <td>25.20</td>
                        <td>
                            <div class="d-flex justify-content-between w-100">
                                <i class="fa-solid fa-pen"></i>
                                <i class="fa-solid fa-circle-xmark"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <a href="#!">+ Agregar fuente de financiamiento</a>
                        </td>
                    </tr>
                </tfoot>
                <caption>* Cada vez que se realice una contribución en efectivo a un proyecto financiado por una Subvención Global, deberá añadirse 5 por ciento adicional para cubrir los gastos asociados con el procesamiento de dichos fondos. Los clubes y distritos recibirán los puntos para el reconocimiento Socio Paul Harris que correspondan a este cargo adicional.</caption>
            </table>
        </div>

        <p class="fw-bold">¿Cuál es el monto del Fondo Mundial que te gustaría recibir para este proyecto?
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>
        <div class="bg-light p-3">
            <div class="row">
                <div class="col-6">
                    <p class="tw-bold">Puedes solicitar hasta 0.00 US$ del Fondo Mundial.</p>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" value="23000">
                    <div class="invalid-feedback">
                        La cantidad que solicitaste supera el monto disponible.
                    </div>
                </div>
            </div>
        </div>

        <p class="fw-bold">Resumen de la financiación
            <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
        </p>
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="fa-solid fa-circle-exclamation"></i>
            <div class="ms-3">
                <span class="text-uppercase">Atencion:</span><br>
                El total financiado de este proyecto no coincide con el presupuesto total.
            </div>
        </div>

        <div class="row my-3">
            <div class="col"></div>
            <div class="col">
                <table class="w-100">
                    <tr>
                        <td class="text-end">Contribuciones en efectivo:</td>
                        <td class="text-end">24.00</td>
                    </tr>
                    <tr>
                        <td class="text-end">Fondo mundial:</td>
                        <td class="text-end">23,000.00</td>
                    </tr>
                    <tr class="p-3">
                        <td class="text-end fw-bold my-3">Total financiado:</td>
                        <td class="text-end">23,024.00</td>
                    </tr>
                    <tr>
                        <td class="text-end">Presupuesto total:</td>
                        <td class="text-end">0</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</template>
