<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { getToday } from '@/common';
import { Head } from '@inertiajs/vue3';
import { onMounted,reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';


onMounted(() => {
    form.date = getToday()
});


const form = reactive({
    date: null
});


// defineProps({
//     customers: Array,
//     items: Array,
// }
// );
</script>

<template>
   日付
   <input type="date" name="date" v-model="form.date" />
</template>