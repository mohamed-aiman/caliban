<script setup>

import { ref, onMounted } from 'vue'

const parentCategories = ref([])
const loadParentCategories = async () => {
    const response = await fetch('/parent-categories')
    parentCategories.value = await response.json()
}

onMounted(() => {
    loadParentCategories()
})

const goToCategoryProducts = (slug) => {
    console.log(slug)
    window.location.href = `/categories/${slug}/products`
}

</script>

<template>
    <div class="hidden sm:block px-3">
        <ul>
            <li v-for="category in parentCategories" @click="goToCategoryProducts(category.slug)" :key="category.id"
                class="font-semibold text-teal-700 cursor-pointer">
                {{ category.name }}
            </li>
        </ul>
    </div>
</template>
