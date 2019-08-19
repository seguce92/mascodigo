<template>
  <div v-if="show" class="modal absolute top-0 h-screen w-full flex flex-col items-center justify-center">
    <div class="modal-container w-full bg-white rounded m-4 text-center overflow-y-scroll">
      <div class="modal-header sticky top-0 bg-white p-2">
        <input 
          class="appearance-none block w-full bg-gray-100 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
          placeholder="Escribe aqui.." autofocus>
      </div>
      <div class="modal-body px-3 pb-3 scrollbar">
        <ul class="text-left">
          <li v-for="(row, index) in items"
            :key="index" class="flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-2 cursor-pointer bg-white">
            <div class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
              <svg class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <div class="flex justify-between mb-1">
                <h2 class="font-semibold text-xs">Lección alskdñalksd</h2>
                <time class="text-xs text-grey-dark">asda</time>
              </div>
              <div class="text-sm text-grey-dark">
                <p class="text-gray-700">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur excepturi consectetur veritatis quod eveniet dolorum rerum nulla commodi aliquid beatae eius voluptate deleniti nobis ducimus, dignissimos vel facere impedit! Suscipit!</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['show'],
  data: () => ({
    data: {}
  }),
  methods: {
    toggleModal() {
      this.modal = !this.modal
    },

    fetchData: function () {

    }
  }
}
</script>

<style>
  .modal {
    background-color: rgba(0,0,0,.5);
    z-index: 100 
  }
  .modal-container {
    max-width: 700px;
    min-width: 50%;
    max-height: 100vh
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