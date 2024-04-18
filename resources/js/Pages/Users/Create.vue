<template>
    <h3>Create New User</h3>
    <form @submit.prevent="submit" method="post" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="name"
                >Name</label
            >
            <input
                v-model="form.name"
                type="text"
                class="border border-gray-400 p-2 w-full"
                name="name"
                id="name"
            />
            <div
                v-if="form.errors.name"
                v-text="errors.name"
                class="text-red-600 mt-1 text-sm"
            ></div>
        </div>
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="email"
                >Email</label
            >
            <input
                v-model="form.email"
                type="email"
                class="border border-gray-400 p-2 w-full"
                name="email"
                id="email"
                required
            />
            <div
                v-if="form.errors.email"
                v-text="errors.email"
                class="text-red-600 mt-1 text-sm"
            ></div>
        </div>
        <div class="mb-6">
            <label
                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="password"
                >Password</label
            >
            <input
                v-model="form.password"
                type="password"
                class="border border-gray-400 p-2 w-full"
                name="password"
                id="password"
                required
            />
            <div
                v-if="form.errors.password"
                v-text="errors.password"
                class="text-red-600 mt-1 text-sm"
            ></div>
        </div>
        <div class="mb-6">
            <button
                type="submit"
                :disabled="form.processing"
                class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-700"
            >
                Submit
            </button>
            <Link
                href="/users"
                class="bg-red-500 mx-3 text-white rounded py-2 px-4 hover:bg-red-700"
            >
                Cancel
            </Link>
        </div>
    </form>
</template>

<script setup>
import { reactive } from "vue";
import { router, useForm } from "@inertiajs/vue3";
defineProps({
    errors: Object,
});
let form = useForm({
    name: reactive(""),
    email: reactive(""),
    password: reactive(""),
});
let submit = () => {
    form.post("/users/create", form);
};
</script>
