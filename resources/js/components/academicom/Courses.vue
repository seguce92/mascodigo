<template>
    <div>
        Aqui el cocodrilo
    </div>
</template>

<script>
import Resource from '@/api/resource';
const resource = new Resource();

export default {
    name: 'courses',
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