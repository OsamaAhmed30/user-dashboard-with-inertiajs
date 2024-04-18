<template>
    <section class="header">
        <input type="text" value="My App">
        <h3>My App</h3>
        <p>Welcome Back {{ name }}</p>
        <Nav />
    </section>
    <section class="main">
        <slot />
    </section>
</template>

<script setup>
import Nav from "./Nav.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page =usePage()
const name = computed(() => {
    return page.props.auth.user;
});
</script>

<style>
* {
    margin: 0;
}
.header {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background-color: brown;
    color: aliceblue;
}
.main {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
</style>
