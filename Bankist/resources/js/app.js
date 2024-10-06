import '../css/app.css';
import './bootstrap';
import Aura from '@primevue/themes/aura';
import 'primeicons/primeicons.css'
import PrimeVue from 'primevue/config';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { MotionPlugin } from '@vueuse/motion'
import AnimateOnScroll from 'primevue/animateonscroll';
import Ripple from 'primevue/ripple';
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
import StyleClass from 'primevue/styleclass';
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                    options: {
                        prefix: 'p',
                        darkModeSelector: 'system',
                        cssLayer: false
                    }
                },
            })
            .directive('animateonscroll', AnimateOnScroll)
            .directive('ripple', Ripple)
            .directive('styleclass', StyleClass)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});