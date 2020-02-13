<template>
    <div class="grid grid-cols-1 gap-3">
        <div v-for="item in favorites" :key="item.id" :href="'/course/' + item.course_slug" class="flex flex-row p-2 rounded-lg hover:bg-gray-200">
            <div class="flex-shrink pr-3">
                <div class="rounded-full border-white border-2 p-3 bg-blue-600 course shadow" :class="item.course_color">
                    <img class="w-10 h-10" :src="item.course_icon" alt="Icon">
                </div>
            </div>
            <div class="flex-1 justify-center">
                <div class="grid grid-cols-5 mb-2 mt-2">
                    <a :href="'/course/'+ item.course_slug +'/lesson/' + item.lesson_order" 
                        title="Ver la Lección"
                        class="font-semibold col-span-2 text-base text-gray-700 leading-tight tracking-tighter hover:underline">
                        {{ item.lesson }}
                    </a>
                    <a :href="'/course/' + item.course_slug" title="Ir al Curso"
                        class="col-span-2 text-xs font-semibold hover:underline">
                        {{ item.course }}
                    </a>
                    <time class="text-gray-600 text-xs text-right">
                        {{ item.date }}
                    </time>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 text-gray-600 text-xs uppercase">
                        LECCION {{ item.lesson_order }}
                    </div>
                    <a :href="'/skill/' + item.skill_slug" 
                        :title="'Habilidad ' + item.skill"
                        class="col-span-2 text-gray-600 text-xs uppercase hover:underline">
                        {{ item.skill }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Resource from '@/api/resource';
const resource = new Resource();

export default {
    name: 'favorite',
    data: () => ({
        favorites: [],
    }),
    created(){
        this.loadData();
    },
    methods:{
        async loadData() {
            const { data } = await resource.get('admin/academic/favorites');
            this.favorites = data;
        },
    }
}
</script>