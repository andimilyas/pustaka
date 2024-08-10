<template>
  <div class="h-screen lg:max-w-full lg:mx-auto ms-auto content-center">
    <div
      class="p-4 sm:p-7 bg-white border border-gray-200 rounded-xl shadow-sm sm:max-w-xl mx-auto"
    >
      <div class="text-center">
        <h1 class="block text-4xl font-bold text-gray-800 mb-3">
          {{ props.title }}
        </h1>
        <p class="text-sm">
          You have to {{ props.title }} to access cool features
        </p>
      </div>

      <div class="mt-5">
        <!-- Form -->
        <form @submit.prevent="handleSubmit()">
          <div class="grid gap-y-4">
            <!-- Form Group -->
            <div v-if="props.isRegister">
              <label for="name" class="block text-sm mb-2">Name</label>
              <div class="relative">
                <input
                  v-model="inputData.name"
                  type="text"
                  id="name"
                  name="name"
                  class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  required
                  aria-describedby="name-error"
                />
                <div
                  class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3"
                >
                  <svg
                    class="size-5 text-red-500"
                    width="16"
                    height="16"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    aria-hidden="true"
                  >
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                    />
                  </svg>
                </div>
              </div>
              <p class="hidden text-xs text-red-600 mt-2" id="name-error">
                Please fiil the valid name so we can get back to you
              </p>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
              <label for="email" class="block text-sm mb-2"
                >Email address</label
              >
              <div class="relative">
                <input
                  v-model="inputData.email"
                  type="email"
                  id="email"
                  name="email"
                  class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  required
                  aria-describedby="email-error"
                />
                <div
                  class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3"
                >
                  <svg
                    class="size-5 text-red-500"
                    width="16"
                    height="16"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    aria-hidden="true"
                  >
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                    />
                  </svg>
                </div>
              </div>
              <p class="hidden text-xs text-red-600 mt-2" id="email-error">
                Please include a valid email address so we can get back to you
              </p>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div>
              <label for="password" class="block text-sm mb-2">Password</label>
              <div class="relative">
                <input
                  v-model="inputData.password"
                  type="password"
                  id="password"
                  name="password"
                  class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  required
                  aria-describedby="password-error"
                />
                <div
                  class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3"
                >
                  <svg
                    class="size-5 text-red-500"
                    width="16"
                    height="16"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    aria-hidden="true"
                  >
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                    />
                  </svg>
                </div>
              </div>
              <p class="hidden text-xs text-red-600 mt-2" id="password-error">
                8+ characters required
              </p>
            </div>
            <!-- End Form Group -->

            <!-- Form Group -->
            <div v-if="props.isRegister">
              <label for="confirm-password" class="block text-sm mb-2"
                >Confirm Password</label
              >
              <div class="relative">
                <input
                  v-model="inputData.confirmPassword"
                  type="password"
                  id="confirm-password"
                  name="confirm-password"
                  class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                  required
                  aria-describedby="confirm-password-error"
                />
                <div
                  class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3"
                >
                  <svg
                    class="size-5 text-red-500"
                    width="16"
                    height="16"
                    fill="currentColor"
                    viewBox="0 0 16 16"
                    aria-hidden="true"
                  >
                    <path
                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                    />
                  </svg>
                </div>
              </div>
              <p
                class="hidden text-xs text-red-600 mt-2"
                id="confirm-password-error"
              >
                Password does not match the password
              </p>
            </div>
            <!-- End Form Group --> 

            <button
              type="submit"
              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
            >
              {{ props.title }}
            </button>
          </div>

          <p class="mt-2 text-sm text-gray-600" v-if="isRegister">
            Already have an account?
            <RouterLink
              to="/login"
              class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium"
            >
              Login here
            </RouterLink>
          </p>
          <p class="mt-2 text-sm text-gray-600" v-else>
              Don't have an account yet?
              <RouterLink
                to="/register"
                class="text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium"
              >
                Register here
              </RouterLink>
            </p>
        </form>
        <!-- End Form -->
      </div>
    </div>
  </div>
</template>

<script setup>
import { useAuthStore } from "@/stores/authStore";
import { onMounted, reactive } from "vue";

const authStore = useAuthStore();
const inputData = reactive({ 
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  isRegister: {
    type: Boolean,
    default: false,
  },
});

const { login, register } = authStore;

const handleSubmit = () => {
  login(inputData);
  register(inputData);
};

onMounted(() => {
  authStore.message = false;
});
</script>
