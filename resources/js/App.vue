<template>
    <div class=" bg-slate-300">
        <TopNav />
        <vue3-progress />
        <router-view>
        </router-view>
    </div>
</template>

<script setup>
import TopNav from '@/navigation/TopNav.vue'
</script> 
