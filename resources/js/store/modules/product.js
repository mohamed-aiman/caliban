import { ProductService } from '@/services/ProductService'

const state = {
  queryParams: {
    // q: '',
    // category: null,
    // price: null,
    // condition: null,
    // brand: null,
    // color: null,
    // size: null,
    // sort: null,
    // page: null
  },
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
  },
  SET_QUERY_PARAMS (state, data) {
    state.queryParams = data
  },
  UPDATE_A_QUERY_PARAM (state, data) {
    console.log('UPDATE_A_QUERY_PARAM', data)
    state.queryParams[data.key] = data.value
  }
}

const actions = {

  async queryProducts ({ commit }, params, url) {
    console.log('queryProducts', params)
    //fore each key in params UPDATE_A_QUERY_PARAM
    Object.keys(params).forEach(key => {
      commit('UPDATE_A_QUERY_PARAM', { key: key, value: params[key] })
    });
    // commit('SET_QUERY_PARAMS', params)
    ProductService.queryProducts(state.queryParams)
    .then(response => {
      commit('SET_PRODUCTS', response.data)
    })
  },

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
  },

  async loadWatchlist ({ commit }, url) {
    ProductService.loadWatchlist(url || '/api/watchlist')
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
