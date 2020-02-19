<template>
    <div class="flex flex-wrap-reverse lg:flex-wrap mt-8 relative">
        <notifications group="foo" position="bottom right" />
        <aside class="w-full lg:w-1/4 mb-4 lg:pr-2">
            <div class="lg:sticky lg:top-0 lg:pt-5">
                <a @click="toggleModal" class="w-full cursor-pointer inline-block text-center bg-red-700 hover:bg-red-800 text-white py-2 px-5 rounded-full">
                    NUEVA DISCUSIÓN
                </a>
                <div class="my-6">
                    <a href="/discussions" class="w-full inline-block text-lg text-blue-600 hover:text-blue-700 hover:underline">
                        <svg class="2-4 h-4 fill-current inline-block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M576 240c0-23.63-12.95-44.04-32-55.12V32.01C544 23.26 537.02 0 512 0c-7.12 0-14.19 2.38-19.98 7.02l-85.03 68.03C364.28 109.19 310.66 128 256 128H64c-35.35 0-64 28.65-64 64v96c0 35.35 28.65 64 64 64h33.7c-1.39 10.48-2.18 21.14-2.18 32 0 39.77 9.26 77.35 25.56 110.94 5.19 10.69 16.52 17.06 28.4 17.06h74.28c26.05 0 41.69-29.84 25.9-50.56-16.4-21.52-26.15-48.36-26.15-77.44 0-11.11 1.62-21.79 4.41-32H256c54.66 0 108.28 18.81 150.98 52.95l85.03 68.03a32.023 32.023 0 0019.98 7.02c24.92 0 32-22.78 32-32V295.13C563.05 284.04 576 263.63 576 240zm-96 141.42l-33.05-26.44C392.95 311.78 325.12 288 256 288v-96c69.12 0 136.95-23.78 190.95-66.98L480 98.58v282.84z"/></svg>
                        Todas las Discusiones
                    </a>
                </div>
                <nav class="channels">
                    <ul>
                        <a class="w-full inline-block"
                            :class="ch.slug === channel ? 'font-semibold' : ''"
                            v-for="ch in channels" :key="ch.slug"
                            :href="ch.slug === channel ? '#' : '/discussions?channel=' + ch.slug">
                            <div class="w-2 channel inline-block" :class="ch.icon">#</div> {{ ch.title }}
                        </a>
                    </ul>
                </nav>
            </div>
        </aside>

        <section class="w-full lg:w-3/4 lg:pl-4">
            <article v-for="d in discussions" :key="d.id" class="flex px-3 py-4 rounded-lg hover:bg-gray-200 relative mb-3">
                <div class="flex-shrink pr-3 relative h-16">
                    <img class="w-16 h-16 rounded-full border-white border-2 shadow-lg" :src="d.user.photo" alt="Icon">
                    <div title="Esta discusion ya fue marcada como solucionado" class="absolute bottom-0 left-0 rounded-full w-6 h-6 bg-green-600 text-center shadow-lg">
                        <svg class="w-4 h-4 inline-block fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-5/6">
                            <div>
                                <a :href="'/discussion/' + d.slug" class="font-semibold">{{ d.title }}</a>
                                <a :href="'/discussions?channel=' + d.channel.slug" class="ml-2 bg-red-700 shadow px-4 py-1 rounded-full text-white text-xs">{{ d.channel.title }}</a>
                            </div>
                            <div class="text-xs mb-2">
                                <a :href="'/me/' + d.user.username" class="text-blue-600 font-semibold">{{ d.user.username }}</a> <small class="text-gray-600">Publicado {{ d.created_human }}</small>
                            </div>
                            <div class="text-sm">
                                <p class="text-gray-700 overflow-hidden">aksdj añlskdñalks dñlaksñldkañls dkñlaks ñdlkañsdk ñaskd ñlaksñdl ka</p>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/6 hidden lg:inline-block text-right my-auto">
                            <span class="inline-block mr-2 text-gray-600">
                                <svg class="w-4 h-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M532 386.2c27.5-27.1 44-61.1 44-98.2 0-80-76.5-146.1-176.2-157.9C368.3 72.5 294.3 32 208 32 93.1 32 0 103.6 0 192c0 37 16.5 71 44 98.2-15.3 30.7-37.3 54.5-37.7 54.9-6.3 6.7-8.1 16.5-4.4 25 3.6 8.5 12 14 21.2 14 53.5 0 96.7-20.2 125.2-38.8 9.2 2.1 18.7 3.7 28.4 4.9C208.1 407.6 281.8 448 368 448c20.8 0 40.8-2.4 59.8-6.8C456.3 459.7 499.4 480 553 480c9.2 0 17.5-5.5 21.2-14 3.6-8.5 1.9-18.3-4.4-25-.4-.3-22.5-24.1-37.8-54.8zm-392.8-92.3L122.1 305c-14.1 9.1-28.5 16.3-43.1 21.4 2.7-4.7 5.4-9.7 8-14.8l15.5-31.1L77.7 256C64.2 242.6 48 220.7 48 192c0-60.7 73.3-112 160-112s160 51.3 160 112-73.3 112-160 112c-16.5 0-33-1.9-49-5.6l-19.8-4.5zM498.3 352l-24.7 24.4 15.5 31.1c2.6 5.1 5.3 10.1 8 14.8-14.6-5.1-29-12.3-43.1-21.4l-17.1-11.1-19.9 4.6c-16 3.7-32.5 5.6-49 5.6-54 0-102.2-20.1-131.3-49.7C338 339.5 416 272.9 416 192c0-3.4-.4-6.7-.7-10C479.7 196.5 528 238.8 528 288c0 28.7-16.2 50.6-29.7 64z"/></svg>
                                {{ d.replies_total }}
                            </span>
                            <span class="inline-block text-gray-600">
                                <svg class="w-4 h-4 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M288 144a110.94 110.94 0 00-31.24 5 55.4 55.4 0 017.24 27 56 56 0 01-56 56 55.4 55.4 0 01-27-7.24A111.71 111.71 0 10288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 000 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 000-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"/></svg>
                                {{ d.views }}
                            </span>
                        </div>
                    </div>
                </div>
            </article>

        </section>

        <transition name="slide-fade">
            <div v-if="modal" class="discussion-overlay w-full h-screen fixed z-50 overflow-hidden top-0 left-0">
                <form @submit.prevent="storeDiscussion()" method="POST" autocomplete="off" class="discussion fixed bg-white bg-white h-screen relative">
                    <h2 class="p-4 text-lg text-grey font-semibold uppercase">Nueva Discusión</h2>
                    <div class="absolute top-0 right-0 h-16 p-4 inline-flex">
                        <div class="inline-block relative mr-2">
                            <select required v-model="discussion.channel" class="inline-block outline-none w-40 appearance-none bg-white border border-gray-300 hover:border-gray-400 px-2 py-1 rounded shadow leading-tight">
                                <option v-for="ch in channels" :key="ch.slug" :value="ch.slug">{{ ch.title }}</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                        <a @click="preview = !preview" class="cursor-pointer focus:outline-none outline-none hover:bg-gray-300 shadow border text-gray-800 font-bold py-2 px-2 rounded inline-flex items-center">
                            <svg v-if="preview" title="Editar" class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>
                            <svg v-else title="Previsualizar" class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M435.174 382.964c25.042-35.155 21.986-84.07-9.541-115.597-33.803-33.803-93.51-33.816-127.266 0-35.193 35.162-35.175 92.122 0 127.266 31.531 31.556 80.458 34.567 115.596 9.542l76.826 75.036L512 458l-76.826-75.036zM272 8.789V121h111.211z"/><path d="M361.985 451.015c-32.051 0-62.183-12.495-84.844-35.186-46.915-46.855-46.926-122.794.029-169.688 26.755-26.81 69.164-41.373 114.829-30.018V151H242V0H0v512h392v-65.235c-9.732 2.509-19.698 4.25-30.015 4.25zM60 181h212v30H60v-30zm152 210H60v-30h152v30zm0-60H60v-30h152v30zm0-60H60v-30h152v30z"/></svg>
                        </a>
                    </div>
                    <div class="w-full px-4">
                        <input type="text"
                            class="appearance-none border-b font-semibold border-gray-500 focus:border-red-400 w-full py-2 text-gray-700 leading-tight focus:outline-none"
                            placeholder="Titulo de la Discusión"
                            autofocus
                            required
                            minlength="5"
                            maxlength="255"
                            v-model="discussion.title">
                    </div>
                    <div class="w-full px-4 mt-6">
                        <textarea v-if="!preview" 
                            class="editor bg-white focus:bg-gray-100 py-4 border-b focus:border-red-400"
                            :value="discussion.content" 
                            @input="update"
                            required
                            minlength="40"
                            placeholder="Que quieres preguntar ?"></textarea>
                        <div v-else class="preview border-b markdown-body py-4 select-none" v-html="compiledMarkdown"></div>
                    </div>
                    <div class="w-full absolute bottom-0 p-4 text-right">
                        <a @click="toggleModal" class="cursor-pointer border border-red-600 w-32 outline-none hover:bg-red-600 hover:text-white text-red-600 font-bold py-2 px-4 rounded-full lg:mr-2 shadow-lg">Cancelar</a>
                        <button type="submit" class="bg-red-600 w-32 hover:bg-red-700 text-white outline-none font-bold py-2 px-4 rounded-full shadow-lg">Enviar</button>
                    </div>
                </form>
            </div>
        </transition>

    </div>
