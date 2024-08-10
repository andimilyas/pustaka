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
      <div
        class="flex flex-row justify-between content-center w-full p-4 sm:p-7"
      >
        <div class="flex flex-col">
          <h2 class="text-2xl font-bold text-gray-800">{{ category.name }}</h2>
          <p class="text-sm text-gray-600">List of all books</p>
        </div>
      </div>
      <!-- end header -->

      <!-- Table -->
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
                    >
                      Title
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                    >
                      Author
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                    >
                      Year
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                    >
                      Cover
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                    >
                      Stock
                    </th>
                    <th
                      scope="col"
                      class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase"
                    >
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                  <tr
                    v-for="item in category.list_book"
                    :key="item.id"
                    v-if="category"
                  >
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                    >
                      {{ item.title }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                    >
                      {{ item.author }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                    >
                      {{ item.year }}
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                    >
                      {{ item.image.substring(0, 22) }}...
                    </td>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800"
                    >
                      {{ item.stock }}
                    </td>
                    <td
                      class="p-3 whitespace-nowrap text-end text-sm font-medium flex justify-start"
                    >
                      <RouterLink
                        type="button"
                        class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                        :to="{
                          name: 'bookdetail',
                          params: { id: item.id },
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
                      <button
                        type="button"
                        class="inline-flex items-center gap-x-2 px-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
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
                      </button>
                      <button
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
              <div v-if="category.length == 0">
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
      <!-- end table -->
    </div>
  </div>
</template>

<script setup> 
import { customApi } from "@/config/config";
import { ref, onMounted } from "vue";
import { useRoute, RouterLink } from "vue-router";

const route = useRoute();

const category = ref("");

const getCategory = async () => {
  const { data } = await customApi(`/categories/${route.params.id}`);
  category.value = data.category;   
};

onMounted(() => {
  getCategory();
});
</script>
