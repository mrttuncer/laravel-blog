<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    blog: Object,
    categories: Array,
    blogCategories: Array,
});

const form = useForm({
    title: props.blog.title,
    content: props.blog.content,
    category_ids: props.blogCategories.map(category => category.id),
});

const updateBlog = () => {
    form.put(route("blogs.update", props.blog.id), {
        errorBag: "updateBlog",
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Blog Düzenle">
        <div class="w-4/5 p-12 border-black border rounded-lg shadow-2xl mx-auto mt-8">
            <h1>Blog Düzenle</h1>
            <form @submit.prevent="updateBlog" class="mt-4">
                <div>
                    <label for="title">Başlık:</label>
                    <input v-model="form.title" type="text" id="title" name="title" required
                        class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label for="content">İçerik:</label>
                    <textarea v-model="form.content" id="content" name="content" rows="4" required
                        class="mt-1 p-2 w-full border rounded-md"></textarea>
                </div>
                <div>
                    <label>Kategoriler:</label>
                    <div v-for="category in props.categories" :key="category.id" class="flex items-center space-x-2">
                        <input type="checkbox" :id="'category_' + category.id" :value="category.id"
                            v-model="form.category_ids" class="text-indigo-600">
                        <label :for="'category_' + category.id" class="text-sm">{{ category.name }}</label>
                    </div>
                </div>
                <div class="flex flex-row items-center justify-between">
                    <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md">Güncelle</button>
                    <Link :href="route('blogs.index')" class="mt-4 bg-cyan-500 text-white px-4 py-2 rounded-md">
                    Geri Dön
                    </Link>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
