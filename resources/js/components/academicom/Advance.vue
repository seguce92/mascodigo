<template>

</template>

<script>
import Resource from '@/api/resource';
const resource = new Resource();

export default {
    name: 'advance',
    data: () => ({
        courses: [],
    }),
    created(){

    },
    methods:{
        async getRole(id) {
            const { data } = await resource.get('admin/academic/advance');
            this.courses = data;
        },
    }
}
</script>