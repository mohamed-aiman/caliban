<script setup>

import pagination from '@/components/pagination.vue';
import ProductListItem from '@/components/product-list-item.vue';

import { onMounted, computed } from 'vue'
import { useStore } from 'vuex'
import SideCategories from '@/navigation/SideCategories.vue'

const store = useStore()
const selectedCategory = computed(() => store.state.category.selectedCategory)

const products = computed(() => store.state.product.products)
const loadProducts = async (page) => {
    await store.dispatch('product/loadProducts', page)
}

onMounted(() => {
    loadProducts('/api/products')
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
    
            <div class="w-full sm:w-9/12">
                <div class="container mx-auto">
    
                    <!-- selected category -->
                    <div class="py-3 mx-auto">
                        <p class="text-l font-mono font-semibold text-orange-700">
                            {{ selectedCategory.name }}
                        </p>
                    </div>
    
                    <!-- product list start -->
                    <div class="">
                        <ul v-if="products['data'].length>0" 
                            role="list"
                            class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8"
                            >
                            <product-list-item v-for="product in products['data']" :key="product.id" :product="product"/>
                        </ul>
                    </div>
                    <!-- product list end -->
                    <!-- pagination start -->
                    <pagination :data="products" @load-page="loadProducts" />
                    <!-- pagination end -->
    


                </div>
            </div>
        </div>
    
    </div>

</template>
