<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <p class="fw-bold">¿A qué áreas de interés pertenece el proyecto?</p>
        <p>Selecciona al menos un área. Te pediremos que establezcas metas y respondas a ciertas preguntas para cada área de interés que selecciones. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="step-4-checks">
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" name="paz" id="paz">
                <label class="form-check-label" for="paz">
                    <img src="../../assets/images/pazyprevencion.png" height="40" class="rounded-circle">
                    Paz y prevención de conflictos
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="2" id="prev" name="prev" >
                <label class="form-check-label" for="prev">
                    <img src="../../assets/images/prevencionenfermedades.png" height="40" class="rounded-circle">
                    Prevención y tratamiento de enfermedades
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="3"  id="agua" name="agua" >
                <label class="form-check-label" for="agua">
                    <img src="../../assets/images/aguaysaneamiento.png" height="40" class="rounded-circle">
                    Agua, saneamiento e higiene
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="4"  id="salud" name="salud" >
                <label class="form-check-label" for="salud">
                    <img src="../../assets/images/saludmaternoinfantil.png" height="40" class="rounded-circle">
                    Salud materno-infantil
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="5"  id="alf" name="alf" >
                <label class="form-check-label" for="alf">
                    <img src="../../assets/images/alfabetizacion.png" height="40" class="rounded-circle">
                    Alfabetización y educación básica
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="6"  id="des" name="des" >
                <label class="form-check-label" for="des">
                    <img src="../../assets/images/desarrolloeconomico.png" height="40" class="rounded-circle">
                    Desarrollo económico de la comunidad
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="7"  id="ambiente" name="ambiente" >
                <label class="form-check-label" for="ambiente">
                    <img src="../../assets/images/medioambiente.png" height="40" class="rounded-circle">
                    Medioambiente
                </label>
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
    </form>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        errors: [],
        data: Object,
    },
    mounted() {
        try {
            this.$store.state.step4.interest_area = JSON.parse(this.$page.props.form?.interest_area)
        } catch (error) {
            this.$store.state.step4.interest_area = []
        }

        var mi_array = this.$store.state.step4.interest_area ?? [];

        //Array

        document.querySelectorAll('.step-4-checks input').forEach((input) => {
            input.addEventListener('change', (e) => {
                if (e.target.checked) {
                    mi_array.push(e.target.value)
                } else {
                    mi_array = mi_array?.filter((item) => item !== e.target.value)
                }

                this.$store.state.step4.interest_area = mi_array
            })
        })
    },
    methods: {
        submit() {
            axios.post(route('simulation.save.step4'), {
                ...this.$store.state.step4,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Step 4 saved successfully', '', 'success');
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
    },
	watch:{
		"$store.state.currentStep": function (val) {
            console.log(val);
			if (val == 4) {
                let interest_area = this.$store.state.step4.interest_area ?? [];

                console.log(interest_area);

                if (interest_area?.length > 0) {
                    console.log("no esta vacio");
                    JSON.parse(interest_area)?.forEach((item) => {
                        let el = document.querySelector(`#accordionStepper .step-4-checks input[value="${item}"]`)
                        let el2 = document.querySelector(`#pdf-content .step-4-checks input[value="${item}"]`)
                        el.checked = true
                        el2.checked = true

                        console.log(el);
                    })
                }
            }
		},
	}
}
</script>
