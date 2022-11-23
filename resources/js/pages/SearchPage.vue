<script setup>

import pagination from '@/components/pagination.vue';
import ProductListItem from '@/components/product-list-item.vue';
import ProductFilters from '@/components/product-filters.vue';
import SideCategories from '@/navigation/SideCategories.vue'

import { onMounted, computed, watch } from 'vue'
import { useStore } from 'vuex'
import { useRouter, useRoute } from 'vue-router'

const router = useRouter()
const route = useRoute()

const store = useStore()
const selectedCategory = computed(() => store.state.category.selectedCategory)

const products = computed(() => store.state.product.products)
const loadPage = async (page) => {
    await store.dispatch('product/loadProducts', page)
}

//need these watchers to refresh the page when the category or query changes when onMount is not called
// const q = computed(() => store.state.product.queryParams.q)
// watch(q, (val, oldVal) => {
//     console.log('q changed')
//     loadProductsFromRoute()
// })
// const selectedCategorySlug = computed(() => store.state.product.queryParams.category)
// watch(selectedCategorySlug, (val, oldVal) => {
//     console.log('selectedCategorySlug changed')
//     loadProductsFromRoute()
// })

// const loadProductsFromRoute = async () => {
//     console.log('loadProductsFromRoute')
//     await store.dispatch('product/queryProducts', {
//         q: route.query.q,
//         category: route.query.category,
//     })
// }

onMounted(() => {
    console.log('SearchPage mounted')
    // loadProductsFromRoute()
})

const goToCategoryProducts = (slug) => {
    console.log(slug)
    window.location.href = `/categories/${slug}/products`
}

</script>

<template>
    <!-- <div class="w-full mx-20 space-y-4"></div> -->

    <div class="mx-auto min-h-screen xl:flex xl:flex-col">
    
        <div class="flex flex-nowrap mx-auto p-3 w-full space-x-3">
    
            <side-categories/>
    
            <div class="w-full xl:w-9/12">
                <div class="container mx-auto">
    
                    <!-- selected category -->
                    <div class="py-3 mx-auto">
                        <p class="text-l font-mono font-semibold text-orange-700">
                            {{ selectedCategory.name }}
                        </p>
                    </div>

                    <!-- filters-->
                    <product-filters/>
    
                    <!-- product list start -->
                    <div class="">
                        <ul v-if="products['data'].length>0" 
                            role="list"
                            class="grid 
                            grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4
                            gap-x-4 gap-y-8 sm:gap-x-6 xl:gap-x-8"
                            >
                            <product-list-item v-for="product in products['data']" :key="product.id" :product="product"/>
                        </ul>
                    </div>
                    <!-- product list end -->
                    <!-- pagination start -->
                    <pagination :data="products" @load-page="loadPage" />
                    <!-- pagination end -->
    


                </div>
            </div>
        </div>
    
    </div>

</template>
