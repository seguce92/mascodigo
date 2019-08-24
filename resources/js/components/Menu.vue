<template>
  <nav class="w-full z-50 text-white">
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
    <search v-model="search"></search>
  </nav>
</template>

<script>
import { constants } from 'crypto';
export default {
  data: () => ({
    show: false,
    search: false
  }),
  methods: {
    toggleModal: function () {
      this.search = !this.search
      console.log(this.search)
    }
  }
}
</script>