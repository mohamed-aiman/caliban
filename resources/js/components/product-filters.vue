<script setup>

import { ref, computed } from '@vue/runtime-core'
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

const queryMessage = computed(() => store.state.product.queryMessage)

const clearFiltersSort = () => {
    store.dispatch('product/queryProducts', {
        sort: null,
        min_price: null,
        max_price: null
    })
}

</script>

<template>
    <div class="flex flex-wrap lg:flex-nowrap py-3 my-3 items-baseline h-full border-t border-b">


        <div class="flex w-full">
            <div class="h-full flex flex-nowrap space-x-2 w-full">
                <p class="my-auto text-sm font-mono text-gray-700">Price:</p>
                <input v-model="minPrice" 
                     :class="(minPrice) ? inputSelectedCss : inputNotSelectedCss"
                    class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center w-1/4"
                    type="number" 
                    placeholder="min">
                <p class="my-auto text-sm font-mono text-gray-700">-</p>
                <input v-model="maxPrice" 
                     :class="(maxPrice) ? inputSelectedCss : inputNotSelectedCss"
                    class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center w-1/4"
                    type="number"
                    placeholder="max">
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
                <p class="my-auto text-sm font-mono text-gray-700">Sort&nbspby:</p>
                <div class="text-gray-700 flex space-x-1 h-full">

                    <button :class="(selectedSortBy == `best_match`) ? buttonSelectedCss : buttonNotSelectedCss"
                    @click="sortBy('best_match')" type="button"
                        class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Best&nbspMatch
                    </button>

                    <button :class="(selectedSortBy == `likes_count`) ? buttonSelectedCss : buttonNotSelectedCss"
                        @click="sortBy('likes_count')" type="button"
                        class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                        Likes
                    </button>

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

                </div>
            </div>
        </div>

        <div class="flex w-full">
            <div class="h-full flex flex-nowrap space-x-2 w-full justify-center">
                <p v-text="queryMessage" class="my-auto text-sm font-mono text-gray-700"></p>
                <button v-if="(selectedSortBy || minPrice || maxPrice)"
                    :class="buttonNotSelectedCss"
                    @click="clearFiltersSort()" type="button"
                    class="my-auto text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    Clear
                    <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
</template>
