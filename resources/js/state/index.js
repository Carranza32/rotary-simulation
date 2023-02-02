
const store = {
    state: {
        currentStep: 1,
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
            evaluation: false,
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
        },
        step8: {
            currency: '',
            exchange_rate: 0.0,
            headings: [
                {
                    category: '',
                    description: '',
                    provider: '',
                    cost: '',
                }
            ],
            total: 0.0,
        },
        step9: {
            currency: '',
            exchange_rate: 0.0,
            sources: [
                {
                    source: '',
                    detail: '',
                    amount: '',
                    support: '',
                    total: '',
                }
            ],
            world_donation: 23000,
            total_contributions: 0.0,
            total_financed: 0.0,
            total_budget: 0.0,
        },
        step10: {
            needs: '',
            needs_process: '',
            participations: '',
            local_participations: '',
            activities: [],
            work_with: '',
            incentives: '',
            supervisors: '',
            local_providers: false,
            select_providers: false,
            conflict_interest: false,
            plan: '',
            maintenance: '',
            founds: false,
            articles: '',
            activity: false,
            source: false,
            income: '',
        },
        step11: {
            documents: [],
        },
    },
    mutations: {
        setCurrentStep(state, step) {
            state.currentStep = step;
        },

        setAddStep(state) {
            state.currentStep ++;
        }
    },
    getters: {
        currentStep: state => state.currentStep,
    },
}

export default store;
