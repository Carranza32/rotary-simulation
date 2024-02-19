<template>
    <div class="modal fade" :id="'modalStep'+id" tabindex="-1" :aria-labelledby="'modalStep'+id+'Label'" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" :id="'modalStep'+id+'Label'">Patrocinadores local</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">{{ useTrans('step5')?.measure }}</label>
                            <select class="form-select" id="measure" aria-label="Default select example" v-model="measure">
                                <option v-for="(item, index) in modalMeasures" :key="index" :value="item" :selected="index == 0">{{ item }}</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">{{ useTrans('step5')?.method }}</label>
                            <select class="form-select" id="method" aria-label="Default select example" v-model="method">
                                <option v-for="(item, index) in modalInformations" :key="index" :value="item" :selected="index == 0">{{ item }}</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label">{{ useTrans('step5')?.frecuency }}</label>
                            <select class="form-select" id="frecuencie" aria-label="Default select example" v-model="frecuencie">
                                <option v-for="(item, index) in modalFrecuencies" :key="index" :value="item" :selected="index == 0">{{ item }}</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">{{ useTrans('step5')?.beneficiaries }}</label>
                            <select class="form-select" id="benefits" aria-label="Default select example" v-model="benefits">
                                <option v-for="(item, index) in modalBenefits" :key="index" :value="item" :selected="index == 0">{{ item }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ useTrans('layout')?.cancel }}</button>
                    <button type="button" class="btn btn-primary" @click="addMeasure()" data-bs-dismiss="modal">{{ useTrans('layout')?.save }}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useTrans } from '@/Composables/trans';

