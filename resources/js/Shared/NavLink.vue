<template>
    <Link :href="href" :method="method" :class="{ active: active }">
        <slot />
    </Link>
</template>
<script>
export default {
    props: {
        active: Boolean,
        href: String,
        method: String,
    },
    components: {
    },
};
</script>

