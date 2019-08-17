<template>
  <section class="mx-auto p-0 lg:p-2 xl:pl-20 xl:pr-20 bg-gray-200">
    <div class="flex justify-content flex-wrap mx-auto">
      
      <div class="flex-grow self-start hidden lg:block bg-white shadow-lg mr-4 collection ml-auto rounded-lg overflow-y-scroll">
        <ul class="flex lesson flex-col w-full list-reset select-none" :class="course.skill.slug">
          <li :class="course.skill.slug" class="flex course sticky top-0 bg-white flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
            <img v-if="course.icon != null" class="bg-black-trans p-1 flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3" 
              src='data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTQ2Ni45MTYgMjcuODAzaC00MjEuODMyYy0yNC44NTkgMC00NS4wODQgMjAuMjI1LTQ1LjA4NCA0NS4wODR2MzY2LjIyNmMwIDI0Ljg1OSAyMC4yMjUgNDUuMDg0IDQ1LjA4NCA0NS4wODRoNDIxLjgzMmMyNC44NTkgMCA0NS4wODQtMjAuMjI1IDQ1LjA4NC00NS4wODR2LTM2Ni4yMjZjMC0yNC44NTktMjAuMjI1LTQ1LjA4NC00NS4wODQtNDUuMDg0eiIgZmlsbD0iI2YwZjlmZiIvPjxwYXRoIGQ9Im0yMzEuNDE4IDI2Ny4wOTd2LTIzOS4yOTRoLTE4Ni4zMzRjLTI0Ljg1OSAwLTQ1LjA4NCAyMC4yMjUtNDUuMDg0IDQ1LjA4NHYxOTQuMjF6IiBmaWxsPSIjNDA2YmQ0Ii8+PHBhdGggZD0ibTQ2Ni45MTYgMjcuODAzaC0yMTAuOTE2djQ1Ni4zOTRoMjEwLjkxNmMyNC44NTkgMCA0NS4wODQtMjAuMjI1IDQ1LjA4NC00NS4wODR2LTM2Ni4yMjZjMC0yNC44NTktMjAuMjI1LTQ1LjA4NC00NS4wODQtNDUuMDg0eiIgZmlsbD0iI2NlZTVmNSIvPjxwYXRoIGQ9Im0wIDI2Mi42NDd2MTc2LjQ2NmMwIDI0Ljg1OSAyMC4yMjUgNDUuMDg0IDQ1LjA4NCA0NS4wODRoNDIxLjgzMmMyNC44NTkgMCA0NS4wODQtMjAuMjI1IDQ1LjA4NC00NS4wODR2LTE3Ni40NjZ6IiBmaWxsPSIjZjQwMDU1Ii8+PHBhdGggZD0ibTI1NiAyNjIuNjQ3djIyMS41NWgyMTAuOTE2YzI0Ljg1OSAwIDQ1LjA4NC0yMC4yMjUgNDUuMDg0LTQ1LjA4NHYtMTc2LjQ2NnoiIGZpbGw9IiNjMjAwNDQiLz48cGF0aCBkPSJtMTQ5LjE0OSAxNTkuNzc1IDI2Ljg2LTE5LjUxNWM1LjMtMy44NTEgMi41NzYtMTIuMjM0LTMuOTc1LTEyLjIzNGgtMzMuMjAxYy0yLjkzIDAtNS41MjctMS44ODctNi40MzItNC42NzNsLTEwLjI2LTMxLjU3NmMtMi4wMjUtNi4yMzEtMTAuODQtNi4yMzEtMTIuODY0IDBsLTEwLjI2IDMxLjU3NmMtLjkwNSAyLjc4Ny0zLjUwMiA0LjY3My02LjQzMiA0LjY3M2gtMzMuMmMtNi41NTIgMC05LjI3NiA4LjM4NC0zLjk3NSAxMi4yMzRsMjYuODYgMTkuNTE1YzIuMzcgMS43MjIgMy4zNjIgNC43NzUgMi40NTcgNy41NjFsLTEwLjI2IDMxLjU3NmMtMi4wMjUgNi4yMzEgNS4xMDcgMTEuNDEyIDEwLjQwNyA3LjU2MWwyNi44Ni0xOS41MTVjMi4zNy0xLjcyMiA1LjU4LTEuNzIyIDcuOTUgMGwyNi44NiAxOS41MTVjNS4zIDMuODUxIDEyLjQzMi0xLjMzIDEwLjQwNy03LjU2MWwtMTAuMjYtMzEuNTc2Yy0uOTA0LTIuNzg2LjA4OC01LjgzOCAyLjQ1OC03LjU2MXoiIGZpbGw9IiNmZmYiLz48L3N2Zz4='>
            <div v-else class="icon border border-white flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
              {{ course.title.substr(0, 2) }}
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex justify-between mb-1">
                <a :href="domain + 'skill/' + course.skill.slug" class="font-semibold text-xs cursor-pointer text-white skill px-2 rounded-lg">{{ course.skill.name }}</a>
              </div>
              <div class="text-sm text-grey-dark truncate">
                <span class="font-bold text-white">{{ course.title }}</span>
              </div>
            </div>
          </li>
          <li v-for="(row, index) in course.lessons"
              :key="index" class="flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2 cursor-pointer"
              :class="row.id == lesson.id ? 'bg-gray-200' : ''" v-on:click="showLesson(course.slug, row.order)">
            <div class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
              <svg v-if="row.id == lesson.id" class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>
              <svg v-else class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex justify-between mb-1">
                <h2 class="font-semibold text-xs">Lección {{ row.order }}</h2>
                <time class="text-xs text-grey-dark">{{ row.duration }}</time>
              </div>
              <div class="text-sm text-grey-dark truncate">
                <span class="font-bold">{{ row.title }}</span>
              </div>
            </div>
          </li>
        </ul>
      </div>
      
      <div class="flex-grow self-start bg-gray-900 video-content mr-auto lg:rounded-lg">
        <vue-plyr v-if="lesson.server == 'youtube' || lesson.server == 'vimeo'" ref="plyr" :emit="['ended']" @ended="ended">
          <div :data-plyr-provider="lesson.server" :data-plyr-embed-id="lesson.url"></div>
        </vue-plyr>

        <vue-plyr v-else ref="plyr" :emit="['ended']" @ended="ended">
          <video poster="poster.png" :src="lesson.url"></video>
        </vue-plyr>
      </div>

    </div>

    <div class="flex justify-content flex-wrap mx-auto lg:hidden xl:hidden ">
      <ul class="flex lesson flex-col w-full list-reset select-none" :class="course.skill.slug">
          <li :class="course.skill.slug" class="flex course sticky top-0 bg-white flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
            <img v-if="course.icon != null" class="bg-black-trans p-1 flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3" 
              src='data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTQ2Ni45MTYgMjcuODAzaC00MjEuODMyYy0yNC44NTkgMC00NS4wODQgMjAuMjI1LTQ1LjA4NCA0NS4wODR2MzY2LjIyNmMwIDI0Ljg1OSAyMC4yMjUgNDUuMDg0IDQ1LjA4NCA0NS4wODRoNDIxLjgzMmMyNC44NTkgMCA0NS4wODQtMjAuMjI1IDQ1LjA4NC00NS4wODR2LTM2Ni4yMjZjMC0yNC44NTktMjAuMjI1LTQ1LjA4NC00NS4wODQtNDUuMDg0eiIgZmlsbD0iI2YwZjlmZiIvPjxwYXRoIGQ9Im0yMzEuNDE4IDI2Ny4wOTd2LTIzOS4yOTRoLTE4Ni4zMzRjLTI0Ljg1OSAwLTQ1LjA4NCAyMC4yMjUtNDUuMDg0IDQ1LjA4NHYxOTQuMjF6IiBmaWxsPSIjNDA2YmQ0Ii8+PHBhdGggZD0ibTQ2Ni45MTYgMjcuODAzaC0yMTAuOTE2djQ1Ni4zOTRoMjEwLjkxNmMyNC44NTkgMCA0NS4wODQtMjAuMjI1IDQ1LjA4NC00NS4wODR2LTM2Ni4yMjZjMC0yNC44NTktMjAuMjI1LTQ1LjA4NC00NS4wODQtNDUuMDg0eiIgZmlsbD0iI2NlZTVmNSIvPjxwYXRoIGQ9Im0wIDI2Mi42NDd2MTc2LjQ2NmMwIDI0Ljg1OSAyMC4yMjUgNDUuMDg0IDQ1LjA4NCA0NS4wODRoNDIxLjgzMmMyNC44NTkgMCA0NS4wODQtMjAuMjI1IDQ1LjA4NC00NS4wODR2LTE3Ni40NjZ6IiBmaWxsPSIjZjQwMDU1Ii8+PHBhdGggZD0ibTI1NiAyNjIuNjQ3djIyMS41NWgyMTAuOTE2YzI0Ljg1OSAwIDQ1LjA4NC0yMC4yMjUgNDUuMDg0LTQ1LjA4NHYtMTc2LjQ2NnoiIGZpbGw9IiNjMjAwNDQiLz48cGF0aCBkPSJtMTQ5LjE0OSAxNTkuNzc1IDI2Ljg2LTE5LjUxNWM1LjMtMy44NTEgMi41NzYtMTIuMjM0LTMuOTc1LTEyLjIzNGgtMzMuMjAxYy0yLjkzIDAtNS41MjctMS44ODctNi40MzItNC42NzNsLTEwLjI2LTMxLjU3NmMtMi4wMjUtNi4yMzEtMTAuODQtNi4yMzEtMTIuODY0IDBsLTEwLjI2IDMxLjU3NmMtLjkwNSAyLjc4Ny0zLjUwMiA0LjY3My02LjQzMiA0LjY3M2gtMzMuMmMtNi41NTIgMC05LjI3NiA4LjM4NC0zLjk3NSAxMi4yMzRsMjYuODYgMTkuNTE1YzIuMzcgMS43MjIgMy4zNjIgNC43NzUgMi40NTcgNy41NjFsLTEwLjI2IDMxLjU3NmMtMi4wMjUgNi4yMzEgNS4xMDcgMTEuNDEyIDEwLjQwNyA3LjU2MWwyNi44Ni0xOS41MTVjMi4zNy0xLjcyMiA1LjU4LTEuNzIyIDcuOTUgMGwyNi44NiAxOS41MTVjNS4zIDMuODUxIDEyLjQzMi0xLjMzIDEwLjQwNy03LjU2MWwtMTAuMjYtMzEuNTc2Yy0uOTA0LTIuNzg2LjA4OC01LjgzOCAyLjQ1OC03LjU2MXoiIGZpbGw9IiNmZmYiLz48L3N2Zz4='>
            <div v-else class="icon border border-white flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
              {{ course.title.substr(0, 2) }}
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex justify-between mb-1">
                <a :href="domain + 'skill/' + course.skill.slug" class="font-semibold text-xs cursor-pointer text-white skill px-2 rounded-lg">{{ course.skill.name }}</a>
              </div>
              <div class="text-sm text-grey-dark truncate">
                <span class="font-bold text-white">{{ course.title }}</span>
              </div>
            </div>
          </li>
          <li v-for="(row, index) in course.lessons"
              :key="index" class="flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2 cursor-pointer"
              :class="row.id == lesson.id ? 'bg-gray-400' : ''" v-on:click="showLesson(course.slug, row.order)">
            <div class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
              <svg v-if="row.id == lesson.id" class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>
              <svg v-else class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex justify-between mb-1">
                <h2 class="font-semibold text-xs">Lección {{ row.order }}</h2>
                <time class="text-xs text-grey-dark">{{ row.duration }}</time>
              </div>
              <div class="text-sm text-grey-dark truncate">
                <span class="font-bold">{{ row.title }}</span>
              </div>
            </div>
          </li>
        </ul>
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
    domain: config.domain,
    total: 0
  }),
  mounted () {
    this.total = this.course.lessons.length
    this.player.config.autoplay = true
  },
  computed: {
    player () { 
      return this.$refs.plyr.player
    }
  },
  methods: {
    showLesson: function (course, order) {
      window.location = this.domain + 'course/'+ course +'/lesson/' + order;
    },
    ended: function () {
      if ( this.lesson.order < this.total ) {
        this.$swal({
          title: 'En Hora Buena',
          text: 'Lección Terminada',
          html: false,
          timer: 3000,
          type: 'success',
          showConfirmButton: false,
          allowOutsideClick: false,
          onClose: () => {
            this.showLesson(this.course.slug, this.lesson.order + 1)
          }
        })
      } else {
        this.$swal({
          title: 'En Hora Buena',
          text: 'Terminaste el curso de ' + this.course.title.toUpperCase(),
          html: false,
          type: 'success',
          showConfirmButton: true,
          allowOutsideClick: false
        })
      }
    }
  }
}
</script>