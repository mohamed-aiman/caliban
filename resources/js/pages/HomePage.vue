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


const sortBy = (sort) => {
    store.dispatch('product/queryProducts', {
        sort: sort
    })
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

                    <!-- left side -->
                    <div class="py-3 mx-auto flex justify-between">
                        <div class="flex flex-row space-x-2 items-baseline">
                            <!-- price -->
                            <div class="flex flex-col space-y-2">
                                <div class="flex flex-row space-x-2 items-baseline">
                                    <p class="text-sm font-mono text-gray-700">Price:</p>
                                    <input type="text" class="w-1/4 px-2 py-1 border border-gray-300 rounded-md" placeholder="min">
                                    <p class="text-sm font-mono text-gray-700">-</p>
                                    <input type="text" class="w-1/4 px-2 py-1 border border-gray-300 rounded-md" placeholder="max">
                                </div>

                                <!-- sort by -->
                                <div class="flex flex-row space-x-2 items-baseline">
                                    <p class="text-sm font-mono text-gray-700">Sort by:</p>
                                    <div class="block text-gray-700">
                                        <button @click="sortBy('best_match')" class="p-3 bg-teal-300 border border-gray-300">Best Match</button>
                                        <button @click="sortBy('likes_count')" class="p-3 bg-teal-300 border border-gray-300">Likes</button>
                                        <button @click="sortBy('price')" class="p-3 bg-teal-300 border border-gray-300">
                                            Price
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3.293 7.293a1 1 0 011.414 0L10 13.586l6.293-6.293a1 1 0 111.414 1.414l-7 7a1 1 0 01-1.414 0l-7-7a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- right side -->
                        <div class="">
                        </div>
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
