<script setup>

import { ref, onMounted, computed } from 'vue'
import { useStore } from 'vuex'

const searchInput = ref('')
onMounted(() => {
    searchInput.value.focus()
})

const store = useStore()
const parentCategories = computed(() => store.state.category.parentCategories)
const loadParentCategories = async () => {
    if (parentCategories.value.length === 0) {
        await store.dispatch('category/loadParentCategories')
    }
}

const categorySlug = computed({
    get: () => store.state.category.selectedCategory.slug,
    set: (val) => {
        let selectedCategory = store.state.category.parentCategories.find(c => c.slug === val)
        if (selectedCategory) {
            store.commit('category/SET_SELECTED_CATEGORY', selectedCategory)
        } else {
            store.commit('category/SET_SELECTED_CATEGORY', {
                id: null,
                slug: 'all',
                name: 'All Categories'
            })
        }
    }
})

const query = ref('')
const search = async () => {
    await store.dispatch(
        'product/loadProducts', 
        '/api/search?q=' + query.value + '&category=' + store.state.category.selectedCategory.slug
    )
    searchInput.value.focus()
}
</script>

<template>
    <div class="flex bg-teal-600 justify-between items-baseline">

        <!-- left menu DT-->
        <a class="hidden sm:block mx-6 text-white font-bold text-2xl" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
        <!-- end left menu DT-->
        
        <!-- search DT-->
        <div class="hidden sm:block max-w-xl w-full mx-auto py-3">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300"
                >
                Search
            </label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input v-model="query" 
                    type="search"
                    ref="searchInput"
                    @keydown.enter="search"
                    placeholder="Search for listings..."
                    required="" 
                    class="block p-4 pl-10 w-full text-sm text-gray-900 
                                bg-gray-50 rounded-lg border 
                                border-gray-300 focus:ring-blue-500 
                                focus:border-blue-500 dark:bg-gray-700 
                                dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 
                                dark:focus:border-blue-500">
                <div class="flex items-baseline space-x-2 text-white absolute right-2.5 bottom-2.5">
                    <select v-model="categorySlug" name="category" class="bg-teal-700 
                                hover:bg-teal-800 focus:ring-4 focus:outline-none 
                                focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 
                                dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                        <option value="all">All</option>
                        <option v-for="category in parentCategories" 
                            :key="category.slug"
                            :value="category.slug"
                            >
                            {{ category.name }}
                        </option>
                        
                    </select>
                    <button @click="search" type="button" class="bg-blue-700 
                                hover:bg-blue-800 focus:ring-4 focus:outline-none 
                                focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 
                                dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Search
                    </button>
                </div>
            </div>
        </div>
        <!-- end search DT-->

        <!-- search mobile-->
        <div class="block sm:hidden max-w-screen w-full mx-auto p-3">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">
                Search
            </label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input v-model="query" type="search" ref="searchInput" @keydown.enter="search"
                    placeholder="Search for listings..." required="" class="block p-4 pl-10 w-full text-sm text-gray-900 
                                        bg-gray-50 rounded-lg border 
                                        border-gray-300 focus:ring-blue-500 
                                        focus:border-blue-500 dark:bg-gray-700 
                                        dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 
                                        dark:focus:border-blue-500">
                <div class="flex items-baseline space-x-2 text-white absolute right-2.5 bottom-2.5">
                    <button @click="search" type="button" class="bg-blue-700 
                                        hover:bg-blue-800 focus:ring-4 focus:outline-none 
                                        focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 
                                        dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Search
                    </button>
                </div>
            </div>
        </div>
        <!-- end search mobile-->

        <!-- right menu -->
        <div class="hidden sm:block">
            <a href="/dashboard" class="mx-6 text-white font-bold text-2xl">
                Admin
            </a>
        </div>
        <!-- end right menu -->

        <!-- right menu mobile-->
        <a class="block sm:hidden mr-3 text-white font-bold text-xl" href="/">
            <!-- hamburger -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- end hamburger -->
        </a>
        <!-- end right menu mobile-->
        
    </div>
</template>
