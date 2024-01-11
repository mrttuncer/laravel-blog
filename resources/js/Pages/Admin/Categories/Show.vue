<script setup>
import { defineProps } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    category: Object,
});

const form = useForm({
    _method: "Delete",
});

const deleteCategory = () => {
    if (!confirm("Are you sure to delete")) return;
    form.post(route("categories.destroy", props.category.id), {
        errorBag: "deleteCategory",
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Kategori Görüntüle">
        <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6">Kategori Detayı</h1>
            <ul class="mb-6">
                <li class="list-disc">
                    <span class="font-semibold">Kategori Adı:</span> {{ category.name }}
                </li>
            </ul>
            <div class="flex flex-row items-center justify-between mb-4">
                <Link :href="route('categories.index')"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                Geri
                </Link>

                <form @submit.prevent="deleteCategory">
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">
                        Sil
                    </button>
                </form>
            </div>
            <div>
                <h2 class="text-xl font-bold mb-2">Bu Kategoriye Ait Yazılar</h2>
                <ul>
                    <li v-for="blog in category.blogs" :key="blog.id" class="mb-2">
                        <Link :href="route('blogs.show', blog.id)" class="text-blue-500 hover:underline">
                        {{ blog.title }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </AppLayout>
</template>
