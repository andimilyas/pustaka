<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
      <div class="flex flex-col">
        <h2 class="text-2xl font-bold text-gray-800">
          My Book
        </h2>
        <p class="text-sm text-gray-600">
          List of borrowed books 
        </p>
      </div> 
      <!-- Card -->
      <div
        class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-4 justify-stretch"
      >
        <div
          class="flex flex-col flex-wrap bg-white border shadow-lg rounded-md"
          v-for="item in user.books"
          :key="item.id" 
        >
          <img class="rounded-t-md" :src="item.image" :alt="item.title" />
          <div class="p-2 md:p-3">
            <RouterLink :to="`/bookdata/${item.id}`">
              <h3 class="text-sm text-gray-800 hover:underline">
                {{ item.title.substring(0, 13).toUpperCase()
                }}<span v-if="item.title.length > 13">...</span>
              </h3>
              <div class="flex flex-row justify-between text-sm mt-2">
                <p class="text-xs mt-1 text-gray-500">
                  {{ item.author.split(" ")[0] }}
                </p>
                <p class="text-xs mt-1 text-gray-500">{{ item.year }}</p>
              </div>
            </RouterLink>
          </div>
        </div>
      </div> 
      <!-- end Card -->
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
