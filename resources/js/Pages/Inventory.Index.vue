<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head , Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
  frozenFoods: Object,
  seasonings: Object,
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,

});


</script>

<template>
    <Head title="Dashboard" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                在庫一覧
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                      <div v-if="$page.props.flash.message" class="bg-green-200 p-2 m-1">
                        {{ $page.props.flash.message }}
                       </div>   
                        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                        <Link :href="route('inventory.create')">
                           <button type="button" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">在庫新規追加</button>
                        </Link>
                         </div>
                          <section class="text-gray-600 body-font">
                               <div class="container px-5 py-12 mx-auto">
                                   <div class="flex flex-col text-center w-full mb-10">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">冷凍食品</h1>
                                   </div>
                                 <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                   <table class="table-auto w-full text-left whitespace-no-wrap">
                                     <thead>
                                       <tr>
                                         <th class="px-2 md:px-8 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">食品名</th>
                                         <th class="px-2 md:px-8 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">在庫量</th>
                                         <th class="px-2 md:px-8 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">更新日</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr v-for="frozenFood in frozenFoods" :key="frozenFood.id">
                                         <td class="px-2 md:px-8 py-3 text-blue-600">
                                            <Link :href="route('inventory.edit',frozenFood.id)">
                                           {{frozenFood.inventoryName}}
                                           </Link>
                                           </td>          
                                         <td class="px-2 md:px-8 py-3">{{frozenFood.weight}}g </td>
                                         <td v-if="frozenFood.updated_at === null" class="px-2 md:px-8 py-3">{{frozenFood.created_at}}</td>
                                         <td v-else class="px-2 md:px-8 py-3">{{frozenFood.updated_at}}</td>
                                       </tr>
                                     </tbody>
                                   </table>
                                 </div>
                               </div>
                        </section>

                        <section class="text-gray-600 body-font">
                               <div class="container px-5 py-12 mx-auto">
                                   <div class="flex flex-col text-center w-full mb-10">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">調味料</h1>
                                   </div>
                                 <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                   <table class="table-auto w-full text-left whitespace-no-wrap">
                                     <thead>
                                       <tr>
                                         <th class="px-2 md:px-8 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">食品名</th>
                                         <th class="px-2 md:px-8 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">在庫量</th>
                                         <th class="px-2 md:px-8 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">更新日</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr v-for="seasoning in seasonings" :value="seasoning.id" :key="seasoning.id">
                                         <td class="px-2 md:px-8 py-3 text-blue-600">
                                           <Link :href="route('inventory.edit',seasoning.id)">
                                           {{seasoning.inventoryName}}
                                           </Link>
                                           </td>
                                         <td class="px-2 md:px-8 py-3">{{seasoning.weight}}g</td>
                                         <td v-if="seasoning.updated_at === null" class="px-2 md:px-8 py-3">{{seasoning.created_at}}</td>
                                         <td v-else class="px-2 md:px-8 py-3">{{seasoning.updated_at}}</td>
                                       </tr>
                                     </tbody>
                                   </table>
                                 </div>
                               </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
