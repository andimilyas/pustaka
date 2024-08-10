<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <!-- Nav -->
      <RouterLink to="/" class="flex flex-row justify-start items-center gap-2">
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
      <!-- end nav -->

      <!-- header  -->
      <div class="sm:flex flex-row grid sm:gap-8 gap-3 w-full sm:p-4">
        <img
          class="rounded-md min-w-[130px] hidden lg:flex"
          :src="book.image"
          alt=""
        />
        <div class="grid content-between w-full h-50 gap-5">
          <div class="flex flex-col gap-3">
            <h2 class="text-3xl font-bold text-gray-800">
              {{ book.title.toUpperCase() }}
            </h2>
            <p class="text-sm text-gray-600">
              By {{ book.author }} | {{ book.year }}
            </p>
            <span
              class="gap-x-1.5 py-1 px-3 w-fit rounded-full text-xs font-medium border border-blue-500 text-blue-500"
              >{{ book.category }}</span
            >
          </div>
          <div class="grid grid-cols-3 gap-3 sm:flex flex-row justify-between">
            <div
              class="flex sm:flex-row gap-3 col-span-3"
              v-if="authStore.tokenUser"
            >
              <!-- Borrow -->
              <button
                type="button"
                class="w-full sm:w-fit py-3 px-4 inline-flex items-center justify-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                aria-haspopup="dialog"
                aria-expanded="false"
                aria-controls="hs-scale-animation-modal"
                data-hs-overlay="#hs-scale-animation-modal"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  class="size-6"
                >
                  <title>borrow</title>
                  <path
                    fill="currentColor"
                    d="M13.09 20C13.21 20.72 13.46 21.39 13.81 22H6C4.89 22 4 21.11 4 20V4C4 2.9 4.89 2 6 2H18C19.11 2 20 2.9 20 4V13.09C19.67 13.04 19.34 13 19 13C18.66 13 18.33 13.04 18 13.09V4H13V12L10.5 9.75L8 12V4H6V20H13.09M20 18V15H18V18H15V20H18V23H20V20H23V18H20Z"
                  />
                </svg>
                Borrow
              </button>

              <!-- Modal -->
              <div
                id="hs-scale-animation-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                role="dialog"
                tabindex="-1"
                aria-labelledby="hs-scale-animation-modal-label"
              >
                <div
                  class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center"
                >
                  <div
                    class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto"
                  >
                    <div class="flex justify-between py-3 px-4 border-b">
                      <h3 class="text-lg text-center font-bold text-gray-800">
                        Select Date
                      </h3>
                      <button
                        type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                        aria-label="Close"
                        data-hs-overlay="#hs-scale-animation-modal"
                      >
                        <span class="sr-only">Close</span>
                        <svg
                          class="shrink-0 size-4"
                          xmlns="http://www.w3.org/2000/svg"
                          width="24"
                          height="24"
                          viewBox="0 0 24 24"
                          fill="none"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        >
                          <path d="M18 6 6 18"></path>
                          <path d="m6 6 12 12"></path>
                        </svg>
                      </button>
                    </div>
                    <div class="p-4">
                      <div
                        class="sm:flex flex-row grid sm:gap-8 gap-3 w-full sm:p-4"
                      >
                        <img
                          class="rounded-md min-w-[100px]"
                          :src="book.image"
                          alt=""
                        />
                        <div class="grid content-between w-full h-50 gap-5">
                          <div class="flex flex-col gap-3">
                            <h2 class="text-xl font-bold text-gray-800">
                              {{ book.title.toUpperCase() }}
                            </h2>
                            <p class="text-sm text-gray-600">
                              By {{ book.author }} | {{ book.year }}
                            </p>
                            <span
                              class="gap-x-1.5 py-1 px-3 w-fit rounded-full text-xs font-medium border border-blue-500 text-blue-500"
                              >{{ book.category }}</span
                            >
                            <p class="text-xs">
                              <span class="font-bold">Synopsis:</span>
                              {{ book.summary.substring(0, 120)
                              }}<span v-if="book.summary.length > 120"
                                >...</span
                              >
                            </p>
                          </div>
                        </div>
                      </div>
                      <form class="sm:p-4 mt-3" @submit.prevent="handleBorrow">
                        <!-- Grid -->
                        <div class="grid sm:grid-cols-6 gap-8">
                          <!-- col -->
                          <div class="sm:col-span-3">
                            <label
                              for="af-account-full-name"
                              class="inline-block text-sm text-gray-800"
                            >
                              Select Date
                            </label>
                            <input
                              type="date"
                              class="w-full text-sm"
                              v-model="borrow.borrow_date"
                            />
                          </div>
                          <!-- end col -->

                          <!-- col -->
                          <div class="sm:col-span-3">
                            <label
                              for="af-account-full-name"
                              class="inline-block text-sm text-gray-800"
                            >
                              Return Date
                            </label>
                            <input
                              type="date"
                              class="w-full text-sm"
                              v-model="borrow.load_date"
                            />
                          </div>
                          <!-- end col -->
                        </div>
                        <!-- End Grid -->
                        <div class="mt-8">
                          <button
                            type="submit"
                            class="w-full py-2 px-3 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                          >
                            Borrow Now
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal -->
              <!-- end borrow -->

              <RouterLink
                to=""
                class="w-full sm:w-fit py-2 px-6 gap-2 flex flex-row text-sm font-medium items-center justify-center rounded-lg border border-gray-400 text-gray-400 focus:blue-700 disabled:opacity-50 pointer-events-none"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  class="size-6"
                >
                  <title>Save</title>
                  <path
                    fill="currentColor"
                    d="M17,18V5H7V18L12,15.82L17,18M17,3A2,2 0 0,1 19,5V21L12,18L5,21V5C5,3.89 5.9,3 7,3H17M11,7H13V9H15V11H13V13H11V11H9V9H11V7Z"
                  />
                </svg>
                Save
              </RouterLink>
            </div>
            <div class="flex sm:flex-row gap-3 col-span-3">
              <div
                class="w-full py-2 px-6 gap-2 sm:w-fit flex flex-row text-sm font-medium justify-center items-center rounded-lg border border-blue-600 text-blue-600 focus:blue-700 disabled:opacity-50 disabled:pointer-events-none"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  class="size-6"
                >
                  <title>bookshelf</title>
                  <path
                    fill="currentColor"
                    d="M9 3V18H12V3H9M12 5L16 18L19 17L15 4L12 5M5 5V18H8V5H5M3 19V21H21V19H3Z"
                  />
                </svg>
                Stock : {{ book.stock }}
              </div>
              <div
                class="w-full py-2 gap-2 sm:w-fit flex flex-row text-sm font-medium justify-center items-center rounded-lg text-gray-400 focus:gray-400 disabled:opacity-50 disabled:pointer-events-none"
                v-if="!authStore.tokenUser"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  class="size-5"
                >
                  <path
                    fill="currentColor"
                    d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z"
                  />
                </svg>
                Please login to borrow this book
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end header -->

      <!-- Tabs -->
      <div class="border-b border-gray-200">
        <nav
          class="flex gap-x-1 justify-start"
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
              <title>information</title>
              <path
                fill="currentColor"
                d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z"
              />
            </svg>
            <p class="hidden sm:flex">Information</p>
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
              <title>comment-outline</title>
              <path
                fill="currentColor"
                d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9M10,16V19.08L13.08,16H20V4H4V16H10Z"
              />
            </svg>
            <p class="hidden sm:flex">Review</p>
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
              <title>store-search-outline</title>
              <path
                fill="currentColor"
                d="M18 4H2V2H18V4M13.04 10H3.04L3.64 7H16.36L16.76 9C17.5 9.04 18.21 9.19 18.89 9.46L18 5H2L1 10V12H2V18H10.5C10.17 17.2 10 16.35 10 15.5V16H4V12H10V15.5C10 13.84 10.64 12.17 11.9 10.9C12.26 10.55 12.64 10.25 13.04 10M23.39 21L22 22.39L18.88 19.32C18.19 19.75 17.37 20 16.5 20C14 20 12 18 12 15.5S14 11 16.5 11 21 13 21 15.5C21 16.38 20.75 17.21 20.31 17.9L23.39 21M19 15.5C19 14.12 17.88 13 16.5 13S14 14.12 14 15.5 15.12 18 16.5 18 19 16.88 19 15.5Z"
              />
            </svg>
            <p class="hidden sm:flex">Get Book</p>
          </button>
          <button
            v-if="
              authStore.currentUser &&
              authStore.currentUser.role.name === 'owner'
            "
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
              <title>format-list-bulleted-square</title>
              <path
                fill="currentColor"
                d="M3,4H7V8H3V4M9,5V7H21V5H9M3,10H7V14H3V10M9,11V13H21V11H9M3,16H7V20H3V16M9,17V19H21V17H9"
              />
            </svg>
            <p class="hidden sm:flex">List Borrow</p>
          </button>
        </nav>
      </div>
      <!-- end tabs -->

      <!-- content -->
      <div
        id="tabs-with-icons-1"
        role="tabpanel"
        aria-labelledby="tabs-with-icons-item-1"
      >
        <div class="flex flex-col gap-3 mx-auto">
          <div class="grid grid-cols-1 sm:grid-cols-5 sm:5 gap-3">
            <div
              class="sm:col-span-4 col-span-1 p-4 border border-gray-200 rounded-lg"
            >
              <div class="flex flex-col gap-3">
                <h2 class="text-xl font-bold text-gray-800">Summary</h2>
                <p class="text-sm text-gray-600 text-justify">
                  {{ book.summary }}
                </p>
              </div>
            </div>
            <div class="col-span-1">
              <div class="flex flex-col gap-3">
                <div class="p-4 border border-gray-200 rounded-lg">
                  <h2 class="text-xl font-bold text-gray-800 mb-3">Publish</h2>
                  <p class="text-sm text-gray-600 text-justify">
                    Year :
                    {{ book.year }}
                  </p>
                  <p class="text-sm text-gray-600 text-justify">
                    Category :
                    {{ book.category }}
                  </p>
                </div>
                <div class="p-4 border border-gray-200 rounded-lg">
                  <h2 class="text-xl font-bold text-gray-800 mb-3">Author</h2>
                  <p class="text-sm text-gray-600 text-justify">
                    {{ book.author }}
                  </p>
                </div>
                <div class="p-4 border border-gray-200 rounded-lg">
                  <h2 class="text-xl font-bold text-gray-800 mb-3">Cover</h2>
                  <img :src="book.image" alt="" class="min-w-40 rounded-lg" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end content -->
    </div>
  </div>
