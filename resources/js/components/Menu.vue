<template>
  <nav class="w-full z-50 text-white hero" :class="fixed ? 'fixed' : ''">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
      <div class="pl-4 flex items-center">
        <a class="uppercase no-underline hover:no-underline font-bold text-2xl text-shadow-2xl"  href="/"> 
          Más Código
        </a>
      </div>
      <div class="block lg:hidden pr-4">
        <button id="nav-toggle" v-on:click="show = !show" :class="show ? 'change' : ''" class="items-center px-3 py-2 appearance-none focus:outline-none">
          <div class="bar1"></div><div class="bar2"></div><div class="bar3"></div>
        </button>
      </div>
      <div id="nav-content" :class="!show ? 'hidden' : ''" class="w-full flex-grow lg:flex lg:items-center lg:w-auto lg:block mt-2 lg:mt-0 text-black p-4 lg:p-0 z-20">
        <ul class="list-reset lg:flex justify-end flex-1 items-center">
          <li class="mr-3">
            <a class="w-full text-white font-bold uppercase inline-block py-2 px-4 text-black no-underline" href="#">Inicia Sesión</a>
          </li>
          <li class="mr-3 lg:hidden">
            <a class="uppercase w-full text-white inline-block py-2 px-4 text-black no-underline" href="/blog">
              Blog
            </a>
          </li>
          <li class="mr-3 lg:hidden">
            <a class="uppercase w-full text-white inline-block py-2 px-4 text-black no-underline" href="/courses">
              Cursos
            </a>
          </li>
          <li class="mr-3 lg:hidden">
            <a class="uppercase w-full text-white inline-block py-2 px-4 text-black no-underline" href="/about">
              Acerca
            </a>
          </li>
          <li class="mr-3">
            <a v-on:click="toggleModal" class="cursor-pointer uppercase w-full text-white inline-block py-2 px-4 text-black no-underline">
              <svg class="fa h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!--modal-->
    <div @keydown.esc="toggleModal" @click="toggleModal" v-if="search" class="modal absolute top-0 h-screen w-full flex flex-col items-center justify-center">
      <div @click.stop class="modal-container w-full bg-white rounded m-4 text-center overflow-auto">
        <button class="close">X</button>
        <div class="modal-header sticky top-0 bg-white p-2">
          <input 
            class="appearance-none text-2xl block w-full text-gray-700 bg-gray-100 border-t border-b border-gray-300 py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white"
            :placeholder="type == 'learn' ? 'Buscar Lección...' : 'Buscar Post...'" v-model="query" spellcheck="false" autofocus>
            <div class="absolute" style="top:1.4rem;right:0.75rem;">
              <svg class="fill-current pointer-events-none text-gray-800 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
              </svg>
            </div>
        </div>
        <div class="modal-body px-3 scrollbar">
          <ul v-if="type == 'learn'" class="text-left lesson">
            <li v-show="loading">
              <div class="loader">Cargando...</div>
            </li>
            <li v-for="(item, index) in filteredData"
              :key="index" class="flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2 cursor-pointer bg-white"
              v-on:click="showLesson(item.course.slug, item.order)">
              <a :href="domain + 'skill/' + item.course.skill.slug" :class="item.course.color" class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
                <img :src="item.course.icon" alt="">
              </a>
              <div class="flex-1 min-w-0">
                <div class="flex justify-between mb-1">
                  <a :href="domain + 'course/' + item.course.slug" class="font-semibold text-base uppercase">{{ item.course.title }}</a>
                  <time class="text-xs text-grey-dark">{{ item.duration }}</time>
                </div>
                <div class="text-base text-gray-700">
                  <p class="text-gray-700"><span class="font-bold">Lección {{ item.order }}: </span> {{ item.title }}</p>
                </div>
              </div>
            </li>
          </ul>
          <ul v-else class="text-left lesson">
            <li v-show="loading">
              <div class="loader">Cargando...</div>
            </li>
            <li v-for="(item, index) in filteredDataPost"
              :key="index" class="flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2 cursor-pointer bg-white"
              v-on:click="showPost(item.course.slug, item.order)">
              <a :href="domain + 'category/' + item.category.slug" class="red flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 mr-3">
                <img :src="item.image" alt="">
              </a>
              <div class="flex-1 min-w-0">
                <div class="flex justify-between mb-1">
                  <a :href="domain + 'category/' + item.category.slug" class="font-semibold text-base uppercase">{{ item.category.title }}</a>
                  <time class="text-xs text-grey-dark">{{ item.duration }}</time>
                </div>
                <div class="text-base text-gray-700">
                  <p class="text-gray-700">{{ item.title }}</p>
                </div>
              </div>
            </li>
          </ul>
          <small class="text-xs uppercase text-gray-600">presione ESC o click fuera del panel para salir</small>
        </div>
      </div>
    </div>
    <!--modal-->

  </nav>
