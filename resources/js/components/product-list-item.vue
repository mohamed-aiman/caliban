<script setup>

import { useRouter, useRoute } from 'vue-router'

const router = useRouter()

const props = defineProps({
    product: {
        type: Object,
        required: true
    }
})

const goToProduct = (slug) => {
    console.log(slug)
    // window.location.href = `/products/${slug}`
    router.push(`/products/${slug}`)
}

</script>

<template>
    <div @click="goToProduct(product.slug)" class="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
        <div class="aspect-w-7 aspect-h-7 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-72">
            <img :src="product.photos[0].url" 
                :alt="'photo of ' + product.title"
                class="h-full w-full object-cover object-center sm:h-full sm:w-full">
        </div>
        <div class="flex flex-1 flex-col space-y-2 p-4">
            <p class="text-sm text-gray-900 line-clamp-3">
                {{ product.title }}
            </p>
            <div class="flex flex-1 flex-col justify-end">
                <!-- <p class="text-sm italic text-gray-500">8 colors</p> -->
                <p class="text-base font-semibold text-slate-800">MVR&nbsp{{ product.price_formatted }}</p>
            </div>
        </div>
    </div>

</template>
