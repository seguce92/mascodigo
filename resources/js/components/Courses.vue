<template>
  <div>
    <section class="sticky top-0 mx-auto bg-gray-200 z-50">
      <nav class="bg-grey px-3 flex justify-between items-stretch w-full text-black container mx-auto">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a v-on:click="type = 'all'" :class="type != 'all' ? 'text-gray-700' : 'border-b-4 border-gray-700'" 
            class="uppercase font-mono flex-no-grow flex-no-shrinkpy-2 leading-normal flex items-center hover:text-gray-600 mr-5 cursor-pointer">
            Todos</a>
          <a v-on:click="type = 'skills'" :class="type != 'skills' ? 'text-gray-700' : 'border-b-4 border-gray-700'" 
            class="uppercase font-mono flex-no-grow flex-no-shrink py-2 leading-normal flex items-center hover:text-gray-600 cursor-pointer">
            Por Habilidades</a>
        </div>
      </nav>
    </section>

    <section v-show="type == 'all'" class="mx-auto">
      <div class="flex justify-center flex-wrap pb-8">
        <div class="flex justify-center flex-wrap container">
          <course-component v-for="(course, index) in courses" :key="index" :course="course"></course-component>
        </div>
      </div>
    </section>
    <section v-show="type == 'skills'" class="mx-auto">
      <div v-for="(skill, index) in skills" :key="index" v-show="skill.courses.length > 0" class="flex justify-center flex-wrap pb-8">
        <div class="w-full sticky skill-group bg-gray-100 shadow-md mb-3">
          <h3 class="uppercase container font-bold py-2 px-3 mx-auto text-sm">
            <span class="skill-header" v-html="skill.icon"></span>
            {{ skill.name }} ({{ skill.courses.length }})
          </h3>
        </div>
        <div class="flex justify-center flex-wrap container">
          <course-component v-for="(course, index) in skill.courses" :key="index" :course="course"></course-component>
        </div>
      </div>
    </section>    
  </div>
</template>

<script>
export default {
  props: ['courses', 'skills'],
  data: () => ({
    type: 'all'
  })
}
</script>

