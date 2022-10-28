<script setup>

const props = defineProps({
    product: {
        type: Object,
        required: true
    }
})

const goToProduct = (slug) => {
    console.log(slug)
    window.location.href = `/products/${slug}`
}

</script>

<template>
    <!-- <li @click="goToProduct(product.slug)"
        class="relative bg-orange-500 shadow-lg border-2 
        border-gray-300 focus-within:ring-2 focus-within:ring-indigo-300 
        focus-within:ring-offset-2
        focus-within:ring-offset-gray-100
        "
        >
        <div class="group aspect-w-7 aspect-h-7 block w-full 
        overflow-hidden bg-green-500">
            <img v-if="product.photos.length > 0" :src="product.photos[0].url" alt=""
                class="pointer-events-none object-cover object-center group-hover:opacity-75" />
            <img v-if="product.photos.length == 0"
                src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
            <a href="#" class="absolute inset-0 focus:outline-none">
                <span class="sr-only">View details for title</span>
            </a>
        </div>
        <div class="bg-blue-500">
            <p class="px-1 text-base 
                bg-red-600 pointer-events-none 
                py-2 block font-medium text-gray-800
                line-clamp-3
                overflow-hidden
                ">
                {{ product.title }}
            </p>
            <p class="px-1 py-2 text-lg 
                bg-teal-500 pointer-events-none block text-l 
                font-bold text-orange-700">
                <span class="text-xs font-thin">MVR </span> {{ product.price_formatted }}
            </p>
        </div>
    </li> -->

<div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" :src="product.photos[0].url" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">{{product.title}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            <span class="text-xs font-thin">MVR </span> {{ product.price_formatted }}
        </p>
        <a href="#"
            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</div>

</template>
