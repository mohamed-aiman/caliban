import { ProductService } from '@/services/ProductService'

const state = {
  queryParams: {
    q: '',
    category: 'all',
    // min_price: null,
    // max_price: null,
    // condition: null,
    // brand: null,
    // color: null,
    // size: null,
    // sort: null,
    // page: null
  },
  queryMessage: '',
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
    state.queryParams[data.key] = data.value
  },
  SET_QUERY_MESSAGE (state, data) {
    state.queryMessage = data
  },
  SET_PRODUCT_QUANTITY (state, data) {
    console.log('data', data.product.id, data.product.quantity);
    //find the item from products array
    state.products.data.find(product => product.id === data.product.id)
      .quantity = data.product.quantity;
  }
}

const actions = {

  async queryProducts ({ commit }, params, url) {
    //fore each key in params UPDATE_A_QUERY_PARAM
    Object.keys(params).forEach(key => {
      commit('UPDATE_A_QUERY_PARAM', { key: key, value: params[key] || '' })
    });
    // commit('SET_QUERY_PARAMS', params)
    ProductService.queryProducts(state.queryParams)
    .then(response => {
      commit('SET_PRODUCTS', response.data)
      commit('SET_QUERY_MESSAGE', 'Showing ' + response.data.data.length + ' of ' + response.data.total + ' results')
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
  },

  async decrementQuantity ({ commit }, productId) {
    ProductService.decrementQuantity(productId)
    .then(response => {
      commit('SET_PRODUCT_QUANTITY', response.data)
    })
  },

  async incrementQuantity ({ commit }, productId) {
    ProductService.incrementQuantity(productId)
    .then(response => {
      commit('SET_PRODUCT_QUANTITY', response.data)
    })
  },

  async updateQuantity ({ commit }, payload) {
    ProductService.updateQuantity(payload)
    .then(response => {
      commit('SET_PRODUCT_QUANTITY', response.data)
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