</template>

<script setup>
import { customApi } from "@/config/config";
import { onMounted, reactive } from "vue";
import { useRoute, useRouter, RouterLink } from "vue-router";
import { useAuthStore } from "@/stores/authStore";

const authStore = useAuthStore();
const route = useRoute();
const router = useRouter();

const book = reactive({
  title: "",
  author: "",
  year: "",
  summary: "",
  image: null,
  category_id: "",
  stock: "",
});

const borrow = reactive({
  borrow_date: "",
  load_date: "",
  book_id: book.id,
});

const getBook = async () => {
  const { data } = await customApi(`/books/${route.params.id}`);
  book.title = data.data.title;
  book.author = data.data.author;
  book.year = data.data.year;
  book.summary = data.data.summary;
  book.image = data.data.image;
  book.category = data.data.category.name;
  book.stock = data.data.stock;
  book.id = data.data.id;
};

const handleBorrow = async () => {
  await customApi.post(
    "/borrow",
    {
      borrow_date: borrow.borrow_date,
      load_date: borrow.load_date,
      book_id: book.id,
    },
    {
      headers: {
        Authorization: `Bearer ${authStore.tokenUser}`,
      },
    }
  );
  if (book.stock > 0) {
    book.stock = book.stock - 1; 
    alert("Book Borrowed");
  } else {
    alert("Book is out of stock");
  } 
  router.push({ name: "mybook" });
};

onMounted(() => {
  getBook();
  handleBorrow();
});
</script>
