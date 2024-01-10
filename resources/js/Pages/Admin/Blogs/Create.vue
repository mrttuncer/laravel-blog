<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    categories: Array,
});

const form = useForm({
    title: '',
    content: '',
    category_ids: [],
});

const createBlog = () => {
    form.post(route("blogs.store"), {
        errorBag: "createBlog",
        preserveScroll: true,
    });
};
</script>

<template>
    <div class=" mx-auto mt-8 w-4/5 p-12 border-black border rounded-lg shadow-2xl">
        <h1 class="text-2xl font-bold mb-4">Yeni Blog Oluştur</h1>
        <form @submit.prevent="createBlog" class="space-y-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-600">Başlık:</label>
                <input v-model="form.title" type="text" id="title" name="title" required
                    class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-600">İçerik:</label>
                <textarea v-model="form.content" id="content" name="content" rows="4" required
                    class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Kategoriler:</label>
                <div v-for="category in props.categories" :key="category.id" class="flex items-center space-x-2">
                    <input type="checkbox" :id="'category_' + category.id" :value="category.id" v-model="form.category_ids"
                        class="text-indigo-600">
                    <label :for="'category_' + category.id" class="text-sm">{{ category.name }}</label>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Oluştur</button>
            </div>
        </form>
    </div>
</template>

