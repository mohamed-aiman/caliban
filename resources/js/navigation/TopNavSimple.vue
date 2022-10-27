<template>
    <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-teal-500 mb-3">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto  px-4 lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="#pablo">
                    teal Color
                </a>
                <button
                    class="text-white cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button" v-on:click="toggleNavbar()">
                    <!-- hamburger -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- end hamburger -->
                </button>
            </div>
            <div v-bind:class="{ 'hidden': !showMenu, 'flex': showMenu }" class="lg:flex lg:flex-grow items-center">
                <ul class="flex flex-col lg:flex-row list-none ml-auto">
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="#pablo">
                            <i class="fab fa-facebook-square text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Share</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="#pablo">
                            <i class="fab fa-twitter text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Tweet</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75"
                            href="#pablo">
                            <i class="fab fa-pinterest text-lg leading-lg text-white opacity-75" /><span
                                class="ml-2">Pin</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "teal-navbar",
    data() {
        return {
            showMenu: false
        }
    },
    methods: {
        toggleNavbar: function () {
            this.showMenu = !this.showMenu;
        }
    }
}
</script>
