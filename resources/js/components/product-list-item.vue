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


    <div class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
        <div class="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-96">
            <!-- <img src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-01.jpg" -->
            <img :src="product.photos[0].url" 
                alt="Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green."
                class="h-full w-full object-cover object-center sm:h-full sm:w-full">
        </div>
        <div class="flex flex-1 flex-col space-y-2 p-4">
            <h3 class="text-sm font-medium text-gray-900">
                <a href="#">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    Basic Tee 8-Pack
                </a>
            </h3>
            <p class="text-sm text-gray-500 line-clamp-3">
                {{ product.title }}
            </p>
            <div class="flex flex-1 flex-col justify-end">
                <!-- <p class="text-sm italic text-gray-500">8 colors</p> -->
                <p class="text-base font-medium text-gray-900">MVR&nbsp{{ product.price_formatted }}</p>
            </div>
        </div>
    </div>

</template>
