<template>
  <RouterView />
</template>

<script setup>
import { nextTick, watch } from 'vue';
import { RouterView } from 'vue-router'  
import { useRoute } from 'vue-router'; 
import { usePreline } from './utils/usePreline';  

const route = useRoute();

const { initPreline } = usePreline();

watch(() => route.path,() => {
  nextTick(() => {
    initPreline();
  })
})
</script>
 