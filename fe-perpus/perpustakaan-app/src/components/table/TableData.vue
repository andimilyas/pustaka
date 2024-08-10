<template>
  <div class="flex flex-row justify-between content-center w-full p-4 sm:p-7">
    <div class="flex flex-col">
      <h2 class="text-2xl font-bold text-gray-800">{{ props.title }} Table</h2>
      <p class="text-sm text-gray-600">
        List of all {{ props.title }} | Total: {{ props.data }}
      </p>
    </div>
    <div class="flex flex-row gap-3" v-if="props.isBook">
      <RouterLink
        to="addbook"
        class="px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          class="size-6"
        >
          <title>Add Book</title>
          <path
            fill="white"
            d="M13.09 20C13.21 20.72 13.46 21.39 13.81 22H6C4.89 22 4 21.11 4 20V4C4 2.9 4.89 2 6 2H18C19.11 2 20 2.9 20 4V13.09C19.67 13.04 19.34 13 19 13C18.66 13 18.33 13.04 18 13.09V4H13V12L10.5 9.75L8 12V4H6V20H13.09M20 18V15H18V18H15V20H18V23H20V20H23V18H20Z"
          />
        </svg>
        Add Book
      </RouterLink>
      <button
        type="button"
        class="px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 text-blue-600 bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          class="size-6"
        >
          <title>Export CSV</title>
          <path
            fill="currentColor"
            d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2M18 20H6V4H13V9H18V20M16 11V18.1L13.9 16L11.1 18.8L8.3 16L11.1 13.2L8.9 11H16Z"
          />
        </svg>
        Export CSV
      </button>
    </div>
    <div class="flex flex-row gap-3" v-if="props.isCategory">
      <RouterLink
        to="addcategory"
        class="px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          class="size-6"
        >
          <title>shape-plus-outline</title>
          <path
            fill="white"
            d="M11 11V2H2V11M4 9V4H9V9M20 6.5C20 7.9 18.9 9 17.5 9S15 7.9 15 6.5 16.11 4 17.5 4 20 5.11 20 6.5M6.5 14L2 22H11M7.58 20H5.42L6.5 18.08M22 6.5C22 4 20 2 17.5 2S13 4 13 6.5 15 11 17.5 11 22 9 22 6.5M19 17V14H17V17H14V19H17V22H19V19H22V17Z"
          />
        </svg>
        Add Category
      </RouterLink>
      <button
        type="button"
        class="px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 text-blue-600 bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          class="size-6"
        >
          <title>Export CSV</title>
          <path
            fill="currentColor"
            d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2M18 20H6V4H13V9H18V20M16 11V18.1L13.9 16L11.1 18.8L8.3 16L11.1 13.2L8.9 11H16Z"
          />
        </svg>
        Export CSV
      </button>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200">
            <thead>
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="!props.isBook"
                >
                  Name
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="!props.isBook && !props.isCategory"
                >
                  Address
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="props.isBook"
                >
                  Title
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="props.isBook"
                >
                  Author
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="props.isBook"
                >
                  Year
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="props.isBook"
                >
                  Cover
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="props.isBook"
                >
                  Stock
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                  v-if="props.isBook"
                >
                  Category
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                >
                  Action
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200" v-if="props.isCategory">
              <tr
                v-for="category in categories"
                :key="category.id"
                v-if="categories.length > 0"
              >
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                >
                  {{ category.name }}
                </td>
                <td
                  class="p-3 whitespace-nowrap text-end text-sm font-medium flex justify-start"
                >
                  <RouterLink
                    type="button"
                    class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                    :to="{
                      name: 'tablecategorydetail',
                      params: { id: category.id },
                    }"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      class="size-4"
                    >
                      <title>View</title>
                      <path
                        fill="currentColor"
                        d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z"
                      />
                    </svg>
                    <p class="hidden lg:flex">View</p>
                  </RouterLink>
                  <RouterLink
                    type="button"
                    class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                    :to="{ name: 'categoryedit', params: { id: category.id } }"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      class="size-5"
                    >
                      <title>Edit</title>
                      <path
                        fill="currentColor"
                        d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z"
                      />
                    </svg>
                    <p class="hidden lg:flex">Edit</p>
                  </RouterLink>
                  <button
                    @click="deleteCategory(category.id)"
                    type="button"
                    class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      class="size-5"
                    >
                      <title>Delete</title>
                      <path
                        fill="currentColor"
                        d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z"
                      />
                    </svg>
                    <p class="hidden lg:flex">Delete</p>
                  </button>
                </td>
              </tr>
            </tbody>
            <tbody class="divide-y divide-gray-200" v-if="props.isBook">
              <tr v-for="book in books" :key="book.id" v-if="books.length > 0">
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                >
                  {{ book.title.toUpperCase() }}
                </td>
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                >
                  {{ book.author }}
                </td>
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                >
                  {{ book.year }}
                </td>
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                >
                  <img :src="book.image" alt="" />
                </td>
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                >
                  {{ book.stock }}
                </td>
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                >
                  {{ book.category.name }}
                </td>
                <td
                  class="p-3 whitespace-nowrap text-end text-sm font-medium justify-start"
                >
                  <RouterLink
                    type="button"
                    class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                    :to="{
                      name: 'bookdetail',
                      params: { id: book.id },
                    }"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      class="size-4"
                    >
                      <title>View</title>
                      <path
                        fill="currentColor"
                        d="M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9M12,4.5C17,4.5 21.27,7.61 23,12C21.27,16.39 17,19.5 12,19.5C7,19.5 2.73,16.39 1,12C2.73,7.61 7,4.5 12,4.5M3.18,12C4.83,15.36 8.24,17.5 12,17.5C15.76,17.5 19.17,15.36 20.82,12C19.17,8.64 15.76,6.5 12,6.5C8.24,6.5 4.83,8.64 3.18,12Z"
                      />
                    </svg>
                    <p class="hidden lg:flex">View</p>
                  </RouterLink>
                  <RouterLink
                    type="button"
                    class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                    :to="{
                      name: 'bookedit',
                      params: { id: book.id },
                    }"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      class="size-5"
                    >
                      <title>Edit</title>
                      <path
                        fill="currentColor"
                        d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z"
                      />
                    </svg>
                    <p class="hidden lg:flex">Edit</p>
                  </RouterLink>
                  <button
                    @click="deleteBook(book.id)"
                    type="button"
                    class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      class="size-5"
                    >
                      <title>Delete</title>
                      <path
                        fill="currentColor"
                        d="M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19M8,9H16V19H8V9M15.5,4L14.5,3H9.5L8.5,4H5V6H19V4H15.5Z"
                      />
                    </svg>
                    <p class="hidden lg:flex">Delete</p>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <div v-if="books.length == 0 && categories.length == 0">
            <div
              class="min-h-60 flex flex-col bg-white border shadow-sm rounded-xl"
            >
              <div
                class="flex flex-auto flex-col justify-center items-center p-4 md:p-5"
              >
                <svg
                  class="size-10 text-gray-500"
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="1"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <line x1="22" x2="2" y1="12" y2="12"></line>
                  <path
                    d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"
                  ></path>
                  <line x1="6" x2="6.01" y1="16" y2="16"></line>
                  <line x1="10" x2="10.01" y1="16" y2="16"></line>
                </svg>
                <p class="mt-2 text-sm text-gray-800">No data to show</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { customApi } from "@/config/config";
