
<template>
    <form @submit.prevent="submit">
        <div class="alert alert-danger" role="alert" v-if="$page.props.errors?.length">
            <ul>
                <li v-for="error in $page.props.errors" :key="error">
                    {{ error }}
                </li>
            </ul>
        </div>

        <div class="step-5-checks" v-if="$store.state.step4.interest_area">
            <Step5PazPrev v-if="$store.state.step4.interest_area.includes('1')" />
            <Step52PrevTrat v-if="$store.state.step4.interest_area.includes('2')" />
            <Step53AguaSan v-if="$store.state.step4.interest_area.includes('3')" />
            <Step54SaludMatern v-if="$store.state.step4.interest_area.includes('4')" />
            <Step55AlfEdu v-if="$store.state.step4.interest_area.includes('5')" />
            <Step56DesaEcono v-if="$store.state.step4.interest_area.includes('6')" />
            <Step57Ambiente v-if="$store.state.step4.interest_area.includes('7')" />
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
import Step5PazPrev from '@/Components/Steps/Step51PazPrev.vue';
import Step52PrevTrat from '@/Components/Steps/Step52PrevTrat.vue';
import Step53AguaSan from '@/Components/Steps/Step53AguaSan.vue';
import Step54SaludMatern from '@/Components/Steps/Step54SaludMatern.vue';
import Step55AlfEdu from '@/Components/Steps/Step55AlfEdu.vue';
import Step56DesaEcono from '@/Components/Steps/Step56DesaEcono.vue';
import Step57Ambiente from '@/Components/Steps/Step57Ambiente.vue';

export default {
    components: {
    Step5PazPrev,
    Step52PrevTrat,
    Step53AguaSan,
    Step54SaludMatern,
    Step55AlfEdu,
    Step56DesaEcono,
    Step57Ambiente,
},
    props: {
        errors: [],
        data: Object,
    },
    mounted() {
        try {
            this.$store.state.step5.interest_area_goals = JSON.parse(this.$page.props.form.interest_area_goals)
        } catch (error) {
            this.$store.state.step5.interest_area_goals = []
        }

        var mi_array_step5 = this.$store.state.step5.interest_area_goals ?? []

        console.log('mi_array_step5', mi_array_step5);

        document.querySelectorAll('#accordionStepper .step-5-checks input.form-check-input')?.forEach((input) => {
            input.addEventListener('change', (e) => {
                if (e.target.checked) {
                    mi_array_step5?.push(e.target.value)
                } else {
                    mi_array_step5 = mi_array_step5?.filter((item) => item !== e.target.value)
                }

                this.$store.state.step5.interest_area_goals = mi_array_step5
                console.log(this.$store.state.step5.interest_area_goals);
            })
        })

        if (mi_array_step5?.length > 0) {
            try {
                mi_array_step5.forEach((item) => {
                    let el = document.querySelector(`#accordionStepper .step-5-checks input[value='${item}']`)
                    let el2 = document.querySelector(`#pdf-content .step-5-checks input[value='${item}']`)
                    console.log(el);
                    el.checked = true
                    el2.checked = true
                })
            } catch (error) {
                console.log(error);
            }
        }
    },
    watch: {
        '$store.state.currentStep': function (val) {
            if (val == 5) {
                console.log(val);
                try {
                    this.$store.state.step5.interest_area_goals = JSON.parse(this.$page.props.form.interest_area_goals)
                } catch (error) {
                    this.$store.state.step5.interest_area_goals = []
                }

                var mi_array_step5 = this.$store.state.step5.interest_area_goals ?? []

                console.log('mi_array_step5', mi_array_step5);

                document.querySelectorAll('#accordionStepper .step-5-checks input.form-check-input')?.forEach((input) => {
                    input.addEventListener('change', (e) => {
                        if (e.target.checked) {
                            mi_array_step5?.push(e.target.value)
                        } else {
                            mi_array_step5 = mi_array_step5?.filter((item) => item !== e.target.value)
                        }

                        this.$store.state.step5.interest_area_goals = mi_array_step5
                        console.log(this.$store.state.step5.interest_area_goals);
                    })
                })

                if (mi_array_step5?.length > 0) {
                    try {
                        mi_array_step5.forEach((item) => {
                            let el = document.querySelector(`#accordionStepper .step-5-checks input[value='${item}']`)
                            let el2 = document.querySelector(`#pdf-content .step-5-checks input[value='${item}']`)
                            console.log(el);
                            el.checked = true
                            el2.checked = true
                        })
                    } catch (error) {
                        console.log(error);
                    }
                }
            }
        }
    },
    methods: {
        submit() {
            axios.post(route('simulation.save.step5'), {
                ...this.$store.state.step5,
                current_step: this.$store.state.currentStep,
                id: this.$page.props?.form?.id
            })
            .then((response) => {
                this.$store.state.currentStep++
                this.$swal('Paso 5 guardado con éxito', '', 'success');
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
    }
}
</script>
