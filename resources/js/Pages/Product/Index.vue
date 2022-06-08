<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia';
defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
    items: Array,
});

const deleteItem = function (id) {
    Inertia.delete('/products/' + id);
}
</script>

<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>
        <!-- This is an example component -->
        <div class="max-w-7xl mx-auto mt-8">
            <div class="flex justify-end">

                <Link href="/products/create" class="p-1 px-3 bg-blue-500 text-gray-100 rounded-lg focus:border-4 border-blue-300">Create</Link>
            </div>
            <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Product Name
                                    </th>
                                    <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Category
                                    </th> -->
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Price
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" v-for="item in items" :key="item.id">
                                    <td class="p-4 w-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{item.name}}</td>
                                    <!-- <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">Desktop PC</td> -->
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{item.price}}</td>
                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        <Link :href="`/products/${item.id}/edit`" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                                        <button @click="deleteItem(item.id)" class="text-red-600 dark:text-red-500 hover:underline ml-2">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            <p class="mt-5">This table component is part of a larger, open-source library of Tailwind CSS components. Learn
                more
                by going to the official <a class="text-blue-600 hover:underline"
                    href="https://flowbite.com/docs/getting-started/introduction/" target="_blank">Flowbite Documentation</a>.
            </p>
        </div>
    </AppLayout>
</template>
