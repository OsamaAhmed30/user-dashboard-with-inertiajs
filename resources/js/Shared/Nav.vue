<template>
    <nav>
        <ul>
            <li>
                <NavLink href="/" :active="$page.component == 'Home'"
                    >Home</NavLink
                >
            </li>
            <li>
                <NavLink href="/users" :active="$page.component == 'Users'"
                    >Users</NavLink
                >
            </li>
            <li>
                <NavLink
                    href="/settings"
                    :active="$page.component == 'Settings'"
                    >Settings</NavLink
                >
            </li>

            <li>
                <NavLink href="/logout" method="delete" as="button"
                    >Logout</NavLink
                >
            </li>
        </ul>
    </nav>
</template>

<script setup>
import NavLink from "./NavLink.vue";


</script>

<style>
nav {
    width: 30%;

}
ul {
    display: flex;
    justify-content: space-between;


}
ul li {
    list-style: none;

}
a {
    text-decoration: none;
    color: aliceblue;

}
.active {
    font-weight: bold;
    text-decoration: underline;
    color: rgb(207, 246, 13);
}
</style>