export default {
    props: {
        id: String,
        title: String,
        modalMeasures: [],
        modalInformations: [],
        modalFrecuencies: [],
        modalBenefits: [],
    },
    setup() {
        return {
            useTrans,
        };
    },
    data(){
        return {
            measure: "",
            method: "",
            frecuencie: "",
            benefits: "",
        }
    },
    methods: {
        addMeasure() {
            if (this.id == "51") {
                if (this.$store.state.step5.measures == undefined) {
                    this.$store.state.step5.measures = [];
                }

                if (this.$store.state.step5.is_editing == true) {
                    let index = this.$store.state.step5.measures.findIndex(x => x.id == this.$store.state.step5.editing_id);

                    this.$store.state.step5.measures[index] = {
                        id: this.$store.state.step5.editing_id,
                        measure: this.measure,
                        method: this.method,
                        frecuencie: this.frecuencie,
                        benefits: this.benefits,
                    }

                    return;
                }

                this.$store.state.step5.measures.push({
                    id: this.$store.state.step5.measures.length + 1,
                    measure: this.measure,
                    method: this.method,
                    frecuencie: this.frecuencie,
                    benefits: this.benefits,
                })
            }

            if (this.id == "52") {
                if (this.$store.state.step5.measures52 == undefined) {
                    this.$store.state.step5.measures52 = [];
                }

                if (this.$store.state.step5.is_editing == true) {
                    let index = this.$store.state.step5.measures52.findIndex(x => x.id == this.$store.state.step5.editing_id);

                    this.$store.state.step5.measures52[index] = {
                        id: this.$store.state.step5.editing_id,
                        measure: this.measure,
                        method: this.method,
                        frecuencie: this.frecuencie,
                        benefits: this.benefits,
                    }

                    return;
                }

                this.$store.state.step5.measures52.push({
                    id: this.$store.state.step5.measures52.length + 1,
                    measure: this.measure,
                    method: this.method,
                    frecuencie: this.frecuencie,
                    benefits: this.benefits,
                })
            }

            if (this.id == "53") {
                if (this.$store.state.step5.measures53 == undefined) {
                    this.$store.state.step5.measures53 = [];
                }

                if (this.$store.state.step5.is_editing == true) {
                    let index = this.$store.state.step5.measures53.findIndex(x => x.id == this.$store.state.step5.editing_id);

                    this.$store.state.step5.measures53[index] = {
                        id: this.$store.state.step5.editing_id,
                        measure: this.measure,
                        method: this.method,
                        frecuencie: this.frecuencie,
                        benefits: this.benefits,
                    }

                    return;
                }

                this.$store.state.step5.measures53.push({
                    id: this.$store.state.step5.measures53.length + 1,
                    measure: this.measure,
                    method: this.method,
                    frecuencie: this.frecuencie,
                    benefits: this.benefits,
                })
            }

            if (this.id == "54") {
                if (this.$store.state.step5.measures54 == undefined) {
                    this.$store.state.step5.measures54 = [];
                }

                if (this.$store.state.step5.is_editing == true) {
                    let index = this.$store.state.step5.measures54.findIndex(x => x.id == this.$store.state.step5.editing_id);

                    this.$store.state.step5.measures54[index] = {
                        id: this.$store.state.step5.editing_id,
                        measure: this.measure,
                        method: this.method,
                        frecuencie: this.frecuencie,
                        benefits: this.benefits,
                    }

                    return;
                }

                this.$store.state.step5.measures54.push({
                    id: this.$store.state.step5.measures54.length + 1,
                    measure: this.measure,
                    method: this.method,
                    frecuencie: this.frecuencie,
                    benefits: this.benefits,
                })
            }

            if (this.id == "55") {
                if (this.$store.state.step5.measures55 == undefined) {
                    this.$store.state.step5.measures55 = [];
                }

                if (this.$store.state.step5.is_editing == true) {
                    let index = this.$store.state.step5.measures55.findIndex(x => x.id == this.$store.state.step5.editing_id);

                    this.$store.state.step5.measures55[index] = {
                        id: this.$store.state.step5.editing_id,
                        measure: this.measure,
                        method: this.method,
                        frecuencie: this.frecuencie,
                        benefits: this.benefits,
                    }

                    return;
                }

                this.$store.state.step5.measures55.push({
                    id: this.$store.state.step5.measures55.length + 1,
                    measure: this.measure,
                    method: this.method,
                    frecuencie: this.frecuencie,
                    benefits: this.benefits,
                })
            }

            if (this.id == "56") {
                if (this.$store.state.step5.measures56 == undefined) {
                    this.$store.state.step5.measures56 = [];
                }

                if (this.$store.state.step5.is_editing == true) {
                    let index = this.$store.state.step5.measures56.findIndex(x => x.id == this.$store.state.step5.editing_id);

                    this.$store.state.step5.measures56[index] = {
                        id: this.$store.state.step5.editing_id,
                        measure: this.measure,
                        method: this.method,
                        frecuencie: this.frecuencie,
                        benefits: this.benefits,
                    }

                    return;
                }

                this.$store.state.step5.measures56.push({
                    id: this.$store.state.step5.measures56.length + 1,
                    measure: this.measure,
                    method: this.method,
                    frecuencie: this.frecuencie,
                    benefits: this.benefits,
                })
            }

            if (this.id == "57") {
                if (this.$store.state.step5.measures57 == undefined) {
                    this.$store.state.step5.measures57 = [];
                }

                if (this.$store.state.step5.is_editing == true) {
                    let index = this.$store.state.step5.measures57.findIndex(x => x.id == this.$store.state.step5.editing_id);

                    this.$store.state.step5.measures57[index] = {
                        id: this.$store.state.step5.editing_id,
                        measure: this.measure,
                        method: this.method,
                        frecuencie: this.frecuencie,
                        benefits: this.benefits,
                    }

                    return;
                }

                this.$store.state.step5.measures57.push({
                    id: this.$store.state.step5.measures57.length + 1,
                    measure: this.measure,
                    method: this.method,
                    frecuencie: this.frecuencie,
                    benefits: this.benefits,
                })
            }
        },
    },
    watch: {
        '$store.state.step5.selected_measure': function (val) {
            console.log(val);
            if (val != undefined) {
                this.measure = val?.measure;
                this.method = val?.method;
                this.frecuencie = val?.frecuencie;
                this.benefits = val?.benefits;
            }
        },
    },
}
</script>
