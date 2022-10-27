<script setup>

import { ref, onMounted, computed } from 'vue'
import { useStore } from 'vuex'

const store = useStore()
const parentCategories = computed(() => store.state.category.parentCategories)
const loadParentCategories = async () => {
    if (parentCategories.value.length === 0) {
        await store.dispatch('category/loadParentCategories')
    }
}

onMounted(() => {
    loadParentCategories()
})

const categorySlug = computed(() => store.state.category.selectedCategory.slug)

const query = ref('')
const loadCategoryProducts = async (slug) => {
    let page = '/api/search?q=' + query.value + '&category=' + slug
    await store.dispatch('product/loadProducts', page)

    let selectedCategory = store.state.category.parentCategories.find(c => c.slug === slug)
    if (selectedCategory) {
        store.commit('category/SET_SELECTED_CATEGORY', selectedCategory)
    }

    // console.log(slug)
    // window.location.href = `/categories/${slug}/products`
}

</script>

<template>
    <div class="hidden sm:block px-3">
        <ul>
            <li v-for="category in parentCategories" @click="loadCategoryProducts(category.slug)" :key="category.id"
                class="text-teal-700 cursor-pointer"
                :class="category.slug === categorySlug ? 'font-bold' : 'font-normal'">
                {{ category.name }}
            </li>
        </ul>
    </div>
</template>
