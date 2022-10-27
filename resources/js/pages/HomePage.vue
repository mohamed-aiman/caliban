<script setup>

import pagination from '@/components/pagination.vue';

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

const goToProduct = (slug) => {
    console.log(slug)
    window.location.href = `/products/${slug}`
}

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
                            class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                            <li @click="goToProduct(product.slug)" v-for="product in products['data']" :key="product.id"
                                class="relative bg-gray-100 shadow-lg border-2 border-gray-300 focus-within:ring-2 focus-within:ring-indigo-300 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                <div class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden bg-gray-100">
                                    <img v-if="product.photos.length>0" :src="product.photos[0].url" alt=""
                                        class="pointer-events-none object-cover group-hover:opacity-75" />
                                    <img v-if="product.photos.length==0"
                                        src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                        alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
                                    <a href="#" class="absolute inset-0 focus:outline-none">
                                        <span class="sr-only">View details for title</span>
                                    </a>
                                </div>
                                <p class="px-1 pointer-events-none mt-2 block truncate text-sm font-medium text-gray-800">
                                    {{ product.title }}
                                </p>
                                <p class="px-1 pointer-events-none block text-l font-medium text-rose-600 font-bold">
                                    <span class="text-xs font-thin">MVR </span> {{ product.price_formatted }}
                                </p>
                            </li>
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
