<script setup>
import { useForm } from '@inertiajs/vue3';
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
    <div>
        <h1>Kategori Düzenle</h1>
        <form @submit.prevent="updateCategory">
            <div>
                <label for="name">Kategori Adı:</label>
                <input v-model="form.name" type="text" id="name" name="name" required>
            </div>
            <div>
                <button type="submit">Güncelle</button>
            </div>
        </form>
    </div>
</template>
