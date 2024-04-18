<template>
    <Head  >
        <title>Home </title>
        <meta type="description" head-key="description" content="Home information"/>
    </Head>
      
    <div>
        <h2>Welcome {{ name }}</h2>
        
        <li v-for="framework in frameworks">{{ framework }}</li>
    </div>
</template>

<script setup>
import Layout from "@/Shared/Layout.vue";

defineOptions({ layout: Layout })

    defineProps( {
        name: String,
        frameworks: Array,
    })


</script>
