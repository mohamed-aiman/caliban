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
    ProductService.loadProducts(url || '/api/products')
    .then(response => {
      commit('SET_PRODUCTS', response.data)
    })
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
