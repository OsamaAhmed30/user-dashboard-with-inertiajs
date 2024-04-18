<template>
    <Head title="Users" />

    <div class="container flex flex-col my-6">
        <div class="title w-200 flex justify-between">
            <h3>Users</h3>
            <div>
                <input
                    v-model="search"
                    type="text"
                    class="border border-gray-600 px-2 py-2 rounded-lg focus-visible:border-blue-600"
                    placeholder="Search ..."
                />
                <Link
                    v-if="can.createUser"
                    class="bg-blue-500 text-white rounded mx-3 py-2 px-4 hover:bg-blue-700"
                    href="/users/create"
                    >Add New User</Link
                >
            </div>
        </div>
        <table class="min-w-full mt-6 divide-y divide-gray-200 overflow-x-auto">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Name
                    </th>

                    <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                    >
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in users.data" :key="user.id">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ user.name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ user.email }}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a
                            href="#"
                            class="text-indigo-600 hover:text-indigo-900"
                            >Edit</a
                        >
                        <a href="#" class="ml-2 text-red-600 hover:text-red-900"
                            >Delete</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>

        <Pagination :links="users.links" class="my-6" />
    </div>
</template>

<script setup>
import Layout from "../../Shared/Layout.vue";
import Pagination from "../../Shared/Pagination.vue";
import { router } from '@inertiajs/vue3'
import { ref, watch } from "vue";
import { throttle ,debounce } from "lodash";


let props = defineProps({
    users: Object,
    filters:Object,
    can:Object
});
let search = ref(props.filters.search);
defineOptions({ layout: Layout });

watch(search, debounce(function (value){
    console.log('rrr');
    router.get("/users", { search: value },{preserveState:true,replace:true});

},500));
</script>

<style scoped>
.container {
    width: 80%;
    display: flex;
    justify-content: center;
}
</style>
