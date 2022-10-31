<script setup>
import { watch, ref, onMounted, reactive } from 'vue'
import axios from 'axios';
import { useRouter, useRoute } from 'vue-router'

const route = useRoute()

onMounted(() => {
    console.log('mounted ListingShow')
})

</script>

<template>
    <div class="w-full xl:w-9/12">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-5">Show Listing WIP</h1>
        </div>
    </div>
</template>
