<template>
    <div class="grid grid-cols-1 gap-3">
        <a v-for="item in advances" :key="item.id" :href="'/course/' + item.course.slug" class="flex flex-row p-2 rounded-lg hover:bg-gray-200">
            <div class="flex-shrink pr-3">
                <div class="rounded-full border-white border-2 p-3 bg-blue-600 course shadow" :class="item.course.color">
                    <img class="w-10 h-10" :src="item.course.icon" alt="Icon">
                </div>
            </div>
            <div class="flex-1">
                <div class="grid grid-cols-2 mb-2">
                    <div class="font-semibold text-gray-700 text-xs uppercase">{{ item.course.skill.name }}</div>
                    <time :datetime="item.created_at" class="text-gray-600 text-xs text-right">{{ item.created_human }}</time>
                </div>
                <div class="grid grid-cols-3">
                    <a class="col-span-2 text-base text-gray-700 leading-tight tracking-tighter">
                        {{ item.course.title }}
                    </a>
                    <span class="col-span-1 text-right">{{ item.progress }}%</span>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
import Resource from '@/api/resource';
const resource = new Resource();

export default {
    name: 'advance',
    data: () => ({
        advances: [],
    }),
    created(){
        this.loadData();
    },
    methods:{
        async loadData() {
            const { data } = await resource.get('admin/academic/advance');
            this.advances = data;
        },
    }
}
</script>