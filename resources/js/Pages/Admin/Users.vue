<script setup>
import { ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    users: Array,
});

</script>

<template>
    <AppLayout title="Kullanıcılar">
        <div class="mx-auto mt-8 w-4/5 p-12 border-black border rounded-lg shadow-2xl">
            <h1 class="text-2xl font-bold mb-4">Kullanıcılar</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Adı</th>
                            <th class="py-2 px-4 border-b">E-posta</th>
                            <th class="py-2 px-4 border-b">Rolü</th>
                            <th class="py-2 px-4 border-b">Rolü Düzenle</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td class="py-2 px-4 border-b">{{ user.name }}</td>
                            <td class="py-2 px-4 border-b">{{ user.email }}</td>
                            <td class="py-2 px-4 border-b">{{ user.role }}</td>
                            <td class="py-2 px-4 border-b">
                                <Link :href="route('change-user-role', user.id)">
                                Rolü Düzenle
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
