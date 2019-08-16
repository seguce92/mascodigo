<template>
  <section class="mx-auto p-0 lg:p-2 xl:pl-20 xl:pr-20 bg-gray-200">
    <div class="flex justify-content flex-wrap mx-auto">
      <div class="flex-grow self-start hidden lg:block bg-white shadow-lg mr-4 collection ml-auto rounded-lg overflow-y-auto">
        
        <ul class="flex lesson flex-col w-full list-reset select-none" :class="course.skill.slug">
          <li v-on:click="showLesson(domain + 'course/'+ course.slug +'/lesson/' + lesson.order)" v-for="(lesson, index) in course.lessons" :key="index" class="flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
            <div data-value="F" class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3"></div>
            <div class="flex-1 min-w-0">
              <div class="flex justify-between mb-1">
                <h2 class="font-semibold text-xs">
                  Lección {{ lesson.order }}
                </h2>
                <time class="text-xs text-grey-dark">{{ lesson.duration }}</time>
              </div>
              <div class="text-sm text-grey-dark truncate">
                <span class="font-bold hover:underline">{{ lesson.title }}</span>
              </div>
            </div>
          </li>
        </ul>

      </div>
      <div class="flex-grow bg-gray-900 video-content mr-auto lg:rounded-lg">
        <vue-plyr ref="plyr">
          <div data-plyr-provider="youtube" :data-plyr-embed-id="lesson.url"></div>
        </vue-plyr>
      </div>
    </div>
  </section>
</template>

<script>
import Vue from 'vue'
import VuePlyr from 'vue-plyr'
import 'vue-plyr/dist/vue-plyr.css'
import { constants } from 'crypto';

Vue.use(VuePlyr)
export default {
  props: ["course", 'lesson'],
  data : () => ({
    domain: config.domain
  }),
  mounted () {

    this.player.config.autoplay = true

    this.player.on('ended', function () {
      /*if ( this.next != null ) {
        this.$swal({
          title: 'En Hora Buena',
          text: 'Lección Terminada',
          html: false,
          timer: 3000,
          type: 'success',
          showConfirmButton: false,
          allowOutsideClick: false,
          onClose: () => {
            this.changeLesson(this.slug, this.next.order)
          }
        })
      } else {
        this.$swal({
          title: 'En Hora Buena',
          text: 'Terminaste el curso de ' + this.course.title.toUpperCase(),
          html: false,
          timer: 3000,
          type: 'success',
          showConfirmButton: false,
          allowOutsideClick: false
        })
      }*/
      console.log(window)
      console.log(this.parent)
    })
  },
  computed: {
    player () { 
      return this.$refs.plyr.player
    }
  },
  methods: {
    showLesson: function (url) {
      console.log(url)
      window.location = url;
    },
    ended: function () {
      console.log("ended")
    }
  }
}
</script>