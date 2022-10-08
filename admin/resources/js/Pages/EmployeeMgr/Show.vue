<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
  employee: Object,
});
</script>

<template>
  <Head title="従業員" />
  <div>{{JSON.stringify(employee)}}</div>
</template>
