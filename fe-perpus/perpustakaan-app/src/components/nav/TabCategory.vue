<template>
  <!-- Content -->
  <div class="w-full lg:ps-64">
    <div class="p-4 sm:px-6">
      <!-- tab -->
      <div
        class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-8 gap-5 text-center justify-stretch p-2"
      >
        <div v-for="category in categories" :key="category.id">
          <RouterLink 
            class="grid px-3 py-1 border border-gray-400 text-gray-400 hover:border-blue-500 rounded-md hover:text-blue-500 text-sm"
            :to="{
              name: 'publicCategoryDetail',
              params: { id: category.id },
            }"
          >
            {{ category.name }}
          </RouterLink>
        </div>
      </div> 
      <!-- end tab  --> 
    </div>
  </div>
  <!-- End Content -->
</template>

<script setup>
import { ref, onMounted } from "vue";
import { customApi } from "@/config/config";

const categories = ref([]);  
const FetchCategory = async () => {
  const response = await customApi.get("/categories");
  categories.value = response.data.data;
}; 

onMounted(() => {  
  FetchCategory();
});
</script>
