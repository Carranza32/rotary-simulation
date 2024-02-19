<template>
    <div>
        <h3>{{ useTrans('step5')?.water?.title }}</h3>

        <p class="fw-bold">{{ useTrans('step5')?.prevent?.description }}</p>
        <p>{{ useTrans('step5')?.prevent?.description2 }}<span class="float-end"><i class="fa-regular fa-circle-question"></i></span></p>
        <hr>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_1">
            <label class="form-check-label">
                {{ useTrans('step5')?.water?.check1 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_2">
            <label class="form-check-label">
                {{ useTrans('step5')?.water?.check2 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_3">
            <label class="form-check-label">
                {{ useTrans('step5')?.water?.check3 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_4">
            <label class="form-check-label">
                {{ useTrans('step5')?.water?.check4 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_5">
            <label class="form-check-label">
                {{ useTrans('step5')?.water?.check5 }}
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="53_6">
            <label class="form-check-label">
                {{ useTrans('step5')?.water?.check6 }}
            </label>
        </div>

        <Step5MeasuresTable :id="53" :measures="$store.state.step5.measures53"/>

        <div class="mb-3">
            <label class="form-label">{{ useTrans('step5')?.prevent?.collect_info }}</label>

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

        <step-5-measures-modal :id="53" :title="useTrans('step5')?.water?.title" :modalMeasures="modalMeasures" :modalInformations="modalInformations" :modalFrecuencies="modalFrecuencies" :modalBenefits="modalBenefits"/>
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
            modalMeasures: this.useTrans('step5')?.water?.modalMeasures,
            modalInformations: this.useTrans('step5')?.water?.modalInformations,
            modalFrecuencies: this.useTrans('step5')?.water?.modalFrecuencies,
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
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.evaluation ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.evaluation = value
            }
        },
        name: {
            get() {
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.name = value
            }
        },
        explication: {
            get() {
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.explication ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.explication = value
            }
        },
        person_name: {
            get() {
                if (this.$store.state.step5.monitoring_53 == undefined) {
                    this.$store.state.step5.monitoring_53 = {
                        evaluation: '0',
                        name: '',
                        explication: '',
                        person_name: '',
                    }
                }

                return this.$store.state.step5.monitoring_53.person_name ?? '0'
            },
            set(value) {
                this.$store.state.step5.monitoring_53.person_name = value
            }
        },
    }
}
</script>

