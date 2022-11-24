<script setup>

import { ref, onMounted } from 'vue'
import { UserService } from '@/services/UserService'

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

const user = ref({})
onMounted(() => {
    user.value = window.Laravel.user
})


</script>

<template>
    <nav class="relative flex flex-wrap items-center justify-between 
        px-2 py-1 bg-slate-500 mb-3">
        <div class="w-full px-2 mx-auto flex flex-wrap items-center justify-between">
            <div class="align-baseline w-full relative flex justify-between">

                <div class="hidden sm:block my-3 mr-3">
                    <a class="mx-6 text-sm font-bold leading-relaxed mr-4 py-2 whitespace-nowrap uppercase text-white"
                        href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                </div>

                <button class="block sm:hidden text-white cursor-pointer text-xl 
                    leading-none py-1 border border-solid border-transparent 
                    rounded bg-transparent outline-none focus:outline-none" type="button" v-on:click="toggleNavbar()">
                    <!-- hamburger -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
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
                                href="/dashboard/watchlist">
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span class="ml-2">Watchlist</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/dashboard">
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span
                                    class="ml-2">{{ user.name }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a @click="logout"
                                class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 cursor-pointer">
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span
                                    class="ml-2">Logout</span>
                            </a>
                        </li>
                    </ul>

                    <ul v-if="!user" class="h-full flex flex-nowrap items-center justify-center list-none ml-auto">
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/sell">
                                <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span
                                    class="ml-2">Sell</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/register">
                                <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span
                                    class="ml-2">Register</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="px-3 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                                href="/login">
                                <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span
                                    class="ml-2">Login</span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>

            <!-- mobile -->
            <div v-bind:class="{ 'hidden': !showMenu, 'flex': showMenu }" class="lg:flex lg:flex-grow items-center">

                <ul v-if="user" class="flex flex-col lg:flex-row list-none ml-auto">
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
                            <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span class="ml-2">{{
                                    user.name
                            }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @click="logout"
                            class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75 cursor-pointer">
                            <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Logout</span>
                        </a>
                    </li>
                </ul>

                <ul v-if="!user" class="flex flex-col lg:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/sell">
                            <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Sell</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/register">
                            <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Register</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-1 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="/login">
                            <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
