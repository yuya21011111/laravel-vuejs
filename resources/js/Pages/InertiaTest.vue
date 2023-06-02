<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <h1>Inertiaのテストページになります。</h1><br>
    <a class="" href="/">aタグでWelcomeに移動します</a><br>
    <Link href="/">LinkでWelcomeに移動します</Link><br>
    <Link :href="route('inertia.index')">名前付きルートです</Link>
    <Link :href="route('inertia.show',{id : 100})">button</Link>
</template>