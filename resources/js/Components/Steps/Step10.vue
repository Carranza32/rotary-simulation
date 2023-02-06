<template>
    <div>
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">Los proyectos sostenibles ofrecen soluciones a largo plazo a los problemas que enfrenta una comunidad. Para que un proyecto sea sostenible, los integrantes de la comunidad deberán mantener por si mismos las actividades del proyecto una vez se agoten los fondos de la subvención. Tus respuestas a las preguntas que se incluyen a continuación nos ayudarán a determinar qué elementos del proyecto lo hacen sostenible.</p>
        <h4>PROYECTOS HUMANITARIOS</h4>

        <p class="fw-bold">Planificaión del proyecto</p>
        <hr>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Describe las necesidades de la comunidad que abordará el proyecto.</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué proceso se siguió para determinar estas necesidades?</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Cómo participaron los integrantes de la comunidad beneficiaria en la búsqueda de soluciones?</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué participación tuvieron los integrantes de la comunidad local en la planificación del proyecto?</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <p class="fw-bold">Implementación del proyecto</p>
        <hr>

        <p class="fw-bold">Resume cada etapa de la implementación del proyecto.</p>
        <small>Do not include sensitive personal data, such as government ID numbers, religion, race, health information, etc. If you include personal data, you are responsible for informing those whose personal data is included that you are providing it to Rotary and that it will be processed in accordance with Rotary’s Privacy Policy.</small>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"># Actividad</th>
                    <th scope="col">Duración</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="#!" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" >+ Agregar actividad</a></td>
                </tr>
            </tbody>
        </table>

        <div class="mb-3">
            <label for="name" class="form-label">¿Trabajarás en coordinación con otras iniciativas afines que estuvieran en marcha en la comunidad?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Describe los programas de capacitación, educación o divulgación a la comunidad que abarcará el proyecto.</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué proceso se siguió para determinar las necesidades?</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Qué incentivos (por ejemplo: compensación económica, premios, certificaciones o publicidad) se utilizarán para animar a los integrantes de la comunidad a participar en el proyecto?</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Ingresa el nombre de los integrantes o grupos de la comunidad que supervisarán las actividades del proyecto una vez concluidas las actividades financiadas con la subvención.</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <h4>PRESUPUESTO</h4>
        <div class="mb-3">
            <label for="name" class="form-label">¿Usarás proveedores locales para adquirir los equipos y materiales presupuestados?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">¿Se utilizó un proceso de licitación para seleccionar a los proveedores?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">¿Tiene alguno de los integrantes del comité un posible conflicto de interés con alguno de los proveedores?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Si el proyecto incluye la adquisición de equipos o materiales, proporciona el plan de operación y mantenimiento. El plan deberá indicar quiénes estarán a cargo de operar y brindar mantenimiento a los equipos y la capacitación que recibirán</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Describe como los integrantes de la comunidad brindarán mantenimiento a los equipos una vez concluidas las actividades de la subvención. ¿Podrán encontrarse repuestos?</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Si se utilizarán fondos de la subvención para adquirir equipos, ¿serán éstos adecuados al entorno cultural y los estándares tecnológicos de la comunidad?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Una vez completado el proyecto, ¿a quién pertenecerán los artículos adquiridos con los fondos de la subvención? Ningún artículo podrá ser propiedad de un distrito, club o socio.</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Si se utilizarán fondos de la subvención para adquirir equipos, ¿serán éstos adecuados al entorno cultural y los estándares tecnológicos de la comunidad?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">Una vez completado el proyecto, ¿a quién pertenecerán los artículos adquiridos con los fondos de la subvención? Ningún artículo podrá ser propiedad de un distrito, club o socio.</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>

        <h4>FINANCIACIÓN</h4>
        <div class="mb-3">
            <label for="name" class="form-label">¿Incluye tu proyecto actividades de microcrédito?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">¿Cuentas con una fuente de financiación local para mantener los resultados del proyecto a largo plazo? </label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="local" value="local" checked>
                <label class="form-check-label" for="local">Si</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="papel" id="internacional" value="internacional">
                <label class="form-check-label" for="internacional">No</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="txtarea1" class="form-label">¿Generará algún elemento del proyecto ingresos que se destinarán a financiar el proyecto a largo plazo? De ser así, explica.</label>
            <textarea class="form-control" id="txtarea1" rows="3"></textarea>
        </div>
    </div>
</template>
