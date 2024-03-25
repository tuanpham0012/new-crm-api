import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler'

import { createPinia } from 'pinia';
import globalComponent from './helpers/import-global-components.js';
// import { createI18n } from 'vue-i18n'


const app = createApp({})
const pinia = createPinia();

const messages = {}
// const i18n = createI18n({
//     locale: 'vn', // set locale
//     messages,
//     fallbackLocale: 'vn',
// })

Object.entries(globalComponent).forEach(([name, component]) => {
    app.component(name, component);
})

app.directive('click-outside', {
    mounted(el, binding, vnode) {
        el.clickOutsideEvent = function (event) {
            if (!(el === event.target || el.contains(event.target))) {
                binding.value(event, el);
            }
        };
        document.body.addEventListener('click', el.clickOutsideEvent);
    },
    unmounted(el) {
        document.body.removeEventListener('click', el.clickOutsideEvent);
    }
});
// app.use(i18n)
app.use(pinia)
app.mount('#app')
