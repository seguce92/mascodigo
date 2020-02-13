<template>
    <div class="academic">
        <ul class="flex overflow-auto overflow-y-hidden" style="margin-bottom:-1px">
            <li class="-mb-px mr-1">
                <a @click="selectTab('courses')" 
                    class="inline-block text-sm rounded-t py-2 px-4 cursor-pointer text-center"
                    :class="option == 'courses' ? 'active-tab text-red-600 border-l border-t border-r bg-white font-semibold' : 'text-gray-500 hover:text-gray-800'">
                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.667 369.465h-7.573c-.043-1.707.128-3.413-.32-5.141l-83.776-312.64a21.383 21.383 0 00-9.941-12.949 21.292 21.292 0 00-16.192-2.133L294.699 57.55c-11.371 3.051-18.112 14.741-15.083 26.133l8.149 30.379c-1.813-.192-3.563-.597-5.419-.597H64a21.358 21.358 0 00-18.283 10.325 21.346 21.346 0 00-.576 20.992l8.683 16.384c5.227 9.899 5.227 22.699 0 32.576l-2.667 5.056h-8.491a21.358 21.358 0 00-18.283 10.325 21.346 21.346 0 00-.576 20.992l8.683 16.384c5.227 9.899 5.227 22.699 0 32.576l-8.683 16.405a21.346 21.346 0 00.576 20.992 21.356 21.356 0 0018.283 10.325h8.491l2.667 5.035c5.227 9.899 5.227 22.699 0 32.576l-2.667 5.056H21.333C9.536 369.465 0 379.022 0 390.798v64c0 11.776 9.536 21.333 21.333 21.333h469.333c11.776 0 21.333-9.557 21.333-21.333v-64c.001-11.776-9.556-21.333-21.332-21.333zm-208.32 0H97.493c3.904-13.867 3.904-28.779 0-42.667h184.853c8.832 0 16.32 9.771 16.32 21.333.001 11.563-7.487 21.334-16.319 21.334zm0-170.667H97.493c3.904-13.867 3.904-28.779 0-42.667h184.853c8.832 0 16.32 9.771 16.32 21.333.001 11.563-7.487 21.334-16.319 21.334zm55.36 170.667c2.197-6.699 3.627-13.824 3.627-21.333 0-23.296-11.648-43.52-28.843-54.72 4.629-9.131 7.509-19.456 7.509-30.613s-2.88-21.483-7.509-30.613a62.404 62.404 0 005.76-4.309l37.952 141.589h-18.496z"/></svg>
                    <span>Cursos</span>
                </a>
            </li>
            <li class="mr-1">
                <a @click="selectTab('advance')"
                    class="inline-block text-sm rounded-t py-2 px-4 cursor-pointer"
                    :class="option == 'advance' ? 'active-tab text-red-600 border-l border-t border-r bg-white font-semibold' : 'text-gray-500 hover:text-gray-800'">
                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 491.52 491.52"><path d="M471.04 40.96H327.68V20.48C327.68 9.175 318.525 0 307.2 0H184.32c-11.325 0-20.48 9.175-20.48 20.48v20.48H20.48C9.155 40.96 0 50.135 0 61.44v225.28h32.481L169.84 149.361c8.008-8.008 20.951-8.008 28.959 0l67.441 67.441 46.961-46.961c8.008-8.008 20.951-8.008 28.959 0L459.039 286.72h32.481V61.44c0-11.305-9.155-20.48-20.48-20.48zM286.72 61.44v20.48H204.8V40.96h81.92v20.48zM0 389.12c0 11.305 9.155 20.48 20.48 20.48h175.841l-46.961 46.961c-8.008 8.008-8.008 20.951 0 28.959a20.422 20.422 0 0014.479 6.001 20.42 20.42 0 0014.479-6.001l67.441-67.441L313.2 485.52a20.424 20.424 0 0014.479 6.001 20.42 20.42 0 0014.479-6.001c8.008-8.008 8.008-20.951 0-28.959L295.199 409.6H471.04c11.325 0 20.48-9.175 20.48-20.48v-61.44H0v61.44z"/><path d="M280.719 260.241c-8.008 8.008-20.951 8.008-28.959 0L184.319 192.8l-93.921 93.921h310.723L327.68 213.28l-46.961 46.961z"/></svg>
                    <span>En Progreso</span>
                </a>
            </li>
            <li class="mr-1">
                <a @click="selectTab('favorite')"
                    class="inline-block text-sm rounded-t py-2 px-4 cursor-pointer"
                    :class="option == 'favorite' ? 'active-tab text-red-600 border-l border-t border-r bg-white font-semibold' : 'text-gray-500 hover:text-gray-800'">
                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
                    <span>Favoritos</span>
                </a>
            </li>
            <li class="mr-1">
                <a @click="selectTab('completed')" 
                    class="inline-block text-sm rounded-t py-2 px-4 cursor-pointer"
                    :class="option == 'completed' ? 'active-tab text-red-600 border-l border-t border-r bg-white font-semibold' : 'text-gray-500 hover:text-gray-800'">
                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current mx-auto mb-1" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><path d="M5 42.285V37.68l-1.291-2.594A2.974 2.974 0 003 37v5.285c-1.228.669-2 2.442-2 3.715 0 1.654 1.346 3 3 3s3-1.346 3-3c0-1.273-.772-3.046-2-3.715zM23.235 32.82l-.567.508c-.02.018-.118.105-.267.234A6.997 6.997 0 0124 38a6.986 6.986 0 01-2.612 5.446A12.183 12.183 0 0126 45.86V33h14v2h19v2H40v4h18c1.654 0 3-1.346 3-3v-7H22.328zM36 13.618v4.764L40.764 16zM38.276 49c-.513 0-.996.227-1.325.621L32.468 55h-1.989l-3.961-5.658A10.185 10.185 0 0018.179 45H17c-4.962 0-9 4.037-9 9v7h15v-6l-1.8-2.4 1.6-1.199 3.9 5.2C27.827 58.103 29.622 59 31.5 59s3.673-.897 4.8-2.399l3.355-4.474c.222-.297.345-.665.345-1.035v-.368c0-.951-.773-1.724-1.724-1.724zM5.019 33.229l.883 1.775L21 26.766l-.902-1.77zM19.519 29.846l-10.362 5.65 1.162 2.333c1.247-.338 3.755-1.081 5.555-2.027 1.82-.955 3.9-2.635 4.885-3.467z"/><path d="M17 43c2.757 0 5-2.243 5-5a5 5 0 00-1.139-3.166c-1.134.895-2.641 1.995-4.057 2.739-1.44.756-3.225 1.376-4.605 1.797A4.984 4.984 0 0017 43zM35.415 48.34A3.7 3.7 0 0138 47.03V35H28v12.997c.05.068.109.128.157.198L31.532 53zM30 37h6v2h-6zm0 4h6v2h-6zm0 4h4v2h-4zM58 3H20c-1.654 0-3 1.346-3 3v18.418l2.177-1.187a1.998 1.998 0 011.541-.135c.507.164.92.516 1.162.991l.902 1.77c.499.978.11 2.18-.865 2.681l-.641.349.056.113H61V6c0-1.654-1.346-3-3-3zM21 15h-2v-2h2zm0-8v4h-2V7c0-1.103.897-2 2-2h8v2zm18 20c-6.065 0-11-4.935-11-11S32.935 5 39 5s11 4.935 11 11-4.935 11-11 11zm20 0h-2v-2h2zm0-4h-2v-2h2zm0-4h-2v-2h2z"/><path d="M39 7c-4.962 0-9 4.037-9 9s4.038 9 9 9 9-4.037 9-9-4.038-9-9-9zm-5 14.618V10.382L45.236 16z"/></svg>
                    <span>Completado</span>
                </a>
            </li>
            <li class="mr-1">
                <a @click="selectTab('rewards')" 
                    class="inline-block text-sm rounded-t py-2 px-4 cursor-pointer"
                    :class="option == 'rewards' ? 'active-tab text-red-600 border-l border-t border-r bg-white font-semibold' : 'text-gray-500 hover:text-gray-800'">
                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 491.52 491.52"><path d="M433.951 62.157l-3.871-.102V20.48C430.08 9.175 420.925 0 409.6 0H81.92C70.595 0 61.44 9.175 61.44 20.48v41.574l-3.256.102C26.092 62.157 0 88.678 0 121.303v70.451c0 36.925 19.702 71.68 51.405 90.706a20.936 20.936 0 003.625 1.72l53.78 19.251c20.644 23.347 46.674 41.902 75.51 53.146v32.543h-14.725c-37.048 0-67.195 30.147-67.195 67.195v14.725c0 11.305 9.155 20.48 20.48 20.48h245.76c11.325 0 20.48-9.175 20.48-20.48v-14.725c0-37.048-30.147-67.195-67.195-67.195H307.2v-32.543c28.836-11.244 54.866-29.798 75.51-53.146l53.76-19.251a20.487 20.487 0 003.645-1.72c31.703-19.026 51.405-53.78 51.405-90.706v-70.451c0-32.625-26.071-59.146-57.569-59.146zM70.881 246.354c-18.493-11.878-29.921-32.604-29.921-54.6v-70.451c0-9.687 8.049-18.186 17.838-18.207l2.642-.061v81.838c0 21.627 4.649 42.742 12.636 62.607l-3.195-1.126zM266.24 389.12h-40.96v-21.873c.082 0 .184 0 .266.02 6.676.84 13.414 1.372 20.214 1.372 6.287 0 12.534-.41 18.739-1.126.573-.061 1.147-.041 1.741-.102v21.709zm10.813-210.903l19.333 59.535L245.76 204.8l-50.627 32.952 19.333-59.535-50.626-34.857h62.587l19.333-61.44 20.48 61.44h61.44l-50.627 34.857zm173.507 13.537c0 21.995-11.428 42.721-29.921 54.6l-3.195 1.126c7.987-19.866 12.636-40.981 12.636-62.607v-81.859l3.256.102c9.175 0 17.224 8.499 17.224 18.186v70.452z"/></svg>
                    <span>Logros</span>
                </a>
            </li>
            <li class="mr-1">
                <a @click="selectTab('history')"
                    class="inline-block text-sm rounded-t py-2 px-4 cursor-pointer"
                    :class="option == 'history' ? 'active-tab text-red-600 border-l border-t border-r bg-white font-semibold' : 'text-gray-500 hover:text-gray-800'">
                    <svg class="w-4 h-4 md:w-6 md:h-6 fill-current mx-auto mb-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 255.531c.253 136.64-111.18 248.372-247.82 248.468-59.015.042-113.223-20.53-155.822-54.911-11.077-8.94-11.905-25.541-1.839-35.607l11.267-11.267c8.609-8.609 22.353-9.551 31.891-1.984C173.062 425.135 212.781 440 256 440c101.705 0 184-82.311 184-184 0-101.705-82.311-184-184-184-48.814 0-93.149 18.969-126.068 49.932l50.754 50.754c10.08 10.08 2.941 27.314-11.313 27.314H24c-8.837 0-16-7.163-16-16V38.627c0-14.254 17.234-21.393 27.314-11.314l49.372 49.372C129.209 34.136 189.552 8 256 8c136.81 0 247.747 110.78 248 247.531zm-180.912 78.784l9.823-12.63c8.138-10.463 6.253-25.542-4.21-33.679L288 256.349V152c0-13.255-10.745-24-24-24h-16c-13.255 0-24 10.745-24 24v135.651l65.409 50.874c10.463 8.137 25.541 6.253 33.679-4.21z"/></svg>
                    <span>Historial</span>
                </a>
            </li>
        </ul>
        <div v-if="option == 'courses'" class="z-10 bg-white border rounded-b p-4 shadow">
            <courses></courses>
        </div>
        <div v-else-if="option == 'history'" class="z-10 bg-white border rounded-b p-4 shadow">
            Historial
        </div>
        <div v-else-if="option == 'advance'" class="z-10 bg-white border rounded-b p-4 shadow">
            <advance></advance>
        </div>
        <div v-else-if="option == 'completed'" class="z-10 bg-white border rounded-b p-4 shadow">
            <completed></completed>
        </div>
        <div v-else-if="option == 'favorite'" class="z-10 bg-white border rounded-b p-4 shadow">
            <favorites></favorites>
        </div>
        <div v-else class="z-10 bg-white border rounded-b py-2 px-4 shadow">
            Rewards
        </div>
    </div>
</template>

<script>
import { Courses, Advance, Favorites, Completed } from './academicom'
export default {
    name: 'academic',
    components: {
        Courses,
        Advance,
        Favorites,
        Completed
    },
    data: () => ({
        option: 'courses'
    }),
    created(){

    },
    methods:{
        selectTab: function (opt) {
            this.option = opt
        }
    }
    
}
</script>

<style>
    .active-tab {
        border-bottom: 2px solid #fff;
        box-shadow: 0 -2px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    }
</style>