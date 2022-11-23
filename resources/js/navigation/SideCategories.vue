<script setup>

import { ref, onMounted, computed } from 'vue'
import { useStore } from 'vuex'
import { useRouter } from 'vue-router'

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

const storeSelectedCategory = computed(() => store.state.category.selectedCategory)
const query = computed(() => store.state.product.queryParams.q)

const router = useRouter()
const loadCategoryProducts = async (slug) => {
    let selectedCategory = store.state.category.parentCategories.find(c => c.slug === slug)
    if (selectedCategory) {
        store.commit('category/SET_SELECTED_CATEGORY', selectedCategory)
        // store.commit('product/UPDATE_A_QUERY_PARAM', { key: 'category', value: selectedCategory.slug })
    }

    await store.dispatch('product/queryProducts', {
        q: query.value,
        category: slug
    })

    router.push({
        name: 'search',
        query: {
            q: query.value,
            category: store.state.product.queryParams.category
        }
    })
    // console.log(slug)
    // window.location.href = `/categories/${slug}/products`
}

</script>

<template>
    <div class="hidden sm:block px-3">
        <ul>
            <li v-for="category in parentCategories" @click="loadCategoryProducts(category.slug)" :key="category.id"
                class="text-teal-700 cursor-pointer"
                :class="category.slug === storeSelectedCategory.slug ? 'font-bold' : 'font-normal'">
                {{ category.name }}
            </li>
        </ul>
    </div>
</template>
