<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    newRole: props.user.role,
});

const changeUserRole = () => {
    form.post(route("change-user-role", props.user.id), {
        errorBag: "changeUserRole",
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Blog Yarat">
        <div class="mx-auto mt-8 w-4/5 p-12 border-black border rounded-lg shadow-2xl">
            <h1 class="text-2xl font-bold mb-4">Yeni Blog Oluştur</h1>
            <form @submit.prevent="changeUserRole" class="space-y-4">
                <select v-model="form.newRole">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <br>
                <button type="submit">Change Role</button>
            </form>
        </div>
    </AppLayout>
</template>
