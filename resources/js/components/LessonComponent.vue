<template>
  <section class="mx-auto">
    <div class="w-full mx-auto bg-gray-200 p-0 lg:p-2 lg:pb-0 xl:pl-20 xl:pr-20">
      <div class="flex justify-content flex-wrap mx-auto lg:pb-2">
        
        <div class="flex-grow self-start hidden lg:block bg-white shadow-lg mr-4 collection ml-auto rounded-lg overflow-y-scroll">
          <ul class="flex lesson flex-col w-full list-reset select-none" :class="course.color">
            <li :class="course.color" class="flex course sticky top-0 bg-white flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
              <img v-if="course.icon != null" class="p-1 bg-black-trans flex justify-center items-center flex-no-shrink w-12 h-12 rounded-full font-semibold text-white mr-3" 
                :src="course.icon" loading="lazy">
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
                <div v-if="!completes.includes(row.id)" class="text-center">
                  <svg v-if="row.id == lesson.id" class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>
                  <svg v-else-if="row.is_private" class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
                  <svg v-else class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M423.5 0C339.5.3 272 69.5 272 153.5V224H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48h-48v-71.1c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v80c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-80C576 68 507.5-.3 423.5 0z"/></svg>
                </div>
                <svg v-else title="Lección completada" class="w-5 h-5 inline-block fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
              </div>
              <div class="flex-1 min-w-0">
                <div class="flex justify-between mb-1">
                  <h2 class="font-semibold text-xs">Lección {{ row.order }}
                    <span v-if="row.is_private && row.is_premium" class="ml-4 bg-yellow-500 text-yellow-800 border border-yellow-600 rounded-full px-2 py-05 text-xss font-normal italic shadow">Premium</span>
                    <span v-else-if="row.is_private" class="ml-4 bg-blue-500 text-gray-100 border border-blue-600 rounded-full px-2 py-05 text-xss font-normal italic shadow">Estandar</span>
                    <span v-else class="ml-4 bg-transparent border border-gray-600 text-gray-800 rounded-full px-3 py-05 text-xss font-normal italic shadow">Gratis</span>
                  </h2>
                  <time class="text-xs text-grey-dark">{{ row.duration }}</time>
                </div>
                <div class="text-sm text-grey-dark truncate">
                  <span class="font-bold">{{ row.title }}</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
        
        <div v-if="init" class="flex-grow self-start bg-gray-900 video-content mr-auto lg:rounded-lg">
          <vue-plyr v-if="lesson.server == 'youtube' || lesson.server == 'vimeo'" 
            ref="plyr" :emit="['ended', 'play', 'pause']" 
            @ended="ended" 
            @play="play"
            @pause="pause"
            class="rounded-none lg:rounded-lg">
            <div :data-plyr-provider="lesson.server" :data-plyr-embed-id="lesson.url"></div>
          </vue-plyr>

          <vue-plyr v-else ref="plyr" :emit="['ended']" @ended="ended" class="rounded-none lg:rounded-lg">
            <video poster="poster.png" :src="lesson.url"></video>
          </vue-plyr>
        </div>
        <div v-else class="flex-grow self-start bg-gray-900 video-content mr-auto lg:rounded-lg relative">
          <div v-if="lesson.is_private && logged && lesson.is_premium || lesson.is_private && !logged && lesson.is_premium"
            class="flex justify-center px-3 mx-auto text-white course rounded"
            :class="course.color">
              <div class="w-full lg:w-4/5 xl:w-3/5 py-20 lg:py-32">
                <svg class="w-20 h-20 fill-current mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm80 168c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm-160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm170.2 218.2C315.8 367.4 282.9 352 248 352s-67.8 15.4-90.2 42.2c-13.5 16.3-38.1-4.2-24.6-20.5C161.7 339.6 203.6 320 248 320s86.3 19.6 114.7 53.8c13.6 16.2-11 36.7-24.5 20.4z"/></svg>
                <h2 class="font-hairline text-2xl mb-3">
                  Necesitas una Membresia
                </h2>
                <p class="sm:leading-normal text-base mb-8">Lo siento, para acceder a esta lección es necesario tener un <strong class="italic">plan</strong> o una <strong class="italic">membresia</strong> en <strong class="italic">Más Código</strong>.</p>
                <a href="/register" 
                  class="bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-2 px-6 border border-white hover:border-transparent rounded-full inline-block mb-4">
                  Suscribete
                </a>
                <a href="/login" 
                  class="ml-3 bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-2 px-6 border border-white hover:border-transparent rounded-full inline-block mb-4">
                  Iniciar Sesión
                </a>
              </div>
          </div>
          
          <div v-else
            class="flex justify-center px-3 mx-auto text-white course rounded"
            :class="course.color">
              <div class="w-full lg:w-4/5 xl:w-3/5 py-20 lg:py-32">
                <svg class="w-20 h-20 fill-current mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zM136 208c0-17.7 14.3-32 32-32s32 14.3 32 32-14.3 32-32 32-32-14.3-32-32zm187.3 183.3c-31.2-9.6-59.4-15.3-75.3-15.3s-44.1 5.7-75.3 15.3c-11.5 3.5-22.5-6.3-20.5-18.1 7-40 60.1-61.2 95.8-61.2s88.8 21.3 95.8 61.2c2 11.9-9.1 21.6-20.5 18.1zM328 240c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"/></svg>
                <h2 class="font-hairline text-2xl mb-3">Necesitas Iniciar Sesión</h2>
                <p class="sm:leading-normal text-base mb-8">Lo siento, para acceder a esta lección es necesario tener una <strong class="italic">cuenta</strong> o una <strong class="italic">membresia</strong> en <strong class="italic">Más Código</strong>.</p>
                <a href="/register" 
                  class="bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-2 px-6 border border-white hover:border-transparent rounded-full inline-block mb-4">
                  Suscribete
                </a>
                <a href="/login" 
                  class="ml-3 bg-transparent shadow hover:bg-white text-white-700 font-semibold hover:text-black py-2 px-6 border border-white hover:border-transparent rounded-full inline-block mb-4">
                  Iniciar Sesión
                </a>
              </div>
          </div>
        </div>

      </div>
    </div>

    <div class="flex justify-content flex-wrap mx-auto lg:hidden xl:hidden">
      <ul class="flex lesson flex-col w-full list-reset select-none rounded-lg" :class="course.color">
        <li :class="course.color" class="flex course sticky top-0 bg-white flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
          <img v-if="course.icon != null" class="bg-black-trans p-1 flex justify-center items-center flex-no-shrink w-12 h-12 rounded-full font-semibold text-white mr-3" 
            :src="course.icon" loading="lazy">
          <div v-else class="icon border border-white flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 rounded-full font-semibold text-xl text-white mr-3">
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
          :key="index" class="flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2 cursor-pointer bg-white"
          :class="row.id == lesson.id ? 'bg-gray-400' : ''" v-on:click="showLesson(course.slug, row.order)">
          <div class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
            <div v-if="!completes.includes(row.id)" class="text-center">
              <svg v-if="row.id == lesson.id" class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>
              <svg v-else-if="row.is_private" class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
              <svg v-else class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M423.5 0C339.5.3 272 69.5 272 153.5V224H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48h-48v-71.1c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v80c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-80C576 68 507.5-.3 423.5 0z"/></svg>
            </div>
            <svg v-else title="Lección completada" class="w-5 h-5 inline-block fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
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

    <div class="container mx-auto mb-8">
      <div class="flex justify-center flex-wrap">
        <div class="flex flex-wrap w-full lg:2-4/5 xl:w-4/5  items-start content-start mx-auto">
          <label for="panel-1" 
            class="panel-header relative w-full lg:rounded-t font-bold px-4 py-2 bg-gray-200 mt-3">
            <div class="grid grid-rows-2 grid-flow-col">
              <div class="row-span-1 col-span-2">
                {{ lesson.title }}
              </div>
              <div class="row-span-1 col-span-2 text-xs font-normal text-gray-600">
                {{ lesson.published_human }} <span class="ml-4" :title="lesson.views + ' reproducciones'">{{ number_views }} reproducciones</span>
              </div>
              <div class="row-span-2 col-span-1 text-right text-xs font-normal justify-center">
                <like :logged="logged" :lesson="lesson"></like>
              </div>
            </div>
          </label>
          <div v-show="lesson.content != null && lesson.content != '' && init" 
            class="lesson-about accordion__content overflow-hidden w-full bg-white lg:rounded-b p-4 leading-relaxed lg:border markdown-body" 
            v-html="parse">
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Vue from 'vue'
import VuePlyr from 'vue-plyr'
import 'vue-plyr/dist/vue-plyr.css'
import { constants } from 'crypto';
import hljs from 'highlight.js';
import 'highlight.js/styles/github.css';
window.hljs = hljs;
import Like from './Like.vue'

