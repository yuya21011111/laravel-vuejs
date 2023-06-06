<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const emitTest = e => console.log(e)
</script>
<template>
<GuestLayout>
<InputLabel value="件名">タイトル</InputLabel>
<TextInput 
modelValue="文字を入力してください"
@update:modelValue="emitTest">
</TextInput>
</GuestLayout>
</template>