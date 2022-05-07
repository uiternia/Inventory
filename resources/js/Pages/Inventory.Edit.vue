<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head , Link } from '@inertiajs/inertia-vue3';
import {useForm} from '@inertiajs/inertia-vue3';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';

const props = defineProps({
    inventory: Object,
});


let form = useForm({
    foodName: props.inventory.inventoryName,
    weight: props.inventory.weight,
});

let submit = () => {
  form.patch(route('inventory.update', props.inventory.id));
};

 const deleteFoods = (id) => {
   form.delete(route("inventory.destroy" ,id));
 };


</script>



<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                在庫数変更
            </h2>
        </template>

    
    <div>
        <DialogModal :show="isopen" @close="isopen = false">
            <template #title>
               本当に消去しますか？
            </template>

        
            <template #footer>

                <button @click="deleteFoods(inventory.id)" class="mr-4 text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">
                    はい
                </button>

                <button @click="isopen = false" class=" text-white bg-gray-500 border-0 py-2 px-6 focus:outline-none hover:bg-gray-600 rounded">
                    いいえ
                </button>

            </template>

        </DialogModal>
    </div>

          <div class="py-12">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between">
                <div class="mt-8 ml-8">
                   <Link :href="route('inventory.index')">
                    <button type="button" class="flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">戻る</button>
                  </Link>
                </div>
                <div class="mt-8 mr-8">
                   <!-- <Link method="delete" :href="route('inventory.destroy',inventory.id)">
                    <button type="button" show="isopen" @close="isopen = !isopen" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">消去</button>
                  </Link> -->
                  <button type="button" @click="isopen = true" class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">消去</button>
                </div>
                </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-6 bg-white border-b border-gray-200">
                      <BreezeValidationErrors class="mb-4" />
                         <div class="container px-5 py-12 mx-auto flex">
                           <div class="md:w-3/4 bg-white flex flex-col md:mx-auto w-full  md:py-8 mt-8 md:mt-0">
                           <form @submit.prevent="submit">
                             <div class="relative">
                               <label for="foodName" class="leading-7 text-xl text-gray-600">{{form.foodName}}</label>
                               <input type="hidden" id="foodName" name="foodName" v-model="form.foodName" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                             </div>
                             <div class="relative my-12 ">
                               <label for="weight" class="leading-7 text-sm text-gray-600">在庫量(g)</label>
                               <input type="number" id="weight" name="weight" v-model="form.weight" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                             </div>
                             <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">在庫量を変更する</button>
                           </form>
                           </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import { defineComponent } from 'vue'
    import DialogModal from '@/Components/DialogModal.vue'
  
    export default defineComponent({
        components: {
            DialogModal,
        },
        data() {
            return {
                isopen: false
            }
        },
    })
</script>