<script setup>
import { onMounted, computed, ref, reactive } from 'vue'
import { useStore } from 'vuex'
import { useRouter, useRoute } from 'vue-router'

const store = useStore()
const route = useRoute()

const product = computed(() => store.state.product.product)
const loadProduct = async (slug) => {
    await store.dispatch('product/loadProduct', slug)
}

onMounted(() => {
    console.log('mounted')        
    loadProduct(route.params.slug)
})

const loadedPhoto = ref(null)
const loadPhoto = (photoUrl) => {
    console.log('photoUrl', photoUrl)
    loadedPhoto.value = photoUrl
    console.log(loadedPhoto)
    
    // event.target.classList.add('border-teal-700');
}


// const props = defineProps({
//     product: {
//         type: Object,
//         required: true
//     }
// })

</script>

<template>

<!-- 0 -->
<div class="max-w-6xl mx-auto min-h-screen antialiased xl:flex xl:flex-col">



    <!-- 1 -->
    <div class="grid grid-cols-1 md:grid-cols-2 mx-3">
        <!-- 2 -->
        <div class="">
            <!-- photos -->
            <!-- 2.1 -->
            <div class="relative">
                <div class="max-h-200 w-full">
                    <img class= "mx-auto" 
                    :src="loadedPhoto ?? product.photos[0].url" >
                </div>
            </div>
            <!-- 2.2 -->
            <div class="flex justify-start space-x-4 my-3">
                <div v-for="(photo, index) in product.photos" :key="index"
                    class="max-w-12"
                    >
                    <img @click="loadPhoto(photo.url)" 
                        class="photo-options border-2 rounded-md cursor-pointer"
                        :class="{'border-teal-700': (photo.url === loadedPhoto || (photo.url === product.photos[0].url && loadedPhoto === null))}"
                        :src="photo.url">
                </div>
            </div>
        </div>
        <!-- 3 -->
        <div class="">
            <!-- summary -->
            <div class="mx-0 md:mx-3 my-3 space-y-2">
                <p class="font-bold text-xl">{{ product.title  }}</p>
                <p class="font-semibold text-xl text-orange-700">
                    <span class="text-sm">MVR</span>{{product.price_formatted}}</p>
                <p class="font-semibold">Condition: <span class="text-gray-700">{{ product.condition  }}</span></p>
                <p class="font-semibold">Locations: 
                    <span class="text-gray-700">{{product.locations[0].name}}</span>
                </p>
                <div class="border border-gray-600 border-8">
                    <p>Seller Details</p>
                    <p class="text-gray-700">{{ product.seller.username  }}</p>
                    <p class="text-gray-700">{{ product.seller.phone  }}</p>
                </div>

            </div>
        </div>
        <!-- 4 -->
        <div class=" md:col-span-2 my-3">
            <p class="font-bold text-xl py-3">Description</p>
            <div v-html="product.description"></div>
        </div>
    </div>
</div>

</template>
