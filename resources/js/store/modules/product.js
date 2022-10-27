import { ref, onMounted, computed, inject } from 'vue'
import { ProductService } from '@/services/product.service'

const state = {
  products: {
    current_page:null,
    data: [],
    first_page_url:null,
    from:null,
    next_page_url:null,
    path:null,
    per_page:null,
    prev_page_url:null,
    to:null,
  }
}

const getters = {}

const mutations = {
  SET_PRODUCTS (state, data) {
    state.products = data
  }
}

const actions = {
  async loadProducts ({ commit }, url) {
    console.log('store loadProducts')
    console.log(url)
    ProductService.loadProducts(url || '/api/products')
    .then(response => {
      console.log('herrrr')
      commit('SET_PRODUCTS', response.data)
    })
    // try {
      
    //   // let progress = inject('progressBar')
    //   console.log(progress)
      
    //   progress.start()
    //   const response = await fetch(url || '/api/products')
    //   const data = await response.json()
    //   if (response.ok) {
    //     progress.finish()
    //     commit('SET_PRODUCTS', data)
    //   }
    // } catch (error) {
    //   throw error
    // }
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}


// export default {
//     namespaced: true,
//     state: {
//       products: {
//         current_page:null,
//         data: [],
//         first_page_url:null,
//         from:null,
//         next_page_url:null,
//         path:null,
//         per_page:null,
//         prev_page_url:null,
//         to:null,
//       }
//     },
//     getters: {},
//     mutations: {
//       SET_PRODUCTS (state, data) {
//         state.products = data
//       }
//     },
//     actions: {
//       async loadProducts ({ commit }, url) {
//         const response = await fetch(url || '/api/products')
//         const data = await response.json()
//         commit('SET_PRODUCTS', data)
//       }
//     }
// }
