<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head,Link } from '@inertiajs/vue3';
import { nl2br  } from '@/common'
import { Inertia } from '@inertiajs/inertia';


defineProps({
    customer: Object
})

const deleteCustomer = id => {
    Inertia.delete(route('customers.destroy',{customer: id}), {
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>
    <Head title="顧客詳細" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">顧客詳細</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font relative">
                            
                            <div class="container px-5 py-8 mx-auto">   
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                                <div  id="name" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ customer.name }}</div>
                                            </div>
                                            
                                        </div>

                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="kana" class="leading-7 text-sm text-gray-600">カナ</label>
                                                <div  id="kana" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ customer.kana }}</div>
                                            </div>
                                            
                                        </div>

                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="tel" class="leading-7 text-sm text-gray-600"> 電話番号</label>
                                                <div  id="tel" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ customer.tel }}</div>
                                            </div>
                                            
                                        </div>

                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                                <div  id="email" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ customer.email }}</div>
                                            </div>
                                            
                                        </div>

                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label>
                                                <div  id="postcode" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ customer.postcode }}</div>
                                            </div>
                                            
                                        </div>

                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                                                <div  id="address" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ customer.address }}</div>
                                            </div>
                                            
                                        </div>

                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="birthday" class="leading-7 text-sm text-gray-600">誕生日</label>
                                                <div  id="birthday" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ customer.birthday }}</div>
                                            </div>
                                            
                                        </div>

                                        <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="gender" class="leading-7 text-sm text-gray-600">性別</label>
                                                <div  id="gender" v-if="customer.gender === 0" 
                                                    class= "w-full  bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                男性</div>
                                                <div  id="gender"  v-if="customer.gender === 1" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                女性</div>
                                                <div  id="gender"  v-if="customer.gender === 2" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                その他</div>
                                            </div>
                                        </div>

                                       
                                        
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                                <div id="memo" v-html="nl2br(customer.memo)"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                               </div>
                                            </div>
                                           
                                        </div>

                                        
                                        <!-- <div class="p-2  w-full">
                                            <div class="relative">
                                                <label for="price" class="leading-7 text-sm text-gray-600">ステータス</label>
                                                <div v-if="item.is_selling === 1"  id="price" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                販売中
                                               </div>
                                               <div v-if="item.is_selling === 0"  id="price" 
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                停止中
                                               </div>
                                            </div>
                                        </div> -->

                                        <div class="p-2 w-full">
                                            <Link as="button" :href="route('customers.edit',{ customer: customer.id })"
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集</Link>
                                                <div>
                                                    <button class="flex mx-auto mt-4 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg" @click="deleteCustomer(customer.id)">削除</button>
                                                </div>
                                        </div>  
                                </div>
                            </div>
                        </div>
                   
                    </section>
                </div>
            </div>
        </div>
    </div>
</AuthenticatedLayout>
</template>