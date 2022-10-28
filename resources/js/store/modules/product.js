import { ProductService } from '@/services/ProductService'

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
  },
  product: {
    id: null,
    description: null,
    photos: [
      {
        url: null,
      }
    ],
    locations: [
      {
        name: null,
      }
    ],
    seller: {
      username: null,
      phone: null,
    }
  },
}

const getters = {}

const mutations = {
  SET_PRODUCTS (state, data) {
    state.products = data
  },
  SET_PRODUCT (state, data) {
    state.product = data
  }
}

const actions = {
  async loadProducts ({ commit }, url) {
    ProductService.loadProducts(url || '/api/products')
    .then(response => {
      commit('SET_PRODUCTS', response.data)
    })
  },

  async loadProduct ({ commit }, slug) {
    ProductService.loadProduct(slug)
    .then(response => {
      commit('SET_PRODUCT', response.data)
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
