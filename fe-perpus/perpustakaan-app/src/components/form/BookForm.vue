<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <!-- Header -->
      <RouterLink
        to="/bookdata"
        class="flex flex-row justify-start items-center gap-2"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          class="size-5"
        >
          <title>arrow-left</title>
          <path
            d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"
          />
        </svg>
        Back
      </RouterLink>
      <!-- end header -->
      <!-- Card Section -->
      <div class="w-full">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow sm:p-7">
          <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
              {{ props.title }} Book
            </h2>
            <p class="text-sm text-gray-600">
              Fiil the form below to add a {{ props.title }} book
            </p>
          </div>

          <form @submit.prevent="handleSubmit()">
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
              <div class="sm:col-span-2">
                <label
                  for="af-account-full-name"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Title
                </label>
              </div>
              <!-- End Col -->

              <div class="sm:col-span-4">
                <div class="sm:flex">
                  <input
                    id="af-account-full-name"
                    type="text"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Enter title"
                    v-model="book.title"
                  />
                </div>
              </div>
              <!-- End Col -->

              <!-- Start Col -->
              <div class="sm:col-span-2">
                <label
                  for="af-author"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Author
                </label>
              </div>

              <div class="sm:col-span-4">
                <input
                  id="af-author"
                  type="text"
                  class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  placeholder="Enter Author"
                  v-model="book.author"
                />
              </div>
              <!-- End Col -->

              <!-- Start Col -->
              <div class="sm:col-span-2">
                <label
                  for="af-year"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Year
                </label>
              </div>

              <div class="sm:col-span-4">
                <input
                  id="af-year"
                  type="number"
                  class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  placeholder="Enter Year"
                  v-model="book.year"
                />
              </div>
              <!-- End Col -->

              <!-- Start Col -->
              <div class="sm:col-span-2">
                <label
                  for="af-stock"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Stock
                </label>
              </div>

              <div class="sm:col-span-4">
                <input
                  id="af-stock"
                  type="number"
                  class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  placeholder="Enter Stock"
                  v-model="book.stock"
                />
              </div>
              <!-- End Col -->

              <!-- Col -->
              <div class="sm:col-span-2">
                <label class="inline-block text-sm text-gray-800 mt-2.5">
                  Image
                </label>
              </div>
              <!-- <div class="space-y-2">
                <label
                  for="af-submit-app-upload-images"
                  class="inline-block text-sm font-medium text-gray-800 mt-2.5"
                >
                  Preview image
                </label>

                <label
                  for="af-submit-app-upload-images"
                  class="group p-4 sm:p-7 block cursor-pointer text-center border-2 border-dashed border-gray-200 rounded-lg focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2"
                >
                  <input
                    id="af-submit-app-upload-images"
                    name="af-submit-app-upload-images"
                    type="file"
                    class="sr-only"
                  />
                  <svg
                    class="size-10 mx-auto text-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"
                    />
                    <path
                      d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"
                    />
                  </svg>
                  <span class="mt-2 block text-sm text-gray-800">
                    Browse your device or
                    <span class="group-hover:text-blue-700 text-blue-600"
                      >drag 'n drop'</span
                    >
                  </span>
                  <span class="mt-1 block text-xs text-gray-500">
                    Maximum file size is 2 MB
                  </span>
                </label>
              </div> -->
              <div class="sm:col-span-10">
                <div class="flex items-center gap-5">
                  <label class="sr-only">Choose file</label>
                  <input
                    type="file"
                    @change="handleFileUpload"
                    class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4 dark:file:bg-neutral-700 dark:file:text-neutral-400"
                  />
                </div>
              </div>
              <!-- End Col -->

              <!-- Col -->
              <div class="sm:col-span-2">
                <div class="inline-block">
                  <label
                    for="af-account-phone"
                    class="inline-block text-sm text-gray-800 mt-2.5"
                  >
                    Category
                  </label>
                </div>
              </div>
              <!-- End Col -->

              <div class="sm:col-span-10">
                <div class="sm:flex">
                  <select
                    class="py-2 px-3 pe-9 block w-full sm:w-auto border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    v-if="category"
                    v-model="book.category_id"
                  >
                    <option disabled value="">Please select one</option>
                    <option
                      v-for="category in category"
                      :key="category.id"
                      :value="category.id"
                    >
                      {{ category.name }}
                    </option>
                  </select>
                </div>

                <p class="py-2 px-3">
                  <RouterLink
                    class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium"
                    to="/addcategory"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      class="w-4 h-4 mr-2"
                    >
                      <title>shape-plus-outline</title>
                      <path
                        fill="currentColor"
                        d="M11 11V2H2V11M4 9V4H9V9M20 6.5C20 7.9 18.9 9 17.5 9S15 7.9 15 6.5 16.11 4 17.5 4 20 5.11 20 6.5M6.5 14L2 22H11M7.58 20H5.42L6.5 18.08M22 6.5C22 4 20 2 17.5 2S13 4 13 6.5 15 11 17.5 11 22 9 22 6.5M19 17V14H17V17H14V19H17V22H19V19H22V17Z"
                      />
                    </svg>
                    Add Category
                  </RouterLink>
                </p>
              </div>
              <!-- End Col -->

              <div class="sm:col-span-2">
                <label
                  for="af-account-bio"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Summary
                </label>
              </div>
              <!-- End Col -->

              <div class="sm:col-span-10">
                <textarea
                  type="text"
                  id="af-account-bio"
                  class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  rows="6"
                  placeholder="Enter Summary"
                  v-model="book.summary"
                />
              </div>
              <!-- End Col -->
            </div>
            <!-- End Grid -->

            <div class="mt-5 flex justify-end gap-x-2">
              <RouterLink
                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50"
                to="/bookdata"
              >
                Cancel
              </RouterLink>
              <button
                type="submit"
                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
              >
                {{ props.title }} Book
              </button>
            </div>
          </form>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Card Section -->
    </div>
  </div>
  <!-- End Content Section -->
