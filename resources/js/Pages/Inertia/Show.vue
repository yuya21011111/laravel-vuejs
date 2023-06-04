<script setup>
import { Inertia } from '@inertiajs/inertia';

defineProps({
    id: String,
    blog: Object
});

const deleteConfirm = id => {
    Inertia.delete(`/inertia/${id}`,{
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>
    <h1 class="text-red-500">{{ id }}.Showページになります</h1>
    {{ id }}<br>
    {{ blog.id }}<br>
    {{ blog.title }}<br>
    <button class="text-red-500" @click="deleteConfirm(blog.id)">削除</button>
</template>