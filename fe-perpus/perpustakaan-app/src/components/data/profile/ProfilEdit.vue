<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <!-- Header -->
      <RouterLink
        to="/profile"
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
      <div class="w-full">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7">
          <h2 class="text-2xl font-bold text-gray-800">Edit Profile</h2>
          <p class="text-sm text-gray-600">
            Fiil the form below to edit your profile
          </p>
        </div>
      </div>
      <!-- end header -->

      <div class="w-full">
        <!-- Card -->
        <div class="p-4 sm:p-7">
          <form @submit.prevent="handleSubmit()">
            <!-- Grid -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
              <div class="sm:col-span-2">
                <label
                  for="af-account-full-name"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Age
                </label>
              </div>
              <div class="sm:col-span-10">
                <div class="sm:flex">
                  <input
                    id="af-account-full-name"
                    type="number"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Enter your age"
                    v-model="user.age"
                  />
                </div>
              </div>

              <div class="sm:col-span-2">
                <label
                  for="af-account-full-name"
                  class="inline-block text-sm text-gray-800 mt-2.5"
                >
                  Bio
                </label>
              </div>
              <div class="sm:col-span-10">
                <div class="sm:flex">
                  <textarea
                    id="af-account-full-name"
                    type="text"
                    class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Enter your bio"
                    v-model="user.bio"
                  />
                </div>
              </div>
            </div>
            <div class="mt-8 flex justify-end gap-x-2">
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
                Save Changes
              </button>
            </div>
          </form>
        </div>
        <!-- end card -->
      </div>
    </div>
  </div>
</template>

<script setup>
import { customApi } from "@/config/config";
import { useAuthStore } from "@/stores/authStore";
import { reactive } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

const authStore = useAuthStore();

const user = reactive({
  age: "",
  bio: "",
});

const handleSubmit = async () => {
  try {
    await customApi.post(
      "/profile",
      {
        age: user.age,
        bio: user.bio,
      },
      {
        headers: {
          Authorization: `Bearer ${authStore.tokenUser}`,
        },
      }
    );
    router.push("/profile");
  } catch (error) {
    console.log(error);
  }
};
</script>
