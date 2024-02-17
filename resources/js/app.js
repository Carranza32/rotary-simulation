import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { createStore } from 'vuex';
import store from './state/index.js';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Vue3Html2pdf from 'vue3-html2pdf'
import { Lang } from 'vue-lang';
import lang_en from './lang/en.js';
import lang_es from './lang/es.js';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use( createStore(store) )
            .use( VueSweetalert2 )
            .use( Vue3Html2pdf )
            .use( Lang, {
                locale: 'es',
                fallback: 'en',
                messages: {
                    es: lang_es,
                    en: lang_en,
                }
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
