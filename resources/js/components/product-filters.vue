<script setup>

import { ref, onMounted, computed } from '@vue/runtime-core'
import { useStore } from 'vuex'

const store = useStore()

const selectedSortBy = computed(() => store.state.product.queryParams.sort)
const buttonNotSelectedCss = 'focus:ring-blue-300 bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'
const buttonSelectedCss = 'focus:ring-teal-300 bg-teal-700 hover:bg-teal-800 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800'

const inputNotSelectedCss = 'focus:ring-blue-300 text-blue-700 hover:text-blue-800 dark:text-blue-600 dark:hover:text-blue-700 dark:focus:ring-blue-800'
const inputSelectedCss = 'focus:ring-teal-300 text-teal-700 hover:text-teal-800 dark:text-teal-600 dark:hover:text-teal-700 dark:focus:ring-teal-800'


const sortBy = (sort) => {
    store.dispatch('product/queryProducts', {
        sort: sort
    })
}

const sortByPrice = () => {
    if (selectedSortBy.value == 'price') {
        sortBy('price_desc')
    } else {
        sortBy('price')
    }
}


const minPrice = ref(null)
const maxPrice = ref(null)
const filterByPrice = (filter) => {
    store.dispatch('product/queryProducts', {
        min_price: minPrice.value,
        max_price: maxPrice.value
    })
}

</script>

<template>
    <div class="flex flex-wrap lg:flex-nowrap space-y-2">


        <div class="flex w-full">
            <div class="h-full flex flex-nowrap space-x-2 w-full">
                <p class="my-auto text-sm font-mono text-gray-700">Price:</p>
                <input v-model="minPrice" 
                     :class="(minPrice) ? inputSelectedCss : inputNotSelectedCss"
                    class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center w-1/4"
                    type="number" 
                    placeholder="min price">
                <p class="my-auto text-sm font-mono text-gray-700">-</p>
                <input v-model="maxPrice" 
                     :class="(maxPrice) ? inputSelectedCss : inputNotSelectedCss"
                    class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center w-1/4"
                    type="number"
                    placeholder="max price">
                <button @click="filterByPrice" type="button"
                    class="my-3 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white 
                    focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 
                    text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Filter by price</span>
                </button>

            </div>
        </div>

        <div class="flex w-full">
            <div class="h-full flex flex-nowrap space-x-2 w-full">
                <p class="my-auto text-sm font-mono text-gray-700">Sort by:</p>
                <div class="text-gray-700 flex space-x-1 h-full">

                    <button :class="(selectedSortBy == `best_match`) ? buttonSelectedCss : buttonNotSelectedCss"
                    @click="sortBy('best_match')" type="button"
                        class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Best Match
                    </button>

                    <button :class="(selectedSortBy == `likes_count`) ? buttonSelectedCss : buttonNotSelectedCss"
                        @click="sortBy('likes_count')" type="button"
                        class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Likes
                    </button>

                    <!-- price low to high button -->
                    <button :class="(selectedSortBy == `price_desc` || selectedSortBy == `price`) ? buttonSelectedCss : buttonNotSelectedCss" 
                        @click="sortByPrice()" type="button"
                        class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Price
                        <svg v-if="selectedSortBy == 'price'" aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                        </svg>
                        <svg v-if="selectedSortBy == 'price_desc'" aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" />
                        </svg>
                    </button>

                    <!-- price high to low button -->
                    <!-- <button v-bind:class="(selectedSortBy == `price_low_to_high`) ? buttonSelectedCss : buttonNotSelectedCss" 
                        v-if="selectedSortBy && (selectedSortBy == `price_low_to_high` || selectedSortBy != `price_desc`)" 
                        @click="sortBy('price_desc')" type="button"
                        class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Price
                        <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" />
                        </svg>
                    </button> -->

                </div>
            </div>
        </div>

        <!-- <div class="flex flex-nowrap w-full justify-start space-x-2 space-y-2 items-baseline">

        </div> -->

    </div>
</template>
