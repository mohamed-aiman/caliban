import { createStore } from 'vuex'
import modules from './modules'

const store = createStore({
  modules,
  strict: process.env.NODE_ENV === 'development'
})

export default store;
