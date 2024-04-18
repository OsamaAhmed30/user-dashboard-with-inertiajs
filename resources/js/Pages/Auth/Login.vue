<template>
    <Head title="Login" />
    <main class="grid place-items-center min-h-screen w-full">
        <section
            class="bg-white  p-8 max-w-md mx-auto border rounded-xl w-full"
        >
            <h3 class="text-3xl mb-3">Login</h3>

            <form @submit.prevent="submit" method="post">
                <div class="mb-6">
                    <label
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="email"
                        >Email</label
                    >
                    <input
                        v-model="form.email"
                        type="email"
                        class="border rounded-xl p-2 w-full"
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
                        class="border rounded-xl p-2 w-full"
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
                        Log In
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

defineOptions({ layout: null });
let form = useForm({
    email: "",
    password: "",
});

let submit = ()=>{
    form.post('/login')
}
</script>

