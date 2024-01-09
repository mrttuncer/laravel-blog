<script setup>
import { defineProps, ref } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';

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
    <div>
        <h1>Kategori Detayı</h1>
        <ul>
            Kategori Adı: {{ category.name }}
        </ul>

        <Link :href="route('categories.index')">
        Geri
        </Link>

        <form @submit.prevent="deleteCategory()">
            <button type="submit">
                Sil
            </button>

        </form>
    </div>
</template>
