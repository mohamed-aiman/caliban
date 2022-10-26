<template>
    <div class="min-h-screen">
        <div class="">
            THE PROJECT NAME
        </div>
        <div class="relative flex items-top bg-gray-100 py-4 sm:pt-0">
            <SideNav />
            <router-view>
            </router-view>
        </div>
    </div>
</template>

<script setup>
import SideNav from '@/navigation/SideNav.vue'
</script> 
