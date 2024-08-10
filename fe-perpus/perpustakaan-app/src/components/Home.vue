<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <!-- Slider -->
      <div
        data-hs-carousel='{"loadingClasses": "opacity-0", "isAutoPlay": true, "isRTL": true}'
        class="relative"
      >
        <div
          class="hs-carousel relative overflow-hidden w-full sm:min-h-60 min-h-20 bg-white rounded-lg"
        >
          <div
            class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0"
          >
            <div class="hs-carousel-slide">
              <div
                class="flex justify-center h-full bg-[url('../../../public/banner1.png')] bg-cover bg-no-repeat bg-center"
              ></div>
            </div>
            <div class="hs-carousel-slide">
              <div class="flex justify-center h-full bg-gray-200">
                <span
                  class="self-center text-4xl text-gray-800 transition duration-700"
                  >Second slide</span
                >
              </div>
            </div>
            <div class="hs-carousel-slide">
              <div class="flex justify-center h-full bg-gray-300">
                <span
                  class="self-center text-4xl text-gray-800 transition duration-700"
                  >Third slide</span
                >
              </div>
            </div>
          </div>
        </div>

        <div
          class="hs-carousel-pagination hidden sm:flex justify-center absolute bottom-3 start-0 end-0 space-x-2"
        >
          <span
            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"
          ></span>
          <span
            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"
          ></span>
          <span
            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"
          ></span>
        </div>
      </div>
      <!-- End Slider -->

      <!-- Book Card -->
      <div>
        <h2 class="text-2xl font-bold text-gray-800">All Books</h2>
      </div>
      <div
        class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-4 justify-stretch"
      >
        <div
          class="flex flex-col flex-wrap bg-white border shadow-lg rounded-md"
          v-for="book in books"
          :key="book.id"
          v-if="books.length > 0"
        >
          <img class="rounded-t-md" :src="book.image" :alt="book.title" />
          <div class="p-2 md:p-3">
            <RouterLink :to="`/bookdata/${book.id}`">
              <h3 class="text-sm text-gray-800 hover:underline">
                {{ book.title.substring(0, 13).toUpperCase()
                }}<span v-if="book.title.length > 13">...</span>
              </h3>
              <div class="flex flex-row justify-between text-sm mt-2">
                <p class="text-xs mt-1 text-gray-500">
                  {{ book.author.split(" ")[0] }}
                </p>
                <p class="text-xs mt-1 text-gray-500">{{ book.year }}</p>
              </div>
            </RouterLink>
          </div>
        </div>
      </div>
      <!-- End Book Card -->
    </div>
  </div>
  <!-- End Content -->
</template>

<script setup>
import { customApi } from "@/config/config";
import { onMounted, ref } from "vue";

const books = ref([]);

const fetchBooks = async () => {
  try {
    const response = await customApi.get("/books");
    books.value = response.data.data;
  } catch (error) {
    console.log(error);
  }
};

onMounted(() => {
  fetchBooks();
});
</script>
