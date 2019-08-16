<li class="lesson {{ $course->skill->slug }} flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-3">
    <div data-value="{{ $lesson->is_private ? 'P' : 'F' }}" class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3"></div>
    <div class="flex-1 min-w-0">
        <div class="flex justify-between mb-1">
            <h2 class="font-semibold text-sm">
                Lección {{ $lesson->order }}
            </h2>
            <time class="text-xs text-grey-dark">{{ $lesson->duration }}</time>
        </div>
        <div class="text-sm text-grey-dark truncate">
            <a href="{{ route('lesson', ['order' => $lesson->order, 'course' => $course->slug]) }}" class="text-lg font-bold hover:underline">{{ $lesson->title }}</a>
        </div>
    </div>
</li>