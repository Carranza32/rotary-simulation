<template>
    <div>
        <p class="fw-bold">¿A qué áreas de interés pertenece el proyecto?</p>
        <p>Selecciona al menos un área. Te pediremos que establezcas metas y respondas a ciertas preguntas para cada área de interés que selecciones. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="Paz y prevención de conflictos" v-model="$store.state.step4.interest_area" id="paz">
            <label class="form-check-label" for="paz">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Paz y prevención de conflictos
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="Prevención y tratamiento de enfermedades" v-model="$store.state.step4.interest_area" id="prev">
            <label class="form-check-label" for="prev">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Prevención y tratamiento de enfermedades
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="Agua, saneamiento e higiene" v-model="$store.state.step4.interest_area" id="agua">
            <label class="form-check-label" for="agua">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Agua, saneamiento e higiene
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="Salud materno-infantil" v-model="$store.state.step4.interest_area" id="salud">
            <label class="form-check-label" for="salud">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Salud materno-infantil
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="Alfabetización y educación básica" v-model="$store.state.step4.interest_area" id="alf">
            <label class="form-check-label" for="alf">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Alfabetización y educación básica
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="Desarrollo económico de la comunidad" v-model="$store.state.step4.interest_area" id="des">
            <label class="form-check-label" for="des">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Desarrollo económico de la comunidad
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="Medioambiente" v-model="$store.state.step4.interest_area" id="ambiente">
            <label class="form-check-label" for="ambiente">
                <img src="https://via.placeholder.com/40" class="rounded-circle">
                Medioambiente
            </label>
        </div>
    </div>
</template>
