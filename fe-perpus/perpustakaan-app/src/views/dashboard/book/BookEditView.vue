<template>
  <Nav />
  <BookForm title="Edit" :isUpdate="true" />
</template>

<script setup>
import Nav from "@/components/nav/Nav.vue";
import BookForm from "@/components/form/BookForm.vue";
</script>
