<template>
<aside class="w-64" aria-label="Sidebar">
   <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
      <ul class="space-y-2">
         <li>
            <router-link to="/" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
               <span class="ml-3">Dashboard</span>
            </router-link>
         </li>
         <li>
            <router-link to="/test" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd" />
                </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Test Page Ah</span>
               <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
            </router-link>
         </li>
      </ul>
   </div>
</aside>
</template>

<script setup>
</script>

<style lang="scss" scoped>
.avatar {
    @apply w-12 h-12 inline rounded-full border-2 shadow-inner border-gray-100;
}
.nav-icon {
    @apply inline-block;
}
.campaign-item {
    @apply mt-5 ml-10 p-3;
}
.nav-text {
    @apply ml-7;
}
.collapsed-hide {
    @apply rounded-md;
}
@screen sm{
    .nav-container {
        transition: all .2s linear;
        .collapsed-hide {
            @apply hidden;
        }
    }
    .nav-container:hover {
    @apply w-72;
    }
    .nav-container li {
    list-style-type: none;
    @apply my-10;
    }   
    .nav-container:hover {
        .collapsed-hide {
            @apply block;
        }
        .client-text {
            @apply inline ml-5;
        }
    }
}
li:hover {
    @apply bg-blue-600 rounded-md text-white cursor-pointer;
}
.nav-container li {
    list-style-type: none;
    @apply flex items-center my-4 py-4 pl-3 pr-2;
}
.nav-container li.router-link-active,
.nav-container li.router-link-exact-active {
    @apply text-blue-500;        
}
.nav-container li.router-link-active:hover {
    @apply text-white;
}
</style>
