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
    <li @click="goToProduct(product.slug)"
        class="relative bg-gray-100 shadow-lg border-2 
        border-gray-300 focus-within:ring-2 focus-within:ring-indigo-300 focus-within:ring-offset-2
        focus-within:ring-offset-gray-100"
        >
        <div class="group aspect-w-20 aspect-h-7 block w-full overflow-hidden bg-gray-100">
            <img v-if="product.photos.length > 0" :src="product.photos[0].url" alt=""
                class="pointer-events-none object-cover group-hover:opacity-75" />
            <img v-if="product.photos.length == 0"
                src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                alt="" class="pointer-events-none object-cover group-hover:opacity-75" />
            <a href="#" class="absolute inset-0 focus:outline-none">
                <span class="sr-only">View details for title</span>
            </a>
        </div>
        <p
            class="px-1 pointer-events-none mt-2 block truncate text-sm font-medium text-gray-800">
            {{ product.title }}
        </p>
        <p class="px-1 pointer-events-none block text-l font-medium text-rose-600 font-bold">
            <span class="text-xs font-thin">MVR </span> {{ product.price_formatted }}
        </p>
    </li>
</template>
