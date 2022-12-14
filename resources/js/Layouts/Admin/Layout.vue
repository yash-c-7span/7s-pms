<template>
    <main>
        <Sidebar />
        <div style="width: 100%;">
            <NavbarVue />
            <slot></slot>
        </div>
    </main>
</template>

<script setup>
import NavbarVue from './Navbar.vue';
import Sidebar from './Sidebar.vue';
</script>

<style>
main{
    display: flex;
    flex-wrap: nowrap;
    height: 100vh;
}
</style>