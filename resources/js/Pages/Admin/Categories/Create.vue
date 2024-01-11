<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
    name: '',
});

const createCategory = () => {
    form.post(route("categories.store"), {
        errorBag: "createCategory",
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Kategori Yarat">
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6">Kategori Oluştur</h1>
            <form @submit.prevent="createCategory">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Kategori Adı:</label>
                    <input v-model="form.name" type="text" id="name" name="name"
                        class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                </div>
                <div class="flex flex-row items-center justify-between">
                    <Link :href="route('categories.index')"
                        class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mr-2">
                    Geri
                    </Link>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Oluştur
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
