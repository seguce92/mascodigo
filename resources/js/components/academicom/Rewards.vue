<template>
    <div>
        <!--div class="grid grid-cols-2 my-2">
            <div class="text-center">
                <span @click="option = true" class="py-1 px-3 cursor-pointer hover:text-gray-800"
                    :class="option ? 'border-b-4 border-red-600 text-gray-800' : 'text-gray-600'">
                    CURSOS
                </span>
            </div>
            <div class="text-center">
                <span @click="option = false" class="py-1 px-3 cursor-pointer hover:text-gray-800"
                    :class="!option ? 'border-b-4 border-red-600 text-gray-800' : 'text-gray-600'">
                    TROFEOS
                </span>
            </div>
        </div>
        <div v-if="option">
            cursos
        </div>
        <div v-else>
            trofeos
        </div-->
        <div class="bg-gray-200 text-gray-900 p-5 rounded shadow mx-4 my-10">
            <span class="font-semibold">LO SIENTO... </span>
            <br>Esta funcion aun se encuentra en desarrollo
        </div>
    </div>
</template>

<script>
export default {
    name: 'rewards',
    data: () => ({
        option: true
    }),
    created (){

    },
    methods: {
        
    }
}
</script>