</template>

<script>
import hljs from 'highlight.js';
import 'highlight.js/styles/atom-one-dark-reasonable.css';

import Resource from '@/api/resource';
const resource = new Resource();

export default {
    name: 'discussion',
    props: {
        logged: {
            type: Boolean,
            default: false
        },
        channel: {
            type: String
        }
    },
    data: () => ({
        modal: false,
        preview: false,
        channels: [],
        discussions: [],
        discussion: {
            title: '',
            slug: '',
            content: '',
            channel: 'general'
        }
    }),
    computed: {
        compiledMarkdown: function () {
            marked.setOptions({
                renderer: new marked.Renderer(),
                highlight: function(code) {
                    return hljs.highlightAuto(code).value;
                },
                pedantic: false,
                gfm: true,
                tables: false,
                breaks: true,
                sanitize: true,
                smartLists: true,
                smartypants: false,
                xhtml: false
            });

            return marked(this.discussion.content)
        }
    },
    created() {
        this.loadChannels()
        this.loadDiscussions()
    },
    methods: {
        toggleModal() {
            if ( this.logged )
                this.modal = !this.modal
            else {
                window.location = '/login'
            }
        },

        update: _.debounce(function (e) {
            this.discussion.content = e.target.value
        }, 300),

        async loadChannels() {
            const { data } = await resource.get('api/data/discussions/channels');
            this.channels = data;
        },

        async loadDiscussions() {
            const { data } = await resource.get('api/data/discussions');
            this.discussions = data;
        },

        async storeDiscussion() {
            this.discussion.slug = window.Helper.slugify(this.discussion.title)
            const { data } = await resource.post('api/data/discussions/store', this.discussion);
            console.log(data)
            if ( data ) {
                this.$notify({
                    group: 'foo',
                    text: 'Discusión registrado exitosamente.',
                    duration: 2500
                });
                this.toggleModal()
                this.loadDiscussions()
            } else {
                this.$notify({
                    group: 'foo',
                    text: 'Lo siento se produjo un error al registrar.',
                    duration: 3000,
                    type: 'error'
                });
            }
        },
    }
}
</script>

<style lang="css" scoped>
    .discussion-overlay {
        background-color: rgba(0,0,0,.7);
    }
    .discussion {
        width: 100%;
        max-width: 700px;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
    }

    .editor {
        display: block;
        width: 100%;
        resize: none;
        height: calc(100vh - 200px);

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
        height: calc(100vh - 200px);
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

    .editor::-webkit-scrollbar-track, .preview::-webkit-scrollbar-track {
	    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	    background-color: #F5F5F5;
	    border-radius: 10px;
    }

    .editor::-webkit-scrollbar, .preview::-webkit-scrollbar {
	    width: 8px;
	    background-color: #F5F5F5;
    }
    .editor::-webkit-scrollbar-thumb, .preview::-webkit-scrollbar-thumb {
	    border-radius: 10px;
        background-image: -webkit-gradient(linear, left bottom, left top, 
            color-stop(0.44, #f56565), 
            color-stop(0.72, #e53e3e), 
            color-stop(0.86, #c53030)
        );
    }

    @media (min-width: 769px) {
        .discussion {
            width: 50%
        }
    }
</style>