<script setup>
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    name: '',
});
const createCategory = () => {
    form.post(route("categories.store"), {
        errorBag: "createCategory",
        preserveScroll: true,
    });
};
</script>
<template>
    <div>
        <h1>Kategori Oluştur</h1>
        <form @submit.prevent="createCategory">
            <div>
                <label for="name">Kategori Adı:</label>
                <input v-model="form.name" type="text" id="name" name="name" required>
            </div>
            <div>
                <button type="submit">Oluştur</button>
            </div>
        </form>
    </div>
</template>