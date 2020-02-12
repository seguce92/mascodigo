<template>
    <div class="text-right py-4">
        <notifications group="foo" position="bottom right" />
        <span title="ME GUSTA" class="py-4 px-2 cursor-pointer text-gray-700" :class="liked ? 'text-red-500' : 'hover:text-gray-800'" @click="likedPress()">
            <svg class="w-6 h-6 fill-current inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M485.5 0L576 160H474.9L405.7 0h79.8zm-128 0l69.2 160H149.3L218.5 0h139zm-267 0h79.8l-69.2 160H0L90.5 0zM0 192h100.7l123 251.7c1.5 3.1-2.7 5.9-5 3.3L0 192zm148.2 0h279.6l-137 318.2c-1 2.4-4.5 2.4-5.5 0L148.2 192zm204.1 251.7l123-251.7H576L357.3 446.9c-2.3 2.7-6.5-.1-5-3.2z"/></svg>
            <small class="text-gray-900 text-xs">{{ likes }}</small>
        </span>
        <span title="AGREGAR A MIS FAVORITOS" class="py-4 pl-2 cursor-pointer" @click="favoritePress()">
            <svg class="w-6 h-6 fill-current inline-block" :class="favorite ? 'text-red-600' : 'hover:text-gray-700'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
        </span>
    </div>
</template>

<script>
import Resource from '@/api/resource';
const resource = new Resource();

export default {
    name: 'like',
    props: {
        logged: {
            type: Boolean,
            default: false
        },
        lesson: {
            type: Object
        }
    },
    data: () => ({
        favorite: false,
        liked: false,
        likes: 1
    }),
    created() {
        this.loadFavorite(this.lesson.id);
    },
    methods: {
        likedPress: function () {
            if ( !this.liked ){
                this.liked = true;
                this.likes = this.likes + 1
            }
        },
        async favoritePress () {
            this.favorite = !this.favorite

            let params = {
                lesson: this.lesson.id
            };
            const { data } = await resource.post('admin/academic/store/favorite', params);

            if ( data ) {
                this.$notify({
                    group: 'foo',
                    text: 'Agregado a MIS FAVORITOS',
                    duration: 2500
                });
            } else {
                this.$notify({
                    group: 'foo',
                    text: 'Eliminado de MIS FAVORITOS',
                    duration: 2500,
                    type: 'error'
                });
            }
        },
        async loadFavorite (id) {
            const { data } = await resource.get('admin/academic/load/favorite/' + id);
            this.favorite = data
        },
    }
}
</script>