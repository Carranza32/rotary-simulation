
const store = {
    state: {
        currentStep: 1,
        formId: null,
        step1: {
            project_name: '',
            type: [],
            contacts: [],
        },
        step2: {
            local_members: [],
            international_members: [],
            members_conflict: false,
        },
        step3: {
            objectives: '',
        },
        step4: {
            interest_area: [],
        },
        step5: {
            interest_area_goals: [],
            measures: [],
            measures52: [],
            measures53: [],
            measures54: [],
            measures55: [],
            measures56: [],
            measures57: [],
            monitoring_51: {
                evaluation: 1,
                name: '',
                explication: '',
                person_name: '',
            },
            monitoring_52: {
                evaluation: 1,
                name: '',
                explication: '',
                person_name: '',
            },
            monitoring_53: {
                evaluation: 1,
                name: '',
                explication: '',
                person_name: '',
            },
            monitoring_54: {
                evaluation: 1,
                name: '',
                explication: '',
                person_name: '',
            },
            monitoring_55: {
                evaluation: 1,
                name: '',
                explication: '',
                person_name: '',
            },
            monitoring_56: {
                evaluation: 1,
                name: '',
                explication: '',
                person_name: '',
            },
            monitoring_57: {
                evaluation: 1,
                name: '',
                explication: '',
                person_name: '',
            },
            evaluation: false,
            selected_measure: {
                measure: "",
                method: "",
                frecuencie: "",
                benefits: "",
            },
            is_editing: false,
            edit_id: null,
        },
        step6: {
            city: '',
            state: '',
            country: '',
            start_date: '',
            end_date: '',
        },
        step7: {
            organizers: [],
            members: '',
            travellers: [],
            local_sponsors: '',
            international_sponsors: '',
            has_interes_conflict: false,
            colaboration_org: '',
        },
        step8: {
            currency: 'USD',
            exchange_rate: 1,
            headings: [
                {
                    id: 1,
                    category: 'Accommodation',
                    description: '',
                    provider: '',
                    cost: 0,
                }
            ],
            total: 0.0,
            budget_step8: 0.0,
        },
        step9: {
            sources: [
                {
                    source: '',
                    detail: '',
                    amount: '',
                    support: '',
                    total: '',
                }
            ],
            selected_source: {
                source: '',
                detail: '',
                amount: '',
                support: '',
                total: '',
            },
            is_editing: false,
            edit_id: null,

            world_donation: 23000,
            total_contributions: 0.0,
            total_financed: 0.0,
            total_budget: 0.0,
        },
        step10: {
            necesities: '',
            necesities_process: '',
            participants1: '',
            participants2: '',
            coo_work: false,
            capacitation: '',
            determinate_necesities: '',
            incentives: '',
            supervisors_names: '',
            use_providers: false,
            use_tender: false,
            has_conflict_providers: false,
            equipment_included: '',
            equipment_maintenance: '',
            use_founds: 0,
            completed_proyect: '',
            has_microcredit: false,
            has_local_founds: false,
            generate_income: '',
            activities: [
                {
                    name: '',
                    duration: '',
                },
            ],
        },
        stepDocuments: {
            files: [],
        },
        step12: {
            primary_contact_authorization: [
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
            ],
            district_committee_authorization: [
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
            ],
            fdd_authorization: [
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
            ],
            legal_agreement: [
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
                {
                    name: '',
                    contact_club: '',
                    contact_distric: '',
                    contact_status: '',
                },
            ],
        },
    },
    mutations: {
        setCurrentStep(state, step) {
            state.currentStep = step;
        },

        setAddStep(state) {
            state.currentStep ++;
        },

        setFormId(state, id) {
            localStorage.setItem('formId', id);
            state.formId = id;
        },

        setFormState(state, form) {
            state.formId = form.id;
            state.currentStep = form.current_step;

            replaceObjectValues(state.step1, form);
            replaceObjectValues(state.step2, form);
            replaceObjectValues(state.step3, form);
            replaceObjectValues(state.step4, form);
            replaceObjectValues(state.step5, form);
            replaceObjectValues(state.step6, form);
            replaceObjectValues(state.step7, form);
            replaceObjectValues(state.step8, form);
            replaceObjectValues(state.step9, form);
            replaceObjectValues(state.step10, form);
        },

        setStep5DeleteMeasure(state, idMeasureState, item) {
            if (idMeasureState == "51") {
                state.step5.measures.splice(state.step5.measures.indexOf(item), 1)
            }

            if (idMeasureState == "52") {
                state.step5.measures52.splice(state.step5.measures52.indexOf(item), 1);
            }

            if (idMeasureState == "53") {
                state.step5.measures53.splice(state.step5.measures53.indexOf(item), 1);
            }

            if (idMeasureState == "54") {
                state.step5.measures54.splice(state.step5.measures54.indexOf(item), 1);
            }

            if (idMeasureState == "55") {
                state.step5.measures55.splice(state.step5.measures55.indexOf(item), 1);
            }

            if (idMeasureState == "56") {
                state.step5.measures56.splice(state.step5.measures56.indexOf(item), 1);
            }

            if (idMeasureState == "57") {
                state.step5.measures57.splice(state.step5.measures57.indexOf(item), 1);
            }
        }
    },
    getters: {
        currentStep: state => state.currentStep,
    },
}

function replaceObjectValues(object, replace) {
    Object.keys(object).forEach(function(key) {
        object[key] = replace[key];
    })
}

export default store;
