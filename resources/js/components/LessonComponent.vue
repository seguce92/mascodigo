<template>
  <section class="mx-auto">
    <div class="w-full mx-auto bg-gray-200 p-0 lg:p-2 lg:pb-0 xl:pl-20 xl:pr-20">
      <div class="flex justify-content flex-wrap mx-auto lg:pb-2">
        
        <div class="flex-grow self-start hidden lg:block bg-white shadow-lg mr-4 collection ml-auto rounded-lg overflow-y-scroll">
          <ul class="flex lesson flex-col w-full list-reset select-none" :class="course.color">
            <li :class="course.color" class="flex course sticky top-0 bg-white flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
              <img v-if="course.icon != null" class="p-1 bg-black-trans flex justify-center items-center flex-no-shrink w-12 h-12 rounded-full font-semibold text-white mr-3" 
                :src="course.icon">
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
          <vue-plyr v-if="lesson.server == 'youtube' || lesson.server == 'vimeo'" ref="plyr" :emit="['ended']" @ended="ended" class="rounded-none lg:rounded-lg">
            <div :data-plyr-provider="lesson.server" :data-plyr-embed-id="lesson.url"></div>
          </vue-plyr>

          <vue-plyr v-else ref="plyr" :emit="['ended']" @ended="ended" class="rounded-none lg:rounded-lg">
            <video poster="poster.png" :src="lesson.url"></video>
          </vue-plyr>
        </div>

      </div>
    </div>

    <div class="flex justify-content flex-wrap mx-auto lg:hidden xl:hidden">
      <ul class="flex lesson flex-col w-full list-reset select-none rounded-lg" :class="course.color">
        <li :class="course.color" class="flex course sticky top-0 bg-white flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2">
          <img v-if="course.icon != null" class="bg-black-trans p-1 flex justify-center items-center flex-no-shrink w-12 h-12 rounded-full font-semibold text-white mr-3" 
            :src="course.icon">
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

    <div class="container mx-auto mb-8">
      <div class="flex justify-center flex-wrap">
        <div class="flex flex-wrap w-full lg:2-4/5 xl:w-4/5  items-start content-start mx-auto">
          <input type="checkbox" name="panel" id="panel-1" class="hidden" checked>
          <label for="panel-1" class="panel-header relative w-full lg:rounded-t uppercase font-bold px-4 py-2 bg-gray-300 mt-3">Notas de la lección</label>
          <div v-show="lesson.content != null && lesson.content != ''" 
            class="lesson-about accordion__content overflow-hidden w-full bg-white lg:rounded-b px-4 py-2 leading-relaxed lg:border markdown-body" v-html="parse">
          </div>

          <!-- comments -->
          <!--h4 class="w-full lg:rounded uppercase font-bold bg-gray-300 px-4 py-2 mt-3 mb-3">COMENTARIOS / DISCUSIÓN</h4> 
          <div class="comments w-full bg-white py-2 p-3">
            <div class="flex items-start mb-4 text-sm">
                <img src="https://pbs.twimg.com/profile_images/887661330832003072/Zp6rA_e2_400x400.jpg" class="w-10 h-10 rounded mr-3" />
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold">Adam Wathan</span>
                        <span class="text-grey text-xs">12:45</span>
                    </div>
                    <p class="text-black leading-normal">How are we supposed to control the marquee space without an utility for it? I propose this:</p>
                    <div class="bg-grey-lighter border border-grey-light text-grey-darkest text-sm font-mono rounded p-3 mt-2 whitespace-pre overflow-scroll">
                      .marquee-lightspeed { -webkit-marquee-speed: fast; }
                      .marquee-lightspeeder { -webkit-marquee-speed: faster; }
                    </div>
                </div>
            </div>
            <div class="reply">
              <div class="flex items-start mb-4 text-sm">
                  <img src="https://pbs.twimg.com/profile_images/887661330832003072/Zp6rA_e2_400x400.jpg" class="w-10 h-10 rounded mr-3" />
                  <div class="flex-1 overflow-hidden">
                      <div>
                          <span class="font-bold">Adam Wathan</span>
                          <span class="text-grey text-xs">12:45</span>
                      </div>
                      <p class="text-black leading-normal">How are we supposed to control the marquee space without an utility for it? I propose this:</p>
                      <div class="bg-grey-lighter border border-grey-light text-grey-darkest text-sm font-mono rounded p-3 mt-2 whitespace-pre overflow-scroll">
                        .marquee-lightspeed { -webkit-marquee-speed: fast; }
                        .marquee-lightspeeder { -webkit-marquee-speed: faster; }
                      </div>
                  </div>
              </div>
              <div class="flex items-start mb-4 text-sm">
                  <img src="https://pbs.twimg.com/profile_images/887661330832003072/Zp6rA_e2_400x400.jpg" class="w-10 h-10 rounded mr-3" />
                  <div class="flex-1 overflow-hidden">
                      <div>
                          <span class="font-bold">Adam Wathan</span>
                          <span class="text-grey text-xs">12:45</span>
                      </div>
                      <p class="text-black leading-normal">How are we supposed to control the marquee space without an utility for it? I propose this:</p>
                      <div class="bg-grey-lighter border border-grey-light text-grey-darkest text-sm font-mono rounded p-3 mt-2 whitespace-pre overflow-scroll">
                        .marquee-lightspeed { -webkit-marquee-speed: fast; }
                        .marquee-lightspeeder { -webkit-marquee-speed: faster; }
                      </div>
                  </div>
              </div>
            </div>
            <div class="flex items-start mb-4 text-sm">
              <img src="https://pbs.twimg.com/profile_images/887661330832003072/Zp6rA_e2_400x400.jpg" class="w-10 h-10 rounded mr-3" />
              <div class="flex-1 overflow-hidden">
                  <div>
                      <span class="font-bold">David Hemphill</span>
                      <span class="text-grey text-xs">12:46</span>
                  </div>
                  <p class="text-black leading-normal"><a href="#" class="inline-block bg-blue-lightest text-blue no-underline">@Adam Wathan</a> the size of the generated CSS is creating a singularity in space/time, we must stop adding more utilities before it's too late!</p>
              </div>
            </div>

            <div class="comment-box">
              <markdown v-model="comment" :options="options"></markdown>
              <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-3 border border-blue-500 hover:border-transparent rounded">
                Enviar Comentario
              </button>
            </div>
          </div-->
          <!-- comments -->
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

Vue.use(VuePlyr)
export default {
  props: ["course", 'lesson'],
  data : () => ({
    domain: config.domain,
    total: 0,
    comment: "",
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
    this.player.config.autoplay = true
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

<style>
  @media (min-width: 1024px) {
    .plyr--video {
      border-radius: 0.5rem;
    }
  }

  .panel-header:after {
    content: '+';
    position: absolute;
    right: .5em;
    color: #000;
    font-size: 20px;
    line-height: 1.5;
  }

  input:checked + .panel-header:after {
    content: '-';
    font-size: 25px;
    line-height: 1;
  }

  .accordion__content{
    max-height: 0em;
    display: none;
    transition: all 0.4s cubic-bezier(0.865, 0.14, 0.095, 0.87);
  }
  
  input[name='panel']:checked ~ .accordion__content {
    max-height: 100em;
    display: inline-block;
  }
</style>