<template>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
        <course v-for="item in courses" :key="item.id" :data="item"></course>
    </div>
</template>

<script>
import Course from './Course.vue';
import Resource from '@/api/resource';
const resource = new Resource();

export default {
    name: 'courses',
    components: {
        Course
    },
    data: () => ({
        courses: []
    }),
    created(){
        this.loadData();
    },
    methods: {
        async loadData() {
            const { data } = await resource.get('admin/academic/courses');
            this.courses = data;
        },
    }
}
</script>