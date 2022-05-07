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
                発注分追加
            </h2>
        </template>

      <div v-for="text in texts" :key="text.id">
       <input type="text" v-model="texts[id]">
      </div>
       <button type="button" @click="removeInput(index)">削除</button>
      <button type="button" @click="addInput">追加する</button>
       <br>
       <button type="button" @click="submit">送信</button>

  </BreezeAuthenticatedLayout>
</template>

<script>
import { defineComponent } from 'vue'
    export default defineComponent({
        data() {
            return {
                texts: [],
            }
        },
        methods: {
           addInput() {

            this.texts.push(''); // 配列に１つ空データを追加する

        },
          removeInput(id) {

            this.texts.splice(index, 1); // 👈 該当するデータを削除

        }
        }
    })
</script>