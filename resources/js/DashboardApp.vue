<template>
    <div class="mx-auto min-h-screen xl:flex xl:flex-col">
        <TopNavDashboard />
        <div class="flex flex-nowrap mx-auto p-3 w-full space-x-3">
            <SideNav />
            <router-view></router-view>
        </div>
    </div>
</template>

<script setup>
import TopNavDashboard from '@/navigation/TopNavDashboard.vue'
import SideNav from '@/navigation/SideNav.vue'
</script> 
