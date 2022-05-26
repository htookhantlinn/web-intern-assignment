import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress';
import "../css/skeleton.css";
import { Skeletor } from 'vue-skeletor';

createInertiaApp({
    resolve: name => require(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component(Skeletor.name, Skeletor)
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el)
    },
})
InertiaProgress.init({
    color: '#4B5563'
});
