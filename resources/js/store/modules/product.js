export default {
    namespaced: true,
    state: {
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
    },
    getters: {},
    mutations: {
      SET_PRODUCTS (state, data) {
        state.products = data
      }
    },
    actions: {
      async loadProducts ({ commit }, url) {
        const response = await fetch(url || '/api/products')
        const data = await response.json()
        commit('SET_PRODUCTS', data)
      }
    }
}
