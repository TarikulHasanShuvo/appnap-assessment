import { createApp } from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import '../src/scss/main.scss';
import 'bootstrap';
import ApiService from "@/services/api.service";
import * as JwtService from "@/services/jwt.service";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

ApiService.init();
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requireAuth)) {
        if (!JwtService.getToken()) {
            next({
                name  : 'Login',
                params: {nextUrl: to.fullPath}
            })
        }
        else {
            ApiService.get('/check-token').then(response => {
                 store.commit("STORE_USER", response.data.user);
                next()
            }).catch(error => {
                JwtService.destroyToken();
                next({name: 'Login'})
            })
        }
    }
    if (to.name == 'Login') {
        if (JwtService.getToken()) {
            next({name: 'Products'});
        }
    }
     next();
});

createApp(App).use(store).use(router).use(VueSweetalert2).mount('#app')
