import Vue from 'vue'
import Vuex from 'vuex'

//import MaterialEntrada from './modules/almacen/material/movimiento/entrada'

const debug = process.env.NODE_ENV !== 'production'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        //MaterialEntrada,
    },
    strict: debug
});