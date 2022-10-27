export default {
    namespaced: true,
    state: {
      parentCategories: [],
      selectedCategory: {
          id: null,
          slug: 'all',
          name: 'All Categories'
      }
    },
    getters: {},
    mutations: {
      SET_PARENT_CATEGORIES (state, data) {
        state.parentCategories = data
      },
      SET_SELECTED_CATEGORY (state, data) {
        state.selectedCategory = data
      }
    },
    actions: {
      async loadParentCategories ({ commit }) {
        const response = await fetch('/api/parent-categories')
        const data = await response.json()
        commit('SET_PARENT_CATEGORIES', data)
      }
    }
}
