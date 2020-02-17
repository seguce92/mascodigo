<template>
    <div class="flex flex-wrap-reverse lg:flex-wrap mt-8 relative">
        <aside class="w-full lg:w-1/4 mb-4 lg:pr-2">
            <div class="lg:sticky lg:top-0 lg:pt-5">
                <a @click="toggleModal" class="w-full cursor-pointer inline-block text-center bg-red-700 hover:bg-red-800 text-white py-2 px-5 rounded-full">
                    RESPONDER</a>
                <div class="my-6">
                    <a href="#" class="w-full inline-block text-lg text-blue-600 hover:text-blue-700 hover:underline">
                        <svg class="2-4 h-4 fill-current inline-block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M576 240c0-23.63-12.95-44.04-32-55.12V32.01C544 23.26 537.02 0 512 0c-7.12 0-14.19 2.38-19.98 7.02l-85.03 68.03C364.28 109.19 310.66 128 256 128H64c-35.35 0-64 28.65-64 64v96c0 35.35 28.65 64 64 64h33.7c-1.39 10.48-2.18 21.14-2.18 32 0 39.77 9.26 77.35 25.56 110.94 5.19 10.69 16.52 17.06 28.4 17.06h74.28c26.05 0 41.69-29.84 25.9-50.56-16.4-21.52-26.15-48.36-26.15-77.44 0-11.11 1.62-21.79 4.41-32H256c54.66 0 108.28 18.81 150.98 52.95l85.03 68.03a32.023 32.023 0 0019.98 7.02c24.92 0 32-22.78 32-32V295.13C563.05 284.04 576 263.63 576 240zm-96 141.42l-33.05-26.44C392.95 311.78 325.12 288 256 288v-96c69.12 0 136.95-23.78 190.95-66.98L480 98.58v282.84z"/></svg>
                        Todos las Discusiones
                    </a>
                </div>
                <nav class="channels">
                    <ul>
                        <li><div class="channel text-blue-600">#</div> General</li>
                        <li><div class="channel text-yellow-600">#</div> JavaScript</li>
                        <li><div class="channel text-red-500">#</div> Laravel</li>
                        <li><div class="channel text-green-600">#</div> Vue Js</li>
                        <li><div class="channel text-blue-700">#</div> Php</li>
                        <li><div class="channel text-red-700">#</div> Angular</li>
                        <li><div class="channel text-blue-700">#</div> Php</li>
                    </ul>
                </nav>
            </div>
        </aside>

        <section class="w-full lg:w-3/4 lg:pl-4">
            <div class="flex flex-wrap px-3 py-4 mb-4 bg-gray-200 rounded-lg">
                <div class="w-full lg:w-5/6">
                    <div>
                        <a href="#" class="text-xl font-semibold">Titulo de discusion</a>
                        <a href="#" class="ml-2 bg-red-700 shadow px-4 py-1 rounded-full text-white text-xs">Channel</a>
                    </div>
                </div>
                <div class="w-full lg:w-1/6 hidden lg:inline-block text-right my-auto">
                    <span class="inline-block mr-2 text-gray-600">
                        <svg class="w-4 h-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M532 386.2c27.5-27.1 44-61.1 44-98.2 0-80-76.5-146.1-176.2-157.9C368.3 72.5 294.3 32 208 32 93.1 32 0 103.6 0 192c0 37 16.5 71 44 98.2-15.3 30.7-37.3 54.5-37.7 54.9-6.3 6.7-8.1 16.5-4.4 25 3.6 8.5 12 14 21.2 14 53.5 0 96.7-20.2 125.2-38.8 9.2 2.1 18.7 3.7 28.4 4.9C208.1 407.6 281.8 448 368 448c20.8 0 40.8-2.4 59.8-6.8C456.3 459.7 499.4 480 553 480c9.2 0 17.5-5.5 21.2-14 3.6-8.5 1.9-18.3-4.4-25-.4-.3-22.5-24.1-37.8-54.8zm-392.8-92.3L122.1 305c-14.1 9.1-28.5 16.3-43.1 21.4 2.7-4.7 5.4-9.7 8-14.8l15.5-31.1L77.7 256C64.2 242.6 48 220.7 48 192c0-60.7 73.3-112 160-112s160 51.3 160 112-73.3 112-160 112c-16.5 0-33-1.9-49-5.6l-19.8-4.5zM498.3 352l-24.7 24.4 15.5 31.1c2.6 5.1 5.3 10.1 8 14.8-14.6-5.1-29-12.3-43.1-21.4l-17.1-11.1-19.9 4.6c-16 3.7-32.5 5.6-49 5.6-54 0-102.2-20.1-131.3-49.7C338 339.5 416 272.9 416 192c0-3.4-.4-6.7-.7-10C479.7 196.5 528 238.8 528 288c0 28.7-16.2 50.6-29.7 64z"/></svg>
                        0
                    </span>
                    <span class="inline-block text-gray-600">
                        <svg class="w-4 h-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 144a110.94 110.94 0 00-31.24 5 55.4 55.4 0 017.24 27 56 56 0 01-56 56 55.4 55.4 0 01-27-7.24A111.71 111.71 0 10288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 000 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 000-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"/></svg>
                        0
                    </span>
                </div>
            </div>

            <transition name="slide-fade">
                <article class="flex px-3 py-4 rounded-lg hover:bg-gray-200 relative mb-3">
                    <div class="flex-shrink pr-3 relative h-16">
                        <img class="w-16 h-16 rounded-full border-white border-2 shadow-lg" src="img/user.jpg" alt="User">
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-5/6 p-3">
                                <div class="mb-2">
                                    <a href="#" class="text-blue-600 font-semibold">seguce92</a> <small class="text-gray-600 text-xs ml-2">Publicado hace 15 hrs</small>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/6 hidden lg:inline-block text-right my-auto">
                                <span class="text-white text-xs bg-green-500 py-1 px-2 rounded-lg shadow-lg">
                                    Mejor Respuesta
                                </span>
                            </div>
                        </div>
                        <div class="markdown-body p-3">
                            <p>
                                Tempor magna est dolor aute laborum id dolore quis est commodo sunt consectetur cillum consectetur. Irure exercitation culpa excepteur duis irure nisi eiusmod. Incididunt fugiat ipsum sint nisi commodo.
                                Aliqua occaecat nostrud laboris elit eiusmod veniam nostrud officia nostrud eu eu veniam labore laborum. Aliqua do ad cupidatat amet cupidatat exercitation. Pariatur commodo veniam enim ad ex in occaecat commodo. Sint ex eu laborum nulla cupidatat voluptate consectetur consectetur minim laborum laboris.    
                                Ullamco proident reprehenderit commodo deserunt occaecat. Ipsum aute ullamco proident sunt excepteur irure incididunt fugiat sunt. Est labore ad laborum ea elit. Ad aliqua anim dolor labore sunt eiusmod ad minim voluptate est nisi et. Do aute laboris commodo ullamco velit eiusmod pariatur.
                                Ut commodo commodo nisi tempor sit irure consectetur fugiat aliqua nisi adipisicing et. Eiusmod excepteur culpa incididunt aliquip ea irure occaecat nulla reprehenderit irure nostrud ad consectetur. Elit occaecat excepteur sunt fugiat nisi consectetur. Eiusmod non elit est magna cupidatat aute commodo quis ea. Reprehenderit sint eu cupidatat non culpa enim in exercitation.
                                Duis culpa labore non nulla ex minim ipsum reprehenderit anim veniam magna consequat. Aliqua nisi deserunt irure officia consectetur sunt minim nulla ex esse voluptate qui. Culpa amet aliqua magna consequat mollit culpa officia ea dolore ut anim incididunt nisi. Cupidatat voluptate qui mollit aute ex cillum.
                            </p>
                        </div>
                    </div>
                </article>
            </transition>

        </section>

        <transition name="slide-fade">
            <div v-if="modal" class="discussion-overlay w-full h-screen fixed z-50 overflow-hidden top-0 left-0">
                <div class="discussion fixed bg-white bg-white h-screen relative">
                    <h2 class="border-b p-4 text-lg text-grey font-semibold">Responder a <span class="text-blue-600">Conversacion</span></h2>
                    <span @click="preview = !preview" class="absolute top-0 right-0 cursor-pointer px-4 py-5 font-semibold">
                        {{ preview ? 'Editar' : 'Vista Previa' }}
                    </span>
                    <div class="w-full px-4 mt-6">
                        <textarea v-if="!preview" class="editor bg-white focus:bg-gray-100 rounded py-4" autofocus :value="input" @input="update"></textarea>
                        <div v-else class="preview markdown-body rounded py-4 select-none" v-html="compiledMarkdown"></div>
                    </div>
                    <div class="w-full border-t absolute bottom-0 p-4 text-right">
                        <button @click="toggleModal" class="border border-red-600 w-32 hover:bg-red-600 hover:text-white text-red-600 font-bold py-2 px-4 rounded-full lg:mr-2">Cancelar</button>
                        <button class="bg-red-600 w-32 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Enviar</button>
                    </div>
                </div>
            </div>
        </transition>

    </div>
