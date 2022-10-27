<script setup>

import { onMounted, computed } from 'vue'
import { useStore } from 'vuex'
import SideCategories from '@/navigation/SideCategories.vue'

const store = useStore()
const selectedCategory = computed(() => store.state.category.selectedCategory)
// @todo: move pagination to seperate component
const products = computed(() => store.state.product.products)
const loadProducts = async (page) => {
    // progressBar.start()
    await store.dispatch('product/loadProducts', page)
    // progressBar.finish()
    // this.$progress.finish() 
    // const response = await fetch(page)
    // const data = await response.json()
    // store.commit('product/SET_PRODUCTS', data)
}

onMounted(() => {
    // console.log(progressBar)
    // console.log(inject('progressBar'))
    // fetch('https://fakestoreapi.com/products')
    // fetch('/products')
    //     .then(res => res.json())
    //     .then(json => products.value = json['data'])
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

    <div class="bg-gray-100 mx-auto min-h-screen xl:flex xl:flex-col">
    
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
                    <div class="mt-8 mx-auto">
                        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                            <div class="flex justify-between flex-1 sm:hidden">
                                <a v-if="products.prev_page_url" @click="loadProducts(products.prev_page_url)" 
                                    class="cursor-pointer relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    « Previous
                                </a>

                                <span v-if="!products.prev_page_url"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    « Previous
                                </span>

                                <a  v-if="products.next_page_url" @click="loadProducts(products.next_page_url)"
                                    class="cursor-pointer relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                    Next »
                                </a>
                                <span v-if="!products.next_page_url"
                                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                    Next »
                                </span>
                            </div>

                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700 leading-5">
                                        Showing
                                        <span class="font-medium">1</span>
                                        to
                                        <span class="font-medium">20</span>
                                        of
                                        <span class="font-medium">101</span>
                                        results
                                    </p>
                                </div>

                                <div>
                                    <span class="relative z-0 inline-flex shadow-sm rounded-md">

                                        <a v-if="products.prev_page_url" @click="loadProducts(products.prev_page_url)"  rel="prev"
                                            class="cursor-pointer relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                            aria-label="&amp;laquo; Previous">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>

                                        <span v-if="!products.prev_page_url" aria-disabled="true" aria-label="&amp;laquo; Previous">
                                            <span
                                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5"
                                                aria-hidden="true">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </span>

                                        <span aria-current="page">
                                            <span
                                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5">{{ products.current_page }}</span>
                                        </span>
                                        <!-- <a href="http://shop.local:10087?page=2"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                            aria-label="Go to page 2">
                                            2
                                        </a>
                                        <a href="http://shop.local:10087?page=3"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                            aria-label="Go to page 3">
                                            3
                                        </a>
                                        <a href="http://shop.local:10087?page=4"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                            aria-label="Go to page 4">
                                            4
                                        </a>
                                        <a href="http://shop.local:10087?page=5"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                            aria-label="Go to page 5">
                                            5
                                        </a>
                                        <a href="http://shop.local:10087?page=6"
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                                            aria-label="Go to page 6">
                                            6
                                        </a> -->


                                        <a v-if="products.next_page_url" @click="loadProducts(products.next_page_url)" rel="next"
                                            class="cursor-pointer relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150"
                                            aria-label="Next &amp;raquo;">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </a>

                                        <span v-if="!products.next_page_url" aria-disabled="true" aria-label="Next &amp;raquo;">
                                            <span
                                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5"
                                                aria-hidden="true">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </span>

                                    </span>
                                </div>
                            </div>
                        </nav>

                    </div>
                    <!-- pagination end -->
    


                </div>
            </div>
        </div>
    
    </div>

</template>
