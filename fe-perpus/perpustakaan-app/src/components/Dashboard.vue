<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <div>
        <h2 class="text-3xl font-bold text-gray-800">Hello Admin, Welcome</h2>
      </div>
      <!-- Clock -->
      <!-- <div>
        <div
          class="w-full lg:w-1/4 m-auto p-7 shadow-lg shadow-pink-400 border-4 border-t-purple-600 border-r-pink-600 border-b-pink-600 border-l-indigo-600 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"
        >
          <p class="font-bold text-white text-lg">{{ currentTime.toLocaleString() }}</p> 
          <p class="font-bold text-white pt-3 text-6xl">
            {{ currentTime.toLocaleTimeString() }}
          </p>
          <p class="font-bold text-white text-sm mb-1 flex justify-end mr-3">
            {{ currentTime.toLocaleDateString() }}
          </p>
        </div>
      </div> -->
      <!-- End Clock -->

      <!-- Card Blog -->
      <div class="max-w-[85rem]">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Card -->
          <div
            class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl"
          >
            <div
              class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="size-24"
              >
                <title>account-multiple</title>
                <path
                  fill="white"
                  d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z"
                />
              </svg>
            </div>
            <div class="p-4 md:p-6">
              <h3 class="text-xl font-semibold text-gray-800">Users</h3>
              <p class="mt-3 text-gray-500">Data of registered users</p>
            </div>
            <div
              class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200"
            >
              <a
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                href="#"
              >
                View Details
              </a>
            </div>
          </div>
          <!-- End Card -->

          <!-- Card -->
          <div
            class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl"
          >
            <div
              class="h-52 flex flex-col justify-center items-center bg-rose-500 rounded-t-xl"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="size-24"
              >
                <title>bookshelf</title>
                <path
                  fill="white"
                  d="M9 3V18H12V3H9M12 5L16 18L19 17L15 4L12 5M5 5V18H8V5H5M3 19V21H21V19H3Z"
                />
              </svg>
            </div>
            <div class="p-4 md:p-6">
              <h3 class="text-xl font-semibold text-gray-800">Books</h3>
              <p class="mt-3 text-gray-500">Data of registered books</p>
            </div>
            <div
              class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200"
            >
              <RouterLink
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                to="bookdata"
              >
                View Details
              </RouterLink>
            </div>
          </div>
          <!-- End Card -->

          <!-- Card -->
          <div
            class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl"
          >
            <div
              class="h-52 flex flex-col justify-center items-center bg-green-500 rounded-t-xl"
            >
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-24">
                <title>newspaper-variant-outline</title>
                <path
                  fill="white"
                  d="M20 5L20 19L4 19L4 5H20M20 3H4C2.89 3 2 3.89 2 5V19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V5C22 3.89 21.11 3 20 3M18 15H6V17H18V15M10 7H6V13H10V7M12 9H18V7H12V9M18 11H12V13H18V11Z"
                />
              </svg>
            </div>
            <div class="p-4 md:p-6">
              <h3 class="text-xl font-semibold text-gray-800">News</h3>
              <p class="mt-3 text-gray-500">Data of registered news</p>
            </div>
            <div
              class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200"
            >
              <RouterLink
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-xl bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                to=""
              >
                View Details
              </RouterLink>
            </div>
          </div>
          <!-- End Card -->
        </div>
        <!-- End Grid -->
      </div>
      <!-- End Card Blog -->
    </div>
  </div>
  <!-- End Content -->
</template>
<!-- <script>
import { useCurrentTime } from "@/composables/useCurrentTime";

export default {
  name: "CurrentTimeExample",
  setup() {
    const { currentTime } = useCurrentTime();
    console.log(currentTime.value);
    return { currentTime };
  },
};
</script> -->
<script setup>
import { useAuthStore } from '@/stores/authStore';

const authStore = useAuthStore(); 

</script>