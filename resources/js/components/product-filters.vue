<script setup>

import { ref, onMounted } from '@vue/runtime-core'
import { useStore } from 'vuex'

const store = useStore()

const sortBy = (sort) => {
    store.dispatch('product/queryProducts', {
        sort: sort
    })
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
            <div class="h-full flex flex-nowrap space-x-2">
                <p class="my-auto text-sm font-mono text-gray-700">Price:</p>
                <input v-model="minPrice" type="text" class="w-1/4 border border-gray-300 rounded-md" placeholder="min">
                <p class="my-auto text-sm font-mono text-gray-700">-</p>
                <input v-model="maxPrice" type="text" class="w-1/4 border border-gray-300 rounded-md" placeholder="max">
                <button @click="filterByPrice" class="rounded bg-teal-500 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex w-full">
            <div class="h-full flex flex-nowrap space-x-2">
                <p class="my-auto text-sm font-mono text-gray-700">Sort by:</p>
                <div class="block text-gray-700">
                    <button @click="sortBy('best_match')" class="p-3 bg-teal-300 border border-gray-300">Best Match</button>
                    <button @click="sortBy('likes_count')" class="p-3 bg-teal-300 border border-gray-300">Likes</button>
                    <button @click="sortBy('price')" class="p-3 bg-teal-300 border border-gray-300">
                        Price
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                        d="M3.293 7.293a1 1 0 011.414 0L10 13.586l6.293-6.293a1 1 0 111.414 1.414l-7 7a1 1 0 01-1.414 0l-7-7a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                    </svg>
                </button>
                </div>
            </div>
        </div>

        <!-- <div class="flex flex-nowrap w-full justify-start space-x-2 space-y-2 items-baseline">

        </div> -->

    </div>
</template>
