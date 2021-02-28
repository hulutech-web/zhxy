<template>
    <el-card shadow="hover" class="mb-1">
        <div class="flex cursor-pointer">
            <div v-for="(tab, index) in tabs" :key="index">
                <router-link :to="{ name: tab.name }" :class="{ cur: $route.name == tab.name }"
                             v-if="!tab.current || $route.name == tab.name">
                    <div class="py-2 px-6 ml-1 text-white rounded-t-lg
                        bg-green-500 bg-opacity-80
                        hover:bg-opacity-100"
                    >
                        <span :class="{cur:$route.name == tab.name }">{{ tab.title }}</span>
                    </div>
                </router-link>
            </div>
        </div>
    </el-card>
</template>

<script>
    export default {
        props: ["tabs"],
    };
</script>

<style>
    .cur {
        animation: ping 1.2s cubic-bezier(0, 0, 0.8, 1) infinite;
    }
    @keyframes ping {
        50%, 75% {
            transform: scale(.9);
            opacity: 0;
        }
    }
</style>
