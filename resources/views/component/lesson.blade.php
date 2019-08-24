<li class="lesson {{ $course->skill->slug }} flex flex-no-wrap items-center border-b border-dashed hover:bg-gray-200 text-black p-3">
  <div class="icon flex bg-black-trans justify-center items-center flex-no-shrink w-12 h-12 bg-gray-400 rounded-full font-semibold text-xl text-white mr-3">
    @if ( $lesson->is_private )
      <svg class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"/></svg>
    @else
      <svg class="fa h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M423.5 0C339.5.3 272 69.5 272 153.5V224H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48h-48v-71.1c0-39.6 31.7-72.5 71.3-72.9 40-.4 72.7 32.1 72.7 72v80c0 13.3 10.7 24 24 24h32c13.3 0 24-10.7 24-24v-80C576 68 507.5-.3 423.5 0z"/></svg>
    @endif
  </div>
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