<script setup>
import axios from 'axios';
import { ref, computed, watch } from 'vue';

const props = defineProps(['product'])
const liked = ref(props.product.liked)
const likedColor = computed(() => {
    return liked.value ? 
      'bg-green-700 hover:bg-green-800 dark:bg-blue-300 dark:hover:bg-blue-400 dark:focus:ring-blue-500' :
      'bg-gray-300 hover:bg-gray-400 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'
})

watch(() => props.product, (val) => {
  if (val) {
    liked.value = val.liked
  }
})

const toggle = () => {
  axios.post('/api/likes/toggle', { product_id: props.product.id })
    .then(response => {
      console.log(response.data)
      liked.value = response.data.liked
      console.log(liked)
    })
    // .catch(error => {
    //   if (error.response.status == 422) {
    //     console.log(error.response.data.errors)
    //   }
    // })
}

</script>

<template>
  <button @click="toggle()" type="button" 
    class="focus:ring-4 focus:ring-red-300 focus:outline-none font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2"
    :class="likedColor"
    >
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
      <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
    </svg>
  </button>
</template>
