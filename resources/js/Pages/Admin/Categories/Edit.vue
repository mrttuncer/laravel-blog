<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    category: Array,
});
const form = useForm({
    name: props.category.name,
});

const updateCategory = () => {
    form.put(route("categories.update", props.category.id), {
        errorBag: "updateCategory",
        preserveScroll: true,
    })
};
</script>

<template>
    <AppLayout title="Kategori Güncelle">
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6">Kategori Düzenle</h1>
            <form @submit.prevent="updateCategory">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Kategori Adı:</label>
                    <input v-model="form.name" type="text" id="name" name="name"
                        class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                </div>
                <InputError class="mt-2" :message="form.errors.name" />
                <div class="flex flex-row items-center justify-between">
                    <Link :href="route('categories.index')"
                        class="bg-red-400 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mr-2">
                    Geri
                    </Link>
                    <div class="text-right">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Güncelle
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