import { onMounted, ref } from "vue";
import { RouterLink } from "vue-router";
import { useAuthStore } from "@/stores/authStore";

const authStore = useAuthStore();

const books = ref([]);
const categories = ref([]);

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  data: {
    type: Array,
    required: true,
  },
  isBook: {
    type: Boolean,
    default: false,
  },
  isCategory: {
    type: Boolean,
    default: false,
  },
  isAuthor: {
    type: Boolean,
    default: false,
  },
});

const fetchBooks = async () => {
  try {
    const response = await customApi.get("/books");
    books.value = response.data.data;
  } catch (error) {
    console.log(error);
  }
};

const FetchCategory = async () => {
  const response = await customApi.get("/categories");
  categories.value = response.data.data;
};

const deleteBook = async (id) => {
  const response = await customApi.delete(`/books/${id}`, {
    headers: {
      Authorization: `Bearer ${authStore.tokenUser}`,
    },
  });
  if (response.status === 200) {
    alert("Book deleted successfully");
    fetchBooks();
  }
};

const deleteCategory = async (id) => {
  const response = await customApi.delete(`/categories/${id}`, {
    headers: {
      Authorization: `Bearer ${authStore.tokenUser}`,
    },
  });
  if (response.status === 200) {
    alert("Category deleted successfully");
    FetchCategory();
  }
};

onMounted(() => {
  if (props.isCategory) {
    FetchCategory();
  }
  fetchBooks();
});
</script>