</template>

<script>
import { constants } from 'crypto';
export default {
  props: ['fixed', 'type'],
  data: () => ({
    domain: config.domain,
    show: false,
    search: false,
    loading: false,
    query: "",
    data: []
  }),
  created () {
    if ( this.type == 'learn' )
      this.fetchData()
    else
      this.fetchPosts()
  },
  computed: {
    filteredData () {
      if(this.query) {
        return this.data.filter((item) => {
          return item.title.toLowerCase().startsWith(this.query) || item.course.title.toLowerCase().startsWith(this.query);
        })
      } else {
        return [];
      }
    },

    filteredDataPost () {
      if(this.query) {
        return this.data.filter((item) => {
          return item.title.toLowerCase().startsWith(this.query) || item.category.title.toLowerCase().startsWith(this.query);
        })
      } else {
        return [];
      }
    }
  },
  methods: {
    toggleModal: function () {
      this.query = ''
      this.search = !this.search
    },

    fetchData: function () {
      this.loading = true
      $http.post('/api/data/search')
        .then(response => {
          this.data = response.data.data
        })
        .catch(error => {
          message = error.response.data.message || error.message
        })
        .finally(() => {
          this.loading = false
        })
    },

    fetchPosts: function () {
      this.loading = true
      $http.post('/api/data/search/post')
        .then(response => {
          this.data = response.data.data
        })
        .catch(error => {
          message = error.response.data.message || error.message
        })
        .finally(() => {
          this.loading = false
        })
    },

    showLesson: function (course, order) {
      window.location = this.domain + 'course/'+ course +'/lesson/' + order;
    },

    showPost: function (slug) {
      window.location = this.domain + slug;
    },
  }
}
</script>

<style>
  .modal {
    background-color: rgba(0,0,0,.4);
    z-index: 100 ;
  }
  .modal-container {
    max-width: 700px;
    min-width: 50%;
    max-height: 100vh;
    position: relative;
  }
  .modal-container .close {
    position: absolute;
    top: 0;
    right: 0px;
    background: #000;
    width: 25px;
    height: 25px;
    border-radius: 50%;
  }

  .modal-container::-webkit-scrollbar {
	  width: 8px;
	  background-color: #F5F5F5;
  }
  .modal-container::-webkit-scrollbar-track {
	  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	  background-color: #F5F5F5;
	  border-radius: 10px;
  }

  .modal-container::-webkit-scrollbar-thumb {
	  border-radius: 10px;
    background-image: -webkit-gradient(linear, left bottom, left top, color-stop(0.44, rgb(224, 95, 95)), color-stop(0.72, rgb(180, 43, 94)), color-stop(0.86, rgb(226, 37, 54)));
    background-image: gradient(linear, left bottom, left top, color-stop(0.44, rgb(224, 95, 95)), color-stop(0.72, rgb(180, 43, 94)), color-stop(0.86, rgb(226, 37, 54)));
  }
</style>