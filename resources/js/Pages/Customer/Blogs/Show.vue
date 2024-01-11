<script setup>
import { defineProps, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps({
    blog: Object,
    userLiked: Boolean,
});

const userLiked = ref(props.userLiked);

const likeBlog = () => {
    axios.post(route('like', props.blog.id))
        .then(response => {
            userLiked.value = true;
        })
        .catch(error => {
        });
};

const unlikeBlog = () => {
    axios.delete(route('unlike', props.blog.id))
        .then(response => {
            userLiked.value = false;
        })
        .catch(error => {
        });
};
</script>

<template>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-4">Kategori Detayı</h1>
        <ul class="list-disc mb-4">
            <li class="mb-2"><span class="font-semibold">Blog Adı:</span> {{ props.blog.title }}</li>
            <li class="mb-2"><span class="font-semibold">Blog İçeriği:</span> {{ props.blog.content }}</li>
            <li class="font-semibold">Blog Kategorileri:
                <ul class="list-disc ml-4">
                    <li v-for="category in props.blog.categories" :key="category.id">{{ category.name }}</li>
                </ul>
            </li>
        </ul>

        <button v-if="!userLiked" @click="likeBlog"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">
            Beğen
        </button>
        <button v-else @click="unlikeBlog"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block">
            Beğeniyi Geri Al
        </button>

        <Link :href="route('customer-blogs.index')"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block mt-4">
        Geri
        </Link>
    </div>
</template>