</template>

<script setup>
import { reactive } from "vue";
import { customApi } from "@/config/config";
import { useAuthStore } from "@/stores/authStore";
import { useRoute, useRouter } from "vue-router";
import { ref, onMounted } from "vue";

const route = useRoute();
const router = useRouter();
const authStore = useAuthStore();

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  isUpdate: {
    type: Boolean,
    default: false,
  },
});

const book = reactive({
  title: "",
  author: "",
  year: "",
  summary: "",
  image: null,
  category_id: "",
  stock: "",
});

const handleFileUpload = (event) => {
  const selectedFile = event.target.files[0];
  book.image = selectedFile;
};

const category = ref([]);

const handleSubmit = async () => {
  if (!props.isUpdate) {
    await customApi.post(
      "/books",
      {
        title: book.title,
        author: book.author,
        year: book.year,
        summary: book.summary,
        image: book.image,
        category_id: book.category_id,
        stock: book.stock,
      },
      {
        headers: {
          Authorization: `Bearer ${authStore.tokenUser}`,
          "Content-Type": "multipart/form-data",
        },
      }
    );
    router.push({ name: "bookdata" });
  } else {
    await customApi.post(
      `/books/${route.params.id}?_method=PUT`,
      {
        title: book.title,
        author: book.author,
        year: book.year,
        summary: book.summary,
        image: book.image,
        category_id: book.category_id,
        stock: book.stock,
      },
      {
        headers: {
          Authorization: `Bearer ${authStore.tokenUser}`,
          "Content-Type": "multipart/form-data",
        },
      }
    );
    router.push({ name: "bookdata" });
  }
};

const getBook = async () => {
  const { data } = await customApi(`/books/${route.params.id}`);
  book.title = data.data.title;
  book.author = data.data.author;
  book.year = data.data.year;
  book.summary = data.data.summary;
  book.image = data.data.image;
  book.category_id = data.data.category_id;
  book.stock = data.data.stock;
};

const AllCategory = async () => {
  const { data } = await customApi.get("/categories");
  category.value = data.data;
};

onMounted(() => {
  AllCategory();
  if (props.isUpdate) {
    getBook();
  }
});
</script>
