<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    blog: Object,
});

</script>

<template>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Kategori Detayı</h1>

        <ul class="list-disc mb-4">

            <li class="mb-2"><span class="font-semibold">Blog Adı:</span> {{ blog.title }}</li>
            <li class="mb-2"><span class="font-semibold">Blog İçeriği:</span> {{ blog.content }}</li>
            <li class="font-semibold">Blog Kategorileri:</li>
            <ul class="list-disc ml-4">
                <li v-for="category in blog.categories" :key="category.id">{{ category.name }}</li>
            </ul>
        </ul>

        <Link :href="route('customer-blogs.index')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
        Geri
        </Link>

    </div>
</template>


