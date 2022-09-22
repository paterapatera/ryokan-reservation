<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    employees: Array,
});
</script>

<template>
    <Head title="従業員一覧" />
    <div v-for="employee in employees">{{JSON.stringify(employee)}}</div>

                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Forgot your password?
                </Link>
</template>
