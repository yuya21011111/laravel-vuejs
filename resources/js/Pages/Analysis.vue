<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { reactive,onMounted } from 'vue';
import { getToday } from '@/common';
import axios from 'axios';
import Chart from '@/Components/Chart.vue'
import ResultTable from '@/Components/ResultTable.vue';

onMounted(() => {
    form.startDate = getToday()
    form.endDate = getToday()
})

const form = reactive({
    startDate: null,
    endDate: null,
    type: 'perDay'
})

const data = reactive({})

const getDate = async () => {
    try {
        await axios.get('/api/analysis/',{
            params:{
                startDate: form.startDate,
                endDate: form.endDate,
                type: form.type
            }
        })
        .then (res => {
            data.data = res.data.data
            data.labels = res.data.labels
            data.totals = res.data.totals
            data.type = res.data.type
            console.log(res.data.type)
        })
    } catch (e) {
        console.log(e.message)
    }
}

</script>
<template>
    <Head title="分析" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">分析</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="getDate">
                            分析方法<br>
                            <input type="radio" v-model="form.type" value="perDay" checked><span class="mr-2">日別</span>
                            <input type="radio" v-model="form.type" value="perMonth" ><span class="mr-2">月別</span>
                            <input type="radio" v-model="form.type" value="perYear" ><span class="mr-2">年別</span>
                            <input type="radio" v-model="form.type" value="decile" ><span class="mr-2">デシル分析</span>
                            <br>
                            From:<input type="date" name="startDate" v-model="form.startDate">
                            To:<input type="date" name="endDate" v-model="form.endDate">
                            <div class="p-2 w-full">
                            <button  class="flex mx-auto mt-4 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">分析する</button>
                            </div>
                        </form>
                        <div v-show="data.data">
                        <Chart :data="data" />
                        <ResultTable :data="data" />
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

