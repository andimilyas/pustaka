<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <!-- Header -->
      <RouterLink
        to="dashboard"
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

      <div class="border-b border-gray-200">
        <nav
          class="flex gap-x-1"
          aria-label="Tabs"
          role="tablist"
          aria-orientation="horizontal"
        >
          <button
            type="button"
            class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none active"
            id="tabs-with-icons-item-1"
            aria-selected="true"
            data-hs-tab="#tabs-with-icons-1"
            aria-controls="tabs-with-icons-1"
            role="tab"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              class="size-5"
            >
              <title>book-multiple-outline</title>
              <path
                fill="currentColor"
                d="M19 2A2 2 0 0 1 21 4V16A2 2 0 0 1 19 18H9A2 2 0 0 1 7 16V4A2 2 0 0 1 9 2H19M19 4H16V10L13.5 7.75L11 10V4H9V16H19M3 20A2 2 0 0 0 5 22H17V20H5V6H3Z"
              />
            </svg>
            Book
          </button>
          <button
            type="button"
            class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
            id="tabs-with-icons-item-2"
            aria-selected="false"
            data-hs-tab="#tabs-with-icons-2"
            aria-controls="tabs-with-icons-2"
            role="tab"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              class="size-5"
            >
              <title>shape-outline</title>
              <path
                fill="currentColor"
                d="M11,13.5V21.5H3V13.5H11M9,15.5H5V19.5H9V15.5M12,2L17.5,11H6.5L12,2M12,5.86L10.08,9H13.92L12,5.86M17.5,13C20,13 22,15 22,17.5C22,20 20,22 17.5,22C15,22 13,20 13,17.5C13,15 15,13 17.5,13M17.5,15A2.5,2.5 0 0,0 15,17.5A2.5,2.5 0 0,0 17.5,20A2.5,2.5 0 0,0 20,17.5A2.5,2.5 0 0,0 17.5,15Z"
              />
            </svg>
            Category
          </button>
          <button
            type="button"
            class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
            id="tabs-with-icons-item-3"
            aria-selected="false"
            data-hs-tab="#tabs-with-icons-3"
            aria-controls="tabs-with-icons-3"
            role="tab"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              class="size-5"
            >
              <title>book-account-outline</title>
              <path
                fill="currentColor"
                d="M18 2A2 2 0 0 1 20 4V20A2 2 0 0 1 18 22H6A2 2 0 0 1 4 20V4A2 2 0 0 1 6 2H18M18 4H13V9L10.5 6.7L8 9V4H6V20H18M13 11A2 2 0 1 1 11 13A2 2 0 0 1 13 11M17 19H9V18C9 16.67 11.67 16 13 16S17 16.67 17 18V19"
              />
            </svg>
            Author
          </button>
        </nav>
      </div>

      <div class="mt-3">
        <div
          id="tabs-with-icons-1"
          role="tabpanel"
          aria-labelledby="tabs-with-icons-item-1"
        >
          <TableData title="Book" :data="books" :isBook="true" />
        </div>
        <div
          id="tabs-with-icons-2"
          class="hidden"
          role="tabpanel"
          aria-labelledby="tabs-with-icons-item-2"
        >
          <TableData title="Category" :data="categories" :isCategory="true" />
        </div>
        <div
          id="tabs-with-icons-3"
          class="hidden"
          role="tabpanel"
          aria-labelledby="tabs-with-icons-item-3"
        >
          <TableData title="Author" :isAuthor="true" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import TableData from "../../table/TableData.vue";
import { customApi } from "@/config/config";
import { onMounted, ref } from "vue";

const books = ref([]);
const categories = ref([]);
const fetchBooks = async () => {
  try {
    const response = await customApi.get("/books");
    books.value = response.data.data.length;
  } catch (error) {
    console.log(error);
  }
};

const fetchCategories = async () => {
  try {
    const response = await customApi.get("/categories");
    categories.value = response.data.data.length;
  } catch (error) {
    console.log(error);
  }
};

onMounted(() => {
  fetchCategories();
  fetchBooks();
});
</script>
