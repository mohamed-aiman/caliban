<template>
    <nav class="relative flex flex-wrap items-center justify-between 
        px-2 py-1 bg-slate-500 mb-3">
        <div class="w-full px-2 mx-auto flex flex-wrap items-center justify-between">
            <div class="align-baseline w-full relative flex justify-between">

                <div class="hidden sm:block my-3 mr-3">
                    <a class="mx-6 text-sm font-bold leading-relaxed mr-4 py-2 whitespace-nowrap uppercase text-white"
                        href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                </div>

                <!-- search DT-->
                <div class="hidden sm:block max-w-xl w-full mx-auto">
                    <div class="relative mt-6">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input v-model="query" 
                            type="search" ref="searchInput" 
                            @keydown.enter="search"
                            placeholder="Search for listings..." 
                            required="" 
                            class="block p-4 pl-10 w-full text-sm text-gray-900 
                            bg-gray-50 rounded-lg border 
                            border-gray-300 focus:ring-blue-500 
                            focus:border-blue-500 dark:bg-gray-700 
                            dark:border-gray-600 dark:placeholder-gray-400 
                            dark:text-white dark:focus:ring-blue-500 
                            dark:focus:border-blue-500"
                            >
                        <div class="flex items-baseline space-x-2 text-white 
                            absolute right-2.5 bottom-2.5">
                            <select v-model="categorySlug" name="category" class="bg-teal-700 
                                                hover:bg-teal-800 focus:ring-4 focus:outline-none 
                                                focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 
                                                dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                                <option v-for="category in parentCategories" :key="category.slug" :value="category.slug">
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
                
                <button class="block sm:hidden text-white cursor-pointer text-xl 
                    leading-none py-1 border border-solid border-transparent 
                    rounded bg-transparent outline-none focus:outline-none"
                    type="button" v-on:click="toggleNavbar()">
                    <!-- hamburger -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- end hamburger -->
                </button>

                <div class="hidden sm:block my-3">
                    <ul v-if="user" class="h-full flex flex-nowrap items-center justify-center list-none ml-auto">
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/sell">
                                <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span
                                    class="ml-2">Sell</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/watch-list">
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span class="ml-2">Watch&nbspList</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" 
                                href="/dashboard">
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span class="ml-2">{{ user.name }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a @click="logout" class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 cursor-pointer"
                                >
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span class="ml-2">Logout</span>
                            </a>
                        </li>
                    </ul>

                    <ul v-if="!user" class="h-full flex flex-nowrap items-center justify-center list-none ml-auto">
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/sell">
                                <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span class="ml-2">Sell</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/register">
                                <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span class="ml-2">Register</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/login">
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span class="ml-2">Login</span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

            <!-- mobile -->
            <div v-bind:class="{ 'hidden': !showMenu, 'flex': showMenu }" class="lg:flex lg:flex-grow items-center">

                <ul  v-if="user" class="flex flex-col lg:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/sell">
                            <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Sell</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/dashboard">
                            <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">{{ user.name }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @click="logout" class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 cursor-pointer">
                            <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Logout</span>
                        </a>
                    </li>
                </ul>

                <ul v-if="!user" class="flex flex-col lg:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/sell">
                            <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span class="ml-2">Sell</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/register">
                            <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span class="ml-2">Register</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/login">
                            <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span class="ml-2">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>


<script setup>

import { ref, onMounted, computed } from 'vue'
import { useStore } from 'vuex'
import { UserService } from '@/services/UserService'
import { useRouter, useRoute } from 'vue-router'

const showMenu = ref(false)
const toggleNavbar = () => {
    showMenu.value = !showMenu.value
}

const logout = () => {
    console.log('logout')
    //send logout request
    UserService.logout()
    window.Laravel = null
    window.location.href = '/'
}


const store = useStore()
const parentCategories = computed(() => store.state.category.parentCategories)
const loadParentCategories = async () => {
    if (parentCategories.value.length === 0) {
        await store.dispatch('category/loadParentCategories')
    }
}

const user = ref({})
const searchInput = ref('')
onMounted(() => {
    searchInput.value.focus()
    user.value = window.Laravel.user
    loadParentCategories()
})

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

const router = useRouter()
const route = useRoute()
const query = ref('')
const search = async () => {
    await store.dispatch('product/queryProducts', {
        q: query.value,
        category: store.state.category.selectedCategory.slug
    })

    // if (route.name != 'home') {
        router.push({
            name: 'search',
            query: {
                q: query.value,
                category: store.state.category.selectedCategory.slug
            }
        })
    // }

    searchInput.value.focus()
}
</script>
