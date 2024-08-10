<template>
    <Category />
    <!-- Content -->
    <div class="w-full lg:ps-64">
      <div class="p-4 sm:px-6 space-y-4 sm:space-y-6"> 
        <div
          class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 justify-stretch"
        >
          <div
            class="flex flex-col flex-wrap bg-white border shadow-lg rounded-md"
            v-for="item in category.list_book"
            :key="item.id"
            v-if="category"
          > 
            <img class="h-48 rounded-t-md" :src="item.image" :alt="item.title" />
            <div class="p-2 md:p-3">
              <RouterLink :to="`/bookdata/${item.id}`">
                <h3 class="text-sm text-gray-800 hover:underline">
                  {{ item.title.substring(0, 18).toUpperCase()
                  }}<span v-if="item.title.length > 18">...</span>
                </h3>
                <div class="flex flex-row justify-between text-sm mt-2">
                  <p class="text-xs mt-1 text-gray-500">
                    {{ item.author.split(" ")[0]
                    }} 
                  </p>
                  <p class="text-xs mt-1 text-gray-500">{{ item.year }}</p>
                </div>
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { customApi } from "@/config/config";
  import { ref, onMounted } from "vue";
  import { useRoute, RouterLink } from "vue-router";
  import Category from "@/components/nav/TabCategory.vue";
  
  const route = useRoute();
  
  const category = ref(""); 
  const categories = ref([]);
  
  const FetchCategory = async () => {
    const response = await customApi.get("/categories");
    categories.value = response.data.data; 
  };
   
  const getCategory = async () => {
    const { data } = await customApi(`/categories/${route.params.id}`);
    category.value = data.category;
  };
  
  onMounted(() => {
    FetchCategory(); 
    getCategory();
  });
  </script>
  