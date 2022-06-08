<template>
    <AppLayout title="Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>
        <!-- This is an example component -->
        <div class="max-w-7xl mx-auto mt-8 md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Product</h3>
                <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
            </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <input v-model="form.name" type="text" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Name">
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700"> Price </label>
                            <input v-model="form.price" type="text" name="price" id="price" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="$$$">
                        </div>
                    </div>

                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button id="saveButton" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
                </div>
            </form>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import { Link } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        AppLayout,
        DeleteUserForm,
        JetSectionBorder,
        LogoutOtherBrowserSessionsForm,
        TwoFactorAuthenticationForm,
        UpdatePasswordForm,
        UpdateProfileInformationForm,
        Link,
    },
  setup () {
    const form = reactive({
        id: null,
        name: null,
        price: null,
    })

    function submit() {
      Inertia.put(`/products/${form.id}`, form)
    }

    return { form, submit }
  },
  mounted(){
        this.form.id = this.item.id;
        this.form.name = this.item.name;
        this.form.price = this.item.price;
  },
  props: {
      item: Object,
  }
}
</script>
