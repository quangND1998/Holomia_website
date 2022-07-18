require('./bootstrap');

import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import CKEditor from 'ckeditor4-vue';
import VueCompositionAPI from '@vue/composition-api'
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast);
createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)

        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})
Vue.mixin({
    methods: {
        route: window.route,
    }
})
Vue.mixin(require('./base'))
Vue.mixin({
    methods: {
        hasAnyPermission: function(permissions) {

            var allPermissions = this.$page.props.auth.can;
            var hasPermission = false;
            permissions.forEach(function(item) {
                if (allPermissions[item]) hasPermission = true;
            });
            return hasPermission;
        },
        formatDate: function(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY HH:mm')
            }
        },

        formatDateMonth: function(value) {
            if (value) {
                return moment(String(value), "YYYY-MM-DD").format("MMM D YY")
            }
        },

    },
})

InertiaProgress.init({
    delay: 250,
    color: '#1E377F',
    includeCSS: true,
    showSpinner: true,
});
Vue.config.devtools = false;
Vue.config.productionTip = false
window.Bus = new Vue();
Vue.use(VueCompositionAPI)
Vue.use(CKEditor)