<template>
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 220px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li v-for="item in sidebarJson" class="nav-item">
                <Link :href="route(item.route)" class="nav-link text-white" :class="{'active':item.routeArr.includes(route().current())}">{{ item.name  }}</Link>
            </li>
        </ul>
        <hr>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import sidebarJson from '@/json/sidebar.json'
import { onMounted } from 'vue';

onMounted(() => {

})

</script>