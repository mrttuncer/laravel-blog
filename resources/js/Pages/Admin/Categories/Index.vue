
<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    categories: Array,
});
</script>
<template>
    <div>
        <h1>Kategoriler</h1>
        <ul>
            <li v-for="category in  categories " :key="category.id">
                {{ category.name }}
                <Link :href="route('categories.edit', category.id)">
                Düzenle
                </Link>
                <Link :href="route('categories.show', category.id)">
                Detay Görüntüle
                </Link>

            </li>
        </ul>
        <Link :href="route('categories.create')">Yeni Kategori Oluştur
        </Link>
    </div>
</template>

