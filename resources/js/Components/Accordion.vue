<template>
    <div class="accordion-item" @click="addStep()">
        <h2 class="accordion-header" :id="'heading'+id">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#'+id" aria-expanded="false" :aria-controls="id">
                {{title}}
            </button>
        </h2>
        <div :id="id" class="accordion-collapse collapse" :aria-labelledby="'heading'+id" data-bs-parent="#accordionStepper">
            <div class="accordion-body">
                <slot />

                <div class="d-flex justify-content-start gap-3">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" :data-bs-target="'#'+id" aria-expanded="false" :aria-controls="id">
                        Guardar y continuar
                    </button>
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" :data-bs-target="'#'+id" aria-expanded="false" :aria-controls="id">
                        Guardar
                    </button>
                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" :data-bs-target="'#'+id" aria-expanded="false" :aria-controls="id">
                        Salir
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: String,
        title: String,
    },
    methods: {
        addStep() {
            let step = this.id.split('-')[1];
            console.log(step);

            this.$store.commit('setCurrentStep', step);
        }
    }
}
</script>
