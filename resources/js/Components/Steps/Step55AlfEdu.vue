<template>
    <div>
        <h3>{{ useTrans('step5')?.education?.title }}</h3>

        <p class="fw-bold">{{ useTrans('step5')?.prevent?.description }}</p>
        <p>{{ useTrans('step5')?.prevent?.description2 }}<span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_1">
            <label class="form-check-label">
                {{ useTrans('step5')?.education?.check1 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_2">
            <label class="form-check-label">
                {{ useTrans('step5')?.education?.check2 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_3">
            <label class="form-check-label">
                {{ useTrans('step5')?.education?.check3 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="55_4">
            <label class="form-check-label">
                {{ useTrans('step5')?.education?.check4 }}
            </label>
        </div>

        <Step5MeasuresTable :id="55" :measures="$store.state.step5.measures55"/>

        <div class="mb-3">
            <label class="form-label">¿Ya sabes quíen recopilará la información necesario para la evaluación y el monitoreo?</label>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="1" v-model="evaluation">
                <label class="form-check-label">{{ useTrans('layout')?.yes }}</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="evaluation_step5" value="0" v-model="evaluation">
                <label class="form-check-label">{{ useTrans('layout')?.no }}</label>
            </div>
        </div>

        <div class="my-3" v-if="evaluation == true">
            <div class="mb-3">
                <label class="form-label">{{ useTrans('step5')?.pazprev?.business_name }}</label>
                <input type="text" class="form-control" v-model="name">
            </div>

            <div class="mb-3">
                <label for="textarea" class="form-label">
                    {{ useTrans('step5')?.pazprev?.capacity }}
                </label>

                <textarea class="form-control" id="textarea" rows="5" v-model="explication"></textarea>
            </div>
        </div>

        <div class="my-3" v-if="evaluation == false">
            <div class="mb-3">
                <label for="textarea" class="form-label">
                    {{ useTrans('step5')?.pazprev?.explain }}
                </label>

                <textarea class="form-control" id="textarea" rows="5" v-model="person_name"></textarea>
            </div>
        </div>

        <step-5-measures-modal :id="55" :title="useTrans('step5')?.education?.title" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
    </div>
</template>

<script>
import Step5MeasuresTable from '@/Components/Step5MeasuresTable.vue'
import Step5MeasuresModal from '@/Components/Step5MeasuresModal.vue'
import { useTrans } from '@/Composables/trans';

export default {
    components: {
        Step5MeasuresTable,
        Step5MeasuresModal
    },
    setup() {
        return {
            useTrans,
        };
    },
    data(){
        return {
            modalMeasures: this.useTrans('step5')?.education?.modalMeasures,
            modalInformations: this.useTrans('step5')?.education?.modalInformations,
            modalFrecuencies: this.useTrans('step5')?.education?.modalFrecuencies,
            modalBenefits: [
                "1-19",
                "20-49",
                "50-99",
                "100-499",
                "500-999",
                "1000-2499",
                "2500+",
            ],
            evaluation: 0,
            name: '',
            explication: '',
            person_name: '',
        }
    },
    computed: {
        evaluation: {
            get() {
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_55 == undefined) {
                    this.$store.state.step5.monitoring_55 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_55.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_55.person_name = value
            }
        },
    }
}
</script>
