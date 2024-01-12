<script setup>
import { Link } from '@inertiajs/vue3';
import CustomerAppLayout from '@/Layouts/CustomerAppLayout.vue';

const props = defineProps({
    categories: Array,
});
</script>

<template>
    <CustomerAppLayout title="Kategoriler">
        <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-6">Kategoriler</h1>
            <ul>
                <li v-for="category in categories" :key="category.id"
                    class="mb-4 border-b border-gray-300 pb-2 flex items-center justify-between">
                    <span class="text-lg">{{ category.name }}</span>
                    <div class="space-x-2">
                        <Link :href="route('customer-categories.show', category.id)" class="text-green-500 hover:underline">
                        Detay Görüntüle
                        </Link>
                    </div>
                </li>
            </ul>
        </div>
    </CustomerAppLayout>
</template>
