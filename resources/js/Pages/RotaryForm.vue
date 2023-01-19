<template>
    <Head title="Formulario" />

    <AuthenticatedLayout>
        <h1 class="mt-5 font-semibold text-xl text-gray-800 leading-tight">Solicitud de Subvención Global</h1>
        <hr>

        <div class="mt-5">
            <div class="">
                <p><strong>Todos los campos son obligatorios salvo que se indique que son optativos.</strong></p>
                <p>Proporciónanos cierta información básica y asignaremos un número a tu solicitud.</p>

                <accordion id="step-1" title="Paso #1">
                    <p>¿Qué tipo de proyecto piensas llevar a cabo?</p>
                    <p>Marca todas las opciones que correspondan, a fin de determinar qué otros datos se necesitan.</p>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Proyecto humanitario
                            <span>Aborda necesidades de la comunidad con resultados mensurables y sostenibles.</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Equipo de capacitación profesional
                            <span>Mejorar las competencias de la comunidad mediante el financiamiento del viaje de un grupo de profesionales para que capaciten a sus pares locales o adquieran nuevas habilidades.</span>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Beca
                            <span>Financia estudios de postgrado de personas interesadas en seguir una carrera profesional en una de las áreas de interés de Rotary.</span>
                        </label>
                    </div>
                </accordion>

                <accordion id="step-2" title="Paso #2">
                    <p><strong>Selecciona a los contactos principales (local e internacional) del proyecto</strong></p>
                </accordion>

                <accordion id="step-2" title="Paso #2">
                    <p><strong>Contactos principales</strong></p>

                    PRIMER CONTACTO PRINCIPAL
                    Has sido designado automáticamente como contacto principal del proyecto. Antes de seleccionar al segundo, háblanos sobre tu papel y los patrocinadores del proyecto.
                    Tu papel
                    Local  Internacional

                    Tu patrocinador
                    Distrito  Club


                    SEGUNDO CONTACTO PRINCIPAL
                    ¿Quién es el contacto principal internacional? Búscalo en los campos de búsqueda que figuran continuación.
                    Su patrocinador
                    Distrito  Rotaract Club  Rotary Club

                </accordion>
            </div>
            <aside>
                Aside
            </aside>
        </div>
    </AuthenticatedLayout>
</template>

<script>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import Accordion from '@/Components/Accordion.vue';
    import { Head } from '@inertiajs/vue3';

    export default {
        components: {
            AuthenticatedLayout,
            Head,
            Accordion,
        },
    }
</script>
