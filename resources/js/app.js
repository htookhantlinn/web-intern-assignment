import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress';
import "../css/skeleton.css";
import { Skeletor } from 'vue-skeletor';
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

createInertiaApp({
    resolve: name => require(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component(Skeletor.name, Skeletor)
            .component('Datepicker', Datepicker)
            .component('Loading', VueLoading)
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el)
    },
})
InertiaProgress.init({
    color: '#4B5563'
});
