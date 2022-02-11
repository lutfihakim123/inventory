import bearer from '@websanova/vue-auth/drivers/auth/bearer'
import axios from '@websanova/vue-auth/drivers/http/axios'
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'


const config = {
    userData : {
        url:  'auth/edititem',
        method:  'post',
        redirect: '',
        fetchUser: true
    }
}