<template>
    <div class="grid grid-cols-1 gap-3">
        <div v-for="item in favorites" :key="item.id" :href="'/course/' + item.lesson.course.slug" class="flex flex-row p-2 rounded-lg hover:bg-gray-200">
            <div class="flex-shrink pr-3">
                <div class="rounded-full border-white border-2 p-3 bg-blue-600 course shadow" :class="item.lesson.course.color">
                    <img class="w-10 h-10" :src="item.lesson.course.icon" alt="Icon">
                </div>
            </div>
            <div class="flex-1 justify-center">
                <div class="grid grid-cols-5 mb-2 mt-2">
                    <a :href="'/course/'+ item.lesson.course.slug +'/lesson/' + item.lesson.order" 
                        title="Ver la Lección"
                        class="font-semibold col-span-2 text-base text-gray-700 leading-tight tracking-tighter hover:underline">
                        {{ item.lesson.title }}
                    </a>
                    <a :href="'/course/' + item.lesson.course.slug" title="Ir al Curso"
                        class="col-span-2 text-xs font-semibold hover:underline">
                        {{ item.lesson.course.title }}
                    </a>
                    <time :datetime="item.lesson.course.published_at" 
                        class="text-gray-600 text-xs text-right">
                        {{ item.lesson.published_human }}
                    </time>
                </div>
                <div class="grid grid-cols-5">
                    <div class="col-span-2 text-gray-600 text-xs uppercase">
                        LECCION {{ item.lesson.order }}
                    </div>
                    <a :href="'/skill/' + item.lesson.course.skill.slug" 
                        :title="'Habilidad ' + item.lesson.course.skill.name"
                        class="col-span-2 text-gray-600 text-xs uppercase hover:underline">
                        {{ item.lesson.course.skill.name }}
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