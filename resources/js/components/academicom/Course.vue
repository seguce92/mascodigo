<template>
    <a :href="'/course/' + data.slug" class="flex flex-row p-2 rounded-lg hover:bg-gray-200">
        <div class="flex-shrink pr-3">
            <div class="rounded-full border-white border-2 p-3 bg-blue-600 course shadow" :class="data.color">
                <img class="w-10 h-10" :src="data.icon" alt="Icon" loading="lazy">
            </div>
        </div>
        <div class="flex-1">
            <div class="grid grid-cols-2">
                <div class="font-semibold text-gray-700 text-xs uppercase">{{ data.skill.name }}</div>
                <time :datetime="data.published_at" class="text-gray-600 text-xs text-right">{{ data.published_human }}</time>
            </div>
            <a class="text-base text-gray-700 leading-tight tracking-tighter">
                {{ data.title }}
            </a>
        </div>
    </a>
</template>

<script>
export default {
    name: 'course',
    props: {
        data: {
            type: Object
        }
    },
    data:() => ({

    })
}
</script>