</template>

<script>
export default {
    name: 'discussion',
    props: {

    },
    data: () => ({
        modal: false,
        input: '',
        preview: false
    }),
    computed: {
        compiledMarkdown: function () {
            return marked(this.input, { sanitize: true })
        }
    },
    created() {

    },
    methods: {
        toggleModal() {
            this.modal = !this.modal
        },

        update: _.debounce(function (e) {
            this.input = e.target.value
        }, 300)
    }
}
</script>

<style lang="css" scoped>
    .discussion-overlay {
        background-color: rgba(0,0,0,.7);
    }
    .discussion {
        width: 100%;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
    }

    .editor {
        display: block;
        width: 100%;
        resize: none;
        height: calc(100vh - 160px);

        -moz-appearance: none;
        -webkit-appearance: none;
        -webkit-box-align: center;
        align-items: center;

         outline:none !important;
        outline-width: 0 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }

    .preview {
        display: block;
        width: 100%;
        height: calc(100vh - 160px);
        overflow-y: scroll;

        -moz-appearance: none;
        -webkit-appearance: none;
        -webkit-box-align: center;
        align-items: center;

         outline:none !important;
        outline-width: 0 !important;
        box-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
    }

    .slide-fade-enter-active {
        transition: all .8s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateX(10px);
        opacity: 0;
    }

    @media (min-width: 769px) {
        .discussion {
            width: 50%
        }
    }
</style>