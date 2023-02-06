<template>
    <div>
        <h4>PAZ Y PREVENCIÓN DE CONFLICTOS</h4>

        <p class="fw-bold">¿Qué metas de esta área de interés apoya el proyecto?</p>
        <p>Selecciona todas las que correspondan. Te haremos preguntas sobre las que selecciones y, a la conclusión del proyecto, presentarás un informe con los resultados alcanzados en cada una de ellas. <span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" v-model="$store.state.step5.interest_area_goals">
            <label class="form-check-label" for="1">
                Potenciar la capacidad de las personas y comunidades para transformar los conflictos y construir la paz.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="2" v-model="$store.state.step5.interest_area_goals">
            <label class="form-check-label" for="2">
                Capacitar a los integrantes de la comunidad en campos como la educación, el liderazgo para la paz y la prevención y resolución de conflictos.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="3" v-model="$store.state.step5.interest_area_goals">
            <label class="form-check-label" for="3">
                Proporcionar servicios que contribuyen a integrar en la sociedad a los grupos vulnerables.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="4" v-model="$store.state.step5.interest_area_goals">
            <label class="form-check-label" for="4">
                Mejorar el diálogo y las relaciones en la comunidad para determinar el mejor modo de administrar los recursos naturales.
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="5" v-model="$store.state.step5.interest_area_goals">
            <label class="form-check-label" for="5">
                Otorgar becas de postgrado para profesionales en el campo de la paz y la prevención de conflictos.
            </label>
        </div>
    </div>
</template>
