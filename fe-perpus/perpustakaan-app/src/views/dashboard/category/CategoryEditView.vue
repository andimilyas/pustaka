<template>
    <Nav /> 
    <CategoryForm title="Edit" :isUpdate="true"/>
</template>

<script setup>
import Nav from "@/components/nav/Nav.vue"; 
import CategoryForm from "@/components/form/CategoryForm.vue";
</script>