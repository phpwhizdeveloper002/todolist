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

// Editing state
const isEditing = ref(true);   // since it's edit page, set true
const editingId = ref(props.post?.id || null);

// Frontend validation errors
const errors = ref({
  title: null,
  content: null,
});

// Validation logic
function validate() {
  let valid = true;
  errors.value = { title: null, content: null };

  if (!form.title.trim()) {
    errors.value.title = 'Title is required.';
    valid = false;
  } else if (form.title.length < 3) {
    errors.value.title = 'Title must be at least 3 characters.';
    valid = false;
  }

  if (!form.content.trim()) {
    errors.value.content = 'Content is required.';
    valid = false;
  } else if (form.content.length < 5) {
    errors.value.content = 'Content must be at least 5 characters.';
    valid = false;
  }

  return valid;
}

// Cancel editing
function cancelEdit() {
  isEditing.value = false;
  editingId.value = null;
  form.reset();
  errors.value = { title: null, content: null };
}

// Submit form
function submit() {
  if (!validate()) return;

  if (isEditing.value && editingId.value) {
    form.post(`/posts/update/${editingId.value}`, {
      onSuccess: () => {
        isEditing.value = false;
        editingId.value = null;
        form.reset();
      },
    });
  }
}
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
                    <div class="p-6 text-gray-900 ">
                        <h2
                            class="text-xl text-center font-semibold leading-left text-gray-800"
                        >
                            Edit Post
                        </h2>
                        <!-- Form forEditing Post -->
                        <form class="max-w-sm mx-auto" @submit.prevent="submit">
                            <!-- Title Field -->
                            <div class="mb-5">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Your Post Title
                                </label>
                                <input
                                type="text"
                                id="title"
                                name="title"
                                v-model="form.title"
                                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <div v-if="errors.title" class="mt-1 text-sm text-red-600">
                                {{ errors.title }}
                                </div>
                            </div>

                            <!-- Content Field -->
                            <div class="mb-5">
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Your Post Content
                                </label>
                                <input
                                type="text"
                                id="content"
                                name="content"
                                v-model="form.content"
                                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                />
                                <div v-if="errors.content" class="mt-1 text-sm text-red-600">
                                {{ errors.content }}
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="flex space-x-4">
                                <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                >
                                {{ isEditing ? 'Update' : 'Submit' }}
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
