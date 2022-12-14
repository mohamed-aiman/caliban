<script setup>

import pagination from '@/components/pagination.vue';
import { onMounted, computed, ref} from 'vue'
import { useStore } from 'vuex'
import { ProductService } from '@/services/ProductService';
import moment from 'moment';

const store = useStore()
const currentPageUrl = ref('')
const products = computed(() => store.state.product.products)
const loadProducts = async (page) => {
    currentPageUrl.value = page
    await store.dispatch('product/loadWatchlist', page)
}
onMounted(() => {
    console.log('WatchListPage mounted')
    loadProducts('/api/watchlist')
})

const undoLike = (productId) => {
    ProductService.toggleLike(productId)
        .then((response) => {
            loadProducts(currentPageUrl.value)
        })
}

</script>

<template>
    <div class="w-full xl:w-9/12">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-5">My Watchlist</h1>

            
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">                

                    <div class="flex flex-col">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden shadow">
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                        <thead class="bg-gray-100 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Product Name
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Price (MVR)
                                                </th>
                                                <th scope="col" class="p-4">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    
                                            <tr  v-for="product in products['data']" :key="product.id" 
                                                class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <div class="text-ellipsis overflow-hidden w-max-md text-base font-semibold text-gray-900 dark:text-white">{{ product.title }}
                                                    </div>
                                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ product.category.name }}</div>
                                                </td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ product.price }}
                                                </td>
                                                <td class="p-4 space-x-2 whitespace-nowrap">
                                                    <router-link :to="{ name: 'products-show', params: { slug: product.slug }}">
                                                        <button type="button" data-modal-toggle="product-modal"
                                                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                            <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            </svg>
                                                            View item
                                                        </button>
                                                    </router-link>
                                                    <button @click="undoLike(product.id)" type="button" data-modal-toggle="delete-product-modal"
                                                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                        <!-- heart icon -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="mr-2 w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                        </svg>
                                                        Undo Like
                                                    </button>
                                                </td>
                                            </tr>
                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- pagination start -->
                    <pagination :data="products" @load-page="loadProducts" />
                    <!-- pagination end -->
                    
                </div>

        </div>
    </div>
</template>
