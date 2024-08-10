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
        <div class="bg-white rounded-xl shadow p-4 sm:p-7">
          <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
              {{ props.title }} Category
            </h2>
            <p class="text-sm text-gray-600">
              Fiil the form below to add a new category
            </p>
          </div>

          <form @submit.prevent="handleSubmit">
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
              <div class="sm:col-span-3">
                <label
                  for="af-account-full-name"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Name
                </label>
              </div>
              <!-- End Col -->
              <div class="sm:col-span-9">
                <div class="sm:flex">
                  <input
                    id="af-account-full-name"
                    type="text"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Enter name"
                    v-model="name"
                  />
                </div>
              </div>
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
                {{ props.title }} Category
              </button>
            </div>
          </form>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Card Section -->
    </div>
  </div>
  <!-- End Content -->
</template>

<script setup>
import { RouterLink } from "vue-router";
import { ref, onMounted } from "vue";
import { customApi } from "@/config/config";
import { useAuthStore } from "@/stores/authStore";
import { useRoute, useRouter } from "vue-router";

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

const route = useRoute();
const router = useRouter();
const authStore = useAuthStore();

const name = ref("");

const handleSubmit = async () => {
  if (!props.isUpdate) {
    await customApi.post(
      "/categories",
      {
        name: name.value,
      },
      {
        headers: {
          Authorization: `Bearer ${authStore.tokenUser}`,
        },
      }
    );
    router.push({ name: "bookdata" });
  } else {
    await customApi.put(
      `/categories/${route.params.id}`,
      {
        name: name.value,
      },
      {
        headers: {
          Authorization: `Bearer ${authStore.tokenUser}`,
        },
      }
    );
    router.push({ name: "bookdata" });
  }
};

const getCategory = async () => {
  const { data } = await customApi(`/categories/${route.params.id}`);
  name.value = data.category.name;
};

onMounted(() => {
  if (props.isUpdate) {
    getCategory();
  }
});
</script>
