
<script setup>
import { Link } from '@inertiajs/vue3';
import CustomerAppLayout from '@/Layouts/CustomerAppLayout.vue';
const props = defineProps({
    blogs: Array,
});
</script>
<template>
    <CustomerAppLayout title="Bloglar">
        <div class="w-4/5 mx-auto">
            <h1 class="text-2xl font-bold mb-4">Blog Yazıları</h1>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">Başlık</th>
                        <th class="py-2 px-4 border-b text-center">İçerik</th>
                        <th class="py-2 px-4 border-b text-center">Kategoriler</th>
                        <th class="py-2 px-4 border-b text-center">Detay Görüntüle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="blog in blogs" :key="blog.id">
                        <td class="py-2 px-4 border-b text-center">{{ blog.title }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ blog.content }}</td>

                        <td class="py-2 px-4 border-b text-center">
                            <ul class="list-disc list-inside">
                                <li v-for="category in blog.categories" :key="category.id">
                                    <Link :href="route('customer-categories.show', category.id)" class="text-cyan-400">{{
                                        category.name
                                    }}</Link>
                                </li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b text-center">

                            <Link :href="route('customer-blogs.show', blog.id)" class="text-green-500">Detay Görüntüle

                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </CustomerAppLayout>
</template>

