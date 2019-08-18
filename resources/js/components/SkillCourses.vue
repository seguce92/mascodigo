<template>
  <div>
    <section class="sticky top-0 mx-auto bg-gray-200 z-50">
      <nav class="bg-grey px-3 flex justify-between items-stretch w-full text-black container mx-auto">
        <div class="flex flex-no-shrink items-stretch h-12">
          <a :href="domain" class="text-xs md:text-sm lg:text-base font-mono text-gray-700 hover:text-gray-800 hover:bg-gray-300 px-3 flex-no-grow flex-no-shrink py-2 flex items-center">
            <svg class="fa w-4 h-4 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"/></svg>
            IR A INICIO
          </a>
          <a href="#" class="uppercase flex-no-grow flex-no-shrink py-2 px-4 leading-normal flex items-center hover:text-gray-600 text-gray-700">
            {{ skill.name }}
          </a>
        </div>
        <div class="flex items-stretch flex-no-shrink h-12">
          <div class="flex items-stretch justify-end ml-auto">
            <a href="#" class="flex-no-grow flex-no-shrink relative py-2 leading-normal no-underline flex items-center hover:bg-grey-dark">
              <svg class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
            </a>
          </div>
        </div>
      </nav>
    </section>

    <section class="mx-auto">
      <div class="flex justify-center flex-wrap pt-8 pb-8">
        <div class="flex justify-center flex-wrap container">
          
          <course-component v-for="(course, index) in courses" :key="index" :course="course"></course-component>

        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  props: ['courses', 'skill'],
  data : () => ({
    domain: config.domain
  }),
  created () {
      
  },
  destroyed() {      
  },
  computed: {
      
  },
  methods: {
  }
}
</script>