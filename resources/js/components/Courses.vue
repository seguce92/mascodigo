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
        <div class="flex items-stretch flex-no-shrink h-12">
          <div class="flex items-stretch justify-end ml-auto">
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal no-underline flex items-center hover:bg-grey-dark cursor-pointer">
              <i class="fa fa-users"></i>
            </a>
            <a class="flex-no-grow flex-no-shrink relative py-2 leading-normal no-underline flex items-center hover:bg-grey-dark cursor-pointer">
              <svg class="fa w-4 h-4 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
            </a>
          </div>
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

