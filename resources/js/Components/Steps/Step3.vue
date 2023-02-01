<template>
    <div>
        <div class="mb-3">
            <label for="textarea" class="form-label">
                Háblanos sobre el proyecto. ¿Cuáles son sus objetivos principales y quiénes serán sus beneficiarios?
                <span class="float-end"><i class="fa-regular fa-circle-question"></i></span>
            </label>

            <textarea class="form-control" id="textarea" rows="5" v-model="$store.state.step3.objectives"></textarea>
        </div>
    </div>
</template>
