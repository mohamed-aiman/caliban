<script setup>
import { onMounted, computed, ref, reactive } from 'vue'
import { useStore } from 'vuex'
import { useRouter, useRoute } from 'vue-router'
import LikeToggle from '@/components/like-toggle.vue';

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

    <div class="m-3">
        <p class="text-l font-mono font-semibold text-orange-600">
            <template v-for="(link, index) in product.links" :key="index">
                <span v-if="index != 0"> > </span>
                <a :href="link.url" class="text-orange-600 hover:text-orange-700">
                    {{ link.name }}
                </a>
            </template>
        </p>
    </div>



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
                    class="max-w-12 w-12">
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
            <div class="mx-0 md:mx-3 space-y-2">
                <div class="bg-white p-3">
                    <p class="font-bold text-xl">{{ product.title  }}</p>
                </div>
                <div class="bg-white p-3">
                    <p class="font-semibold text-xl text-orange-700">
                        <span class="text-sm">MVR</span>{{product.price_formatted}}
                    </p>
                </div>
                <div class="bg-white p-3">
                    <p class="font-semibold">Condition: <span class="text-gray-700">{{ product.condition  }}</span></p>
                </div>
                <div class="bg-white p-3">
                    <p class="font-semibold">Locations: 
                        <span class="text-gray-700">
                            {{product.locations_string}}
                        </span>
                    </p>
                </div>
                <div class="bg-white p-3">
                    <div class="flex items-center">
                        <img :src="product.seller.avatar_url" class="h-12 w-12 rounded-full" alt="profile picture">
                        <div class="ml-4">
                            <h4 class="text-sm font-bold text-gray-900">{{ product.seller.name }}</h4>
                            <div class="mt-1 flex items-center">
                                {{ product.seller.phone }}
                                <span v-if="product.seller.phone2">
                                    ,{{ product.seller.phone2 }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-3">
                    <like-toggle :product_id="product.id" :liked="product.liked"></like-toggle>
                </div>
            </div>
        </div>
        <!-- 4 -->
        <div class=" md:col-span-2 my-3 bg-white p-3">
            <p class="font-bold text-xl py-3">Description</p>
            <div v-html="product.description"></div>
        </div>
    </div>
    
</div>

</template>
