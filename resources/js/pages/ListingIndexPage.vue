<script setup>
import pagination from '@/components/pagination.vue';
import { onMounted, computed} from 'vue'
import { useStore } from 'vuex'
import moment from 'moment';
import { ProductService } from '@/services/ProductService'

const store = useStore()
const products = computed(() => store.state.product.products)
const loadProducts = async (page) => {
    await store.dispatch('product/loadProducts', page)
}
onMounted(() => {
    loadProducts('/api/listings')
})

const toggleIsActive = async (product) => {
    ProductService.toggleIsActive(product.id)
}

</script>

<template>
    <div class="w-full xl:w-9/12">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-5">My Listings</h1>
    
    
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow">
                                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                    <thead class="bg-gray-100 dark:bg-gray-700">
                                        <tr>
                                            <!-- <th scope="col" class="p-4">
                                                        <div class="flex items-center">
                                                            <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                                class="w-4 h-4 bg-gray-50 rounded border-gray-300 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                                        </div>
                                                    </th> -->
                                            <th scope="col"
                                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                Product Name
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                Created At
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                ID
                                            </th>
                                            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                Active
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
    
                                        <tr v-for="product in products['data']" :key="product.id"
                                            class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <!-- <td class="p-4 w-4">
                                                        <div class="flex items-center">
                                                            <input id="checkbox-194556" aria-describedby="checkbox-1" type="checkbox"
                                                                class="w-4 h-4 bg-gray-50 rounded border-gray-300 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                                                            <label for="checkbox-194556" class="sr-only">checkbox</label>
                                                        </div>
                                                    </td> -->
                                            <td
                                                class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                <div
                                                    class="text-ellipsis overflow-hidden w-96 text-base font-semibold text-gray-900 dark:text-white">
                                                    {{ product.title }}
                                                </div>
                                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">{{
                                                product.category.name }}</div>
                                            </td>
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ moment(product.created_at).fromNow() }}</td>
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ product.id }}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <label class="inline-flex relative items-center cursor-pointer">
                                                    <input type="checkbox" value="" class="sr-only peer" @change="toggleIsActive(product)" :checked="product.is_active">
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                                    </div>
                                                    <!-- <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Publish</span> -->
                                                </label>
                                            </td>
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ product.price }}
                                            </td>
                                            <td class="p-4 space-x-2 whitespace-nowrap">
                                                <router-link :to="{ name: 'listings-edit', params: { slug: product.slug }}">
                                                    <button type="button" data-modal-toggle="delete-product-modal"
                                                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                                        <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>
                                                        Edit Item
                                                    </button>
                                                </router-link>
                                                <router-link :to="{ name: 'products-show', params: { slug: product.slug }}">
                                                    <button type="button" data-modal-toggle="product-modal"
                                                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                        <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                        View item
                                                    </button>
                                                </router-link>
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
