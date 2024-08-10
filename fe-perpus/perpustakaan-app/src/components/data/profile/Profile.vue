<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <!-- Card Section -->
      <div class="mx-auto">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow">
          <div
            class="relative h-40 rounded-t-xl bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-cover bg-center"
          ></div>
          <div class="pt-0 p-4 sm:pt-0 sm:p-7">
            <!-- Grid -->
            <div class="space-y-4 sm:space-y-6">
              <div>
                <label class="sr-only"> Product photo </label>
                <div
                  class="flex flex-col sm:flex-row sm:items-center sm:gap-x-5 justify-between"
                >
                  <div class="flex items-center gap-x-3">
                    <img
                      class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 rounded-full ring-4 ring-white"
                      src="https://preline.co/assets/img/160x160/img1.jpg"
                      alt="Avatar"
                    />
                    <div class="flex flex-col">
                      <h1 class="text-2xl font-bold text-gray-800">
                        {{ authStore.currentUser.name }}
                      </h1>
                      <p class="text-sm text-gray-400">
                        {{ authStore.currentUser.email }}
                      </p>
                    </div>
                  </div>
                  <div
                    class="mt-4 sm:mt-auto sm:mb-1.5 flex justify-center sm:justify-start gap-2"
                  >
                    <RouterLink
                      to="/profile/edit"
                      type="button"
                      class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                    >
                      <svg
                        class="size-6"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                      >
                        <title>account-edit-outline</title>
                        <path
                          d="M2 17V20H10V18.11H3.9V17C3.9 16.36 7.03 14.9 10 14.9C10.96 14.91 11.91 15.04 12.83 15.28L14.35 13.76C12.95 13.29 11.5 13.03 10 13C7.33 13 2 14.33 2 17M10 4C7.79 4 6 5.79 6 8S7.79 12 10 12 14 10.21 14 8 12.21 4 10 4M10 10C8.9 10 8 9.11 8 8S8.9 6 10 6 12 6.9 12 8 11.11 10 10 10M21.7 13.35L20.7 14.35L18.65 12.35L19.65 11.35C19.86 11.14 20.21 11.14 20.42 11.35L21.7 12.63C21.91 12.84 21.91 13.19 21.7 13.4M12 18.94L18.06 12.88L20.11 14.88L14.11 20.95H12V18.94"
                        />
                      </svg>
                      Edit Profile
                    </RouterLink>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Card -->

        <div class="p-4 sm:px-6">
          <div class="text-sm text-gray-500">
            <h1 class="text-xl font-bold text-gray-800">Data Profile</h1>
            <!-- Bio: {{ user.profile.bio }}  -->
            <!-- Age: {{ user.profile.age }}  --> 
          </div>
        </div>
      </div>
      <!-- End Card Section -->
    </div>
  </div>
</template>

<script setup>
import { useAuthStore } from "@/stores/authStore";
import { onMounted, ref } from "vue";
import { customApi } from "@/config/config";

const authStore = useAuthStore();

const user = ref([]);

const getUser = async () => {
  try {
    const response = await customApi.get("/auth/me", {
      headers: {
        Authorization: `Bearer ${authStore.tokenUser}`,
      },
    });
    user.value = response.data.user;  
    
  } catch (error) {
    console.log(error);
  }
};
onMounted(() => {
  getUser();
  authStore.message = false;
});
</script>
