require('./bootstrap');


window.Vue = require('vue');

//Import View Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//Pagination laravel-vue-pagination
import {form, HasError, AlertError} from 'vform'
window.Form = Form
Vue.component(HasError.name, HasError)  
Vue.component(AlertError.name, AlertError)


Vue.component('pagination', require('laravel-vue-pagination'));

//Import Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast

//Import v-from
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


//Routes
import { routes } from './routes';