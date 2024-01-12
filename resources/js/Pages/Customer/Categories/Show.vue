<script setup>
import { defineProps } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    category: Object,
});
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
                <Link :href="route('customer-categories.index')"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                Geri
                </Link>

            </div>
            <div>
                <h2 class="text-xl font-bold mb-2">Bu Kategoriye Ait Yazılar</h2>
                <ul>
                    <li v-for="blog in category.blogs" :key="blog.id" class="mb-2">
                        <Link :href="route('customer-blogs.show', blog.id)" class="text-blue-500 hover:underline">
                        {{ blog.title }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </AppLayout>
</template>
