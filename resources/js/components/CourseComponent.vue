<template>
  <div class="max-w-sm w-full w-1/1 lg:w-1/4 py-3 px-3">
    <div class="card pt-4" :class="course.color">
      <div class="overlay"></div>
      <a :href="domain + 'course/' + course.slug" class="circle text-white" title="INICIAR CURSO">
        <img :src="course.icon">
      </a>
      <a class="skill shadow" :href="domain + 'skill/' + course.skill.slug" title="INICIAR CURSO">{{ course.skill.name }}</a>
      <a class="title font-serif" :href="domain + 'course/' + course.slug">{{ course.title }}</a>
      <div class="flex flex-wrap w-full py-4 description">
        <div class="flex w-1/2 inline-flex justify-center items-center text-sm text-gray-600 font-serif">
          <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V80c0-26.51-21.49-48-48-48zm-6 400H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v340a6 6 0 0 1-6 6zm-42-92v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm0-96v24c0 6.627-5.373 12-12 12H204c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h200c6.627 0 12 5.373 12 12zm-252 12c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36zm0 96c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36 36 16.118 36 36z"/></svg>
          <p class="text">3 Lecciones</p>
        </div>
        <div class="flex w-1/2 inline-flex justify-center items-center text-sm text-gray-600 font-serif">
          <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
          <p class="text">00:00:00</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['course'],
  data: () => ({
    domain: config.domain
  })
}
</script>

<style lang="scss">
  .card {
    .circle {
      padding: 4px;
      img {
        z-index: 1
      }
    }
  }
</style>