import Resource from '@/api/resource';
const resource = new Resource();

Vue.use(VuePlyr)

export default {
  components: {
    Like
  },
  props: {
    course: {
      type: Object
    },
    lesson: {
      type: Object
    },
    logged: {
      type: Boolean,
      default: false
    },
    user: {
      type: Object
    },
    completes: {
      type: Array,
      default: []
    }
  },
  data : () => ({
    domain: config.domain,
    total: 0,
    comment: "",
    start: false,
    timer: {
      counter: 0,
      total: 0,
      history: 0,
      completed: 0
    },
    options: {
      mention: false,
      listol: false,
      listtask: false,
      listul: false,
      quote: false,
      style: "max-height:200px"
    }
  }),
  mounted () {
    this.total = this.course.lessons.length
    if ( this.init ) this.player.config.autoplay = true

    this.timer.total = window.Helper.toSeconds(this.lesson.duration)
    this.timer.history = window.Helper.percent(this.timer.total, 20)
    this.timer.completed = window.Helper.percent(this.timer.total, 85)

    this.interval = setInterval(() => {
      this.timerCount();
    }, 1000);
  },
  computed: {
    player () { 
      return this.$refs.plyr.player
    },
    parse() {
      marked.setOptions({
        highlight: (code) => {
          return hljs.highlightAuto(code).value
        },
        sanitize: true
      })
      return this.lesson.content != null ? marked(this.lesson.content) : marked('')
    },
    init () {
      return !this.lesson.is_private || 
        this.lesson.is_private && this.logged && !this.lesson.is_premium || 
        this.lesson.is_private && this.logged && this.lesson.is_premium && this.user.is_premium
    },

    number_views () {
      return window.Helper.number_short(this.lesson.views, true);
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
    },
    
    play: function () {
      this.start = true;
    },
    
    pause: function () {
      this.start = false
    },
    
    validPlayer: function () {
      return true;
    },
    
    async storeCompletedLesson () {
      let params = {
        lesson: this.lesson.id,
        course: this.course.id
      }
      const { data } = await resource.post('admin/academic/completed/store', params);
    },
    
    async storeHistoryLesson () {
      let params = {
        lesson: this.lesson.id
      }
      const { data } = await resource.post('admin/academic/history/store', params);
    },

    timerCount: function () {
      if (this.start) this.timer.counter++

      if ( window.Helper.viewed(this.timer.completed, this.timer.counter) ) {
        this.storeCompletedLesson()
      }

      if ( window.Helper.histored(this.timer.history, this.timer.counter) ) {
        this.storeHistoryLesson()
      }
    }
  }
}
</script>

<style>
  @media (min-width: 1024px) {
    .plyr--video {
      border-radius: 0.5rem;
    }
  }

  .accordion__content{
    max-height: 100em;
    display: inline-block;
    transition: all 0.4s cubic-bezier(0.865, 0.14, 0.095, 0.87);
  }
  .plyr--full-ui input[type=range] {
    color: #A81C4E;
  }
  .plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true] {
    background: #A81C4E;
  }
  .plyr__control--overlaid {
    background: #A81C4E;
  }
</style>