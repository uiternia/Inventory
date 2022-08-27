<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    types: Array,
});

let form = useForm({
    foodName: "",
    weight: "",
    type: 1,
});

let submit = () => {
  form.post(route('inventory.store'));
};

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                在庫新規追加
            </h2>
        </template>

        <div class="py-12">
           
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   
                    <div class="p-6 bg-white border-b border-gray-200">
                      <BreezeValidationErrors class="mb-4" />
                         <div class="container px-5 py-24 mx-auto flex">
                          
                           <div class="md:w-3/4 bg-white flex flex-col md:mx-auto w-full  md:py-8 mt-8 md:mt-0">
                           <form @submit.prevent="submit">
                             <div class="relative mb-4">
                               <label for="foodName" class="leading-7 text-sm text-gray-600">食品名</label>
                               <input type="text" id="foodName" name="foodName" v-model="form.foodName" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                             </div>
                             <div class="relative mb-4">
                               <label for="weight" class="leading-7 text-sm text-gray-600">在庫量(g)</label>
                               <input type="number" id="weight" name="weight" v-model="form.weight" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                             </div>


                          <div class="mb-4 w-1/2">
                          <div class="relative">
                            <label for="type" class="leading-7 text-sm text-gray-600">食品の分類</label>
                            <select v-model="form.type" name="type" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              <option
                               v-for="type in types" 
                                 :value="type.id" 
                                 :key="type.id"
                               >
                                 {{ type.typeName }}
                               </option>
                                
                            
                            </select>
                          </div>
                        </div>

                             <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">在庫を新規追加する</button>
                           </form>
                           </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

