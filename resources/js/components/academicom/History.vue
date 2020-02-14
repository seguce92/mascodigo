<template>
    <div class="grid grid-cols-1 gap-3">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mb-5">
            <div>
                <span class="text-xs">Filtrar por Curso:</span>
                <select class="block w-full bg-gray-200 border border-gray-200 text-sm text-gray-700 py-1 px-2 rounded leading-tight mt-1" v-model="search.course">
                    <option value="all">Todos los Cursos</option>
                    <option v-for="(item, index) in courses" :key="index" :value="item[1]">{{ item[0] }}</option>
                </select> 
            </div>
            <div>
                <span class="text-xs">Filtrar por Habilidad:</span>
                <select class="block w-full bg-gray-200 border border-gray-200 text-sm text-gray-700 py-1 px-2 rounded leading-tight mt-1" v-model="search.skill">
                    <option value="all">Todos las Habilidades</option>
                    <option v-for="(item, index) in skills" :key="index" :value="item[1]">{{ item[0] }}</option>
                </select> 
            </div>
        </div>
        <div v-for="item in filter" :key="item.id" :href="'/course/' + item.course_slug" class="flex flex-row p-2 rounded-lg hover:bg-gray-200">
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
    name: 'history',
    data: () => ({
        completed: [],
        search: {
            course: 'all',
            skill: 'all'
        },
        courses: [],
        skills: []
    }),
    created(){
        this.loadData()
    },
    computed: {
        filter: function () {
            return this.completed.filter((item) => {
                return this.search.course == 'all' || this.search.course != '' && item.course_slug == this.search.course || 
                    this.search.skill_slug != '' && item.skill_slug == this.search.skill_slug
            })
        },
    },
    methods:{
        async loadData() {
            const { data } = await resource.get('admin/academic/history');
            this.completed = data;

            this.loadCourses(data)
            this.loadSkills(data)
        },
        loadCourses: function (data) {
            let array = [];
            data.forEach(function (item) {
                array.push([
                    item.course, item.course_slug 
                ])
            })

            var hash = {};
            array = array.filter(function(current) {
                var exists = !hash[current.id] || false;
                hash[current.id] = true;
                return exists;
            });

            this.courses = array
        },
        loadSkills: function (data) {
            let array = [];
            data.forEach(function (item) {
                array.push([
                    item.skill, item.skill_slug
                ])
            })

            var hash = {};
            array = array.filter(function(current) {
                var exists = !hash[current.id] || false;
                hash[current.id] = true;
                return exists;
            });

            this.skills = array
        }
    }
}
</script>