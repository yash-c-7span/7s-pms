<template>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand my-2 h1">Navbar </span>
        </div>
    </nav>
</template>

<script setup>
import { hrefToUrl } from '@inertiajs/inertia';
import {  onMounted } from 'vue';
onMounted(() => {
    console.log("sidebar updated");
})
</script>