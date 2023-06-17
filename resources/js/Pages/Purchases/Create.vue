<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { getToday } from '@/common';
import { Head } from '@inertiajs/vue3';
import { onMounted,reactive,ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const form = reactive({
    date: null,
    customer_id: null,
});


const props = defineProps({
    'customers' :Array,
    'items' :Array,
}
);

const itemList = ref([])

onMounted(() => {
    form.date = getToday()
    props.items.forEach(item => {
        itemList.value.push({
            id: item.id, name: item.name, price: item.price, quantity: 0
        });
    });
});

const quantity = ['0','1','2','3','4','5','6','7','8','9']

</script>

<template>
   日付<br>
   <input type="date" name="date" v-model="form.date" /><br>
   会員名<br>
   <select name="customer" v-model="form.customer_id">
    <option v-for="customer in customers" :value="customer.id" :key="customer.id">
        {{ customer.id }}:{{ customer.name }}
    </option>
   </select><br>
   商品・サービス<br>
   <table>
    <tbody>
        <tr v-for="item in itemList">
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.price }}</td>
            <td>
            <select name="quantity" v-model="item.quantity">
                <option v-for="q in quantity" :value="q">{{ q }}</option>
            </select>
            </td>
            <td>
                {{ item.price * item.quantity }}円
            </td>
        </tr>
    </tbody>
   </table>
</template>