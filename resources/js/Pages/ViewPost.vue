<script setup>
import { ref, onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  post: Object,   
});

// Form state (initialize with post data)
const form = useForm({
  title: props.post?.title || '',
  content: props.post?.content || '',
});


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Edit Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Page Heading -->
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6 border-b pb-3">
                    Post Details
                    </h2>

                    <!-- Post Details Card -->
                    <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase">Title</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                        {{ form.title }}
                        </p>
                    </div>

                    <!-- Content -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 uppercase">Content</h3>
                        <p class="mt-1 text-base text-gray-700 leading-relaxed">
                        {{ form.content }}
                        </p>
                    </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-8 flex space-x-4">
                    </div>
                </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
