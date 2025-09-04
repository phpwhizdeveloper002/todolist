<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

//render the data of controller 
const props = defineProps({
  posts: {
    type: Array,
    default: () => []
  }
});

function deletePost(id) {
  if (confirm('Are you sure you want to delete this post?')) {
    router.get(`/posts/${id}`);
  }
}

function editPost(id) {
    router.get(`/posts/edit/${id}`);
}

function viewPost(id) {
    router.get(`/posts/view/${id}`);
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Posts List
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                             <div class="mb-5">
                                <a href="/posts/create" class="bg-blue-700 text-white px-5 py-2 rounded-full">
                                Add Post
                                </a>
                            </div>

                            <table class="posts-table">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in props.posts" :key="post.id">
                                <td>{{ post.id }}</td>
                                <td>{{ post.title }}</td>
                                <td>{{ post.content }}</td>
                                <td>
                                    <button type="button"
                                     @click="editPost(post.id)"
                                     class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>&nbsp;

                                    <button
                                    type="button"
                                    @click="deletePost(post.id)"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    >
                                    Delete
                                    </button>

                                    <button type="button"
                                    @click="viewPost(post.id)"
                                    class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">
                                        View
                                    </button>

                                </td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
