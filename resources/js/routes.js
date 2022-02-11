import VueRouter from 'vue-router'


import edititem from './pages/edit'


const routes = [
    {
        path: '/edit',
        name: 'edit',
        component: edit, 
        meta: {
            auth:true
        }
    },
]