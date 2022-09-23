<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
  employees: Array,
});
</script>

<template>
  <Head title="従業員一覧" />
  <Link :href="route('employees.create')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">登録</Link>
  <div v-for="employee in employees">{{JSON.stringify(employee)}}</div>
</template>
