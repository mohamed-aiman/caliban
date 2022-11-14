<script setup>

import pagination from '@/components/pagination.vue';
import ProductListItem from '@/components/product-list-item.vue';
import ProductFilters from '@/components/product-filters.vue';

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
    
            <div class="w-full xl:w-9/12">
                <div class="container mx-auto">
    
                    <!-- selected category -->
                    <div class="py-3 mx-auto">
                        <p class="text-l font-mono font-semibold text-orange-700">
                            {{ selectedCategory.name }}
                        </p>
                    </div>

                    <!-- filters-->
                    <div class="py-3 mx-auto my-2 flex justify-between border-t-2 border-b-2">
                        <product-filters/>
                    </div>
    
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
                    <pagination :data="products" @load-page="loadProducts" />
                    <!-- pagination end -->
    


                </div>
            </div>
        </div>
    
    </div>

</template>
